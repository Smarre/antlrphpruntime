lexer grammar t025lexerRulePropertyRef;
options {
  language = Php;
}

@lexer::init {
\$this->properties = array();
}

IDENTIFIER: 
        ('a'..'z'|'A'..'Z'|'_') ('a'..'z'|'A'..'Z'|'0'..'9'|'_')*
        {
\$this->properties[] = 
    array($text, $type, $line, $pos, $index, $channel, $start, $stop);
        }
    ;
WS: (' ' | '\n')+;
