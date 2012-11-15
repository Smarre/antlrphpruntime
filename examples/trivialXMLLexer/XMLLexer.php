<?php
// $ANTLR 3.1.3 ??? 06, 2009 18:28:01 XMLLexer.g 2009-05-06 18:48:12


# for convenience in actions
if (!defined('HIDDEN')) define('HIDDEN', BaseRecognizer::$HIDDEN);

 
function XMLLexer_DFA6_static(){
    $eotS =
        "\x1\xff\x1\xb\x1\xc\x1\x9\x1\xe\x2\x9\x1\x14\x1\x16\x4\xff\x1\x18".
    "\x1\xff\x1\x9\x1\x1a\x1\xff\x1\x9\x1\x1a\x1\xff\x1\x14\x8\xff";
    $eofS =
        "\x1e\xff";
    $minS =
        "\x1\x0\x1\x2f\x1\x0\x1\x3e\x5\x0\x3\xff\x5\x0\x1\xff\x5\x0\x1\xff".
    "\x1\x0\x1\xff\x1\x0\x3\xff";
    $maxS =
        "\x1\xff\x1\x2f\x1\xff\x1\x3e\x5\xff\x3\xff\x1\x0\x1\xff\x1\x0\x2".
    "\xff\x1\xff\x2\xff\x1\x0\x1\xff\x1\x0\x1\xff\x1\x0\x1\xff\x1\x0\x3\xff";
    $acceptS =
        "\x9\xff\x1\x7\x1\x2\x1\x1\x5\xff\x1\x6\x5\xff\x1\x3\x1\xff\x1\x5".
    "\x1\xff\x1\x8\x1\x9\x1\x4";
    $specialS =
        "\x1\xd\x1\xff\x1\x1\x1\x7\x1\x13\x1\xf\x1\xb\x1\x12\x1\x0\x3\xff".
    "\x1\x4\x1\x10\x1\x9\x1\xc\x1\xe\x1\xff\x1\x3\x1\x11\x1\x8\x1\x2\x1\x6".
    "\x1\xff\x1\x5\x1\xff\x1\xa\x3\xff}>";
    $transitionS = array(
        "\x9\x9\x2\x8\x1\x9\x2\x8\x12\x9\x1\x8\x1\x9\x1\x5\x4\x9\x1\x6\x7".
        "\x9\x1\x3\xa\x9\x1\x7\x1\x9\x1\x1\x1\x4\x1\x2\x2\x9\x1a\x7\x4\x9".
        "\x1\x7\x1\x9\x1a\x7\x85\x9",
        "\x1\xa",
        "\x3c\x9\x1\xff\xc3\x9",
        "\x1\xd",
        "\x3c\x9\x1\xff\xc3\x9",
        "\x22\xf\x1\x10\x19\xf\x1\x11\xc3\xf",
        "\x27\x12\x1\x13\x14\x12\x1\x11\xc3\x12",
        "\x2d\x9\x2\x15\x1\x9\xb\x15\x1\x9\x1\xff\x4\x9\x1a\x15\x4\x9\x1".
        "\x15\x1\x9\x1a\x15\x85\x9",
        "\x3c\x9\x1\xff\xc3\x9",
        "",
        "",
        "",
        "\x1\xff",
        "\x3c\x9\x1\xff\xc3\x9",
        "\x1\xff",
        "\x22\xf\x1\x10\x19\xf\x1\x11\xc3\xf",
        "\x3c\x9\x1\xff\xc3\x9",
        "",
        "\x27\x12\x1\x13\x14\x12\x1\x11\xc3\x12",
        "\x3c\x9\x1\xff\xc3\x9",
        "\x1\xff",
        "\x2d\x9\x2\x15\x1\x9\xb\x15\x1\x9\x1\xff\x4\x9\x1a\x15\x4\x9\x1".
        "\x15\x1\x9\x1a\x15\x85\x9",
        "\x1\xff",
        "",
        "\x1\xff",
        "",
        "\x1\xff",
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
$XMLLexer_DFA6 = XMLLexer_DFA6_static();

class XMLLexer_DFA6 extends DFA {

    public function __construct($recognizer) {
        global $XMLLexer_DFA6;
        $DFA = $XMLLexer_DFA6;
        $this->recognizer = $recognizer;
        $this->decisionNumber = 6;
        $this->eot = $DFA['eot'];
        $this->eof = $DFA['eof'];
        $this->min = $DFA['min'];
        $this->max = $DFA['max'];
        $this->accept = $DFA['accept'];
        $this->special = $DFA['special'];
        $this->transition = $DFA['transition'];
    }
    public function getDescription() {
        return "1:1: Tokens : ( TAG_START_OPEN | TAG_END_OPEN | TAG_CLOSE | TAG_EMPTY_CLOSE | ATTR_EQ | ATTR_VALUE | PCDATA | GENERIC_ID | WS );";
    }
    public function specialStateTransition($s, IntStream $_input) {
        $input = $_input;
    	$_s = $s;
        switch ( $s ) {
                case 0 : 
                    $LA6_8 = $input->LA(1);

                     
                    $index6_8 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_8>=$this->getToken('0') && $LA6_8<=$this->getToken('59'))||($LA6_8>=$this->getToken('61') && $LA6_8<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 22;

                     
                    $input->seek($index6_8);
                    if ( $s>=0 ) return $s;
                    break;
                case 1 : 
                    $LA6_2 = $input->LA(1);

                     
                    $index6_2 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_2>=$this->getToken('0') && $LA6_2<=$this->getToken('59'))||($LA6_2>=$this->getToken('61') && $LA6_2<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 12;

                     
                    $input->seek($index6_2);
                    if ( $s>=0 ) return $s;
                    break;
                case 2 : 
                    $LA6_21 = $input->LA(1);

                     
                    $index6_21 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_21>=$this->getToken('45') && $LA6_21<=$this->getToken('46'))||($LA6_21>=$this->getToken('48') && $LA6_21<=$this->getToken('58'))||($LA6_21>=$this->getToken('65') && $LA6_21<=$this->getToken('90'))||$LA6_21==$this->getToken('95')||($LA6_21>=$this->getToken('97') && $LA6_21<=$this->getToken('122'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 21;}

                    else if ( (($LA6_21>=$this->getToken('0') && $LA6_21<=$this->getToken('44'))||$LA6_21==$this->getToken('47')||$LA6_21==$this->getToken('59')||($LA6_21>=$this->getToken('61') && $LA6_21<=$this->getToken('64'))||($LA6_21>=$this->getToken('91') && $LA6_21<=$this->getToken('94'))||$LA6_21==$this->getToken('96')||($LA6_21>=$this->getToken('123') && $LA6_21<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 20;

                     
                    $input->seek($index6_21);
                    if ( $s>=0 ) return $s;
                    break;
                case 3 : 
                    $LA6_18 = $input->LA(1);

                     
                    $index6_18 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( ($LA6_18==$this->getToken('39')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 19;}

                    else if ( (($LA6_18>=$this->getToken('0') && $LA6_18<=$this->getToken('38'))||($LA6_18>=$this->getToken('40') && $LA6_18<=$this->getToken('59'))||($LA6_18>=$this->getToken('61') && $LA6_18<=$this->getToken('65535'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 18;}

                    else if ( ($LA6_18==$this->getToken('60')) && (( XMLLexer::$tagMode ))) {$s = 17;}

                    else $s = 9;

                     
                    $input->seek($index6_18);
                    if ( $s>=0 ) return $s;
                    break;
                case 4 : 
                    $LA6_12 = $input->LA(1);

                     
                    $index6_12 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (( XMLLexer::$tagMode )) ) {$s = 23;}

                    else if ( (( !( XMLLexer::$tagMode ) )) ) {$s = 9;}

                     
                    $input->seek($index6_12);
                    if ( $s>=0 ) return $s;
                    break;
                case 5 : 
                    $LA6_24 = $input->LA(1);

                     
                    $index6_24 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (( XMLLexer::$tagMode )) ) {$s = 29;}

                    else if ( (( !( XMLLexer::$tagMode ) )) ) {$s = 9;}

                     
                    $input->seek($index6_24);
                    if ( $s>=0 ) return $s;
                    break;
                case 6 : 
                    $LA6_22 = $input->LA(1);

                     
                    $index6_22 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (( !( XMLLexer::$tagMode ) )) ) {$s = 9;}

                    else if ( (( XMLLexer::$tagMode )) ) {$s = 28;}

                     
                    $input->seek($index6_22);
                    if ( $s>=0 ) return $s;
                    break;
                case 7 : 
                    $LA6_3 = $input->LA(1);

                     
                    $index6_3 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( ($LA6_3==$this->getToken('62')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 13;}

                    else $s = 9;

                     
                    $input->seek($index6_3);
                    if ( $s>=0 ) return $s;
                    break;
                case 8 : 
                    $LA6_20 = $input->LA(1);

                     
                    $index6_20 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (( !( XMLLexer::$tagMode ) )) ) {$s = 9;}

                    else if ( (( XMLLexer::$tagMode )) ) {$s = 27;}

                     
                    $input->seek($index6_20);
                    if ( $s>=0 ) return $s;
                    break;
                case 9 : 
                    $LA6_14 = $input->LA(1);

                     
                    $index6_14 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (( XMLLexer::$tagMode )) ) {$s = 25;}

                    else if ( (( !( XMLLexer::$tagMode ) )) ) {$s = 9;}

                     
                    $input->seek($index6_14);
                    if ( $s>=0 ) return $s;
                    break;
                case 10 : 
                    $LA6_26 = $input->LA(1);

                     
                    $index6_26 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (( XMLLexer::$tagMode )) ) {$s = 17;}

                    else if ( (( !( XMLLexer::$tagMode ) )) ) {$s = 9;}

                     
                    $input->seek($index6_26);
                    if ( $s>=0 ) return $s;
                    break;
                case 11 : 
                    $LA6_6 = $input->LA(1);

                     
                    $index6_6 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_6>=$this->getToken('0') && $LA6_6<=$this->getToken('38'))||($LA6_6>=$this->getToken('40') && $LA6_6<=$this->getToken('59'))||($LA6_6>=$this->getToken('61') && $LA6_6<=$this->getToken('65535'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 18;}

                    else if ( ($LA6_6==$this->getToken('39')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 19;}

                    else if ( ($LA6_6==$this->getToken('60')) && (( XMLLexer::$tagMode ))) {$s = 17;}

                    else $s = 9;

                     
                    $input->seek($index6_6);
                    if ( $s>=0 ) return $s;
                    break;
                case 12 : 
                    $LA6_15 = $input->LA(1);

                     
                    $index6_15 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( ($LA6_15==$this->getToken('34')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 16;}

                    else if ( (($LA6_15>=$this->getToken('0') && $LA6_15<=$this->getToken('33'))||($LA6_15>=$this->getToken('35') && $LA6_15<=$this->getToken('59'))||($LA6_15>=$this->getToken('61') && $LA6_15<=$this->getToken('65535'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 15;}

                    else if ( ($LA6_15==$this->getToken('60')) && (( XMLLexer::$tagMode ))) {$s = 17;}

                    else $s = 9;

                     
                    $input->seek($index6_15);
                    if ( $s>=0 ) return $s;
                    break;
                case 13 : 
                    $LA6_0 = $input->LA(1);

                     
                    $index6_0 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( ($LA6_0==$this->getToken('60')) ) {$s = 1;}

                    else if ( ($LA6_0==$this->getToken('62')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 2;}

                    else if ( ($LA6_0==$this->getToken('47')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 3;}

                    else if ( ($LA6_0==$this->getToken('61')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 4;}

                    else if ( ($LA6_0==$this->getToken('34')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 5;}

                    else if ( ($LA6_0==$this->getToken('39')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 6;}

                    else if ( ($LA6_0==$this->getToken('58')||($LA6_0>=$this->getToken('65') && $LA6_0<=$this->getToken('90'))||$LA6_0==$this->getToken('95')||($LA6_0>=$this->getToken('97') && $LA6_0<=$this->getToken('122'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 7;}

                    else if ( (($LA6_0>=$this->getToken('9') && $LA6_0<=$this->getToken('10'))||($LA6_0>=$this->getToken('12') && $LA6_0<=$this->getToken('13'))||$LA6_0==$this->getToken('32')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 8;}

                    else if ( (($LA6_0>=$this->getToken('0') && $LA6_0<=$this->getToken('8'))||$LA6_0==$this->getToken('11')||($LA6_0>=$this->getToken('14') && $LA6_0<=$this->getToken('31'))||$LA6_0==$this->getToken('33')||($LA6_0>=$this->getToken('35') && $LA6_0<=$this->getToken('38'))||($LA6_0>=$this->getToken('40') && $LA6_0<=$this->getToken('46'))||($LA6_0>=$this->getToken('48') && $LA6_0<=$this->getToken('57'))||$LA6_0==$this->getToken('59')||($LA6_0>=$this->getToken('63') && $LA6_0<=$this->getToken('64'))||($LA6_0>=$this->getToken('91') && $LA6_0<=$this->getToken('94'))||$LA6_0==$this->getToken('96')||($LA6_0>=$this->getToken('123') && $LA6_0<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                     
                    $input->seek($index6_0);
                    if ( $s>=0 ) return $s;
                    break;
                case 14 : 
                    $LA6_16 = $input->LA(1);

                     
                    $index6_16 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_16>=$this->getToken('0') && $LA6_16<=$this->getToken('59'))||($LA6_16>=$this->getToken('61') && $LA6_16<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 26;

                     
                    $input->seek($index6_16);
                    if ( $s>=0 ) return $s;
                    break;
                case 15 : 
                    $LA6_5 = $input->LA(1);

                     
                    $index6_5 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_5>=$this->getToken('0') && $LA6_5<=$this->getToken('33'))||($LA6_5>=$this->getToken('35') && $LA6_5<=$this->getToken('59'))||($LA6_5>=$this->getToken('61') && $LA6_5<=$this->getToken('65535'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 15;}

                    else if ( ($LA6_5==$this->getToken('34')) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 16;}

                    else if ( ($LA6_5==$this->getToken('60')) && (( XMLLexer::$tagMode ))) {$s = 17;}

                    else $s = 9;

                     
                    $input->seek($index6_5);
                    if ( $s>=0 ) return $s;
                    break;
                case 16 : 
                    $LA6_13 = $input->LA(1);

                     
                    $index6_13 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_13>=$this->getToken('0') && $LA6_13<=$this->getToken('59'))||($LA6_13>=$this->getToken('61') && $LA6_13<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 24;

                     
                    $input->seek($index6_13);
                    if ( $s>=0 ) return $s;
                    break;
                case 17 : 
                    $LA6_19 = $input->LA(1);

                     
                    $index6_19 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_19>=$this->getToken('0') && $LA6_19<=$this->getToken('59'))||($LA6_19>=$this->getToken('61') && $LA6_19<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 26;

                     
                    $input->seek($index6_19);
                    if ( $s>=0 ) return $s;
                    break;
                case 18 : 
                    $LA6_7 = $input->LA(1);

                     
                    $index6_7 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_7>=$this->getToken('45') && $LA6_7<=$this->getToken('46'))||($LA6_7>=$this->getToken('48') && $LA6_7<=$this->getToken('58'))||($LA6_7>=$this->getToken('65') && $LA6_7<=$this->getToken('90'))||$LA6_7==$this->getToken('95')||($LA6_7>=$this->getToken('97') && $LA6_7<=$this->getToken('122'))) && ((( XMLLexer::$tagMode )||( !( XMLLexer::$tagMode ) )))) {$s = 21;}

                    else if ( (($LA6_7>=$this->getToken('0') && $LA6_7<=$this->getToken('44'))||$LA6_7==$this->getToken('47')||$LA6_7==$this->getToken('59')||($LA6_7>=$this->getToken('61') && $LA6_7<=$this->getToken('64'))||($LA6_7>=$this->getToken('91') && $LA6_7<=$this->getToken('94'))||$LA6_7==$this->getToken('96')||($LA6_7>=$this->getToken('123') && $LA6_7<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 20;

                     
                    $input->seek($index6_7);
                    if ( $s>=0 ) return $s;
                    break;
                case 19 : 
                    $LA6_4 = $input->LA(1);

                     
                    $index6_4 = $input->index();
                    $input->rewind();
                    $s = -1;
                    if ( (($LA6_4>=$this->getToken('0') && $LA6_4<=$this->getToken('59'))||($LA6_4>=$this->getToken('61') && $LA6_4<=$this->getToken('65535'))) && (( !( XMLLexer::$tagMode ) ))) {$s = 9;}

                    else $s = 14;

                     
                    $input->seek($index6_4);
                    if ( $s>=0 ) return $s;
                    break;
        }
        $nvae =
            new NoViableAltException($this->getDescription(), 6, $_s, $input);
        $this->error($nvae);
        throw $nvae;        
    }
}
      

class XMLLexer extends AntlrLexer {
    static $PCDATA=10;
    static $TAG_EMPTY_CLOSE=7;
    static $WS=15;
    static $TAG_CLOSE=6;
    static $LETTER=11;
    static $GENERIC_ID=13;
    static $ATTR_EQ=8;
    static $ATTR_VALUE=9;
    static $TAG_END_OPEN=5;
    static $DIGIT=14;
    static $EOF=-1;
    static $TAG_START_OPEN=4;
    static $NAMECHAR=12;

        public static $tagMode = false;


    // delegates
    // delegators

    function __construct($input, $state=null){
        parent::__construct($input,$state);

        
            $this->dfa6 = new XMLLexer_DFA6($this);
    }
    function getGrammarFileName() { return "XMLLexer.g"; }

    // $ANTLR start "TAG_START_OPEN"
    function mTAG_START_OPEN(){
        try {
            $_type = XMLLexer::$TAG_START_OPEN;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:14:16: ( '<' ) 
            // XMLLexer.g:14:18: '<' 
            {
            $this->matchChar(60); 
               XMLLexer::$tagMode = true; 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "TAG_START_OPEN"

    // $ANTLR start "TAG_END_OPEN"
    function mTAG_END_OPEN(){
        try {
            $_type = XMLLexer::$TAG_END_OPEN;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:15:14: ( '</' ) 
            // XMLLexer.g:15:16: '</' 
            {
            $this->matchString("</"); 

               XMLLexer::$tagMode = true; 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "TAG_END_OPEN"

    // $ANTLR start "TAG_CLOSE"
    function mTAG_CLOSE(){
        try {
            $_type = XMLLexer::$TAG_CLOSE;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:16:11: ({...}? => '>' ) 
            // XMLLexer.g:16:13: {...}? => '>' 
            {
            if ( !(( XMLLexer::$tagMode )) ) {
                throw new FailedPredicateException($this->input, "TAG_CLOSE", " XMLLexer::\\$tagMode ");
            }
            $this->matchChar(62); 
               XMLLexer::$tagMode = false; 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "TAG_CLOSE"

    // $ANTLR start "TAG_EMPTY_CLOSE"
    function mTAG_EMPTY_CLOSE(){
        try {
            $_type = XMLLexer::$TAG_EMPTY_CLOSE;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:17:17: ({...}? => '/>' ) 
            // XMLLexer.g:17:19: {...}? => '/>' 
            {
            if ( !(( XMLLexer::$tagMode )) ) {
                throw new FailedPredicateException($this->input, "TAG_EMPTY_CLOSE", " XMLLexer::\\$tagMode ");
            }
            $this->matchString("/>"); 

               XMLLexer::$tagMode = false; 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "TAG_EMPTY_CLOSE"

    // $ANTLR start "ATTR_EQ"
    function mATTR_EQ(){
        try {
            $_type = XMLLexer::$ATTR_EQ;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:19:9: ({...}? => '=' ) 
            // XMLLexer.g:19:11: {...}? => '=' 
            {
            if ( !(( XMLLexer::$tagMode )) ) {
                throw new FailedPredicateException($this->input, "ATTR_EQ", " XMLLexer::\\$tagMode ");
            }
            $this->matchChar(61); 

            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "ATTR_EQ"

    // $ANTLR start "ATTR_VALUE"
    function mATTR_VALUE(){
        try {
            $_type = XMLLexer::$ATTR_VALUE;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:21:12: ({...}? => ( '\"' (~ '\"' )* '\"' | '\\'' (~ '\\'' )* '\\'' ) ) 
            // XMLLexer.g:21:14: {...}? => ( '\"' (~ '\"' )* '\"' | '\\'' (~ '\\'' )* '\\'' ) 
            {
            if ( !(( XMLLexer::$tagMode )) ) {
                throw new FailedPredicateException($this->input, "ATTR_VALUE", " XMLLexer::\\$tagMode ");
            }
            // XMLLexer.g:22:9: ( '\"' (~ '\"' )* '\"' | '\\'' (~ '\\'' )* '\\'' ) 
            $alt3=2;
            $LA3_0 = $this->input->LA(1);

            if ( ($LA3_0==$this->getToken('34')) ) {
                $alt3=1;
            }
            else if ( ($LA3_0==$this->getToken('39')) ) {
                $alt3=2;
            }
            else {
                $nvae = new NoViableAltException("", 3, 0, $this->input);

                throw $nvae;
            }
            switch ($alt3) {
                case 1 :
                    // XMLLexer.g:22:11: '\"' (~ '\"' )* '\"' 
                    {
                    $this->matchChar(34); 
                    // XMLLexer.g:22:15: (~ '\"' )* 
                    //loop1:
                    do {
                        $alt1=2;
                        $LA1_0 = $this->input->LA(1);

                        if ( (($LA1_0>=$this->getToken('0') && $LA1_0<=$this->getToken('33'))||($LA1_0>=$this->getToken('35') && $LA1_0<=$this->getToken('65535'))) ) {
                            $alt1=1;
                        }


                        switch ($alt1) {
                    	case 1 :
                    	    // XMLLexer.g:22:16: ~ '\"' 
                    	    {
                    	    if ( ($this->input->LA(1)>=$this->getToken('0') && $this->input->LA(1)<=$this->getToken('33'))||($this->input->LA(1)>=$this->getToken('35') && $this->input->LA(1)<=$this->getToken('65535')) ) {
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

                    $this->matchChar(34); 

                    }
                    break;
                case 2 :
                    // XMLLexer.g:23:11: '\\'' (~ '\\'' )* '\\'' 
                    {
                    $this->matchChar(39); 
                    // XMLLexer.g:23:16: (~ '\\'' )* 
                    //loop2:
                    do {
                        $alt2=2;
                        $LA2_0 = $this->input->LA(1);

                        if ( (($LA2_0>=$this->getToken('0') && $LA2_0<=$this->getToken('38'))||($LA2_0>=$this->getToken('40') && $LA2_0<=$this->getToken('65535'))) ) {
                            $alt2=1;
                        }


                        switch ($alt2) {
                    	case 1 :
                    	    // XMLLexer.g:23:17: ~ '\\'' 
                    	    {
                    	    if ( ($this->input->LA(1)>=$this->getToken('0') && $this->input->LA(1)<=$this->getToken('38'))||($this->input->LA(1)>=$this->getToken('40') && $this->input->LA(1)<=$this->getToken('65535')) ) {
                    	        $this->input->consume();

                    	    }
                    	    else {
                    	        $mse = new MismatchedSetException(null,$this->input);
                    	        $this->recover($mse);
                    	        throw $mse;}


                    	    }
                    	    break;

                    	default :
                    	    break 2;//loop2;
                        }
                    } while (true);

                    $this->matchChar(39); 

                    }
                    break;

            }


            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "ATTR_VALUE"

    // $ANTLR start "PCDATA"
    function mPCDATA(){
        try {
            $_type = XMLLexer::$PCDATA;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:27:8: ({...}? => (~ '<' )+ ) 
            // XMLLexer.g:27:10: {...}? => (~ '<' )+ 
            {
            if ( !(( !( XMLLexer::$tagMode ) )) ) {
                throw new FailedPredicateException($this->input, "PCDATA", " !( XMLLexer::\\$tagMode ) ");
            }
            // XMLLexer.g:27:42: (~ '<' )+ 
            $cnt4=0;
            //loop4:
            do {
                $alt4=2;
                $LA4_0 = $this->input->LA(1);

                if ( (($LA4_0>=$this->getToken('0') && $LA4_0<=$this->getToken('59'))||($LA4_0>=$this->getToken('61') && $LA4_0<=$this->getToken('65535'))) ) {
                    $alt4=1;
                }


                switch ($alt4) {
            	case 1 :
            	    // XMLLexer.g:27:43: ~ '<' 
            	    {
            	    if ( ($this->input->LA(1)>=$this->getToken('0') && $this->input->LA(1)<=$this->getToken('59'))||($this->input->LA(1)>=$this->getToken('61') && $this->input->LA(1)<=$this->getToken('65535')) ) {
            	        $this->input->consume();

            	    }
            	    else {
            	        $mse = new MismatchedSetException(null,$this->input);
            	        $this->recover($mse);
            	        throw $mse;}


            	    }
            	    break;

            	default :
            	    if ( $cnt4 >= 1 ) break 2;//loop4;
                        $eee =
                            new EarlyExitException(4, $this->input);
                        throw $eee;
                }
                $cnt4++;
            } while (true);


            }

            $this->state->type = $_type;
            $this->state->channel = $_channel;
        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "PCDATA"

    // $ANTLR start "GENERIC_ID"
    function mGENERIC_ID(){
        try {
            $_type = XMLLexer::$GENERIC_ID;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:30:5: ({...}? => ( LETTER | '_' | ':' ) ( NAMECHAR )* ) 
            // XMLLexer.g:30:7: {...}? => ( LETTER | '_' | ':' ) ( NAMECHAR )* 
            {
            if ( !(( XMLLexer::$tagMode )) ) {
                throw new FailedPredicateException($this->input, "GENERIC_ID", " XMLLexer::\\$tagMode ");
            }
            if ( $this->input->LA(1)==$this->getToken('58')||($this->input->LA(1)>=$this->getToken('65') && $this->input->LA(1)<=$this->getToken('90'))||$this->input->LA(1)==$this->getToken('95')||($this->input->LA(1)>=$this->getToken('97') && $this->input->LA(1)<=$this->getToken('122')) ) {
                $this->input->consume();

            }
            else {
                $mse = new MismatchedSetException(null,$this->input);
                $this->recover($mse);
                throw $mse;}

            // XMLLexer.g:31:29: ( NAMECHAR )* 
            //loop5:
            do {
                $alt5=2;
                $LA5_0 = $this->input->LA(1);

                if ( (($LA5_0>=$this->getToken('45') && $LA5_0<=$this->getToken('46'))||($LA5_0>=$this->getToken('48') && $LA5_0<=$this->getToken('58'))||($LA5_0>=$this->getToken('65') && $LA5_0<=$this->getToken('90'))||$LA5_0==$this->getToken('95')||($LA5_0>=$this->getToken('97') && $LA5_0<=$this->getToken('122'))) ) {
                    $alt5=1;
                }


                switch ($alt5) {
            	case 1 :
            	    // XMLLexer.g:31:30: NAMECHAR 
            	    {
            	    $this->mNAMECHAR(); 

            	    }
            	    break;

            	default :
            	    break 2;//loop5;
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
    // $ANTLR end "GENERIC_ID"

    // $ANTLR start "NAMECHAR"
    function mNAMECHAR(){
        try {
            // XMLLexer.g:35:5: ( LETTER | DIGIT | '.' | '-' | '_' | ':' ) 
            // XMLLexer.g: 
            {
            if ( ($this->input->LA(1)>=$this->getToken('45') && $this->input->LA(1)<=$this->getToken('46'))||($this->input->LA(1)>=$this->getToken('48') && $this->input->LA(1)<=$this->getToken('58'))||($this->input->LA(1)>=$this->getToken('65') && $this->input->LA(1)<=$this->getToken('90'))||$this->input->LA(1)==$this->getToken('95')||($this->input->LA(1)>=$this->getToken('97') && $this->input->LA(1)<=$this->getToken('122')) ) {
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
    // $ANTLR end "NAMECHAR"

    // $ANTLR start "DIGIT"
    function mDIGIT(){
        try {
            // XMLLexer.g:39:5: ( '0' .. '9' ) 
            // XMLLexer.g:39:10: '0' .. '9' 
            {
            $this->matchRange(48,57); 

            }

        }
        catch(Exception $e){
            throw $e;
        }
    }
    // $ANTLR end "DIGIT"

    // $ANTLR start "LETTER"
    function mLETTER(){
        try {
            // XMLLexer.g:43:5: ( 'a' .. 'z' | 'A' .. 'Z' ) 
            // XMLLexer.g: 
            {
            if ( ($this->input->LA(1)>=$this->getToken('65') && $this->input->LA(1)<=$this->getToken('90'))||($this->input->LA(1)>=$this->getToken('97') && $this->input->LA(1)<=$this->getToken('122')) ) {
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
    // $ANTLR end "LETTER"

    // $ANTLR start "WS"
    function mWS(){
        try {
            $_type = XMLLexer::$WS;
            $_channel = XMLLexer::$DEFAULT_TOKEN_CHANNEL;
            // XMLLexer.g:47:5: ({...}? => ( ' ' | '\\r' | '\\t' | '\\u000C' | '\\n' ) ) 
            // XMLLexer.g:47:8: {...}? => ( ' ' | '\\r' | '\\t' | '\\u000C' | '\\n' ) 
            {
            if ( !(( XMLLexer::$tagMode )) ) {
                throw new FailedPredicateException($this->input, "WS", " XMLLexer::\\$tagMode ");
            }
            if ( ($this->input->LA(1)>=$this->getToken('9') && $this->input->LA(1)<=$this->getToken('10'))||($this->input->LA(1)>=$this->getToken('12') && $this->input->LA(1)<=$this->getToken('13'))||$this->input->LA(1)==$this->getToken('32') ) {
                $this->input->consume();

            }
            else {
                $mse = new MismatchedSetException(null,$this->input);
                $this->recover($mse);
                throw $mse;}

              $_channel=99;

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
        // XMLLexer.g:1:8: ( TAG_START_OPEN | TAG_END_OPEN | TAG_CLOSE | TAG_EMPTY_CLOSE | ATTR_EQ | ATTR_VALUE | PCDATA | GENERIC_ID | WS ) 
        $alt6=9;
        $alt6 = $this->dfa6->predict($this->input);
        switch ($alt6) {
            case 1 :
                // XMLLexer.g:1:10: TAG_START_OPEN 
                {
                $this->mTAG_START_OPEN(); 

                }
                break;
            case 2 :
                // XMLLexer.g:1:25: TAG_END_OPEN 
                {
                $this->mTAG_END_OPEN(); 

                }
                break;
            case 3 :
                // XMLLexer.g:1:38: TAG_CLOSE 
                {
                $this->mTAG_CLOSE(); 

                }
                break;
            case 4 :
                // XMLLexer.g:1:48: TAG_EMPTY_CLOSE 
                {
                $this->mTAG_EMPTY_CLOSE(); 

                }
                break;
            case 5 :
                // XMLLexer.g:1:64: ATTR_EQ 
                {
                $this->mATTR_EQ(); 

                }
                break;
            case 6 :
                // XMLLexer.g:1:72: ATTR_VALUE 
                {
                $this->mATTR_VALUE(); 

                }
                break;
            case 7 :
                // XMLLexer.g:1:83: PCDATA 
                {
                $this->mPCDATA(); 

                }
                break;
            case 8 :
                // XMLLexer.g:1:90: GENERIC_ID 
                {
                $this->mGENERIC_ID(); 

                }
                break;
            case 9 :
                // XMLLexer.g:1:101: WS 
                {
                $this->mWS(); 

                }
                break;

        }

    }



}
?>