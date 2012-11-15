grammar t026actions;
options {
  language = Php;
}

@lexer::init {
    //TODO:This is causing some issues with antlr
    \$this->foobar = 'attribute;';
}

prog
@init {
    \$this->capture('init;');
}
@after {
    \$this->capture('after;');
}
    :   IDENTIFIER EOF
    ;
    catch [ RecognitionException $exc ] {
        \$this->capture('catch;');
        throw \$exc;
    }
    finally {
        \$this->capture('finally;');
    }


IDENTIFIER
    : ('a'..'z'|'A'..'Z'|'_') ('a'..'z'|'A'..'Z'|'0'..'9'|'_')*
        {
            # a comment
          \$this->capture('action;');
          \$this->capture(implode(" ", array($text, $type, $line, $pos, $index, $channel, $start, $stop)));
          if(true) \$this->capture(\$this->foobar);
        }
    ;

WS: (' ' | '\n')+;
