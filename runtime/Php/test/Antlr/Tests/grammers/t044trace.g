grammar t044trace;
options {
  language = Php;
}

@init {
    \$this->_stack = array();
}

a: '<' ((INT '+')=>b|c) '>';
b: c ('+' c)*;
c: INT 
    {
        if (!\$this->_stack) {
            \$this->_stack = \$this->getRuleInvocationStack();
        }
    }
    ;

INT: ('0'..'9')+;
WS: (' ' | '\n' | '\t')+ {$channel = \self::HIDDEN;;};
