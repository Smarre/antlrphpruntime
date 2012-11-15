<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;


require_once __DIR__ . '/generated/t031emptyAltLexer.php';
require_once __DIR__ . '/generated/t031emptyAltParser.php';

class Parser031Test extends \PHPUnit_Framework_TestCase
{
    public function testValid1()
    {
        $p = $this->createParser('foo');
        $events = $p->r();
    }

    /**
     *
     * @param <type> $input
     * @return t030specialStatesParser
     */
    public function createParser($input)
    {
        $ass = ($input);
        $lexer = new \t031emptyAltLexer($ass);
        $ts = new CommonTokenStream($lexer);
        $parser = new \t031emptyAltParser($ts);
        return $parser;
    }
}