<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t020fuzzyLexer.php";

class LexerTest020 extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $input = file_get_contents(__DIR__ . '/grammers/t020fuzzy.input');
        $result = file_get_contents(__DIR__ . '/grammers/t020fuzzy.output');
        $lexer = $this->lexer($input);
        while (true) {
            $token = $lexer->nextToken();
            if ($token->type == \Antlr\Runtime\Token::EOF) {
                break;
            }
        }
        echo self::assertEquals($lexer->out, $result);
        //$lexer->nextToken();
        //echo self::assertEquals($lexer->buf, $output);
    }

    function lexer($input)
    {
        $ass = ($input);
        $lexer = new \t020fuzzyLexer($ass);
        return $lexer;
    }
}