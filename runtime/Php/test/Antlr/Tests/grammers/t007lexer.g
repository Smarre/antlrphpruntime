lexer grammar t007lexer;
options {
  language = Php;
}

FOO: 'f' ('o' | 'a' 'b'+)*;
