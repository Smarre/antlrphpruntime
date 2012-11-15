<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t038lexerRuleLabel.php';

class Lexer038Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('a  2');
        $lexer = new \t038lexerRuleLabel($ass);

        while (true) {
            $token = $lexer->nextToken();
            if ($token->getType() == \t038lexerRuleLabel::T_EOF) {
                break;
            }
        }
    }
}