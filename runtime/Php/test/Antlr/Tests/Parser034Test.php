<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t034tokenLabelPropertyRefLexer.php';
require_once __DIR__ . '/generated/t034tokenLabelPropertyRefParser.php';

class Parser034Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('   a');
        $lexer = new \t034tokenLabelPropertyRefLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t034tokenLabelPropertyRefParser($s);
        $parser->a();

        $this->assertEquals('a', $parser->text);
    }
}