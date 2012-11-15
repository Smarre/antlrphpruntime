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

class TreePatternParser
{
    /** @var TreePatternLexer */
    protected $tokenizer;
    /** @var Token */
    protected $ttype;
    /** @var TreeWizard */
    protected $wizard;
    /** @var TreeAdaptor */
    protected $adaptor;

    public function __construct(TreePatternLexer $tokenizer, TreeWizard $wizard, TreeAdaptor $adaptor)
    {
        $this->tokenizer = $tokenizer;
        $this->wizard = $wizard;
        $this->adaptor = $adaptor;
        $this->ttype = $tokenizer->nextToken(); // kickstart
    }

    public function pattern()
    {
        if ($this->ttype == TreePatternLexer::BEGIN) {
            return $this->parseTree();
        } else if ($this->ttype == TreePatternLexer::ID) {
            $node = $this->parseNode();
            if ($this->ttype == TreePatternLexer::EOF) {
                return $node;
            }
            return null; // extra junk on end
        }
        return null;
    }

    public function parseTree()
    {
        if ($this->ttype != TreePatternLexer::BEGIN) {
            echo("no BEGIN\n");
            return null;
        }
        $this->ttype = $this->tokenizer->nextToken();
        $root = $this->parseNode();
        if ($root == null) {
            return null;
        }
        while ($this->ttype == TreePatternLexer::BEGIN ||
        $this->ttype == TreePatternLexer::ID ||
        $this->ttype == TreePatternLexer::PERCENT ||
        $this->ttype == TreePatternLexer::DOT) {
            if ($this->ttype == TreePatternLexer::BEGIN) {
                $subtree = $this->parseTree();
                $this->adaptor->addChild($root, $subtree);
            } else {
                $child = $this->parseNode();
                if ($child == null) {
                    return null;
                }
                $this->adaptor->addChild($root, $child);
            }
        }
        if ($this->ttype != TreePatternLexer::END) {
            echo("no END\n");
            return null;
        }
        $this->ttype = $this->tokenizer->nextToken();
        return $root;
    }

    public function parseNode()
    {
        // "%label:" prefix
        $label = null;
        if ($this->ttype == TreePatternLexer::PERCENT) {
            $this->ttype = $this->tokenizer->nextToken();
            if ($this->ttype != TreePatternLexer::ID) {
                return null;
            }
            $label = $this->tokenizer->sval;
            $this->ttype = $this->tokenizer->nextToken();
            if ($this->ttype != TreePatternLexer::COLON) {
                return null;
            }
            $this->ttype = $this->tokenizer->nextToken(); // move to ID following colon
        }

        // Wildcard?
        if ($this->ttype == TreePatternLexer::DOT) {
            $this->ttype = $this->tokenizer->nextToken();
            $wildcardPayload = new CommonToken(0, ".");

            $node = new WildcardTreePattern($wildcardPayload, true);

            if ($label != null) {
                $node->label = $label;
            }
            return $node;
        }

        // "ID" or "ID[arg]"
        if ($this->ttype != TreePatternLexer::ID) {
            return null;
        }
        $tokenName = $this->tokenizer->sval;
        $this->ttype = $this->tokenizer->nextToken();
        if ($tokenName == "nil") {
            return $this->adaptor->nil();
        }
        $text = $tokenName;
        // check for arg
        $arg = null;
        if ($this->ttype == TreePatternLexer::ARG) {
            $arg = $this->tokenizer->sval;
            $text = $arg;
            $this->ttype = $this->tokenizer->nextToken();
        }

        // create node
        $treeNodeType = $this->wizard->getTokenType($tokenName);
        if ($treeNodeType == Token::INVALID_TOKEN_TYPE) {
            return null;
        }
        $node = $this->adaptor->createFromType($treeNodeType, $text);
        if ($label != null && get_class($node) == "Antlr\Runtime\Tree\TreePattern") {
            $node->label = $label;
        }
        if ($arg != null && get_class($node) == "Antlr\Runtime\Tree\TreePattern") {
            $node->hasTextArg = true;
        }
        return $node;
    }
}
