lexer grammar t040bug80; 
options {
  language = Php;
}
 
ID_LIKE
    : 'defined' 
    | {False}? Identifier 
    | Identifier 
    ; 
 
fragment 
Identifier: 'a'..'z'+ ; // with just 'a', output compiles 
