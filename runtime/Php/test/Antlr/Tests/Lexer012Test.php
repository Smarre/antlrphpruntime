<?php


namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
require_once __DIR__ . "/generated/t012lexerXMLLexer.php";

class LexerTest012 extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $input = file_get_contents(__DIR__ . '/grammers/t012lexerXML.input');
        $result = file_get_contents(__DIR__ . '/grammers/t012lexerXML.output');
        $lexer = $this->lexer($input);
        while (true) {
            $token = $lexer->nextToken();
            if ($token->type == \Antlr\Runtime\Token::EOF) {
                break;
            }
        }
        self::assertEquals($lexer->buf, $result);
    }

    static public function dataMalformedInput()
    {
        return array(
            array("<?xml version='1.0'?> <docu ment attr=\"foo\"></document>"),
            array("<?tml version='1.0'?><document></document>"),
            array("<?xml version='1.0'?><document d></document>"),
        );
    }

    /**
     * @param <type> $input
     * @dataProvider dataMalformedInput
     */
    public function testMalformedInput($input)
    {
        $lexer = $this->lexer($input);

        $this->setExpectedException('Exception');
        while(true) {
            $token = $lexer->nextToken();
            if ($token->type == \Antlr\Runtime\Token::EOF) {
                break;
            }
        }
    }

    function lexer($input)
    {
        $ass = ($input);
        $lexer = new \t012lexerXMLLexer($ass);
        return $lexer;
    }
}
