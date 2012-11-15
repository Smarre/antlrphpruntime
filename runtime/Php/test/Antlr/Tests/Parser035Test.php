<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . '/generated/t035ruleLabelPropertyRefLexer.php';
require_once __DIR__ . '/generated/t035ruleLabelPropertyRefParser.php';

class Parser035Test extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $this->markTestSkipped('Problem in generated parser, code should be $t = $this->b(); but is only $this->b();');

        $ass = ('   a a a a  ');
        $lexer = new \t035ruleLabelPropertyRefLexer($ass);
        $s = new CommonTokenStream($lexer);
        $parser = new \t035ruleLabelPropertyRefParser($s);
        $data = $parser->a();

        var_dump($data);
    }
}