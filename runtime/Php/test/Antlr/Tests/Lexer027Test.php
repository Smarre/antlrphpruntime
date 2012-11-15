<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;

require_once __DIR__ . '/generated/t027eof.php';

class Lexer027Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $this->markTestSkipped('T_END should be T_EOF, but how?!');

        $ass = (' ');
        $lexer = new \t027eof($ass);

        $token = $lexer->nextToken();
        $this->assertEquals(t027eof::T_SPACE, $token->getType());

        $token = $lexer->nextToken();
        $this->assertEquals(t027eof::T_END, $token->getType());
    }
}