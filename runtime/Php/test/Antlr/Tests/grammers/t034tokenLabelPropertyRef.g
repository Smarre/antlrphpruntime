grammar t034tokenLabelPropertyRef;
options {
  language = Php;
}

@parser::members {
    public \$text = null;
}

a: t=A
        {
            \$this->text = $t.text;
        }
    ;

A: 'a'..'z';

WS  :
        (   ' '
        |   '\t'
        |  ( '\n'
            |	'\r\n'
            |	'\r'
            )
        )+
        { $channel = self::\$HIDDEN; }
    ;    

