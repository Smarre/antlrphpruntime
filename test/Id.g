grammar Id;

options{
    language = Php;
}
ids: (id=Id{echo $id.text."\n";})+;

Id: Letter (Letter | '0'..'9' |'_')*;

fragment
Letter: 'A'..'Z'|'a'..'z';

Ws: ('\n' |'\r'|'\t'|' ')+ {$channel=self::\$HIDDEN;};
