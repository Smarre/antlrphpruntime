<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t016actionsLexer.php";
require_once __DIR__ . "/generated/t016actionsParser.php";

class ParserTest016 extends \PHPUnit_Framework_TestCase
{
    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t016actionsLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t016actionsParser($cts);
        return $tap;
    }

    function test1()
    {
        $parser = $this->parser("int foo;");
        $result = $parser->declaration();
        self::assertEquals($result, 'foo');
    }

}
