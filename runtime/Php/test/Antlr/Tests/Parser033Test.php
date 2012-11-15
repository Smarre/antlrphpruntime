<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t033backtrackingLexer.php';
require_once __DIR__ . '/generated/t033backtrackingParser.php';

class Parser033Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('int a;');
        $lexer = new \t033backtrackingLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t033backtrackingParser($s);

        $parser->translation_unit();
    }
}