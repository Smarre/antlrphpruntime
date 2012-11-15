<?php
namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\Token;

require_once __DIR__ . "/generated/t025lexerRulePropertyRef.php";

class LexerTest025 extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $lexer = $this->lexer("foobar _Ab98 \n A12sdf");
        while (true) {
            $token = $lexer->nextToken();
            if ($token->type == Token::EOF) {
                break;
            }
        }

        $expected = array(
            array('foobar', \t025lexerRulePropertyRef::T_IDENTIFIER, 1, 0, -1, Token::DEFAULT_CHANNEL, 0, 5),
            array('_Ab98', \t025lexerRulePropertyRef::T_IDENTIFIER, 1, 7, -1, Token::DEFAULT_CHANNEL, 7, 11),
            array('A12sdf', \t025lexerRulePropertyRef::T_IDENTIFIER, 2, 1, -1, Token::DEFAULT_CHANNEL, 15, 20));
        for ($i = 0; $i < sizeof($expected); $i++) {
            echo self::assertEquals($lexer->properties[$i], $expected[$i]);
        }
    }

    function lexer($input)
    {
        $ass = ($input);
        $lexer = new \t025lexerRulePropertyRef($ass);
        return $lexer;
    }
}
