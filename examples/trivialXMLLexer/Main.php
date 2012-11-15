<?php

require_once '../../runtime/Php/antlr.php';
require_once 'XMLLexer.php';

#
# usage: php Main.php input
#

$input = new ANTLRFileStream(dirname(__FILE__).DIRECTORY_SEPARATOR.$argv[1]);
$lexer = new XMLLexer($input);
while ($lexer->nextToken() != TokenConst::$EOF_TOKEN);
  
?>
