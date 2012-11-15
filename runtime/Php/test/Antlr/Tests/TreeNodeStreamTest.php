<?php

namespace Antlr\Tests;

use Antlr\Runtime\Tree\CommonTreeAdaptor;
use Antlr\Runtime\Tree\CommonTreeNodeStream;
use Antlr\Runtime\CommonToken;
use Antlr\Runtime\Tree\CommonTree;
use Antlr\Runtime\Token;

class TreeNodeStreamTest extends \PHPUnit_Framework_TestCase
{
    public function newStream($tree)
    {
        return new CommonTreeNodeStream($tree);
    }

    public function testList()
    {
        $root = new CommonTree();

        $t = new CommonTree(null, new CommonToken(null, 101));
        $t->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $t->getChild(0)->addChild(new CommonTree(null, new CommonToken(null, 103)));
        $t->addChild(new CommonTree(null, new CommonToken(null, 104)));

        $u = new CommonTree(null, new CommonToken(null, 105));

        $root->addChild($t);
        $root->addChild($u);

        $stream = $this->newStream($root);
        $this->assertEquals("101 2 102 2 103 3 104 3 105", $stream->toTokenTypeString());

        $this->assertNull($root->getParent());
        $this->assertEquals(-1, $root->getChildIndex());
        $this->assertEquals($root, $t->getParent());
        $this->assertEquals(0, $t->getChildIndex());
        $this->assertEquals($root, $u->getParent());
        $this->assertEquals(1, $u->getChildIndex());
    }

    public function testListWithOneNode()
    {
        $root = new CommonTree(null, new CommonToken(null, 101));
        $root->addChild(new CommonTree(null, new CommonToken(null, 102)));

        $stream = $this->newStream($root);
        $this->assertEquals("101 2 102 3", $stream->toTokenTypeString());
    }

    public function testAoverB()
    {
        $root = new CommonTree();

        $root->addChild(new CommonTree(null, new CommonToken(null, 101)));

        $stream = $this->newStream($root);
        $this->assertEquals("101", $stream->toTokenTypeString());
    }

    public function testLT()
    {
        # ^(101 ^(102 103) 104)
        $t = new CommonTree(null, new CommonToken(null, 101));
        $t->addChild(new CommonTree(null, new CommonToken(null, 102)));
        $t->getChild(0)->addChild(new CommonTree(null, new CommonToken(null, 103)));
        $t->addChild(new CommonTree(null, new CommonToken(null, 104)));

        $stream = $this->newStream($t);

        $this->assertEquals(101, $stream->LT(1)->getType());
        $this->assertEquals(Token::DOWN, $stream->LT(2)->getType());
        $this->assertEquals(102, $stream->LT(3)->getType());
        $this->assertEquals(Token::DOWN, $stream->LT(4)->getType());
        $this->assertEquals(103, $stream->LT(5)->getType());
        $this->assertEquals(Token::UP, $stream->LT(6)->getType());
        $this->assertEquals(104, $stream->LT(7)->getType());
        $this->assertEquals(Token::UP, $stream->LT(8)->getType());
        $this->assertEquals(Token::EOF, $stream->LT(9)->getType());
        # check way ahead
        $this->assertEquals(Token::EOF, $stream->LT(100)->getType());
    }

    public function create7Real6NavNodeTree()
    {
        # ^(101 ^(102 103 ^(106 107) ) 104 105)
        # stream has 7 real + 6 nav nodes
        # Sequence of types: 101 DN 102 DN 103 106 DN 107 UP UP 104 105 UP EOF
        $r0 = new CommonTree(null, new CommonToken(null, 101));
        $r1 = new CommonTree(null, new CommonToken(null, 102));
        $r0->addChild($r1);
        $r1->addChild(new CommonTree(null, new CommonToken(null, 103)));
        $r2 = new CommonTree(null, new CommonToken(null, 106));
        $r2->addChild(new CommonTree(null, new CommonToken(null, 107)));
        $r1->addChild($r2);
        $r0->addChild(new CommonTree(null, new CommonToken(null, 104)));
        $r0->addChild(new CommonTree(null, new CommonToken(null, 105)));

        return $r0;
    }

    public function test7Real6NavNodeTree()
    {
        $r0 = $this->create7Real6NavNodeTree();
        $stream = $this->newStream($r0);
        $this->assertEquals("101 2 102 2 103 106 2 107 3 3 104 105 3", $stream->toTokenTypeString());
    }

    public function testMarkRewindTree()
    {
        $r0 = $this->create7Real6NavNodeTree();

        $stream = $this->newStream($r0); // use a clean stream
        $m = $stream->mark();
        for ($i = 0; $i < 13; $i++) {
            $stream->LT(1);
            $stream->consume();
        }

        $this->assertEquals(Token::EOF, $stream->LT(1)->getType());
        $this->assertEquals(Token::UP, $stream->LT(-1)->getType());

        $stream->rewind($m);

        for ($i = 0; $i < 13; $i++) {
            $stream->LT(1);
            $stream->consume();
        }

        $this->assertEquals(Token::EOF, $stream->LT(1)->getType());
        $this->assertEquals(Token::UP, $stream->LT(-1)->getType());
    }

    public function testMarkInMiddle()
    {
        $r0 = $this->create7Real6NavNodeTree();
        $stream = $this->newStream($r0);

        for ($i = 0; $i < 7; $i++) {
            $stream->LT(1);
            $stream->consume();
        }

        $this->assertEquals(107, $stream->LT(1)->getType());
        $m = $stream->mark();

        $stream->consume();
        $stream->consume();
        $stream->consume();
        $stream->consume();
        $stream->rewind($m);

        $this->assertEquals(107, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::UP, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::UP, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(104, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(105, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::UP, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::EOF, $stream->LT(1)->getType());
        $this->assertEquals(Token::UP, $stream->LT(-1)->getType());
    }

    public function testMarkNested()
    {
        $r0 = $this->create7Real6NavNodeTree();
        $stream = $this->newStream($r0);

        $m = $stream->mark();
        $stream->consume();
        $stream->consume();
        $m2 = $stream->mark();
        $stream->consume();
        $stream->consume();
        $stream->consume();
        $stream->consume();
        $stream->rewind($m2);

        $this->assertEquals(102, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::DOWN, $stream->LT(1)->getType());
        $stream->consume();
        $stream->rewind($m);

        $this->assertEquals(101, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::DOWN, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(102, $stream->LT(1)->getType());
        $stream->consume();
        $this->assertEquals(Token::DOWN, $stream->LT(1)->getType());
    }
}