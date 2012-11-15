grammar t030specialStates;
options {
  language = Php;
}

@init {
\$this->cond = true;
}

@members {
public \$cond = false;

public function recover($input, $re)
{
    throw \$re;
}
}

r
    : ( {\$this->cond}? NAME
        | {!\$this->cond}? NAME WS+ NAME
        )
        ( WS+ NAME )?
        EOF
    ;

NAME: ('a'..'z') ('a'..'z' | '0'..'9')+;
NUMBER: ('0'..'9')+;
WS: ' '+;
