<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t013parserLexer.php";
require_once __DIR__ . "/generated/t013parserParser.php";

class ParserTest013 extends \PHPUnit_Framework_TestCase
{
    function testValid()
    {
        $parser = $this->parser('foobar');
        $parser->document();

        self::assertTrue(sizeof($parser->reportedErrors) == 0);
        self::assertEquals($parser->identifiers, array('foobar'));
    }

    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t013parserLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t013parserParser($cts);
        return $tap;
    }
}
