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

use Antlr\Runtime\RecognizerSharedState;
use Antlr\Runtime\RecognitionException;
use Antlr\Runtime\TokenStream;

class TreeFilter extends TreeParser
{
    const RULE_BOTTOMUP = 1;
    const RULE_TOPDOWN  = 2;

    protected $originalTokenStream;
    protected $originalAdaptor;

    public function __construct(TreeNodeStream $input, RecognizerSharedState $state = null)
    {
        parent::__construct($input, $state);
        $originalAdaptor = $input->getTreeAdaptor();
        $originalTokenStream = $input->getTokenStream();
    }

    public function applyOnce($t, $whichRule)
    {
        if ( $t==null ) {
            return;
        }

        try {
            // share TreeParser object but not parsing-related state
            $state = new RecognizerSharedState();
            $input = new CommonTreeNodeStream($this->originalAdaptor, $t);
            $this->input->setTokenStream($this->originalTokenStream);
            $this->setBacktrackingLevel(1);
            switch ($whichRule) {
                case self::RULE_BOTTOMUP:
                    $this->bottomup();
                    break;
                case self::RULE_TOPDOWN:
                    $this->topdown();
                    break;
            }
            $this->setBacktrackingLevel(0);
        }
        catch (RecognitionException $e) {  }
    }

    public function downup($t)
    {
        $v = new TreeVisitor(new CommonTreeAdaptor());
        $actions = new ApplyVisitorAction();
        $v->visit($t, $actions);
    }

    // methods the downup strategy uses to do the up and down rules.
    // to override, just define tree grammar rule topdown and turn on
    // filter=true.
    public function topdown()
    {
    }

    public function bottomup()
    {
    }
}

class ApplyVisitorAction implements TreeVisitorAction
{
    private $filter;

    public function __construct(TreeFilter $filter)
    {
        $this->filter = $filter;
    }

    public function pre($t)
    {
        $this->filter->applyOnce($t, TreeFilter::RULE_TOPDOWN);
        return $t;
    }

    public function post($t)
    {
        $this->filter->applyOnce($t, TreeFilter::RULE_BOTTOMUP);
        return $t;
    }
}