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

use Antlr\Runtime\TokenStream;
use Antlr\Runtime\Token;
use Antlr\Runtime\RecognitionException;

/** A TreeAdaptor that works with any Tree implementation. */
abstract class BaseTreeAdaptor implements TreeAdaptor
{

    /** System.identityHashCode() is not always unique; we have to
     *  track ourselves.  That's ok, it's only for debugging, though it's
     *  expensive: we have to create a hashtable with all tree nodes in it.
     */
    protected $treeToUniqueIDMap;
    protected $uniqueNodeID = 1;

    /**
     * @return Tree
     */
    public function nil()
    {
        return $this->create(null);
    }

    /** create tree node that holds the start and stop tokens associated
     *  with an error.
     *
     *  If you specify your own kind of tree nodes, you will likely have to
     *  override this method. CommonTree returns Token.INVALID_TOKEN_TYPE
     *  if no token payload but you might have to set token type for diff
     *  node type.
     *
     *  You don't have to subclass CommonErrorNode; you will likely need to
     *  subclass your own tree node class to avoid class cast exception.
     */
    public function errorNode(TokenStream $input, Token $start, Token $stop, RecognitionException $e)
    {
        return new CommonErrorNode($input, $start, $stop, $e);
    }

    public function isNil($tree)
    {
        return $tree->isNil();
    }

    /** This is generic in the sense that it will work with any kind of
     *  tree (not just Tree interface).  It invokes the adaptor routines
     *  not the tree node routines to do the construction.
     */
    public function dupTree($t, $parent = null)
    {
        if ($t == null) {
            return null;
        }
        $newTree = $this->dupNode($t);
        // ensure new subtree root has parent/child index set
        $this->setChildIndex($newTree, $this->getChildIndex($t)); // same index in new tree
        if ($parent) {
            $this->setParent($newTree, $parent);
        }
        $n = $this->getChildCount($t);
        for ($i = 0; $i < $n; ++$i) {
            $child = $this->getChild($t, $i);
            $newSubTree = $this->dupTree($child, $t);
            $this->addChild($newTree, $newSubTree);
        }
        return $newTree;
    }

    /** Add a child to the tree t.  If child is a flat tree (a list), make all
     *  in list children of t.  Warning: if t has no children, but child does
     *  and child isNil then you can decide it is ok to move children to t via
     *  t.children = child.children; i.e., without copying the array.  Just
     *  make sure that this is consistent with have the user will build
     *  ASTs.
     */
    public function addChild($t, $child)
    {
        if ($t != null && $child != null) {
            $t->addChild($child);
        }
    }

    /** If oldRoot is a nil root, just copy or move the children to newRoot.
     *  If not a nil root, make oldRoot a child of newRoot.
     *
     *    old=^(nil a b c), new=r yields ^(r a b c)
     *    old=^(a b c), new=r yields ^(r ^(a b c))
     *
     *  If newRoot is a nil-rooted single child tree, use the single
     *  child as the new root node.
     *
     *    old=^(nil a b c), new=^(nil r) yields ^(r a b c)
     *    old=^(a b c), new=^(nil r) yields ^(r ^(a b c))
     *
     *  If oldRoot was null, it's ok, just return newRoot (even if isNil).
     *
     *    old=null, new=r yields r
     *    old=null, new=^(nil r) yields ^(nil r)
     *
     *  Return newRoot.  Throw an exception if newRoot is not a
     *  simple node or nil root with a single child node--it must be a root
     *  node.  If newRoot is ^(nil x) return x as newRoot.
     *
     *  Be advised that it's ok for newRoot to point at oldRoot's
     *  children; i.e., you don't have to copy the list.  We are
     *  constructing these nodes so we should have this control for
     *  efficiency.
     */
    public function becomeRoot($newRoot, $oldRoot)
    {
        if ($newRoot instanceof Token) {
            $newRoot = $this->create($newRoot);
        }
        //System.out.println("becomeroot new "+newRoot.toString()+" old "+oldRoot);
        $newRootTree = $newRoot;
        $oldRootTree = $oldRoot;
        if ($oldRoot == null) {
            return $newRoot;
        }
        // handle ^(nil real-node)
        if ($newRootTree->isNil()) {
            $nc = $newRootTree->getChildCount();
            if ($nc == 1)
                $newRootTree = $newRootTree->getChild(0);
            else if ($nc > 1) {
                // TODO: make tree run time exceptions hierarchy
                throw new RuntimeException("more than one node as root (TODO: make exception hierarchy)");
            }
        }
        // add oldRoot to newRoot; addChild takes care of case where oldRoot
        // is a flat list (i.e., nil-rooted tree).  All children of oldRoot
        // are added to newRoot.
        $newRootTree->addChild($oldRootTree);
        return $newRootTree;
    }

    /** Transform ^(nil x) to x and nil to null */
    public function rulePostProcessing($root)
    {
        $r = $root;
        if ($r != null && $r->isNil()) {
            if ($r->getChildCount() == 0) {
                $r = null;
            } else if ($r->getChildCount() == 1) {
                $r = $r->getChild(0);
                // whoever invokes rule will set parent and child index
                $r->setParent(null);
                $r->setChildIndex(-1);
            }
        }
        return $r;
    }

    public function createFromAll(Token $fromToken, $tokenType = null, $tokenText = null)
    {
        $fromToken = $this->createTokenFromToken($fromToken);
        if ($tokenType) {
            $fromToken->setType($tokenType);
        }
        if ($tokenText) {
            $fromToken->setText($tokenText);
        }
        $t = $this->create($fromToken);
        return $t;
    }

    /**
     * Modelled from Java’s
     * public Object create(int tokenType, String text)
     */
    public function createFromType($tokenType, $text)
    {
        $fromToken = $this->createToken($tokenType, $text);
        $t = $this->create($fromToken);
        return $t;
    }

    public function getType($t)
    {
        return $this->t->getType();
    }

    public function setType($t, $type)
    {
        throw new \BadMethodCallException("don't know enough about Tree node");
    }

    public function getText($t)
    {
        return $t->getText();
    }

    public function setText($t, $text)
    {
        throw new \BadMethodCallException("don't know enough about Tree node");
    }

    public function getChild($t, $i)
    {
        return $t->getChild($i);
    }

    public function setChild($t, $i, $child)
    {
        $t->setChild($i, $child);
    }

    public function deleteChild($t, $i)
    {
        return $t->deleteChild($i);
    }

    public function getChildCount($t)
    {
        return $t->getChildCount();
    }

    public function getUniqueID($node)
    {
        if ($this->treeToUniqueIDMap == null) {
            $this->treeToUniqueIDMap = array();
        }
        $h = spl_object_hash($node);
        if (isset($this->treeToUniqueIDMap[$h])) {
            return $this->treeToUniqueIDMap[$h];
        }
        $this->treeToUniqueIDMap[$h] = $this->unqiueNodeID;
        $this->uniqueNodeID++;
        return $this->treeToUniqueIDMap[$h];
        // GC makes these nonunique:
        // return System.identityHashCode(node);
    }

    /** Tell me how to create a token for use with imaginary token nodes.
     *  For example, there is probably no input symbol associated with imaginary
     *  token DECL, but you need to create it as a payload or whatever for
     *  the DECL node as in ^(DECL type ID).
     *
     *  If you care what the token payload objects' type is, you should
     *  override this method and any other createToken variant.
     */
    public abstract function createToken($tokenType, $text);

    public abstract function createTokenFromToken(Token $fromToken, $tokenType = null);
}

