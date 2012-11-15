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
use Antlr\Runtime\Misc\FastQueue;

/** Return a node stream from a doubly-linked tree whose nodes
 *  know what child index they are.  No remove() is supported.
 *
 *  Emit navigation nodes (DOWN, UP, and EOF) to let show tree structure.
 */
class TreeIterator
{
    protected $adaptor;
    protected $root;
    protected $tree;
    protected $firstTime = true;

    // navigation nodes to return during walk and at end
    public $up;
    public $down;
    public $eof;

    /** If we emit UP/DOWN nodes, we need to spit out multiple nodes per
     *  next() call.
     */
    protected $nodes;

    public function __construct(Tree $tree, TreeAdaptor $adaptor = null) {
        if (!$adaptor) {
            $adaptor = new CommonTreeAdaptor();
        }

        $this->adaptor = $adaptor;
        $this->tree = $tree;
        $this->root = $tree;
        $this->nodes = new FastQueue();
        $this->down = $this->adaptor->createFromType(Token::DOWN, "DOWN");
        $this->up = $this->adaptor->createFromType(Token::UP, "UP");
        $this->eof = $this->adaptor->createFromType(Token::EOF, "EOF");
    }

    public function reset() {
        $this->firstTime = true;
        $this->tree = $this->root;
        $this->nodes->clear();
    }

    public function hasNext() {
        if ( $this->firstTime ) {
            return $this->root!=null;
        }
        if ( $this->nodes!=null && $this->nodes->size()>0 ) {
            return true;
        }
        if ( $this->tree==null ) {
            return false;
        }
        if ( $this->adaptor->getChildCount($this->tree)>0 ) {
            return true;
        }
        return $this->adaptor->getParent($this->tree)!=null; // back at root?
    }

    public function next() {
        if ( $this->firstTime ) { // initial condition
            $this->firstTime = false;
            if ( $this->adaptor->getChildCount($this->tree)==0 ) { // single node tree (special)
                $this->nodes->add($this->eof);
                return $this->tree;
            }
            return $this->tree;
        }
        // if any queued up, use those first
        if ( $this->nodes!=null && $this->nodes->size()>0 ) {
            return $this->nodes->remove();
        }

        // no nodes left?
        if ( $this->tree==null ) {
            return $this->eof;
        }

        // next node will be child 0 if any children
        if ( $this->adaptor->getChildCount($this->tree)>0 ) {
            $this->tree = $this->adaptor->getChild($this->tree, 0);
            $this->nodes->add($this->tree); // real node is next after DOWN
            return $this->down;
        }
        // if no children, look for next sibling of tree or ancestor
        $parent = $this->adaptor->getParent($this->tree);
        // while we're out of siblings, keep popping back up towards root
        while ( $parent!=null && $this->adaptor->getChildIndex($this->tree)+1 >= $this->adaptor->getChildCount($parent) ) {
            $this->nodes->add($this->up); // we're moving back up
            $this->tree = $parent;
            $parent = $this->adaptor->getParent($this->tree);
        }
        // no nodes left?
        if ( $parent==null ) {
            $this->tree = null; // back at root? nothing left then
            $this->nodes->add($this->eof); // add to queue, might have UP nodes in there
            return $this->nodes->remove();
        }

        // must have found a node with an unvisited sibling
        // move to it and return it
        $nextSiblingIndex = $this->adaptor->getChildIndex($this->tree) + 1;
        $this->tree = $this->adaptor->getChild($parent, $nextSiblingIndex);
        $this->nodes->add($this->tree); // add to queue, might have UP nodes in there
        return $this->nodes->remove();
    }

    public function remove()
    {
        throw new \BadMethodCallException();
    }
}
