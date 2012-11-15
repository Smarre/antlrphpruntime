<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t037rulePropertyRefLexer.php';
require_once __DIR__ . '/generated/t037rulePropertyRefParser.php';

class Parser037Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('   a a a a  ');
        $lexer = new \t037rulePropertyRefLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t037rulePropertyRefParser($s);
        $data = $parser->a()->bla;

        $this->assertEquals(1, $data[0]->getTokenIndex());
        $this->assertEquals(7, $data[1]->getTokenIndex());
        $this->assertEquals('a a a a', $data[2]);
    }
}