// $ANTLR 3.1.3 ??? 19, 2009 17:38:18 Simple__.g 2009-04-19 17:48:53

import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

public class SimpleLexer extends Lexer {
    public static final int WS=12;
    public static final int T__16=16;
    public static final int T__15=15;
    public static final int LINE_COMMENT=11;
    public static final int T__14=14;
    public static final int T__13=13;
    public static final int ESC=7;
    public static final int CHAR=8;
    public static final int INT=5;
    public static final int FLOAT=6;
    public static final int ID=4;
    public static final int COMMENT=10;
    public static final int Tokens=17;
    public static final int EOF=-1;
    public static final int STRING=9;

    // delegates
    public Simple_CommonLexer gCommonLexer;
    // delegators

    public SimpleLexer() {;} 
    public SimpleLexer(CharStream input) {
        this(input, new RecognizerSharedState());
    }
    public SimpleLexer(CharStream input, RecognizerSharedState state) {
        super(input,state);
        gCommonLexer = new Simple_CommonLexer(input, state, this);        
    }
    public String getGrammarFileName() { return "Simple__.g"; }

    // $ANTLR start "T__13"
    public final void mT__13() throws RecognitionException {
        try {
            int _type = T__13;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:3:7: ( 'program' )
            // Simple__.g:3:9: 'program'
            {
            match("program"); 


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        }
    }
    // $ANTLR end "T__13"

    // $ANTLR start "T__14"
    public final void mT__14() throws RecognitionException {
        try {
            int _type = T__14;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:4:7: ( ';' )
            // Simple__.g:4:9: ';'
            {
            match(';'); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        }
    }
    // $ANTLR end "T__14"

    // $ANTLR start "T__15"
    public final void mT__15() throws RecognitionException {
        try {
            int _type = T__15;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:5:7: ( 'var' )
            // Simple__.g:5:9: 'var'
            {
            match("var"); 


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        }
    }
    // $ANTLR end "T__15"

    // $ANTLR start "T__16"
    public final void mT__16() throws RecognitionException {
        try {
            int _type = T__16;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // Simple__.g:6:7: ( '=' )
            // Simple__.g:6:9: '='
            {
            match('='); 

            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        }
    }
    // $ANTLR end "T__16"

    public void mTokens() throws RecognitionException {
        // Simple__.g:1:8: ( T__13 | T__14 | T__15 | T__16 | CommonLexer. Tokens )
        int alt1=5;
        alt1 = dfa1.predict(input);
        //System.out.print("predict: "+alt1+"\n");
        switch (alt1) {
            case 1 :
                // Simple__.g:1:10: T__13
                {
                mT__13(); 

                }
                break;
            case 2 :
                // Simple__.g:1:16: T__14
                {
                mT__14(); 

                }
                break;
            case 3 :
                // Simple__.g:1:22: T__15
                {
                mT__15(); 

                }
                break;
            case 4 :
                // Simple__.g:1:28: T__16
                {
                mT__16(); 

                }
                break;
            case 5 :
                // Simple__.g:1:34: CommonLexer. Tokens
                {
                gCommonLexer.mTokens(); 

                }
                break;

        }

    }


    protected DFA1 dfa1 = new DFA1(this);
    static final String DFA1_eotS =
        "\1\uffff\1\5\1\uffff\1\5\2\uffff\3\5\1\13\1\5\1\uffff\2\5\1\17"+
        "\1\uffff";
    static final String DFA1_eofS =
        "\20\uffff";
    static final String DFA1_minS =
        "\1\11\1\162\1\uffff\1\141\2\uffff\1\157\1\162\1\147\1\60\1\162"+
        "\1\uffff\1\141\1\155\1\60\1\uffff";
    static final String DFA1_maxS =
        "\1\172\1\162\1\uffff\1\141\2\uffff\1\157\1\162\1\147\1\172\1\162"+
        "\1\uffff\1\141\1\155\1\172\1\uffff";
    static final String DFA1_acceptS =
        "\2\uffff\1\2\1\uffff\1\4\1\5\5\uffff\1\3\3\uffff\1\1";
    static final String DFA1_specialS =
        "\20\uffff}>";
    static final String[] DFA1_transitionS = {
            "\2\5\2\uffff\1\5\22\uffff\1\5\1\uffff\1\5\4\uffff\1\5\6\uffff"+
            "\14\5\1\uffff\1\2\1\uffff\1\4\3\uffff\32\5\4\uffff\1\5\1\uffff"+
            "\17\5\1\1\5\5\1\3\4\5",
            "\1\6",
            "",
            "\1\7",
            "",
            "",
            "\1\10",
            "\1\11",
            "\1\12",
            "\12\5\7\uffff\32\5\4\uffff\1\5\1\uffff\32\5",
            "\1\14",
            "",
            "\1\15",
            "\1\16",
            "\12\5\7\uffff\32\5\4\uffff\1\5\1\uffff\32\5",
            ""
    };

    static final short[] DFA1_eot = DFA.unpackEncodedString(DFA1_eotS);
    static final short[] DFA1_eof = DFA.unpackEncodedString(DFA1_eofS);
    static final char[] DFA1_min = DFA.unpackEncodedStringToUnsignedChars(DFA1_minS);
    static final char[] DFA1_max = DFA.unpackEncodedStringToUnsignedChars(DFA1_maxS);
    static final short[] DFA1_accept = DFA.unpackEncodedString(DFA1_acceptS);
    static final short[] DFA1_special = DFA.unpackEncodedString(DFA1_specialS);
    static final short[][] DFA1_transition;

    static {
        int numStates = DFA1_transitionS.length;
        DFA1_transition = new short[numStates][];
        for (int i=0; i<numStates; i++) {
            DFA1_transition[i] = DFA.unpackEncodedString(DFA1_transitionS[i]);
        }
    }

    class DFA1 extends DFA {

        public DFA1(BaseRecognizer recognizer) {
            this.recognizer = recognizer;
            this.decisionNumber = 1;
            this.eot = DFA1_eot;
            this.eof = DFA1_eof;
            this.min = DFA1_min;
            this.max = DFA1_max;
            this.accept = DFA1_accept;
            this.special = DFA1_special;
            this.transition = DFA1_transition;
        }
        public String getDescription() {
            return "1:1: Tokens : ( T__13 | T__14 | T__15 | T__16 | CommonLexer. Tokens );";
        }
    }
 

}