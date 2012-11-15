<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t039labelsLexer.php';
require_once __DIR__ . '/generated/t039labelsParser.php';

class Parser039Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('a, b, c, 1, 2 A FOOBAR GNU1 A BLARZ');
        $lexer = new \t039labelsLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t039labelsParser($s);
        list($ids, $w) = $parser->a();

        $this->assertEquals(6, count($ids));
        $this->assertEquals('a', $ids[0]->getText());
        $this->assertEquals('b', $ids[1]->getText());
        $this->assertEquals('c', $ids[2]->getText());
        $this->assertEquals('1', $ids[3]->getText());
        $this->assertEquals('2', $ids[4]->getText());
        $this->assertEquals('A', $ids[5]->getText());

        $this->assertEquals('GNU1', $w->getText());
    }
}