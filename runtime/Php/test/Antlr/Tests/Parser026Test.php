<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t026actionsLexer.php";
require_once __DIR__ . "/generated/t026actionsParser.php";

class t026actionsParserExtended extends \t026actionsParser
{

    public $_errors = array();
    public $_output = "";

    function capture($t)
    {
        $this->_output .= $t;
    }

    function emitErrorMessage($msg)
    {
        $this->_errors[] = $msg;
    }

}

class Lexer extends \t026actionsLexer
{

    public $_errors = array();
    public $_output = "";

    function capture($t)
    {
        $this->_output .= $t;
    }

    function emitErrorMessage($msg)
    {
        $this->_errors[] = $msg;
    }

}

class ParserTest026 extends \PHPUnit_Framework_TestCase
{
    function testValid1()
    {
        $parser = $this->parser('foobar _Ab98 \n A12sdf');
        $parser->prog();

        self::assertEquals(
                        $parser->_output,
                        'init;after;finally;');
        self::assertEquals(
                        $this->lexer->_output,
                        'action;foobar 4 1 0 -1 0 0 5attribute;action;_Ab98 4 1 7 -1 0 7 11attribute;action;n 4 1 14 -1 0 14 14attribute;action;A12sdf 4 1 16 -1 0 16 21attribute;');
    }

    function parser($expr)
    {
        $ass = ($expr);
        $lex = new Lexer($ass);
        $this->lexer = $lex;
        $cts = new CommonTokenStream($lex);
        $tap = new t026actionsParserExtended($cts);
        return $tap;
    }
}
