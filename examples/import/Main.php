<?php

require_once '../../runtime/Php/antlr.php';
require_once 'CommonLexer.php';
require_once 'Simple_CommonLexer.php';
require_once 'SimpleLexer.php';
require_once 'SimpleParser.php';

#
# usage: php Main.php input
#

$input = new ANTLRFileStream(dirname(__FILE__).DIRECTORY_SEPARATOR.$argv[1]);
$lexer = new SimpleLexer($input);
//$lexer = new CommonLexer($input);
$tokens = new CommonTokenStream($lexer);

/*foreach ($tokens->getTokens() as $t) {
		echo $t."\n";
}*/

$parser = new SimpleParser($tokens);
$parser->file();

?>
