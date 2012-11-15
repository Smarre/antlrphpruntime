/*

 source: http://www.antlr.org/wiki/display/ANTLR3/1.+Lexer 

 An important feature here is such { XMLLexer::\$tagMode }? predicates support

*/

lexer grammar XMLLexer;
options { language=Php; }

@members {
    public static \$tagMode = false;
}

TAG_START_OPEN : '<' { XMLLexer::\$tagMode = true; } ;
TAG_END_OPEN : '</' { XMLLexer::\$tagMode = true; } ;
TAG_CLOSE : { XMLLexer::\$tagMode }?=> '>' { XMLLexer::\$tagMode = false; } ;
TAG_EMPTY_CLOSE : { XMLLexer::\$tagMode }?=> '/>' { XMLLexer::\$tagMode = false; } ;

ATTR_EQ : { XMLLexer::\$tagMode }?=> '=' ;

ATTR_VALUE : { XMLLexer::\$tagMode }?=>
        ( '"' (~'"')* '"'
        | '\'' (~'\'')* '\''
        )
    ;

PCDATA : { !( XMLLexer::\$tagMode ) }?=> (~'<')+ ;

GENERIC_ID
    : { XMLLexer::\$tagMode }?=>
      ( LETTER | '_' | ':') (NAMECHAR)*
    ;

fragment NAMECHAR
    : LETTER | DIGIT | '.' | '-' | '_' | ':'
    ;

fragment DIGIT
    :    '0'..'9'
    ;

fragment LETTER
    : 'a'..'z'
    | 'A'..'Z'
    ;

WS  :  { XMLLexer::\$tagMode }?=>
       (' '|'\r'|'\t'|'\u000C'|'\n') {$channel=99;}
    ;

