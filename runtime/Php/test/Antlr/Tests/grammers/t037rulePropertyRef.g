grammar t037rulePropertyRef;
options {
  language = Php;
}

a returns [bla]
@after {
    \$bla = array($start, $stop, $text);
}
    : A+
    ;

A: 'a'..'z';

WS: ' '+  { $channel = self::HIDDEN; };
