<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t005lexer.php";

class LexerTest005 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('fofofoofooo');
        $lexer = new \t005lexer($ass);

        $token = $lexer->nextToken();
        $this->assertEquals(\t005lexer::T_FOO, $token->getType());
        $this->assertEquals('fo', $token->getText());
        $this->assertEquals(0, $token->getStartIndex());
        $this->assertEquals(1, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t005lexer::T_FOO, $token->getType());
        $this->assertEquals('fo', $token->getText());
        $this->assertEquals(2, $token->getStartIndex());
        $this->assertEquals(3, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t005lexer::T_FOO, $token->getType());
        $this->assertEquals('foo', $token->getText());
        $this->assertEquals(4, $token->getStartIndex());
        $this->assertEquals(6, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t005lexer::T_FOO, $token->getType());
        $this->assertEquals('fooo', $token->getText());
        $this->assertEquals(7, $token->getStartIndex());
        $this->assertEquals(10, $token->getStopIndex());

        $token = $lexer->nextToken();
        $this->assertEquals(\t005lexer::T_EOF, $token->getType());
    }

    public function testMalformedInput()
    {
        $this->setExpectedException('Exception', "line 1:1 required (...)+ loop did not match anything at character 'f'");

        $ass = ('ffo');
        $lexer = new \t005lexer($ass);
        $token = $lexer->nextToken();
    }
}
