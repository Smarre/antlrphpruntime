<?php

/*
  [The "BSD licence"]
  Copyright (c) 2005-2008 Terence Parr
  All rights reserved.

  Redistribution and use in source and binary forms, with or without
  modification, are permitted provided that the following conditions
  are met:
  1. Redistributions of source code must retain the above copyright
  notice, this list of conditions and the following disclaimer.
  2. Redistributions in binary form must reproduce the above copyright
  notice, this list of conditions and the following disclaimer in the
  documentation and/or other materials provided with the distribution.
  3. The name of the author may not be used to endorse or promote products
  derived from this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR
  IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
  OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
  IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT,
  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT
  NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
  DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
  THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
  THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Antlr\Runtime\Tree;

use Antlr\Runtime\BaseRecognizer;
use Antlr\Runtime\Token;

/** A parser for a stream of tree nodes.  "tree grammars" result in a subclass
 *  of this.  All the error reporting and recovery is shared with Parser via
 *  the BaseRecognizer superclass.
 */
class TreeParser extends BaseRecognizer
{
    const DOWN = Token::DOWN;
    const UP = Token::UP;

    // precompiled regex used by inContext
    const dotdot = ".*[^.]\\.\\.[^.].*";
    const doubleEtc = ".*\\.\\.\\.\\s+\\.\\.\\..*";

    protected $input;

    public function reset()
    {
        parent::reset(); // reset all recognizer state variables
        if ($this->input != null) {
            $this->input->seek(0); // rewind the input
        }
    }

    /** Set the input stream */
    public function setTreeNodeStream(TreeNodeStream $input)
    {
        $this->input = $input;
    }

    public function getTreeNodeStream()
    {
        return $this->input;
    }

    public function getSourceName()
    {
        return $this->input->getSourceName();
    }

    protected function getCurrentInputSymbol(IntStream $input)
    {
        return $this->input->LT(1);
    }

    protected function getMissingSymbol(IntStream $input, RecognitionException $e, $expectedTokenType, $follow)
    {
        $names = $this->getTokenNames();
        $tokenText = "<missing " + $names[$expectedTokenType] + ">";
        return new CommonTree(new CommonToken($expectedTokenType, $tokenText));
    }

    /** Match '.' in tree parser has special meaning.  Skip node or
     *  entire tree if node has children.  If children, scan until
     *  corresponding UP node.
     */
    public function matchAny(IntStream $ignore)
    { // ignore stream, copy of input
        $this->state->errorRecovery = false;
        $this->state->failed = false;
        $look = $this->input->LT(1);
        if ($this->input->getTreeAdaptor()->getChildCount($look) == 0) {
            $this->input->consume(); // not subtree, consume 1 node and return
            return;
        }
        // current node is a subtree, skip to corresponding UP.
        // must count nesting level to get right UP
        $level = 0;
        $tokenType = $this->input->getTreeAdaptor()->getType($look);
        while ($tokenType != Token::EOF && !($tokenType == self::UP && $level == 0)) {
            $this->input->consume();
            $look = $this->input->LT(1);
            $tokenType = $this->input->getTreeAdaptor()->getType($look);
            if ($tokenType == self::DOWN) {
                $level++;
            } else if ($tokenType == self::UP) {
                $level--;
            }
        }
        $this->input->consume(); // consume UP
    }

    /** We have DOWN/UP nodes in the stream that have no line info; override.
     *  plus we want to alter the exception type.  Don't try to recover
     *  from tree parser errors inline...
     */
    protected function recoverFromMismatchedToken(IntStream $input, $ttype, $follow)
    {
        throw new MismatchedTreeNodeException($ttype, $this->input);
    }

    /** Prefix error message with the grammar name because message is
     *  always intended for the programmer because the parser built
     *  the input tree not the user.
     */
    public function getErrorHeader(RecognitionException $e)
    {
        return $this->getGrammarFileName() + ": node from " +
        ($e->approximateLineInfo ? "after " : "") + "line " + $e->line + ":" + $e->charPositionInLine;
    }

    /** Tree parsers parse nodes they usually have a token object as
     *  payload. Set the exception token and do the default behavior.
     */
    public function getErrorMessage(RecognitionException $e, $tokenNames)
    {
        if ($this instanceof TreeParser) {
            $adaptor = $e->input->getTreeAdaptor();
            $e->token = $this->adaptor->getToken($e->node);
            if ($e->token == null) { // could be an UP/DOWN node
                $e->token = new CommonToken($this->adaptor->getType($e->node),
                                $this->adaptor->getText($e->node));
            }
        }
        return parent::getErrorMessage($e, $tokenNames);
    }

    public function traceIn($ruleName, $ruleIndex)
    {
        parent::traceIn($ruleName, $ruleIndex, $this->input->LT(1));
    }

    public function traceOut($ruleName, $ruleIndex)
    {
        parent::traceOut($ruleName, $ruleIndex, $this->input->LT(1));
    }

}
