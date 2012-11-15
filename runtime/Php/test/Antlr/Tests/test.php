<?php
namespace Antlr\Tests;

spl_autoload_register(function ($class) {
    if (strpos($class, "Antlr\Runtime") !== false) {
        require __DIR__ . "/../../../src/" .
        str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    } else if (strpos($class, "Antlr\Tests") !== false) {
        require __DIR__ . "/" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    }
});

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once __DIR__ . "/generated/t014parserLexer.php";
require_once __DIR__ . "/generated/t014parserParser.php";

      function parser($expr)
    {
        $ass = ($expr);
        $lex = new \t014parserLexer($ass);
        $cts = new CommonTokenStream($lex);
        $tap = new \t014parserParser($cts);
        return $tap;
    }


        $parser = parser('var foobar; gnarz(); var blupp; flupp ( ) ;');
        $parser->document();
        $re = $parser->reportedErrors;
        $parser->events;
 
         $parser = parser('var; foo();');

        $parser->document();

?>
