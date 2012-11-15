<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t017parserLexer.php";
require_once __DIR__ . "/generated/t017parserParser.php";

class t017parserParserExtended extends \t017parserParser
{

    public $reportedErrors = array();

    function emitErrorMessage($msg)
    {
        $this->reportedErrors[] = $msg;
    }

}

class ParserTest017 extends \PHPUnit_Framework_TestCase
{
    function testValid()
    {
        $parser = $this->parser("int foo;");
        $parser->program();
        self::assertEquals(array(), $parser->reportedErrors);
    }

    function testMalformedInput1()
    {
        $parser = $this->parser('int foo() { 1+2 }');
        $parser->program();

        self::assertEquals(array("line 1:16 missing ';' at '}'"), $parser->reportedErrors);
    }

    function testMalformedInput2()
    {
        $parser = $this->parser('int foo() { 1+; 1+2 }');
        $parser->program();

        self::assertEquals(array(
            "line 1:14 no viable alternative at input ';'",
            "line 1:20 missing ';' at '}'"
            ), $parser->reportedErrors);
    }

    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t017parserLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new t017parserParserExtended($cts);
        return $tap;
    }
}
