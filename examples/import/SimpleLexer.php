<?php
// $ANTLR 3.1.3 Mar 17, 2009 19:23:44 Simple__.g 2009-05-05 23:09:20


# for convenience in actions
if (!defined('HIDDEN')) define('HIDDEN', BaseRecognizer::$HIDDEN);

      
function SimpleLexer_DFA1_static(){
    $eotS =
        "\x1\xff\x1\x5\x1\xff\x1\x5\x2\xff\x3\x5\x1\xb\x1\x5\x1\xff\x2\x5".
    "\x1\xf\x1\xff";
    $eofS =
        "\x10\xff";
    $minS =
        "\x1\x9\x1\x72\x1\xff\x1\x61\x2\xff\x1\x6f\x1\x72\x1\x67\x1\x30".
    "\x1\x72\x1\xff\x1\x61\x1\x6d\x1\x30\x1\xff";
    $maxS =
        "\x1\x7a\x1\x72\x1\xff\x1\x61\x2\xff\x1\x6f\x1\x72\x1\x67\x1\x7a".
    "\x1\x72\x1\xff\x1\x61\x1\x6d\x1\x7a\x1\xff";
    $acceptS =
        "\x2\xff\x1\x2\x1\xff\x1\x4\x1\x5\x5\xff\x1\x3\x3\xff\x1\x1";
    $specialS =
        "\x10\xff}>";
    $transitionS = array(
        "\x2\x5\x2\xff\x1\x5\x12\xff\x1\x5\x1\xff\x1\x5\x4\xff\x1\x5\x6".
        "\xff\xc\x5\x1\xff\x1\x2\x1\xff\x1\x4\x3\xff\x1a\x5\x4\xff\x1\x5".
        "\x1\xff\xf\x5\x1\x1\x5\x5\x1\x3\x4\x5",
        "\x1\x6",
        "",
        "\x1\x7",
        "",
        "",
        "\x1\x8",
        "\x1\x9",
        "\x1\xa",
        "\xa\x5\x7\xff\x1a\x5\x4\xff\x1\x5\x1\xff\x1a\x5",
        "\x1\xc",
        "",
        "\x1\xd",
        "\x1\xe",
        "\xa\x5\x7\xff\x1a\x5\x4\xff\x1\x5\x1\xff\x1a\x5",
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
$SimpleLexer_DFA1 = SimpleLexer_DFA1_static();

class SimpleLexer_DFA1 extends DFA {

    public function __construct($recognizer) {
        global $SimpleLexer_DFA1;
        $DFA = $SimpleLexer_DFA1;
        $this->recognizer = $recognizer;
        $this->decisionNumber = 1;
        $this->eot = $DFA['eot'];
        $this->eof = $DFA['eof'];
        $this->min = $DFA['min'];
        $this->max = $DFA['max'];
        $this->accept = $DFA['accept'];
        $this->special = $DFA['special'];
        $this->transition = $DFA['transition'];
    }
    public function getDescription() {
        return "1:1: Tokens : ( T__13 | T__14 | T__15 | T__16 | CommonLexer. Tokens );";
    }
}
 

class SimpleLexer extends AntlrLexer {
    static $WS=12;
    static $T__16=16;
    static $T__15=15;
    static $LINE_COMMENT=11;
    static $T__14=14;
    static $T__13=13;
    static $ESC=7;
    static $CHAR=8;
    static $INT=5;
    static $FLOAT=6;
    static $ID=4;
    static $COMMENT=10;
    static $Tokens=17;
    static $EOF=-1;
    static $STRING=9;

    // delegates
    /**
    * @param Simple_CommonLexer $gCommonLexer
    */
    public $gCommonLexer;
    // delegators

    function __construct($input, $state=null){
        parent::__construct($input,$state);
        $this->gCommonLexer = new Simple_CommonLexer($input, $state, $this);
        
            $this->dfa1 = new SimpleLexer_DFA1($this);
    }
    function getGrammarFileName() { return "Simple__.g"; }

    // $ANTLR start "T__13"
    function mT__13(){
        try {
            $_type = SimpleLexer::$T__13;
            $_channel = SimpleLexer::$DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:7:7: ( 'program' ) 
            // Simple__.g:7:9: 'program' 
            {
            $this->matchString("program"); 


            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "T__13"

    // $ANTLR start "T__14"
    function mT__14(){
        try {
            $_type = SimpleLexer::$T__14;
            $_channel = SimpleLexer::$DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:8:7: ( ';' ) 
            // Simple__.g:8:9: ';' 
            {
            $this->matchChar(59); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "T__14"

    // $ANTLR start "T__15"
    function mT__15(){
        try {
            $_type = SimpleLexer::$T__15;
            $_channel = SimpleLexer::$DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:9:7: ( 'var' ) 
            // Simple__.g:9:9: 'var' 
            {
            $this->matchString("var"); 


            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "T__15"

    // $ANTLR start "T__16"
    function mT__16(){
        try {
            $_type = SimpleLexer::$T__16;
            $_channel = SimpleLexer::$DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:10:7: ( '=' ) 
            // Simple__.g:10:9: '=' 
            {
            $this->matchChar(61); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "T__16"

    function mTokens(){
        // Simple__.g:1:8: ( T__13 | T__14 | T__15 | T__16 | CommonLexer. Tokens ) 
        $alt1=5;
        $alt1 = $this->dfa1->predict($this->input);
        switch ($alt1) {
            case 1 :
                // Simple__.g:1:10: T__13 
                {
                $this->mT__13(); 

                }
                break;
            case 2 :
                // Simple__.g:1:16: T__14 
                {
                $this->mT__14(); 

                }
                break;
            case 3 :
                // Simple__.g:1:22: T__15 
                {
                $this->mT__15(); 

                }
                break;
            case 4 :
                // Simple__.g:1:28: T__16 
                {
                $this->mT__16(); 

                }
                break;
            case 5 :
                // Simple__.g:1:34: CommonLexer. Tokens 
                {
                $this->gCommonLexer->mTokens(); 

                }
                break;

        }

    }



}
?>