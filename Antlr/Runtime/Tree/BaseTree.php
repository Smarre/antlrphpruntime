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

/**
 * A generic tree implementation with no payload.  You must subclass to
 * actually have any user data.  ANTLR v3 uses a list of children approach
 * instead of the child-sibling approach in v2.  A flat tree (a list) is
 * an empty node whose children represent the list.  An empty, but
 * non-null node is called "nil".
 */
abstract class BaseTree implements Tree
{

    protected $children = null;

    public function getChild($i)
    {
        if ($this->children == null || $i >= count($this->children)) {
            return null;
        }
        return $this->children[$i];
    }

    /**
     * Get the children internal List; note that if you directly mess with
     * the list, do so at your own risk.
     *
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    public function getFirstChildWithType($type)
    {
        for ($i = 0; $this->children != null && $i < count($this->children); $i++) {
            $t = $this->children[$i];
            if ($t->getType() == $type) {
                return $t;
            }
        }
        return null;
    }

    public function getChildCount()
    {
        if ($this->children == null) {
            return 0;
        }
        return count($this->children);
    }

    /**
     * Add t as child of this node.
     *
     * Warning: if t has no children, but child does
     * and child isNil then this routine moves children to t via
     * t.children = child.children; i.e., without copying the array.
     *
     * @param Tree $t
     * @return void
     */
    public function addChild(Tree $t)
    {
        //System.out.println("add child "+t.toStringTree()+" "+this.toStringTree());
        //System.out.println("existing children: "+children);
        if ($t == null) {
            return; // do nothing upon addChild(null)
        }
        $childTree = $t;
        if ($childTree->isNil()) { // t is an empty node possibly with children
            if ($this->children != null && $this->children == $childTree->children) {
                throw new RuntimeException("attempt to add child list to itself");
            }
            // just add all of childTree's children to this
            if ($childTree->getChildren() != null) {
                if ($this->children != null) { // must copy, this has children already
                    $n = $childTree->getChildCount();
                    for ($i = 0; $i < $n; $i++) {
                        $c = $childTree->children[$i];
                        $this->children[] = $c;
                        // handle double-link stuff for each child of nil root
                        $c->setParent($this);
                        $c->setChildIndex(count($this->children) - 1);
                    }
                } else {
                    // no children for this but t has children; just set pointer
                    // call general freshener routine
                    $this->children = $childTree->children;
                    $this->freshenAllParentAndChildIndexes();
                }
            }
        } else { // child is not nil (don't care about children)
            if ($this->children == null) {
                $this->children = $this->createChildrenList(); // create children list on demand
            }
            $this->children[] = $t;
            $childTree->setParent($this);
            $childTree->setChildIndex(count($this->children) - 1);
        }
        // System.out.println("now children are: "+children);
    }

    /**
     * Add all elements of kids list as children of this node
     */
    public function addChildren(array $kids)
    {
        for ($i = 0; $i < count($kids); $i++) {
            $t = $this->addChild($kids[$i]);
        }
    }

    public function setChild($i, Tree $t)
    {
        if ($t == null) {
            return;
        }
        if ($t->isNil()) {
            throw new IllegalArgumentException("Can't set single child to a list");
        }
        if ($this->children == null) {
            $this->children = $this->createChildrenList();
        }
        $this->children[$i] = $t;
        $t->setParent($this);
        $t->setChildIndex($i);
    }

    public function deleteChild($i)
    {
        if ($this->children == null) {
            return null;
        }
        $killed = $this->children[$i];
        unset($this->children[$i]);
        // walk rest and decrement their child indexes
        $this->freshenParentAndChildIndexes($i);
        return $killed;
    }

    /**
     * Delete children from start to stop and replace with t even if t is
     * a list (nil-root tree).  num of children can increase or decrease.
     * For huge child lists, inserting children can force walking rest of
     * children to set their childindex; could be slow.
     */
    public function replaceChildren($startChildIndex, $stopChildIndex, $newTree)
    {
        /*
          System.out.println("replaceChildren "+startChildIndex+", "+stopChildIndex+
          " with "+((BaseTree)t).toStringTree());
          System.out.println("in="+toStringTree());
         */
        if ($this->children == null) {
            throw new \InvalidArgumentException("indexes invalid; no children in list");
        }
        $replacingHowMany = $stopChildIndex - $startChildIndex + 1;
        $newChildren = array();
        // normalize to a list of children to add: newChildren
        if ($newTree->isNil()) {
            $newChildren = $newTree->children;
        } else {
            $newChildren = array();
            $newChildren[] = $newTree;
        }
        $replacingWithHowMany = count($newChildren);
        $numNewChildren = count($newChildren);
        $delta = $replacingHowMany - $replacingWithHowMany;
        // if same number of nodes, do direct replace
        if ($delta == 0) {
            $j = 0; // index into new children
            for ($i = $startChildIndex; $i <= $stopChildIndex; $i++) {
                $this->children[$i] = $newChildren[$j];
                $this->children[$i]->setParent($this);
                $this->children[$i]->setChildIndex($i);
                $j++;
            }
        } else { // uber-optimization compared to Java code
            $this->children = array_merge(
                array_slice($this->children, 0, $startChildIndex),
                $newChildren,
                array_slice($this->children, $stopChildIndex+1)
            );
            $this->freshenParentAndChildIndexes($startChildIndex);
        }
        //System.out.println("out="+toStringTree());
    }

    /** Override in a subclass to change the impl of children list */
    protected function createChildrenList()
    {
        return array();
    }

    public function isNil()
    {
        return false;
    }

    /** Set the parent and child index values for all child of t */
    public function freshenAllParentAndChildIndexes()
    {
        $this->freshenParentAndChildIndexes(0);
    }

    public function freshenParentAndChildIndexes($offset)
    {
        $n = $this->getChildCount();
        for ($c = $offset; $c < $n; $c++) {
            $child = $this->getChild($c);
            $child->setChildIndex($c);
            $child->setParent($this);
        }
    }

    public function sanityCheckAllParentAndChildIndexes()
    {
        $this->sanityCheckParentAndChildIndexes(null, -1);
    }

    public function sanityCheckParentAndChildIndexes($parent, $i)
    {
        if ($parent != $this->getParent()) {
            throw new IllegalStateException("parents don't match; expected " + $parent + " found " + $this->getParent());
        }
        if ($i != $this->getChildIndex()) {
            throw new IllegalStateException("child indexes don't match; expected " + $i + " found " + $this->getChildIndex());
        }
        $n = $this->getChildCount();
        for ($c = 0; $c < $n; $c++) {
            $child = $this->getChild($c);
            $child->sanityCheckParentAndChildIndexes($this, $c);
        }
    }

    /** BaseTree doesn't track child indexes. */
    public function getChildIndex()
    {
        return 0;
    }

    public function setChildIndex($index)
    {

    }

    /** BaseTree doesn't track parent pointers. */
    public function getParent()
    {
        return null;
    }

    public function setParent($t)
    {

    }

    /** Walk upwards looking for ancestor with this token type. */
    public function hasAncestor($ttype)
    {
        return $this->getAncestor($ttype) != null;
    }

    /** Walk upwards and get first ancestor with this token type. */
    public function getAncestor($ttype)
    {
        $t = $this->getParent();
        while ($t != null) {
            if ($t->getType() == $ttype) {
                return $t;
            }
            $t = $t->getParent();
        }
        return null;
    }

    /** Return a list of all ancestors of this node.  The first node of
     *  list is the root and the last is the parent of this node.
     */
    public function getAncestors()
    {
        if ($htis->getParent() == null) {
            return null;
        }
        $ancestors = array();
        $t = $this->getParent();
        while ($t != null) {
            array_unshift($ancestors, $t); // insert at start
            $t = $t->getParent();
        }
        return $ancestors;
    }

    /** Print out a whole tree not just a node */
    public function toStringTree()
    {
        if ($this->children == null || count($this->children) == 0) {
            return $this->toString();
        }
        $buf = "";
        if (!$this->isNil()) {
            $buf .= "(";
            $buf .= $this->toString();
            $buf .= ' ';
        }
        for ($i = 0; $this->children != null && $i < count($this->children); $i++) {
            $t = $this->children[$i];
            if ($i > 0) {
                $buf .= ' ';
            }
            $buf .= $t->toStringTree();
        }
        if (!$this->isNil()) {
            $buf .= ")";
        }
        return $buf;
    }

    public function getLine()
    {
        return 0;
    }

    public function getCharPositionInLine()
    {
        return 0;
    }
}
