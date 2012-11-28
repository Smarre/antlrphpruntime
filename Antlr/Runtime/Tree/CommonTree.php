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

/** A tree node that is wrapper for a Token object.  After 3.0 release
 *  while building tree rewrite stuff, it became clear that computing
 *  parent and child index is very difficult and cumbersome.  Better to
 *  spend the space in every tree node.  If you don't want these extra
 *  fields, it's easy to cut them out in your own BaseTree subclass.
 */
class CommonTree extends BaseTree
{

    /**
     * A single token is the payload
     *
     * @var Token
     */
    public $token;
    /** What token indexes bracket all tokens associated with this node
     *  and below?
     */
    protected $startIndex = -1;
    protected $stopIndex = -1;
    /**
     * Who is the parent node of this node; if null, implies node is root
     *
     * @var CommonTree
     */
    public $parent;
    /** What index is this node in the child list? Range: 0..n-1 */
    public $childIndex = -1;

    public function __construct(CommonTree $node = null, Token $token = null)
    {
        if ($node) {
            $this->token = $node->token;
            $this->startIndex = $node->startIndex;
            $this->stopIndex = $node->stopIndex;
        } else if ($token) {
            $this->token = $token;
        }
    }

    public function getToken()
    {
        return $this->token;
    }

    public function dupNode()
    {
        return new CommonTree($this);
    }

    public function isNil()
    {
        return $this->token == null;
    }

    public function getType()
    {
        if ($this->token == null) {
            return Token::INVALID_TOKEN_TYPE;
        }
        return $this->token->getType();
    }

    public function getText()
    {
        if ($this->token == null) {
            return null;
        }
        return $this->token->getText();
    }

    public function getLine()
    {
        if ($this->token == null || $this->token->getLine() == 0) {
            if ($this->getChildCount() > 0) {
                return $this->getChild(0)->getLine();
            }
            return 0;
        }
        return $this->token->getLine();
    }

    public function getCharPositionInLine()
    {
        if ($this->token == null || $this->token->getCharPositionInLine() == -1) {
            if ($this->getChildCount() > 0) {
                return $this->getChild(0)->getCharPositionInLine();
            }
            return 0;
        }
        return $this->token->getCharPositionInLine();
    }

    public function getTokenStartIndex()
    {
        if ($this->startIndex == -1 && $this->token != null) {
            return $this->token->getTokenIndex();
        }
        return $this->startIndex;
    }

    public function setTokenStartIndex($index)
    {
        $this->startIndex = $index;
    }

    public function getTokenStopIndex()
    {
        if ($this->stopIndex == -1 && $this->token != null) {
            return $this->token->getTokenIndex();
        }
        return $this->stopIndex;
    }

    public function setTokenStopIndex($index)
    {
        $this->stopIndex = $index;
    }

    /** For every node in this subtree, make sure it's start/stop token's
     *  are set.  Walk depth first, visit bottom up.  Only updates nodes
     *  with at least one token index < 0.
     */
    public function setUnknownTokenBoundaries()
    {
        if ($this->children == null) {
            if ($this->startIndex < 0 || $this->stopIndex < 0) {
                $this->startIndex = $this->stopIndex = $this->token->getTokenIndex();
            }
            return;
        }
        for ($i = 0; $i < count($this->children); ++$i) {
            $this->children[$i]->setUnknownTokenBoundaries();
        }
        if ($this->startIndex >= 0 && $this->stopIndex >= 0) {
            return; // already set
        }
        if (count($this->children) > 0) {
            $firstChild = $this->children[$i];
            $lastChild = $this->children[(count($this->children) - 1)];
            $this->startIndex = $firstChild->getTokenStartIndex();
            $this->stopIndex = $lastChild->getTokenStopIndex();
        }
    }

    public function getChildIndex()
    {
        return $this->childIndex;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($t)
    {
        if($t === null) {
            return;
        }

        // because php tries to validate null to be instance of given argument (Tree),
        // we need to first check if it is null and then validate that it implements the interface.

        $class = new \ReflectionClass($t);
        if(!$class->implementsInterface("Antlr\\Runtime\\Tree\\Tree")) {
            throw new \Exception("setParent(\$t): Given argument does not implement interface Tree.");
            return;
        }

        $this->parent = $t;
    }

    public function setChildIndex($index)
    {
        $this->childIndex = $index;
    }

    public function toString()
    {
        if ($this->isNil()) {
            return "nil";
        }
        if ($this->getType() == Token::INVALID_TOKEN_TYPE) {
            return "<errornode>";
        }
        if ($this->token == null) {
            return null;
        }
        return $this->token->getText();
    }

}
