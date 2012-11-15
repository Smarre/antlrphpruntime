<?php
namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t032subrulePredictParser.php';
require_once __DIR__ . '/generated/t032subrulePredictLexer.php';

class Lexer032Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $ass = ('BEGIN A END');
        $lexer = new \t032subrulePredictLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t032subrulePredictParser($s);

        $parser->a();
    }
}