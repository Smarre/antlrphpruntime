grammar t032subrulePredict;
options {
  language = Php;
}

a: 'BEGIN' b WS+ 'END';
b: ( WS+ 'A' )+;
WS: ' ';
