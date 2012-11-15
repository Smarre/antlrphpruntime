lexer grammar t029synpredgate;
options {
  language = Php;
}

FOO
    : ('ab')=> A
    | ('ac')=> B
    ;

fragment
A: 'a';

fragment
B: 'a';

