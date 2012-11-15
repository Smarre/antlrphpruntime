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

/** A record of the rules used to match a token sequence.  The tokens
 *  end up as the leaves of this tree and rule nodes are the interior nodes.
 *  This really adds no functionality, it is just an alias for CommonTree
 *  that is more meaningful (specific) and holds a String to display for a node.
 */
class ParseTree extends BaseTree
{

    public $payload;
    public $hiddenTokens;

    public function __construct($label)
    {
        $this->payload = $label;
    }

    public function dupNode()
    {
        return null;
    }

    public function getType()
    {
        return 0;
    }

    public function getText()
    {
        return toString();
    }

    public function getTokenStartIndex()
    {
        return 0;
    }

    public function setTokenStartIndex($index)
    {
        
    }

    public function getTokenStopIndex()
    {
        return 0;
    }

    public function setTokenStopIndex($index)
    {

    }

    public function toString()
    {
        if ($this->payload instanceof Token) {
            $t = $this->payload;
            if ($t->getType() == Token::EOF) {
                return "<EOF>";
            }
            return $t->getText();
        }
        return $this->payload->toString();
    }

    /** Emit a token and all hidden nodes before.  EOF node holds all
     *  hidden tokens after last real token.
     */
    public function toStringWithHiddenTokens()
    {
        $buf = "";
        if ($this->hiddenTokens != null) {
            $nht = count($hiddenTokens);
            for ($i = 0; $i < $nht; ++$i) {
                $hidden = $this->hiddenTokens[$i];
                $buf .= $hidden->getText();
            }
        }
        $nodeText = $this->toString();
        if (!$nodeText->equals("<EOF>")) {
            $buf .= $nodeText;
        }
        return $buf;
    }

    /** Print out the leaves of this tree, which means printing original
     *  input back out.
     */
    public function toInputString()
    {
        $buf = "";
        return $this->_toStringLeaves($buf);
    }

    public function _toStringLeaves($buf)
    {
        if ($this->payload instanceof Token) { // leaf node token?
            $buf .= $this->toStringWithHiddenTokens();
            return;
        }
        for ($i = 0; $this->children != null && $i < count($this->children); ++$i) {
            $t = $this->children[$i];
            $buf = $this->_toStringLeaves($buf);
        }
    }

}
