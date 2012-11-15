<?php

namespace Antlr\Tests;

use Antlr\Runtime\Tree\CommonTreeAdaptor;
use Antlr\Runtime\Tree\CommonTreeNodeStream;
use Antlr\Runtime\CommonToken;
use Antlr\Runtime\Tree\CommonTree;
use Antlr\Runtime\Token;

class TreeTest extends \PHPUnit_Framework_TestCase
{

    public function newStream($tree)
    {
        return new CommonTreeNodeStream($tree);
    }

    public function testSingleNode()
    {
        $tree = new \Antlr\Runtime\Tree\CommonTree(null, new CommonToken(null, 101, null, null, null));

        $stream = $this->newStream($tree);

        $found = $stream->toTokenTypeString();
        $this->assertEquals("101", $found);
        $this->assertNull($tree->getParent());
        $this->assertEquals(-1, $tree->getChildIndex());
    }

    public function testTwoChildrenOfNilRoot()
    {
        $adaptor = new CommonTreeAdaptor();
        $root0 = $adaptor->nil();
        $t = new ChildTree(null, 101, 2);
        $u = new ChildTree(new CommonToken(null, 102, 0, 0, 0));
        $adaptor->addChild($root0, $t);
        $adaptor->addChild($root0, $u);

        $this->assertNull($root0->getParent());
        $this->assertEquals(-1, $root0->getChildIndex());
        $this->assertEquals(0, $t->getChildIndex());
        $this->assertEquals(1, $u->getChildIndex());
    }

    public function testFourNodes()
    {
        # ^(101 ^(102 103) 104)
        $t = new CommonTree(null, new CommonToken(null, 101));
        $t->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $t->getChild(0)->addChild(new CommonTree(null, new CommonToken(null, 103)));
        $t->addChild(new CommonTree(null, new CommonToken(null, 104)));

        $stream = $this->newStream($t);
        $this->assertEquals("101 2 102 2 103 3 104 3", $stream->toTokenTypeString());

        $this->assertNull($t->getParent());
        $this->assertEquals(-1, $t->getChildIndex());
    }

    public function testAddListToExistChildren()
    {
        // Add child ^(nil 101 102 103) to root ^(5 6)
        // should add 101 102 103 to end of 5's child list
        $root = new CommonTree(null, new CommonToken(null, 5));
        $root->addChild(new CommonTree(null, new CommonToken(null, 6)));

        // child tree
        $r0 = new CommonTree();
        $r0->addChild($c0 = new CommonTree(null, new CommonToken(null, 101)));
        $r0->addChild($c1 = new CommonTree(null, new CommonToken(null, 102)));
        $r0->addChild($c2 = new CommonTree(null, new CommonToken(null, 103)));

        $root->addChild($r0);

        $this->assertNull($root->parent);
        $this->assertEquals(-1, $root->childIndex);
        // check children of root all point at root
        $this->assertEquals($root, $c0->parent);
        $this->assertEquals(1, $c0->childIndex);
        $this->assertEquals($root, $c0->parent);
        $this->assertEquals(2, $c1->childIndex);
        $this->assertEquals($root, $c0->parent);
        $this->assertEquals(3, $c2->childIndex);
    }

    public function testDupTree()
    {
        // ^(101 ^(102 103 ^(106 107) ) 104 105)
        $r0 = new CommonTree(null, new CommonToken(null, 101));
        $r1 = new CommonTree(null, new CommonToken(null, 102));
        $r0->addChild($r1);
        $r1->addChild(new CommonTree(null, new CommonToken(null, 103)));
        $r2 = new CommonTree(null, new CommonToken(null, 106));
        $r2->addChild(new CommonTree(null, new CommonToken(null, 107)));
        $r1->addChild($r2);
        $r0->addChild(new CommonTree(null, new CommonToken(null, 104)));
        $r0->addChild(new CommonTree(null, new CommonToken(null, 105)));

        $adaptor = new CommonTreeAdaptor();
        $dup = $adaptor->dupTree($r0);

        $this->assertNull($dup->parent);
        $this->assertEquals(-1, $dup->childIndex);

        $dup->sanityCheckAllParentAndChildIndexes();
    }

    public function testFlatList()
    {
        $root = new CommonTree();

        $root->addChild(new CommonTree(null, new CommonToken(null, 101)));
        $root->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $root->addChild(new CommonTree(null, new CommonToken(null, 103)));

        $stream = $this->newStream($root);
        $this->assertEquals("101 102 103", $stream->toTokenTypeString());
    }

    public function testBecomeRoot()
    {
        // 5 becomes new root of ^(nil 101 102 103)
        $newRoot = new CommonTree(null, new CommonToken(null, 5));

        $oldRoot = new CommonTree();
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 101)));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 103)));

        $adaptor = new CommonTreeAdaptor();
        $adaptor->becomeRoot($newRoot, $oldRoot);
        $newRoot->sanityCheckAllParentAndChildIndexes();
    }

    public function testBecomeRoot2()
    {
        // 5 becomes new root of ^(101 102 103)
        $newRoot = new CommonTree(null, new CommonToken(null, 5));

        $oldRoot = new CommonTree(null, new CommonToken(null, 101));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 103)));

        $adaptor = new CommonTreeAdaptor();
        $adaptor->becomeRoot($newRoot, $oldRoot);
        $newRoot->sanityCheckAllParentAndChildIndexes();
    }

    public function testBecomeRoot3()
    {
        // ^(nil 5) becomes new root of ^(nil 101 102 103)
        $newRoot = new CommonTree(null);
        $newRoot->addChild(new CommonTree(null, new CommonToken(null, 5)));

        $oldRoot = new CommonTree(null);
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 101)));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 103)));

        $adaptor = new CommonTreeAdaptor();
        $adaptor->becomeRoot($newRoot, $oldRoot);
        $newRoot->sanityCheckAllParentAndChildIndexes();
    }

    public function testBecomeRoot5()
    {
        // ^(nil 5) becomes new root of ^(101 102 103)
        $newRoot = new CommonTree(null);
        $newRoot->addChild(new CommonTree(null, new CommonToken(null, 5)));

        $oldRoot = new CommonTree(null, new CommonToken(null, 101));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $oldRoot->addChild(new CommonTree(null, new CommonToken(null, 103)));

        $adaptor = new CommonTreeAdaptor();
        $adaptor->becomeRoot($newRoot, $oldRoot);
        $newRoot->sanityCheckAllParentAndChildIndexes();
    }

    public function testBecomeRoot6()
    {
        $adaptor = new CommonTreeAdaptor();
        // emulates construction of ^(5 6)
        $root0 = $adaptor->nil();
        $root1 = $adaptor->nil();
        $root1 = $adaptor->becomeRoot(new CommonTree(null, new CommonToken(null, 5)), $root1);

        $adaptor->addChild($root1, new CommonTree(null, new CommonToken(null, 6)));

        $adaptor->addChild($root0, $root1);

        $root0->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceWithNoChildren()
    {
        $t = new CommonTree(null, new CommonToken(null, 101));
        $newChild = new CommonTree(null, new CommonToken(null, 5));

        $this->setExpectedException('InvalidArgumentException');
        $t->replaceChildren(0, 0, $newChild);
    }

    public function testReplaceWithOneChildren()
    {
        // assume token type 99 and use text
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $c0 = new CommonTree(null, new CommonToken(null, 99, "b"));
        $t->addChild($c0);

        $newChild = new CommonTree(null, new CommonToken(null, 99, "c"));
        $t->replaceChildren(0, 0, $newChild);
        $expecting = "(a c)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceInMiddle()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c"))); // index 1
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $newChild = new CommonTree(null, new CommonToken(null, 99, "x"));
        $t->replaceChildren(1, 1, $newChild);
        $expecting = "(a b x d)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceAtLeft()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b"))); // index 0
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $newChild = new CommonTree(null, new CommonToken(null, 99, "x"));
        $t->replaceChildren(0, 0, $newChild);
        $expecting = "(a x c d)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceAtRight()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d"))); // index 2

        $newChild = new CommonTree(null, new CommonToken(null, 99, "x"));
        $t->replaceChildren(2, 2, $newChild);
        $expecting = "(a b c x)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceOneWithTwoAtLeft()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $adaptor = new CommonTreeAdaptor();
        $newChildren = $adaptor->nil();
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "x")));
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "y")));

        $t->replaceChildren(0, 0, $newChildren);
        $expecting = "(a x y c d)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceOneWithTwoAtRight()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $adaptor = new CommonTreeAdaptor();
        $newChildren = $adaptor->nil();
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "x")));
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "y")));

        $t->replaceChildren(2, 2, $newChildren);
        $expecting = "(a b c x y)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceOneWithTwoInMiddle()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $adaptor = new CommonTreeAdaptor();
        $newChildren = $adaptor->nil();
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "x")));
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "y")));

        $t->replaceChildren(1, 1, $newChildren);
        $expecting = "(a b x y d)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceTwoWithOneAtLeft()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $newChild = new CommonTree(null, new CommonToken(null, 99, "x"));

        $t->replaceChildren(0, 1, $newChild);
        $expecting = "(a x d)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceTwoWithOneAtRight()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $newChild = new CommonTree(null, new CommonToken(null, 99, "x"));

        $t->replaceChildren(1, 2, $newChild);
        $expecting = "(a b x)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceAllWithOne()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $newChild = new CommonTree(null, new CommonToken(null, 99, "x"));

        $t->replaceChildren(0, 2, $newChild);
        $expecting = "(a x)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

    public function testReplaceAllWithTwo()
    {
        $t = new CommonTree(null, new CommonToken(null, 99, "a"));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "b")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "c")));
        $t->addChild(new CommonTree(null, new CommonToken(null, 99, "d")));

        $adaptor = new CommonTreeAdaptor();
        $newChildren = $adaptor->nil();
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "x")));
        $newChildren->addChild(new CommonTree(null, new CommonToken(null, 99, "y")));

        $t->replaceChildren(0, 2, $newChildren);
        $expecting = "(a x y)";
        $this->assertEquals($expecting, $t->toStringTree());
        $t->sanityCheckAllParentAndChildIndexes();
    }

}

class ChildTree extends \Antlr\Runtime\Tree\CommonTree
{

    public function __construct($token=null, $ttype = null)
    {
        if ($token) {
            $this->token = $token;
        } else if ($ttype) {
            $this->token = new CommonToken(null, $ttype);
        }
    }

}