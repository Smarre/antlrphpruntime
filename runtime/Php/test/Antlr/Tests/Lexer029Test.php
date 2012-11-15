<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;

require_once __DIR__ . '/generated/t029synpredgate.php';

class Lexer029Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('ac');
        $lexer = new \t029synpredgate($ass);
        $lexer->nextToken();
    }
}