grammar t041parameters;
options {
  language = Php;
}

a[arg1, arg2] returns [l]
    : A+ EOF
        { 
            \$l = array(\$arg1, \$arg2);
            \$arg1 = "gnarz";
        }
    ;

A: 'a'..'z';

WS: ' '+  { $channel = self::HIDDEN; };
