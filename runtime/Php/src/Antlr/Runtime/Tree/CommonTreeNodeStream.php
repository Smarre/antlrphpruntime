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

use Antlr\Runtime\Token;
use Antlr\Runtime\TokenStream;
use Antlr\Runtime\Misc\LookaheadStream;

class CommonTreeNodeStream extends LookaheadStream implements TreeNodeStream
{
    const DEFAULT_INITIAL_BUFFER_SIZE = 100;
    const INITIAL_CALL_STACK_SIZE = 10;

    /** Pull nodes from which tree? */
    protected $root;
    /** If this tree (root) was created from a token stream, track it. */
    protected $tokens;
    /** What tree adaptor was used to build these trees */
    public $adaptor;
    /** The tree iterator we using */
    protected $it;
    /** Stack of indexes used for push/pop calls */
    protected $calls = array();
    /** Tree (nil A B C) trees like flat A B C streams */
    protected $hasNilRoot = false;
    /** Tracks tree depth.  Level=0 means we're at root node level. */
    protected $level = 0;

    public function __construct(Tree $tree, TreeAdaptor $adaptor = null)
    {
        if (!$adaptor) {
            $adaptor = new CommonTreeAdaptor();
        }

        $this->root = $tree;
        $this->adaptor = $adaptor;
        $this->it = new TreeIterator($this->root, $this->adaptor);
    }

    public function reset()
    {
        parent::reset();
        $this->it->reset();
        $this->hasNilRoot = false;
        $this->level = 0;
        if ($this->calls != null) {
            $this->calls = array();
        }
    }

    /** Pull elements from tree iterator.  Track tree level 0..max_level.
     *  If nil rooted tree, don't give initial nil and DOWN nor final UP.
     */
    public function nextElement()
    {
        $t = $this->it->next();
        //System.out.println("pulled "+adaptor.getType(t));
        if ($t == $this->it->up) {
            $this->level--;
            if ($this->level == 0 && $this->hasNilRoot) {
                return $this->it->next(); // don't give last UP; get EOF
            }
        } else if ($t == $this->it->down) {
            $this->level++;
        }
        if ($this->level == 0 && $this->adaptor->isNil($t)) { // if nil root, scarf nil, DOWN
            $this->hasNilRoot = true;
            $t = $this->it->next(); // t is now DOWN, so get first real node next
            $this->level++;
            $t = $this->it->next();
        }
        return $t;
    }

    public function isEOF($o)
    {
        return $this->adaptor->getType($o) == Token::EOF;
    }

    public function setUniqueNavigationNodes($uniqueNavigationNodes)
    {

    }

    public function get($i)
    {
        throw new \BadMethodCallException("Unsupported operation");
    }

    public function getTreeSource()
    {
        return $this->root;
    }

    public function getSourceName()
    {
        return $this->getTokenStream()->getSourceName();
    }

    public function getTokenStream()
    {
        return $this->tokens;
    }

    public function setTokenStream(TokenStream $tokens)
    {
        $this->tokens = $tokens;
    }

    public function getTreeAdaptor()
    {
        return $this->adaptor;
    }

    public function setTreeAdaptor(TreeAdaptor $adaptor)
    {
        $this->adaptor = $adaptor;
    }

    public function LA($i)
    {
        return $this->adaptor->getType($this->LT($i));
    }

    /** Make stream jump to a new location, saving old location.
     *  Switch back with pop().
     */
    public function push($index)
    {
        array_push($this->calls, $this->p); // save current index
        $this->seek($index);
    }

    /** Seek back to previous index saved during last push() call.
     *  Return top of stack (return index).
     */
    public function pop()
    {
        $ret = array_pop($this->calls);
        $this->seek($ret);
        return $ret;
    }

    // TREE REWRITE INTERFACE

    public function replaceChildren($parent, $startChildIndex, $stopChildIndex, $t)
    {
        if ($parent != null) {
            $this->adaptor->replaceChildren($parent, $startChildIndex, $stopChildIndex, $t);
        }
    }

    public function toString($start = null, $stop = null)
    {
        // we'll have to walk from start to stop in tree; we're not keeping
        // a complete node stream buffer
        return "n/a";
    }

    /** For debugging; destructive: moves tree iterator to end. */
    public function toTokenTypeString()
    {
        $this->reset();
        $buf = "";
        $o = $this->LT(1);
        $type = $this->adaptor->getType($o);
        while ($type != Token::EOF) {
            $buf .= " " . $type;
            $this->consume();
            $o = $this->LT(1);
            $type = $this->adaptor->getType($o);
        }
        return ltrim($buf);
    }

}
