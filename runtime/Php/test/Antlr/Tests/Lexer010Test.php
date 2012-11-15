<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t010lexer.php";

class LexerTest010 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $id = \t010lexer::T_IDENTIFIER;
        $ws = \t010lexer::T_WS;

        $expectedTokens = array(
            array($id, 'foobar'),
            array($ws, ' '),
            array($id, '_Ab98'),
            array($ws, " \n "),
            array($id, 'A12sdf')
        );

        $ass = ("foobar _Ab98 \n A12sdf");
        $lexer = new \t010lexer($ass);
        foreach ($expectedTokens as $val) {
            list($tokenType, $tokenVal) = $val;
            $token = $lexer->nextToken();
            self::assertEquals($tokenType, $token->getType());
            self::assertEquals($tokenVal, $token->getText());
        }
    }

    public function testMalformedInput()
    {
        $ass = ('a-b');
        $lexer = new \t010lexer($ass);
        $token = $lexer->nextToken();

        $this->setExpectedException('Exception', "line 1:1 no viable alternative at character '-'");
        $token = $lexer->nextToken();
    }
}

?>