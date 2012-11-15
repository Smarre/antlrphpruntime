<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;

require_once __DIR__ . "/generated/t001lexer.php";

class LexerTest001 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ("0");
        $lexer = new \t001lexer($ass);

        $token = $lexer->nextToken();
        self::assertEquals(\t001lexer::T_ZERO, $token->getType());
        self::assertEquals('0', $token->getText());

        $token = $lexer->nextToken();
        self::assertEquals(\t001lexer::T_EOF, $token->getType());
    }

    public function testMalformedInput()
    {
        $this->setExpectedException("Exception", "line 1:0 mismatched character '1' expecting '0'");

        $ass = ("1");
        $lexer = new \t001lexer($ass);
        $token = $lexer->nextToken();
    }

}
