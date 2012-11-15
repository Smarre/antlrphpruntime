<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t011lexer.php";

class LexerTest011 extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $id = \t011lexer::T_IDENTIFIER;
        $ws = \t011lexer::T_WS;

        $lexer = $this->lexer("foob__ar _Ab_98 \n A12_sdf");

        $expectedTokens = array(
            array($id, 'foob__ar'),
            array($ws, ' '),
            array($id, '_Ab_98'),
            array($ws, " \n "),
            array($id, 'A12_sdf')
        );

        foreach ($expectedTokens as $val) {
            list($tokenType, $tokenVal) = $val;
            $token = $lexer->nextToken();
            self::assertEquals($tokenType, $token->getType());
            self::assertEquals($tokenVal, $token->getText());
        }
        
        self::assertEquals($lexer->wsCounter, 4);
    }

    function lexer($input)
    {
        $ass = ($input);
        $lexer = new \t011lexer($ass);
        return $lexer;
    }
}
