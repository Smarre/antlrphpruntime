<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t009lexer.php";

class LexerTest009 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $arr = array('0', '8', '5');

        $ass = ('085');
        $lexer = new \t009lexer($ass);
        foreach ($arr as $val) {
            $token = $lexer->nextToken();
            self::assertEquals(\t009lexer::T_DIGIT, $token->getType());
            self::assertEquals($val, $token->getText());
        }
    }

}
