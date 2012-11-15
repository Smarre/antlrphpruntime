grammar t013parser;
options {
  language = Php;
}

@parser::init {
\$this->identifiers = array();
\$this->reportedErrors = array();
}

@parser::members {
public $reportedErrors = array();
public $identifiers = array();

function foundIdentifier(\$name){
    \$this->identifiers[] = \$name;
}

function emitErrorMessage(\$msg){
    \$this->reportedErrors[] = \$msg;
}

}

document:
        t=IDENTIFIER {\$this->foundIdentifier($t.text);}
        ;

IDENTIFIER: ('a'..'z'|'A'..'Z'|'_') ('a'..'z'|'A'..'Z'|'0'..'9'|'_')*;
