<?php

print "Running ID test...\n";

spl_autoload_register(

    function ($class) {
        if (strpos($class, "Antlr\Runtime") !== false) {
            require __DIR__ . "/../runtime/Php/src/" .
		str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
        } else if (strpos($class, "Antlr\Tests") !== false) {
            require __DIR__ . "/" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
        }
    }
);

use Antlr\Runtime\ANTLRStringStream;
use Antlr\Runtime\CommonTokenStream;

require_once 'IdLexer.php';
require_once 'IdParser.php';

$ass = new ANTLRStringStream("Hello\nWorld");
$lex = new IdLexer($ass);
$cts = new CommonTokenStream($lex);
$tap = new IdParser($cts);

print $cts->__toString();
print "\n";

?>
