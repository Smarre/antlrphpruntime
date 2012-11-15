grammar t014parser;
options {
  language = Php;
}

@parser::init {
\$this->events = array();
\$this->reportedErrors = array();
}

@parser::members {
public $events = array();
public $reportedErrors = array();

function emitErrorMessage(\$msg){
    \$this->reportedErrors[] = \$msg;
}
}
        

document:
        ( declaration
        | call
        )*
        EOF
    ;

declaration:
        'var' t=IDENTIFIER ';'
        {\$this->events[] = array('decl', $t.text);}
    ;

call:
        t=IDENTIFIER '(' ')' ';'
        {\$this->events[] = array('call', $t.text);}
    ;

IDENTIFIER: ('a'..'z'|'A'..'Z'|'_') ('a'..'z'|'A'..'Z'|'0'..'9'|'_')*;
WS:  (' '|'\r'|'\t'|'\n') {$channel=Token::HIDDEN_CHANNEL;};
