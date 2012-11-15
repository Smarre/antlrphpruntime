<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t002lexer.php";

class LexerTest002 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $zero = array(4, '0');
        $one = array(5, '1');
        $arr = array($zero, $one, $zero, $one, $zero);

        $ass = ("01010");
        $lexer = new \t002lexer($ass);
        foreach ($arr as $val) {
            list($tokenType, $tokenVal) = $val;
            $token = $lexer->nextToken();
            self::assertEquals($tokenType, $token->getType());
            self::assertEquals($tokenVal, $token->getText());
        }
    }

    public function testMalformedInput()
    {
        $this->setExpectedException('Exception', "line 1:0 no viable alternative at character '2'");

        $string = ("2");
        $lexer = new \t002lexer($string);
        $lexer->nextToken();
    }

}