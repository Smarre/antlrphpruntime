grammar t023scopes;

options {
    language=Php;
}

prog
scope {
name
}
    :   ID {$prog::name=$ID.text;}
    ;

ID  :   ('a'..'z')+
    ;

WS  :   (' '|'\n'|'\r')+ {$channel=self::\$HIDDEN;}
    ;
