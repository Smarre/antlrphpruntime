<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t036multipleReturnValuesLexer.php';
require_once __DIR__ . '/generated/t036multipleReturnValuesParser.php';

class Parser036Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('   a');
        $lexer = new \t036multipleReturnValuesLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t036multipleReturnValuesParser($s);
        $data = $parser->a();

        $this->assertEquals('foo', $data->foo);
        $this->assertEquals('bar', $data->bar);
    }
}