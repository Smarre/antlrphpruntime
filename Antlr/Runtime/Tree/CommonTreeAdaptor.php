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
use Antlr\Runtime\CommonToken;
use Antlr\Runtime\TokenStream;

/** A TreeAdaptor that works with any Tree implementation.  It provides
 *  really just factory methods; all the work is done by BaseTreeAdaptor.
 *  If you would like to have different tokens created than ClassicToken
 *  objects, you need to override this and then set the parser tree adaptor to
 *  use your subclass.
 *
 *  To get your parser to build nodes of a different type, override
 *  create(Token), errorNode(), and to be safe, YourTreeClass.dupNode().
 *  dupNode is called to duplicate nodes during rewrite operations.
 */
class CommonTreeAdaptor extends BaseTreeAdaptor
{

    /** Duplicate a node.  This is part of the factory;
     * 	override if you want another kind of node to be built.
     *
     *  I could use reflection to prevent having to override this
     *  but reflection is slow.
     */
    public function dupNode($t)
    {
        if ($t == null) {
            return null;
        }
        return $t->dupNode();
    }

    public function create(Token $payload = null)
    {
        return new CommonTree(null, $payload);
    }

    /** Tell me how to create a token for use with imaginary token nodes.
     *  For example, there is probably no input symbol associated with imaginary
     *  token DECL, but you need to create it as a payload or whatever for
     *  the DECL node as in ^(DECL type ID).
     *
     *  If you care what the token payload objects' type is, you should
     *  override this method and any other createToken variant.
     *
     * @return CommonToken
     */
    public function createToken($tokenType, $text)
    {
        $token = new CommonToken(null, $tokenType, 0, 0, 0);
        $token->setText($text);
        return $token;
    }

    /** Tell me how to create a token for use with imaginary token nodes.
     *  For example, there is probably no input symbol associated with imaginary
     *  token DECL, but you need to create it as a payload or whatever for
     *  the DECL node as in ^(DECL type ID).
     *
     *  This is a variant of createToken where the new token is derived from
     *  an actual real input token.  Typically this is for converting '{'
     *  tokens to BLOCK etc...  You'll see
     *
     *    r : lc='{' ID+ '}' -> ^(BLOCK[$lc] ID+) ;
     *
     *  If you care what the token payload objects' type is, you should
     *  override this method and any other createToken variant.
     *
     * @return CommonToken
     */
    public function createTokenFromToken(Token $fromToken, $tokenType = null)
    {
        $token = CommonToken::fromToken($fromToken);
        if ($tokenType) {
            $token->setType($tokenType);
        }
        return $token;
    }

    /** Track start/stop token for subtree root created for a rule.
     *  Only works with Tree nodes.  For rules that match nothing,
     *  seems like this will yield start=i and stop=i-1 in a nil node.
     *  Might be useful info so I'll not force to be i..i.
     */
    public function setTokenBoundaries($t, Token $startToken, Token $stopToken)
    {
        if ($t == null) {
            return;
        }
        $start = 0;
        $stop = 0;
        if ($startToken != null) {
            $start = $startToken->getTokenIndex();
        }
        if ($stopToken != null) {
            $stop = $stopToken->getTokenIndex();
        }
        $t->setTokenStartIndex($start);
        $t->setTokenStopIndex($stop);
    }

    public function getTokenStartIndex($t)
    {
        if ($t == null) {
            return -1;
        }
        return $t->getTokenStartIndex();
    }

    public function getTokenStopIndex($t)
    {
        if (t == null)
            return -1;
        return $t->getTokenStopIndex();
    }

    public function getText($t)
    {
        if ($t == null)
            return null;
        return $t->getText();
    }

    public function getType($t)
    {
        if ($t == null)
            return Token::INVALID_TOKEN_TYPE;
        return $t->getType();
    }

    /** What is the Token associated with this node?  If
     *  you are not using CommonTree, then you must
     *  override this in your own adaptor.
     */
    public function getToken($t)
    {
        if ($t instanceof CommonTree) {
            return $t->getToken();
        }
        return null; // no idea what to do
    }

    public function getChild($t, $i)
    {
        if ($t == null) {
            return null;
        }
        return $t->getChild($i);
    }

    public function getChildCount($t)
    {
        if ($t == null) {
            return 0;
        }
        return $t->getChildCount();
    }

    public function getParent($t)
    {
        if ($t == null) {
            return null;
        }
        return $t->getParent();
    }

    public function setParent($t, $parent)
    {
        if ($t != null) {
            $t->setParent($parent);
        }
    }

    public function getChildIndex($t)
    {
        if ($t == null) {
            return 0;
        }
        return $t->getChildIndex();
    }

    public function setChildIndex($t, $index)
    {
        if ($t != null) {
            $t->setChildIndex($index);
        }
    }

    public function replaceChildren($parent, $startChildIndex, $stopChildIndex, $t)
    {
        if ($parent != null) {
            $parent->replaceChildren($startChildIndex, $stopChildIndex, $t);
        }
    }

}
