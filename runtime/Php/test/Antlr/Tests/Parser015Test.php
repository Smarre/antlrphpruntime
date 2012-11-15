<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t015calcLexer.php";
require_once __DIR__ . "/generated/t015calcParser.php";

class ParserTest015 extends \PHPUnit_Framework_TestCase
{
    function testValid01()
    {
        $this->evaluate("1 + 2", 3);
    }

    function testValid02()
    {
        $this->evaluate("1 + 2 * 3", 7);
    }

    function testValid03()
    {
        $this->evaluate("10 / 2", 5);
    }

    function testValid04()
    {
        $this->evaluate("6 + 2*(3+1) - 4", 10);
    }

    function testMalformedInput()
    {
        $this->evaluate("6 - (2*1", 4, array("mismatched token at pos 8"));
    }

    function evaluate($expr, $expected, $errors=array())
    {
        $parser = $this->parser($expr);
        $result = $parser->evaluate();
        self::assertEquals($result, $expected);
        self::assertTrue(sizeof($parser->reportedErrors) == sizeof($errors));
    }

    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t015calcLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t015calcParser($cts);
        return $tap;
    }
}
