<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t004lexer.php";

class LexerTest004 extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $arr = array('f', 'fo', 'foo', 'fooo');

        $ass = ('ffofoofooo');
        $lexer = new \t004lexer($ass);

        $token = $lexer->nextToken();
        $this->assertEquals(\t004lexer::T_FOO, $token->getType());
        $this->assertEquals('f', $token->getText());
        $this->assertEquals(0, $token->getStartIndex());
        $this->assertEquals(0, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t004lexer::T_FOO, $token->getType());
        $this->assertEquals('fo', $token->getText());
        $this->assertEquals(1, $token->getStartIndex());
        $this->assertEquals(2, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t004lexer::T_FOO, $token->getType());
        $this->assertEquals('foo', $token->getText());
        $this->assertEquals(3, $token->getStartIndex());
        $this->assertEquals(5, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t004lexer::T_FOO, $token->getType());
        $this->assertEquals('fooo', $token->getText());
        $this->assertEquals(6, $token->getStartIndex());
        $this->assertEquals(9, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t004lexer::T_EOF, $token->getType());
    }
}