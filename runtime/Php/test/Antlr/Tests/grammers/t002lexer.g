lexer grammar t002lexer;
options {
	tokenVocab = t002lexer;
	language = Php;
}

tokens {
	ZERO;
	ONE;
}

ZERO: '0';
ONE: '1';