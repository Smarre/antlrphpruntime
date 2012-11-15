<?php
// $ANTLR 3.1.3 ??? 05, 2009 23:29:28 Poly.g 2009-05-06 00:14:36


# for convenience in actions
if (!defined('HIDDEN')) define('HIDDEN', BaseRecognizer::$HIDDEN);

      
 

class PolyLexer extends AntlrLexer {
    static $WS=7;
    static $INT=5;
    static $MULT=4;
    static $ID=6;
    static $EOF=-1;
    static $T__9=9;
    static $T__8=8;

    // delegates
    // delegators

    function __construct($input, $state=null){
        parent::__construct($input,$state);

        
    }
    function getGrammarFileName() { return "Poly.g"; }

    // $ANTLR start "T__8"
    function mT__8(){
        try {
            $_type = PolyLexer::$T__8;
            $_channel = PolyLexer::$DEFAULT_TOKEN_CHANNEL;
            // Poly.g:7:6: ( '+' ) 
            // Poly.g:7:8: '+' 
            {
            $this->matchChar(43); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "T__8"

    // $ANTLR start "T__9"
    function mT__9(){
        try {
            $_type = PolyLexer::$T__9;
            $_channel = PolyLexer::$DEFAULT_TOKEN_CHANNEL;
            // Poly.g:8:6: ( '^' ) 
            // Poly.g:8:8: '^' 
            {
            $this->matchChar(94); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "T__9"

    // $ANTLR start "ID"
    function mID(){
        try {
            $_type = PolyLexer::$ID;
            $_channel = PolyLexer::$DEFAULT_TOKEN_CHANNEL;
            // Poly.g:21:4: ( ( 'a' .. 'z' )+ ) 
            // Poly.g:21:6: ( 'a' .. 'z' )+ 
            {
            // Poly.g:21:6: ( 'a' .. 'z' )+ 
            $cnt1=0;
            //loop1:
            do {
                $alt1=2;
                $LA1_0 = $this->input->LA(1);

                if ( (($LA1_0>=$this->getToken('97') && $LA1_0<=$this->getToken('122'))) ) {
                    $alt1=1;
                }


                switch ($alt1) {
            	case 1 :
            	    // Poly.g:21:6: 'a' .. 'z' 
            	    {
            	    $this->matchRange(97,122); 

            	    }
            	    break;

            	default :
            	    if ( $cnt1 >= 1 ) break 2;//loop1;
                        $eee =
                            new EarlyExitException(1, $this->input);
                        throw $eee;
                }
                $cnt1++;
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
            $_type = PolyLexer::$INT;
            $_channel = PolyLexer::$DEFAULT_TOKEN_CHANNEL;
            // Poly.g:23:5: ( ( '0' .. '9' )+ ) 
            // Poly.g:23:7: ( '0' .. '9' )+ 
            {
            // Poly.g:23:7: ( '0' .. '9' )+ 
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
            	    // Poly.g:23:7: '0' .. '9' 
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

    // $ANTLR start "WS"
    function mWS(){
        try {
            $_type = PolyLexer::$WS;
            $_channel = PolyLexer::$DEFAULT_TOKEN_CHANNEL;
            // Poly.g:25:4: ( ( ' ' | '\\t' | '\\r' | '\\n' )+ ) 
            // Poly.g:25:6: ( ' ' | '\\t' | '\\r' | '\\n' )+ 
            {
            // Poly.g:25:6: ( ' ' | '\\t' | '\\r' | '\\n' )+ 
            $cnt3=0;
            //loop3:
            do {
                $alt3=2;
                $LA3_0 = $this->input->LA(1);

                if ( (($LA3_0>=$this->getToken('9') && $LA3_0<=$this->getToken('10'))||$LA3_0==$this->getToken('13')||$LA3_0==$this->getToken('32')) ) {
                    $alt3=1;
                }


                switch ($alt3) {
            	case 1 :
            	    // Poly.g: 
            	    {
            	    if ( ($this->input->LA(1)>=$this->getToken('9') && $this->input->LA(1)<=$this->getToken('10'))||$this->input->LA(1)==13||$this->input->LA(1)==32 ) {
            	        $this->input->consume();

            	    }
            	    else {
            	        $mse = new MismatchedSetException(null,$this->input);
            	        $this->recover($mse);
            	        throw $mse;}


            	    }
            	    break;

            	default :
            	    if ( $cnt3 >= 1 ) break 2;//loop3;
                        $eee =
                            new EarlyExitException(3, $this->input);
                        throw $eee;
                }
                $cnt3++;
            } while (true);

              skip();

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
        // Poly.g:1:8: ( T__8 | T__9 | ID | INT | WS ) 
        $alt4=5;
        $LA4 = $this->input->LA(1);
        if($this->getToken('43')== $LA4)
            {
            $alt4=1;
            }
        else if($this->getToken('94')== $LA4)
            {
            $alt4=2;
            }
        else if($this->getToken('97')== $LA4||$this->getToken('98')== $LA4||$this->getToken('99')== $LA4||$this->getToken('100')== $LA4||$this->getToken('101')== $LA4||$this->getToken('102')== $LA4||$this->getToken('103')== $LA4||$this->getToken('104')== $LA4||$this->getToken('105')== $LA4||$this->getToken('106')== $LA4||$this->getToken('107')== $LA4||$this->getToken('108')== $LA4||$this->getToken('109')== $LA4||$this->getToken('110')== $LA4||$this->getToken('111')== $LA4||$this->getToken('112')== $LA4||$this->getToken('113')== $LA4||$this->getToken('114')== $LA4||$this->getToken('115')== $LA4||$this->getToken('116')== $LA4||$this->getToken('117')== $LA4||$this->getToken('118')== $LA4||$this->getToken('119')== $LA4||$this->getToken('120')== $LA4||$this->getToken('121')== $LA4||$this->getToken('122')== $LA4)
            {
            $alt4=3;
            }
        else if($this->getToken('48')== $LA4||$this->getToken('49')== $LA4||$this->getToken('50')== $LA4||$this->getToken('51')== $LA4||$this->getToken('52')== $LA4||$this->getToken('53')== $LA4||$this->getToken('54')== $LA4||$this->getToken('55')== $LA4||$this->getToken('56')== $LA4||$this->getToken('57')== $LA4)
            {
            $alt4=4;
            }
        else if($this->getToken('9')== $LA4||$this->getToken('10')== $LA4||$this->getToken('13')== $LA4||$this->getToken('32')== $LA4)
            {
            $alt4=5;
            }
        else{
            $nvae =
                new NoViableAltException("", 4, 0, $this->input);

            throw $nvae;
        }

        switch ($alt4) {
            case 1 :
                // Poly.g:1:10: T__8 
                {
                $this->mT__8(); 

                }
                break;
            case 2 :
                // Poly.g:1:15: T__9 
                {
                $this->mT__9(); 

                }
                break;
            case 3 :
                // Poly.g:1:20: ID 
                {
                $this->mID(); 

                }
                break;
            case 4 :
                // Poly.g:1:23: INT 
                {
                $this->mINT(); 

                }
                break;
            case 5 :
                // Poly.g:1:27: WS 
                {
                $this->mWS(); 

                }
                break;

        }

    }



}
?>