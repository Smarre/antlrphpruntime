grammar t046rewrite;
options {
    language=Php;
}

program
@init {
    start = \$this->input->LT(1)
}
    :   method+
        {
        \$this->input->insertBefore(start,"public class Wrapper {\n")
        \$this->input->insertAfter($method.stop, "\n}\n")
        }
    ;

method
    :   m='method' ID '(' ')' body
        {\$this->input->replace($m, "public void");}
    ; 

body
scope {
    decls
}
@init {
    $body::decls = set()
}
    :   lcurly='{' stat* '}'
        {
        foreach ( $body::decls AS \$var):
            \$this->input->insertAfter($lcurly, "\nint "+\$it+";")
        }
    ;

stat:   ID '=' expr ';' {$body::decls.add($ID.text);}
    ;

expr:   mul ('+' mul)* 
    ;

mul :   atom ('*' atom)*
    ;

atom:   ID
    |   INT
    ;

ID  :   ('a'..'z'|'A'..'Z')+ ;

INT :   ('0'..'9')+ ;

WS  :   (' '|'\t'|'\n')+ {$channel=\self::HIDDEN;;}
    ;
