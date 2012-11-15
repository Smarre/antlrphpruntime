grammar t022scopes;

options {
    language=Php;
}

/* global scopes */

scope aScope {
names
}

a
scope aScope;
    :   {$aScope::names = array();} ID*
    ;


/* rule scopes, from the book, final beta, p.147 */

b[v]
scope {x}
    : {$b::x = \$v;} b2
    ;

b2
    : b3
    ;

b3 
    : {$b::x}?=> ID // only visible, if b was called with True
    | NUM
    ;


/* rule scopes, from the book, final beta, p.148 */

c returns [res]
scope {
    symbols
}
@init {
    $c::symbols = array();
}
    : '{' c1* c2+ '}'
        { $res = $c::symbols; }
    ;

c1
    : 'int' ID {array_push($c::symbols, $ID.text);} ';'
    ;

c2
    : ID '=' NUM ';'
        {
            if(!in_array($ID.text, $c::symbols)){
                throw new Exception($ID.text);
			}
        }
    ;

/* recursive rule scopes, from the book, final beta, p.150 */

d returns [res]
scope {
    symbols
}
@init {
    $d::symbols = array();
}
    : '{' d1* d2* '}'
        { $res = $d::symbols; }
    ;

d1
    : 'int' ID {array_push($d::symbols, $ID.text);} ';'
    ;

d2
    : ID '=' NUM ';'
        {
			for(\$i=count(\$this->$d)-1;\$i>=0;\$i++){
				if(in_array($ID.text, $d[$i]::symbols)){
					break;
				}
			}
			if(\$i==count(\$this->$d)){
				throw new Exception($ID.text);
			}
        }
    | d
    ;

/* recursive rule scopes, access bottom-most scope */

e returns [res]
scope {
    a
}
@after {
    $res = $e::a;
}
    : NUM { $e[0]::a = (int)($NUM.text); }
    | '{' e '}'
    ;


/* recursive rule scopes, access with negative index */

f returns [res]
scope {
    a
}
@after {
    $res = $f::a;
}
    : NUM { $f[-2]::a = (int)($NUM.text); }
    | '{' f '}'
    ;


/* tokens */

ID  :   ('a'..'z')+
    ;

NUM :   ('0'..'9')+
    ;

WS  :   (' '|'\n'|'\r')+ {$channel=self::\$HIDDEN;}
    ;
