<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t021hoistLexer.php";
require_once __DIR__ . "/generated/t021hoistParser.php";

class ParserTest021 extends \PHPUnit_Framework_TestCase
{
    function testValid1()
    {
        $parser = $this->parser('enum');
        $parser->enableEnum = true;
        $enumIs = $parser->stat();
        self::assertEquals($enumIs, 'keyword');
    }

    function testValid2()
    {
        $parser = $this->parser('enum');
        $parser->enableEnum = false;
        $enumIs = $parser->stat();
        self::assertEquals($enumIs, 'ID');
    }

    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t021hoistLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t021hoistParser($cts);
        return $tap;
    }
}
