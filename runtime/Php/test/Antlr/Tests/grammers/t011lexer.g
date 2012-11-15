lexer grammar t011lexer;
options {
  language = Php;
}

@lexer::members {
    public $wsCounter = 0;
}

IDENTIFIER: 
        ('a'..'z'|'A'..'Z'|'_') 
        ('a'..'z'
        |'A'..'Z'
        |'0'..'9'
        |'_'
            { 
\$this->wsCounter++;
            }
        )*
    ;

WS: (' ' | '\n')+;
