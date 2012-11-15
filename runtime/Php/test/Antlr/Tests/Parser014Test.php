<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t014parserLexer.php";
require_once __DIR__ . "/generated/t014parserParser.php";

class ParserTest014 extends \PHPUnit_Framework_TestCase
{
    function testValid()
    {
        $parser = $this->parser('var foobar; gnarz(); var blupp; flupp ( ) ;');
        $parser->document();
        self::assertTrue(sizeof($parser->reportedErrors) == 0);
        self::assertEquals($parser->events,
                        array(
                            array('decl', 'foobar'),
                            array('call', 'gnarz'),
                            array('decl', 'blupp'),
                            array('call', 'flupp')));
    }

    function testMalformedInput1()
    {
        $parser = $this->parser('var; foo();');

        $parser->document();
        $parser->document();
        self::assertTrue(sizeof($parser->reportedErrors) == 1);
        #self::assertEquals($parser->events, array());
        # FIXME: currently strings with formatted errors are collected
        # can't check error locations yet
    }

    function testMalformedInput2()
    {
        $parser = $this->parser('var foobar(); gnarz();');
        $parser->document();

        self::assertTrue(sizeof($parser->reportedErrors) == 1);
        # FIXME: currently strings with formatted errors are collected
        # can't check error locations yet
        self::assertEquals(array(array('call', 'gnarz')), $parser->events);
    }

    function testMalformedInput3()
    {
        $parser = $this->parser('gnarz(; flupp();');
        $parser->document();

        # FIXME: currently strings with formatted errors are collected
        # can't check error locations yet
        self::assertTrue(sizeof($parser->reportedErrors) == 1);
        self::assertEquals(array(array('call', 'gnarz'), array('call', 'flupp')), $parser->events);
    }

    function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t014parserLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t014parserParser($cts);
        return $tap;
    }
}
