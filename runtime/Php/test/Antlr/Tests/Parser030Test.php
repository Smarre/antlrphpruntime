<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t030specialStatesLexer.php';
require_once __DIR__ . '/generated/t030specialStatesParser.php';

class Parser030Test extends \PHPUnit_Framework_TestCase
{
    public function testValid1()
    {
        $p = $this->createParser('foo');
        $events = $p->r();
    }

    public function testValid2()
    {
        $p = $this->createParser('foo name1');
        $events = $p->r();
    }

    public function testValid3()
    {
        $p = $this->createParser('bar name1');
        $p->cond = false;
        $events = $p->r();
    }

    public function testValid()
    {
        $p = $this->createParser('bar name1 name');
        $p->cond = false;
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
        $lexer = new \t030specialStatesLexer($ass);
        $ts = new CommonTokenStream($lexer);
        $parser = new \t030specialStatesParser($ts);
        return $parser;
    }
}