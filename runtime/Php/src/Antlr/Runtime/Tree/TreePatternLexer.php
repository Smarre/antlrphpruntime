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

class TreePatternLexer
{
    const EOF = -1;
    const BEGIN = 1;
    const END = 2;
    const ID = 3;
    const ARG = 4;
    const PERCENT = 5;
    const COLON = 6;
    const DOT = 7;

    /** The tree pattern to lex like "(A B C)" */
    protected $pattern;
    /** Index into input $ */
    protected $p = -1;
    /** Current char */
    protected $c;
    /** How long is the pattern in char? */
    protected $n;
    /** Set when token type is ID or ARG (name mimics Java's StreamTokenizer) */
    public $sval = "";
    public $error = false;

    public function __construct($pattern)
    {
        $this->pattern = $pattern;
        $this->n = strlen($pattern);
        $this->consume();
    }

    public function nextToken()
    {
        $this->sval = "";
        while ($this->c != self::EOF) {
            if ($this->c == ' ' || $this->c == '\n' || $this->c == '\r' || $this->c == '\t') {
                $this->consume();
                continue;
            }
            if (($this->c >= 'a' && $this->c <= 'z') || ($this->c >= 'A' && $this->c <= 'Z') || $this->c == '_') {
                $this->sval .= $this->c;
                $this->consume();
                while (($this->c >= 'a' && $this->c <= 'z') || ($this->c >= 'A' && $this->c <= 'Z') || ($this->c >= '0' && $this->c <= '9') || $this->c == '_') {
                    $this->sval .= $this->c;
                    $this->consume();
                }
                return self::ID;
            }
            if ($this->c == '(') {
                $this->consume();
                return self::BEGIN;
            }
            if ($this->c == ')') {
                $this->consume();
                return self::END;
            }
            if ($this->c == '%') {
                $this->consume();
                return self::PERCENT;
            }
            if ($this->c == ':') {
                $this->consume();
                return self::COLON;
            }
            if ($this->c == '.') {
                $this->consume();
                return self::DOT;
            }
            if ($this->c == '[') { // grab [x] as a string, returning x
                $this->consume();
                while ($this->c != ']') {
                    if ($this->c == '\\') {
                        $this->consume();
                        if ($this->c != ']') {
                            $this->sval .= '\\';
                        }
                        $this->sval .= $this->c;
                    } else {
                        $this->sval .= $this->c;
                    }
                    $this->consume();
                }
                $this->consume();
                return self::ARG;
            }
            $this->consume();
            $this->error = true;
            return self::EOF;
        }
        return self::EOF;
    }

    protected function consume()
    {
        $this->p++;
        if ($this->p >= $this->n) {
            $this->c = self::EOF;
        } else {
            $this->c = substr($this->pattern, $this->p, 1);
        }
    }

}