<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t018llstarLexer.php";
require_once __DIR__ . "/generated/t018llstarParser.php";

class ParserTest018 extends \PHPUnit_Framework_TestCase
{
    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t018llstarLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t018llstarParser($cts);
        return $tap;
    }

    function test1()
    {
        $input = file_get_contents(__DIR__ . '/grammers/t018llstar.input');
        $output = file_get_contents(__DIR__ . '/grammers/t018llstar.output');
        $parser = $this->parser($input);
        $parser->program();
        self::assertEquals($parser->out, $output);
    }
}
