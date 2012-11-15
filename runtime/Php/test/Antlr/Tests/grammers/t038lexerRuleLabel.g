lexer grammar t038lexerRuleLabel;
options {
  language = Php;
}

A: 'a'..'z' WS '0'..'9'
        {

        }
    ;

fragment WS  :
        (   ' '
        |   '\t'
        |  ( '\n'
            |	'\r\n'
            |	'\r'
            )
        )+
        { $channel = self::HIDDEN; }
    ;    

