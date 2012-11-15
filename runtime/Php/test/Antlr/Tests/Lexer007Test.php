<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t007lexer.php";

class LexerTest007 extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {

        $arr = array('fo', 'fababbooabb');

        $ass = ('fofababbooabb');
        $lexer = new \t007lexer($ass);
        foreach ($arr as $val) {
            $token = $lexer->nextToken();
            self::assertEquals(\t007lexer::T_FOO, $token->getType());
            self::assertEquals($val, $token->getText());
        }
    }

    public function testMalformedInput()
    {
        $ass = ('foaboao');
        $lexer = new \t007lexer($ass);

        $this->setExpectedException('Exception', "line 1:6 required (...)+ loop did not match anything at character 'o'");
        $token = $lexer->nextToken();
    }
}
