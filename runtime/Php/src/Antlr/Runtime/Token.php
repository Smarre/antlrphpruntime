<?php

namespace Antlr\Runtime;

abstract class Token
{
    /**
     * All tokens go to the parser (unless skip() is called in that rule)
     * on a particular "channel".  The parser tunes to a particular channel
     * so that whitespace etc... can go to the parser on a "hidden" channel.
     */
    const DEFAULT_CHANNEL = 0;

    /**
     * Anything on different channel than DEFAULT_CHANNEL is not parsed by parser.
     */
    const HIDDEN_CHANNEL = 99;

    const EOR_TOKEN_TYPE = 1;
    /** imaginary tree navigation type; traverse "get child" link */
    const DOWN = 2;
    /** imaginary tree navigation type; finish with a child list */
    const UP = 3;
    const MIN_TOKEN_TYPE = 4; // = UP+1;
    const EOF = CharStream::EOF; // = CharStream.EOF;
    const INVALID_TOKEN_TYPE = 0;

    private static $eofToken = null;
    private static $invalidToken = null;
    private static $skipToken = null;

    static public function EOF_TOKEN()
    {
        if (self::$eofToken == null) {
            self::$eofToken = CommonToken::forType(self::EOF);
        }
        return self::$eofToken;
    }

    static public function INVAILD_TOKEN()
    {
        if (self::$invalidToken = null) {
            self::$invalidToken = CommonToken::forType(self::INVALID_TOKEN_TYPE);
        }
        return self::$invalidToken;
    }

    /**
     * In an action, a lexer rule can set token to this SKIP_TOKEN and ANTLR
     * will avoid creating a token for this symbol and try to fetch another.
     */
    static public function SKIP_TOKEN()
    {
        if (self::$skipToken == null) {
            self::$skipToken = CommonToken::forType(self::INVALID_TOKEN_TYPE);
        }
        return self::$skipToken;
    }
}