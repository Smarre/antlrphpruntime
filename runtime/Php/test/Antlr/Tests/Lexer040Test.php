<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t040bug80.php';

class Lexer040Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('defined');
        $lexer = new \t040bug80($ass);

        while($lexer->nextToken()->getType() != \Antlr\Runtime\Token::EOF) {
            
        }
    }
}