<?php
// $ANTLR 3.1.3 ??? 27, 2009 18:08:14 CommonLexer.g 2009-05-05 21:27:29

/** Not really useful by itself; a library of rules to import into
 *  another grammar.
 */

# for convenience in actions
if (!defined('HIDDEN')) define('HIDDEN', BaseRecognizer::$HIDDEN);

      
function CommonLexer_DFA11_static(){
    $eotS =
        "\x2\xff\x1\x8\x8\xff";
    $eofS =
        "\xb\xff";
    $minS =
        "\x1\x9\x1\xff\x1\x2e\x3\xff\x1\x2a\x4\xff";
    $maxS =
        "\x1\x7a\x1\xff\x1\x39\x3\xff\x1\x2f\x4\xff";
    $acceptS =
        "\x1\xff\x1\x1\x1\xff\x1\x3\x1\x4\x1\x5\x1\xff\x1\x8\x1\x2\x1\x6".
    "\x1\x7";
    $specialS =
        "\xb\xff}>";
    $transitionS = array(
        "\x2\x7\x2\xff\x1\x7\x12\xff\x1\x7\x1\xff\x1\x5\x4\xff\x1\x4\x6".
        "\xff\x1\x3\x1\x6\xa\x2\x7\xff\x1a\x1\x4\xff\x1\x1\x1\xff\x1a\x1",
        "",
        "\x1\x3\x1\xff\xa\x2",
        "",
        "",
        "",
        "\x1\x9\x4\xff\x1\xa",
        "",
        "",
        "",
        ""
    );
    $arr = array();
    $arr['eot'] = DFA::unpackEncodedString($eotS);
    $arr['eof'] = DFA::unpackEncodedString($eofS);
    $arr['min'] = DFA::unpackEncodedString($minS);
    $arr['max'] = DFA::unpackEncodedString($maxS);
    $arr['accept'] = DFA::unpackEncodedString($acceptS);
    $arr['special'] = DFA::unpackEncodedString($specialS);


    $numStates = sizeof($transitionS);
    $arr['transition'] = array();
    for ($i=0; $i<$numStates; $i++) {
        $arr['transition'][$i] = DFA::unpackEncodedString($transitionS[$i]);
    }
    return $arr;
}
$CommonLexer_DFA11 = CommonLexer_DFA11_static();

class CommonLexer_DFA11 extends DFA {

    public function __construct($recognizer) {
        global $CommonLexer_DFA11;
        $DFA = $CommonLexer_DFA11;
        $this->recognizer = $recognizer;
        $this->decisionNumber = 11;
        $this->eot = $DFA['eot'];
        $this->eof = $DFA['eof'];
        $this->min = $DFA['min'];
        $this->max = $DFA['max'];
        $this->accept = $DFA['accept'];
        $this->special = $DFA['special'];
        $this->transition = $DFA['transition'];
    }
    public function getDescription() {
        return "1:1: Tokens : ( ID | INT | FLOAT | CHAR | STRING | COMMENT | LINE_COMMENT | WS );";
    }
}
 

class CommonLexer extends AntlrLexer {
    static $WS=12;
    static $LINE_COMMENT=11;
    static $ESC=7;
    static $CHAR=8;
    static $INT=5;
    static $FLOAT=6;
    static $COMMENT=10;
    static $ID=4;
    static $EOF=-1;
    static $STRING=9;

    // delegates
    // delegators

    function __construct($input, $state=null){
        parent::__construct($input,$state);

        
            $this->dfa11 = new CommonLexer_DFA11($this);
    }
    function getGrammarFileName() { return "CommonLexer.g"; }

    // $ANTLR start "ID"
    function mID(){
        try {
            $_type = CommonLexer::$ID;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:10:4: ( ( 'a' .. 'z' | 'A' .. 'Z' | '_' ) ( 'a' .. 'z' | 'A' .. 'Z' | '_' | '0' .. '9' )* ) 
            // CommonLexer.g:10:6: ( 'a' .. 'z' | 'A' .. 'Z' | '_' ) ( 'a' .. 'z' | 'A' .. 'Z' | '_' | '0' .. '9' )* 
            {
            if ( ($this->input->LA(1)>=65 && $this->input->LA(1)<=90)||$this->input->LA(1)==95||($this->input->LA(1)>=97 && $this->input->LA(1)<=122) ) {
                $this->input->consume();

            }
            else {
                $mse = new MismatchedSetException(null,$this->input);
                $this->recover($mse);
                throw $mse;}

            // CommonLexer.g:10:30: ( 'a' .. 'z' | 'A' .. 'Z' | '_' | '0' .. '9' )* 
            //loop1:
            do {
                $alt1=2;
                $LA1_0 = $this->input->LA(1);

                if ( (($LA1_0>=$this->getToken('48') && $LA1_0<=$this->getToken('57'))||($LA1_0>=$this->getToken('65') && $LA1_0<=$this->getToken('90'))||$LA1_0==$this->getToken('95')||($LA1_0>=$this->getToken('97') && $LA1_0<=$this->getToken('122'))) ) {
                    $alt1=1;
                }


                switch ($alt1) {
            	case 1 :
            	    // CommonLexer.g: 
            	    {
            	    if ( ($this->input->LA(1)>=48 && $this->input->LA(1)<=57)||($this->input->LA(1)>=65 && $this->input->LA(1)<=90)||$this->input->LA(1)==95||($this->input->LA(1)>=97 && $this->input->LA(1)<=122) ) {
            	        $this->input->consume();

            	    }
            	    else {
            	        $mse = new MismatchedSetException(null,$this->input);
            	        $this->recover($mse);
            	        throw $mse;}


            	    }
            	    break;

            	default :
            	    break 2;//loop1;
                }
            } while (true);


            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "ID"

    // $ANTLR start "INT"
    function mINT(){
        try {
            $_type = CommonLexer::$INT;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:12:5: ( ( '0' .. '9' )+ ) 
            // CommonLexer.g:12:7: ( '0' .. '9' )+ 
            {
            // CommonLexer.g:12:7: ( '0' .. '9' )+ 
            $cnt2=0;
            //loop2:
            do {
                $alt2=2;
                $LA2_0 = $this->input->LA(1);

                if ( (($LA2_0>=$this->getToken('48') && $LA2_0<=$this->getToken('57'))) ) {
                    $alt2=1;
                }


                switch ($alt2) {
            	case 1 :
            	    // CommonLexer.g:12:7: '0' .. '9' 
            	    {
            	    $this->matchRange(48,57); 

            	    }
            	    break;

            	default :
            	    if ( $cnt2 >= 1 ) break 2;//loop2;
                        $eee =
                            new EarlyExitException(2, $this->input);
                        throw $eee;
                }
                $cnt2++;
            } while (true);


            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "INT"

    // $ANTLR start "FLOAT"
    function mFLOAT(){
        try {
            $_type = CommonLexer::$FLOAT;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:14:6: ( INT '.' ( INT )? | '.' INT ) 
            $alt4=2;
            $LA4_0 = $this->input->LA(1);

            if ( (($LA4_0>=$this->getToken('48') && $LA4_0<=$this->getToken('57'))) ) {
                $alt4=1;
            }
            else if ( ($LA4_0==$this->getToken('46')) ) {
                $alt4=2;
            }
            else {
                $nvae = new NoViableAltException("", 4, 0, $this->input);

                throw $nvae;
            }
            switch ($alt4) {
                case 1 :
                    // CommonLexer.g:14:8: INT '.' ( INT )? 
                    {
                    $this->mINT(); 
                    $this->matchChar(46); 
                    // CommonLexer.g:14:16: ( INT )? 
                    $alt3=2;
                    $LA3_0 = $this->input->LA(1);

                    if ( (($LA3_0>=$this->getToken('48') && $LA3_0<=$this->getToken('57'))) ) {
                        $alt3=1;
                    }
                    switch ($alt3) {
                        case 1 :
                            // CommonLexer.g:14:16: INT 
                            {
                            $this->mINT(); 

                            }
                            break;

                    }


                    }
                    break;
                case 2 :
                    // CommonLexer.g:15:4: '.' INT 
                    {
                    $this->matchChar(46); 
                    $this->mINT(); 

                    }
                    break;

            }
            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "FLOAT"

    // $ANTLR start "CHAR"
    function mCHAR(){
        try {
            $_type = CommonLexer::$CHAR;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:18:5: ( '\\'' ( ESC | ~ ( '\\'' | '\\\\' ) ) '\\'' ) 
            // CommonLexer.g:18:9: '\\'' ( ESC | ~ ( '\\'' | '\\\\' ) ) '\\'' 
            {
            $this->matchChar(39); 
            // CommonLexer.g:18:14: ( ESC | ~ ( '\\'' | '\\\\' ) ) 
            $alt5=2;
            $LA5_0 = $this->input->LA(1);

            if ( ($LA5_0==$this->getToken('92')) ) {
                $alt5=1;
            }
            else if ( (($LA5_0>=$this->getToken('0') && $LA5_0<=$this->getToken('38'))||($LA5_0>=$this->getToken('40') && $LA5_0<=$this->getToken('91'))||($LA5_0>=$this->getToken('93') && $LA5_0<=$this->getToken('65535'))) ) {
                $alt5=2;
            }
            else {
                $nvae = new NoViableAltException("", 5, 0, $this->input);

                throw $nvae;
            }
            switch ($alt5) {
                case 1 :
                    // CommonLexer.g:18:16: ESC 
                    {
                    $this->mESC(); 

                    }
                    break;
                case 2 :
                    // CommonLexer.g:18:22: ~ ( '\\'' | '\\\\' ) 
                    {
                    if ( ($this->input->LA(1)>=0 && $this->input->LA(1)<=38)||($this->input->LA(1)>=40 && $this->input->LA(1)<=91)||($this->input->LA(1)>=93 && $this->input->LA(1)<=65535) ) {
                        $this->input->consume();

                    }
                    else {
                        $mse = new MismatchedSetException(null,$this->input);
                        $this->recover($mse);
                        throw $mse;}


                    }
                    break;

            }

            $this->matchChar(39); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "CHAR"

    // $ANTLR start "STRING"
    function mSTRING(){
        try {
            $_type = CommonLexer::$STRING;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:22:5: ( '\"' ( ESC | ~ ( '\\\\' | '\"' ) )* '\"' ) 
            // CommonLexer.g:22:8: '\"' ( ESC | ~ ( '\\\\' | '\"' ) )* '\"' 
            {
            $this->matchChar(34); 
            // CommonLexer.g:22:12: ( ESC | ~ ( '\\\\' | '\"' ) )* 
            //loop6:
            do {
                $alt6=3;
                $LA6_0 = $this->input->LA(1);

                if ( ($LA6_0==$this->getToken('92')) ) {
                    $alt6=1;
                }
                else if ( (($LA6_0>=$this->getToken('0') && $LA6_0<=$this->getToken('33'))||($LA6_0>=$this->getToken('35') && $LA6_0<=$this->getToken('91'))||($LA6_0>=$this->getToken('93') && $LA6_0<=$this->getToken('65535'))) ) {
                    $alt6=2;
                }


                switch ($alt6) {
            	case 1 :
            	    // CommonLexer.g:22:14: ESC 
            	    {
            	    $this->mESC(); 

            	    }
            	    break;
            	case 2 :
            	    // CommonLexer.g:22:20: ~ ( '\\\\' | '\"' ) 
            	    {
            	    if ( ($this->input->LA(1)>=0 && $this->input->LA(1)<=33)||($this->input->LA(1)>=35 && $this->input->LA(1)<=91)||($this->input->LA(1)>=93 && $this->input->LA(1)<=65535) ) {
            	        $this->input->consume();

            	    }
            	    else {
            	        $mse = new MismatchedSetException(null,$this->input);
            	        $this->recover($mse);
            	        throw $mse;}


            	    }
            	    break;

            	default :
            	    break 2;//loop6;
                }
            } while (true);

            $this->matchChar(34); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "STRING"

    // $ANTLR start "ESC"
    function mESC(){
        try {
            // CommonLexer.g:26:5: ( '\\\\' ( 'b' | 't' | 'n' | 'f' | 'r' | '\\\"' | '\\'' | '\\\\' ) ) 
            // CommonLexer.g:26:9: '\\\\' ( 'b' | 't' | 'n' | 'f' | 'r' | '\\\"' | '\\'' | '\\\\' ) 
            {
            $this->matchChar(92); 
            if ( $this->input->LA(1)==34||$this->input->LA(1)==39||$this->input->LA(1)==92||$this->input->LA(1)==98||$this->input->LA(1)==102||$this->input->LA(1)==110||$this->input->LA(1)==114||$this->input->LA(1)==116 ) {
                $this->input->consume();

            }
            else {
                $mse = new MismatchedSetException(null,$this->input);
                $this->recover($mse);
                throw $mse;}


            }

        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "ESC"

    // $ANTLR start "COMMENT"
    function mCOMMENT(){
        try {
            $_type = CommonLexer::$COMMENT;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:30:5: ( '/*' ( options {greedy=false; } : . )* '*/' ) 
            // CommonLexer.g:30:9: '/*' ( options {greedy=false; } : . )* '*/' 
            {
            $this->matchString("/*"); 

            // CommonLexer.g:30:14: ( options {greedy=false; } : . )* 
            //loop7:
            do {
                $alt7=2;
                $LA7_0 = $this->input->LA(1);

                if ( ($LA7_0==$this->getToken('42')) ) {
                    $LA7_1 = $this->input->LA(2);

                    if ( ($LA7_1==$this->getToken('47')) ) {
                        $alt7=2;
                    }
                    else if ( (($LA7_1>=$this->getToken('0') && $LA7_1<=$this->getToken('46'))||($LA7_1>=$this->getToken('48') && $LA7_1<=$this->getToken('65535'))) ) {
                        $alt7=1;
                    }


                }
                else if ( (($LA7_0>=$this->getToken('0') && $LA7_0<=$this->getToken('41'))||($LA7_0>=$this->getToken('43') && $LA7_0<=$this->getToken('65535'))) ) {
                    $alt7=1;
                }


                switch ($alt7) {
            	case 1 :
            	    // CommonLexer.g:30:42: . 
            	    {
            	    $this->matchAny(); 

            	    }
            	    break;

            	default :
            	    break 2;//loop7;
                }
            } while (true);

            $this->matchString("*/"); 

              $_channel=HIDDEN;

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "COMMENT"

    // $ANTLR start "LINE_COMMENT"
    function mLINE_COMMENT(){
        try {
            $_type = CommonLexer::$LINE_COMMENT;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:34:5: ( '//' (~ ( '\\n' | '\\r' ) )* ( '\\r' )? '\\n' ) 
            // CommonLexer.g:34:7: '//' (~ ( '\\n' | '\\r' ) )* ( '\\r' )? '\\n' 
            {
            $this->matchString("//"); 

            // CommonLexer.g:34:12: (~ ( '\\n' | '\\r' ) )* 
            //loop8:
            do {
                $alt8=2;
                $LA8_0 = $this->input->LA(1);

                if ( (($LA8_0>=$this->getToken('0') && $LA8_0<=$this->getToken('9'))||($LA8_0>=$this->getToken('11') && $LA8_0<=$this->getToken('12'))||($LA8_0>=$this->getToken('14') && $LA8_0<=$this->getToken('65535'))) ) {
                    $alt8=1;
                }


                switch ($alt8) {
            	case 1 :
            	    // CommonLexer.g:34:12: ~ ( '\\n' | '\\r' ) 
            	    {
            	    if ( ($this->input->LA(1)>=0 && $this->input->LA(1)<=9)||($this->input->LA(1)>=11 && $this->input->LA(1)<=12)||($this->input->LA(1)>=14 && $this->input->LA(1)<=65535) ) {
            	        $this->input->consume();

            	    }
            	    else {
            	        $mse = new MismatchedSetException(null,$this->input);
            	        $this->recover($mse);
            	        throw $mse;}


            	    }
            	    break;

            	default :
            	    break 2;//loop8;
                }
            } while (true);

            // CommonLexer.g:34:26: ( '\\r' )? 
            $alt9=2;
            $LA9_0 = $this->input->LA(1);

            if ( ($LA9_0==$this->getToken('13')) ) {
                $alt9=1;
            }
            switch ($alt9) {
                case 1 :
                    // CommonLexer.g:34:26: '\\r' 
                    {
                    $this->matchChar(13); 

                    }
                    break;

            }

            $this->matchChar(10); 
              $_channel=HIDDEN;

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "LINE_COMMENT"

    // $ANTLR start "WS"
    function mWS(){
        try {
            $_type = CommonLexer::$WS;
            $_channel = CommonLexer::$DEFAULT_TOKEN_CHANNEL;
            // CommonLexer.g:37:4: ( ( ' ' | '\\t' | '\\r' | '\\n' )+ ) 
            // CommonLexer.g:37:6: ( ' ' | '\\t' | '\\r' | '\\n' )+ 
            {
            // CommonLexer.g:37:6: ( ' ' | '\\t' | '\\r' | '\\n' )+ 
            $cnt10=0;
            //loop10:
            do {
                $alt10=2;
                $LA10_0 = $this->input->LA(1);

                if ( (($LA10_0>=$this->getToken('9') && $LA10_0<=$this->getToken('10'))||$LA10_0==$this->getToken('13')||$LA10_0==$this->getToken('32')) ) {
                    $alt10=1;
                }


                switch ($alt10) {
            	case 1 :
            	    // CommonLexer.g: 
            	    {
            	    if ( ($this->input->LA(1)>=9 && $this->input->LA(1)<=10)||$this->input->LA(1)==13||$this->input->LA(1)==32 ) {
            	        $this->input->consume();

            	    }
            	    else {
            	        $mse = new MismatchedSetException(null,$this->input);
            	        $this->recover($mse);
            	        throw $mse;}


            	    }
            	    break;

            	default :
            	    if ( $cnt10 >= 1 ) break 2;//loop10;
                        $eee =
                            new EarlyExitException(10, $this->input);
                        throw $eee;
                }
                $cnt10++;
            } while (true);

              $_channel=HIDDEN;

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "WS"

    function mTokens(){
        // CommonLexer.g:1:8: ( ID | INT | FLOAT | CHAR | STRING | COMMENT | LINE_COMMENT | WS ) 
        $alt11=8;
        $alt11 = $this->dfa11->predict($this->input);
        switch ($alt11) {
            case 1 :
                // CommonLexer.g:1:10: ID 
                {
                $this->mID(); 

                }
                break;
            case 2 :
                // CommonLexer.g:1:13: INT 
                {
                $this->mINT(); 

                }
                break;
            case 3 :
                // CommonLexer.g:1:17: FLOAT 
                {
                $this->mFLOAT(); 

                }
                break;
            case 4 :
                // CommonLexer.g:1:23: CHAR 
                {
                $this->mCHAR(); 

                }
                break;
            case 5 :
                // CommonLexer.g:1:28: STRING 
                {
                $this->mSTRING(); 

                }
                break;
            case 6 :
                // CommonLexer.g:1:35: COMMENT 
                {
                $this->mCOMMENT(); 

                }
                break;
            case 7 :
                // CommonLexer.g:1:43: LINE_COMMENT 
                {
                $this->mLINE_COMMENT(); 

                }
                break;
            case 8 :
                // CommonLexer.g:1:56: WS 
                {
                $this->mWS(); 

                }
                break;

        }

    }



}
?>