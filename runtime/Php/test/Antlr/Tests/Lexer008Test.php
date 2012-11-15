<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t008lexer.php";

class LexerTest008 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $arr = array('f', 'fa', 'f');

        $ass = ('ffaf');
        $lexer = new \t008lexer($ass);
        foreach ($arr as $val) {
            $token = $lexer->nextToken();
            self::assertEquals(\t008lexer::T_FOO, $token->getType());
            self::assertEquals($val, $token->getText());
        }
    }

    public function testMalformedInput()
    {
        $ass = ('fafb');
        $lexer = new \t008lexer($ass);
        $token = $lexer->nextToken();
        $token = $lexer->nextToken();

        $this->setExpectedException('Exception', "line 1:3 mismatched character 'b' expecting 'f'");
        $token = $lexer->nextToken();
    }
}
