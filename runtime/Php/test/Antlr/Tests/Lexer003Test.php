<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t003lexer.php";

class LexerTest003 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $zero = array(4, '0');
        $one = array(5, '1');
        $fooze = array(6, 'fooze');

        $arr = array($one, $zero, $fooze);

        $ass = ("10fooze");
        $lexer = new \t003lexer($ass);
        foreach ($arr as $val) {
            list($tokenType, $tokenVal) = $val;
            $token = $lexer->nextToken();
            self::assertEquals($tokenType, $token->getType());
            self::assertEquals($tokenVal, $token->getText());
        }
    }

}
