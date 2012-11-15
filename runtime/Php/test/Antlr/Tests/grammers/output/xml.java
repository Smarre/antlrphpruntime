// $ANTLR 3.4 C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g 2011-08-28 17:18:34




import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked"})
public class xml extends Lexer {
    public static final int EOF=-1;
    public static final int ATTRIBUTE=4;
    public static final int CDATA=5;
    public static final int COMMENT=6;
    public static final int DOCTYPE=7;
    public static final int DOCUMENT=8;
    public static final int ELEMENT=9;
    public static final int EMPTY_ELEMENT=10;
    public static final int END_TAG=11;
    public static final int GENERIC_ID=12;
    public static final int INTERNAL_DTD=13;
    public static final int LETTER=14;
    public static final int PCDATA=15;
    public static final int PI=16;
    public static final int START_TAG=17;
    public static final int VALUE=18;
    public static final int WS=19;
    public static final int XMLDECL=20;

    // delegates
    // delegators
    public Lexer[] getDelegates() {
        return new Lexer[] {};
    }

    public xml() {} 
    public xml(CharStream input) {
        this(input, new RecognizerSharedState());
    }
    public xml(CharStream input, RecognizerSharedState state) {
        super(input,state);
    }
    public String getGrammarFileName() { return "C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g"; }

    // $ANTLR start "DOCUMENT"
    public final void mDOCUMENT() throws RecognitionException {
        try {
            int _type = DOCUMENT;
            int _channel = DEFAULT_TOKEN_CHANNEL;
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:5: ( ( XMLDECL )? ( WS )? ( DOCTYPE )? ( WS )? ELEMENT ( WS )? )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:8: ( XMLDECL )? ( WS )? ( DOCTYPE )? ( WS )? ELEMENT ( WS )?
            {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:8: ( XMLDECL )?
            int alt1=2;
            int LA1_0 = input.LA(1);

            if ( (LA1_0=='<') ) {
                int LA1_1 = input.LA(2);

                if ( (LA1_1=='?') ) {
                    alt1=1;
                }
            }
            switch (alt1) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:8: XMLDECL
                    {
                    mXMLDECL(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:17: ( WS )?
            int alt2=2;
            int LA2_0 = input.LA(1);

            if ( ((LA2_0 >= '\t' && LA2_0 <= '\n')||LA2_0=='\r'||LA2_0==' ') ) {
                alt2=1;
            }
            switch (alt2) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:17: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:21: ( DOCTYPE )?
            int alt3=2;
            int LA3_0 = input.LA(1);

            if ( (LA3_0=='<') ) {
                int LA3_1 = input.LA(2);

                if ( (LA3_1=='!') ) {
                    alt3=1;
                }
            }
            switch (alt3) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:21: DOCTYPE
                    {
                    mDOCTYPE(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:30: ( WS )?
            int alt4=2;
            int LA4_0 = input.LA(1);

            if ( ((LA4_0 >= '\t' && LA4_0 <= '\n')||LA4_0=='\r'||LA4_0==' ') ) {
                alt4=1;
            }
            switch (alt4) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:30: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            mELEMENT(); 


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:42: ( WS )?
            int alt5=2;
            int LA5_0 = input.LA(1);

            if ( ((LA5_0 >= '\t' && LA5_0 <= '\n')||LA5_0=='\r'||LA5_0==' ') ) {
                alt5=1;
            }
            switch (alt5) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:8:42: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            }

            state.type = _type;
            state.channel = _channel;
        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "DOCUMENT"

    // $ANTLR start "DOCTYPE"
    public final void mDOCTYPE() throws RecognitionException {
        try {
            CommonToken rootElementName=null;
            CommonToken sys1=null;
            CommonToken pub=null;
            CommonToken sys2=null;
            CommonToken dtd=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:12:5: ( '<!DOCTYPE' WS rootElementName= GENERIC_ID WS ( ( 'SYSTEM' WS sys1= VALUE | 'PUBLIC' WS pub= VALUE WS sys2= VALUE ) ( WS )? )? (dtd= INTERNAL_DTD )? '>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:13:9: '<!DOCTYPE' WS rootElementName= GENERIC_ID WS ( ( 'SYSTEM' WS sys1= VALUE | 'PUBLIC' WS pub= VALUE WS sys2= VALUE ) ( WS )? )? (dtd= INTERNAL_DTD )? '>'
            {
            match("<!DOCTYPE"); 



            mWS(); 


            int rootElementNameStart72 = getCharIndex();
            int rootElementNameStartLine72 = getLine();
            int rootElementNameStartCharPos72 = getCharPositionInLine();
            mGENERIC_ID(); 
            rootElementName = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, rootElementNameStart72, getCharIndex()-1);
            rootElementName.setLine(rootElementNameStartLine72);
            rootElementName.setCharPositionInLine(rootElementNameStartCharPos72);


            mWS(); 


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:15:9: ( ( 'SYSTEM' WS sys1= VALUE | 'PUBLIC' WS pub= VALUE WS sys2= VALUE ) ( WS )? )?
            int alt8=2;
            int LA8_0 = input.LA(1);

            if ( (LA8_0=='P'||LA8_0=='S') ) {
                alt8=1;
            }
            switch (alt8) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:16:13: ( 'SYSTEM' WS sys1= VALUE | 'PUBLIC' WS pub= VALUE WS sys2= VALUE ) ( WS )?
                    {
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:16:13: ( 'SYSTEM' WS sys1= VALUE | 'PUBLIC' WS pub= VALUE WS sys2= VALUE )
                    int alt6=2;
                    int LA6_0 = input.LA(1);

                    if ( (LA6_0=='S') ) {
                        alt6=1;
                    }
                    else if ( (LA6_0=='P') ) {
                        alt6=2;
                    }
                    else {
                        NoViableAltException nvae =
                            new NoViableAltException("", 6, 0, input);

                        throw nvae;

                    }
                    switch (alt6) {
                        case 1 :
                            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:16:15: 'SYSTEM' WS sys1= VALUE
                            {
                            match("SYSTEM"); 



                            mWS(); 


                            int sys1Start116 = getCharIndex();
                            int sys1StartLine116 = getLine();
                            int sys1StartCharPos116 = getCharPositionInLine();
                            mVALUE(); 
                            sys1 = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, sys1Start116, getCharIndex()-1);
                            sys1.setLine(sys1StartLine116);
                            sys1.setCharPositionInLine(sys1StartCharPos116);


                            }
                            break;
                        case 2 :
                            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:18:15: 'PUBLIC' WS pub= VALUE WS sys2= VALUE
                            {
                            match("PUBLIC"); 



                            mWS(); 


                            int pubStart155 = getCharIndex();
                            int pubStartLine155 = getLine();
                            int pubStartCharPos155 = getCharPositionInLine();
                            mVALUE(); 
                            pub = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, pubStart155, getCharIndex()-1);
                            pub.setLine(pubStartLine155);
                            pub.setCharPositionInLine(pubStartCharPos155);


                            mWS(); 


                            int sys2Start161 = getCharIndex();
                            int sys2StartLine161 = getLine();
                            int sys2StartCharPos161 = getCharPositionInLine();
                            mVALUE(); 
                            sys2 = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, sys2Start161, getCharIndex()-1);
                            sys2.setLine(sys2StartLine161);
                            sys2.setCharPositionInLine(sys2StartCharPos161);


                            }
                            break;

                    }


                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:20:13: ( WS )?
                    int alt7=2;
                    int LA7_0 = input.LA(1);

                    if ( ((LA7_0 >= '\t' && LA7_0 <= '\n')||LA7_0=='\r'||LA7_0==' ') ) {
                        alt7=1;
                    }
                    switch (alt7) {
                        case 1 :
                            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:20:15: WS
                            {
                            mWS(); 


                            }
                            break;

                    }


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:22:9: (dtd= INTERNAL_DTD )?
            int alt9=2;
            int LA9_0 = input.LA(1);

            if ( (LA9_0=='[') ) {
                alt9=1;
            }
            switch (alt9) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:22:11: dtd= INTERNAL_DTD
                    {
                    int dtdStart219 = getCharIndex();
                    int dtdStartLine219 = getLine();
                    int dtdStartCharPos219 = getCharPositionInLine();
                    mINTERNAL_DTD(); 
                    dtd = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, dtdStart219, getCharIndex()-1);
                    dtd.setLine(dtdStartLine219);
                    dtd.setCharPositionInLine(dtdStartCharPos219);


                    }
                    break;

            }


            match('>'); 

            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "DOCTYPE"

    // $ANTLR start "INTERNAL_DTD"
    public final void mINTERNAL_DTD() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:27:23: ( '[' ( options {greedy=false; } : . )* ']' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:27:25: '[' ( options {greedy=false; } : . )* ']'
            {
            match('['); 

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:27:29: ( options {greedy=false; } : . )*
            loop10:
            do {
                int alt10=2;
                int LA10_0 = input.LA(1);

                if ( (LA10_0==']') ) {
                    alt10=2;
                }
                else if ( ((LA10_0 >= '\u0000' && LA10_0 <= '\\')||(LA10_0 >= '^' && LA10_0 <= '\uFFFF')) ) {
                    alt10=1;
                }


                switch (alt10) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:27:56: .
            	    {
            	    matchAny(); 

            	    }
            	    break;

            	default :
            	    break loop10;
                }
            } while (true);


            match(']'); 

            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "INTERNAL_DTD"

    // $ANTLR start "PI"
    public final void mPI() throws RecognitionException {
        try {
            CommonToken target=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:29:13: ( '<?' target= GENERIC_ID ( WS )? ( ATTRIBUTE ( WS )? )* '?>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:30:9: '<?' target= GENERIC_ID ( WS )? ( ATTRIBUTE ( WS )? )* '?>'
            {
            match("<?"); 



            int targetStart285 = getCharIndex();
            int targetStartLine285 = getLine();
            int targetStartCharPos285 = getCharPositionInLine();
            mGENERIC_ID(); 
            target = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, targetStart285, getCharIndex()-1);
            target.setLine(targetStartLine285);
            target.setCharPositionInLine(targetStartCharPos285);


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:30:32: ( WS )?
            int alt11=2;
            int LA11_0 = input.LA(1);

            if ( ((LA11_0 >= '\t' && LA11_0 <= '\n')||LA11_0=='\r'||LA11_0==' ') ) {
                alt11=1;
            }
            switch (alt11) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:30:32: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:31:9: ( ATTRIBUTE ( WS )? )*
            loop13:
            do {
                int alt13=2;
                int LA13_0 = input.LA(1);

                if ( (LA13_0==':'||(LA13_0 >= 'A' && LA13_0 <= 'Z')||LA13_0=='_'||(LA13_0 >= 'a' && LA13_0 <= 'z')) ) {
                    alt13=1;
                }


                switch (alt13) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:31:11: ATTRIBUTE ( WS )?
            	    {
            	    mATTRIBUTE(); 


            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:31:21: ( WS )?
            	    int alt12=2;
            	    int LA12_0 = input.LA(1);

            	    if ( ((LA12_0 >= '\t' && LA12_0 <= '\n')||LA12_0=='\r'||LA12_0==' ') ) {
            	        alt12=1;
            	    }
            	    switch (alt12) {
            	        case 1 :
            	            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:31:21: WS
            	            {
            	            mWS(); 


            	            }
            	            break;

            	    }


            	    }
            	    break;

            	default :
            	    break loop13;
                }
            } while (true);


            match("?>"); 



            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "PI"

    // $ANTLR start "XMLDECL"
    public final void mXMLDECL() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:34:18: ( '<?' ( 'x' | 'X' ) ( 'm' | 'M' ) ( 'l' | 'L' ) ( WS )? ( ATTRIBUTE ( WS )? )* '?>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:35:9: '<?' ( 'x' | 'X' ) ( 'm' | 'M' ) ( 'l' | 'L' ) ( WS )? ( ATTRIBUTE ( WS )? )* '?>'
            {
            match("<?"); 



            if ( input.LA(1)=='X'||input.LA(1)=='x' ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            if ( input.LA(1)=='M'||input.LA(1)=='m' ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            if ( input.LA(1)=='L'||input.LA(1)=='l' ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:35:44: ( WS )?
            int alt14=2;
            int LA14_0 = input.LA(1);

            if ( ((LA14_0 >= '\t' && LA14_0 <= '\n')||LA14_0=='\r'||LA14_0==' ') ) {
                alt14=1;
            }
            switch (alt14) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:35:44: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:36:9: ( ATTRIBUTE ( WS )? )*
            loop16:
            do {
                int alt16=2;
                int LA16_0 = input.LA(1);

                if ( (LA16_0==':'||(LA16_0 >= 'A' && LA16_0 <= 'Z')||LA16_0=='_'||(LA16_0 >= 'a' && LA16_0 <= 'z')) ) {
                    alt16=1;
                }


                switch (alt16) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:36:11: ATTRIBUTE ( WS )?
            	    {
            	    mATTRIBUTE(); 


            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:36:21: ( WS )?
            	    int alt15=2;
            	    int LA15_0 = input.LA(1);

            	    if ( ((LA15_0 >= '\t' && LA15_0 <= '\n')||LA15_0=='\r'||LA15_0==' ') ) {
            	        alt15=1;
            	    }
            	    switch (alt15) {
            	        case 1 :
            	            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:36:21: WS
            	            {
            	            mWS(); 


            	            }
            	            break;

            	    }


            	    }
            	    break;

            	default :
            	    break loop16;
                }
            } while (true);


            match("?>"); 



            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "XMLDECL"

    // $ANTLR start "ELEMENT"
    public final void mELEMENT() throws RecognitionException {
        try {
            CommonToken t=null;
            CommonToken pi=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:41:5: ( ( START_TAG ( ELEMENT |t= PCDATA |t= CDATA |t= COMMENT |pi= PI )* END_TAG | EMPTY_ELEMENT ) )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:41:7: ( START_TAG ( ELEMENT |t= PCDATA |t= CDATA |t= COMMENT |pi= PI )* END_TAG | EMPTY_ELEMENT )
            {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:41:7: ( START_TAG ( ELEMENT |t= PCDATA |t= CDATA |t= COMMENT |pi= PI )* END_TAG | EMPTY_ELEMENT )
            int alt18=2;
            alt18 = dfa18.predict(input);
            switch (alt18) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:41:9: START_TAG ( ELEMENT |t= PCDATA |t= CDATA |t= COMMENT |pi= PI )* END_TAG
                    {
                    mSTART_TAG(); 


                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:42:13: ( ELEMENT |t= PCDATA |t= CDATA |t= COMMENT |pi= PI )*
                    loop17:
                    do {
                        int alt17=6;
                        int LA17_0 = input.LA(1);

                        if ( (LA17_0=='<') ) {
                            switch ( input.LA(2) ) {
                            case '!':
                                {
                                int LA17_4 = input.LA(3);

                                if ( (LA17_4=='[') ) {
                                    alt17=3;
                                }
                                else if ( (LA17_4=='-') ) {
                                    alt17=4;
                                }


                                }
                                break;
                            case '?':
                                {
                                alt17=5;
                                }
                                break;
                            case '\t':
                            case '\n':
                            case '\r':
                            case ' ':
                            case ':':
                            case 'A':
                            case 'B':
                            case 'C':
                            case 'D':
                            case 'E':
                            case 'F':
                            case 'G':
                            case 'H':
                            case 'I':
                            case 'J':
                            case 'K':
                            case 'L':
                            case 'M':
                            case 'N':
                            case 'O':
                            case 'P':
                            case 'Q':
                            case 'R':
                            case 'S':
                            case 'T':
                            case 'U':
                            case 'V':
                            case 'W':
                            case 'X':
                            case 'Y':
                            case 'Z':
                            case '_':
                            case 'a':
                            case 'b':
                            case 'c':
                            case 'd':
                            case 'e':
                            case 'f':
                            case 'g':
                            case 'h':
                            case 'i':
                            case 'j':
                            case 'k':
                            case 'l':
                            case 'm':
                            case 'n':
                            case 'o':
                            case 'p':
                            case 'q':
                            case 'r':
                            case 's':
                            case 't':
                            case 'u':
                            case 'v':
                            case 'w':
                            case 'x':
                            case 'y':
                            case 'z':
                                {
                                alt17=1;
                                }
                                break;

                            }

                        }
                        else if ( ((LA17_0 >= '\u0000' && LA17_0 <= ';')||(LA17_0 >= '=' && LA17_0 <= '\uFFFF')) ) {
                            alt17=2;
                        }


                        switch (alt17) {
                    	case 1 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:42:14: ELEMENT
                    	    {
                    	    mELEMENT(); 


                    	    }
                    	    break;
                    	case 2 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:43:15: t= PCDATA
                    	    {
                    	    int tStart425 = getCharIndex();
                    	    int tStartLine425 = getLine();
                    	    int tStartCharPos425 = getCharPositionInLine();
                    	    mPCDATA(); 
                    	    t = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, tStart425, getCharIndex()-1);
                    	    t.setLine(tStartLine425);
                    	    t.setCharPositionInLine(tStartCharPos425);


                    	    }
                    	    break;
                    	case 3 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:44:15: t= CDATA
                    	    {
                    	    int tStart443 = getCharIndex();
                    	    int tStartLine443 = getLine();
                    	    int tStartCharPos443 = getCharPositionInLine();
                    	    mCDATA(); 
                    	    t = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, tStart443, getCharIndex()-1);
                    	    t.setLine(tStartLine443);
                    	    t.setCharPositionInLine(tStartCharPos443);


                    	    }
                    	    break;
                    	case 4 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:45:15: t= COMMENT
                    	    {
                    	    int tStart461 = getCharIndex();
                    	    int tStartLine461 = getLine();
                    	    int tStartCharPos461 = getCharPositionInLine();
                    	    mCOMMENT(); 
                    	    t = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, tStart461, getCharIndex()-1);
                    	    t.setLine(tStartLine461);
                    	    t.setCharPositionInLine(tStartCharPos461);


                    	    }
                    	    break;
                    	case 5 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:46:15: pi= PI
                    	    {
                    	    int piStart479 = getCharIndex();
                    	    int piStartLine479 = getLine();
                    	    int piStartCharPos479 = getCharPositionInLine();
                    	    mPI(); 
                    	    pi = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, piStart479, getCharIndex()-1);
                    	    pi.setLine(piStartLine479);
                    	    pi.setCharPositionInLine(piStartCharPos479);


                    	    }
                    	    break;

                    	default :
                    	    break loop17;
                        }
                    } while (true);


                    mEND_TAG(); 


                    }
                    break;
                case 2 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:49:11: EMPTY_ELEMENT
                    {
                    mEMPTY_ELEMENT(); 


                    }
                    break;

            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ELEMENT"

    // $ANTLR start "START_TAG"
    public final void mSTART_TAG() throws RecognitionException {
        try {
            CommonToken name=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:54:5: ( '<' ( WS )? name= GENERIC_ID ( WS )? ( ATTRIBUTE ( WS )? )* '>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:54:7: '<' ( WS )? name= GENERIC_ID ( WS )? ( ATTRIBUTE ( WS )? )* '>'
            {
            match('<'); 

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:54:11: ( WS )?
            int alt19=2;
            int LA19_0 = input.LA(1);

            if ( ((LA19_0 >= '\t' && LA19_0 <= '\n')||LA19_0=='\r'||LA19_0==' ') ) {
                alt19=1;
            }
            switch (alt19) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:54:11: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            int nameStart557 = getCharIndex();
            int nameStartLine557 = getLine();
            int nameStartCharPos557 = getCharPositionInLine();
            mGENERIC_ID(); 
            name = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, nameStart557, getCharIndex()-1);
            name.setLine(nameStartLine557);
            name.setCharPositionInLine(nameStartCharPos557);


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:54:31: ( WS )?
            int alt20=2;
            int LA20_0 = input.LA(1);

            if ( ((LA20_0 >= '\t' && LA20_0 <= '\n')||LA20_0=='\r'||LA20_0==' ') ) {
                alt20=1;
            }
            switch (alt20) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:54:31: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:55:9: ( ATTRIBUTE ( WS )? )*
            loop22:
            do {
                int alt22=2;
                int LA22_0 = input.LA(1);

                if ( (LA22_0==':'||(LA22_0 >= 'A' && LA22_0 <= 'Z')||LA22_0=='_'||(LA22_0 >= 'a' && LA22_0 <= 'z')) ) {
                    alt22=1;
                }


                switch (alt22) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:55:11: ATTRIBUTE ( WS )?
            	    {
            	    mATTRIBUTE(); 


            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:55:21: ( WS )?
            	    int alt21=2;
            	    int LA21_0 = input.LA(1);

            	    if ( ((LA21_0 >= '\t' && LA21_0 <= '\n')||LA21_0=='\r'||LA21_0==' ') ) {
            	        alt21=1;
            	    }
            	    switch (alt21) {
            	        case 1 :
            	            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:55:21: WS
            	            {
            	            mWS(); 


            	            }
            	            break;

            	    }


            	    }
            	    break;

            	default :
            	    break loop22;
                }
            } while (true);


            match('>'); 

            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "START_TAG"

    // $ANTLR start "EMPTY_ELEMENT"
    public final void mEMPTY_ELEMENT() throws RecognitionException {
        try {
            CommonToken name=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:59:5: ( '<' ( WS )? name= GENERIC_ID ( WS )? ( ATTRIBUTE ( WS )? )* '/>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:59:7: '<' ( WS )? name= GENERIC_ID ( WS )? ( ATTRIBUTE ( WS )? )* '/>'
            {
            match('<'); 

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:59:11: ( WS )?
            int alt23=2;
            int LA23_0 = input.LA(1);

            if ( ((LA23_0 >= '\t' && LA23_0 <= '\n')||LA23_0=='\r'||LA23_0==' ') ) {
                alt23=1;
            }
            switch (alt23) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:59:11: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            int nameStart607 = getCharIndex();
            int nameStartLine607 = getLine();
            int nameStartCharPos607 = getCharPositionInLine();
            mGENERIC_ID(); 
            name = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, nameStart607, getCharIndex()-1);
            name.setLine(nameStartLine607);
            name.setCharPositionInLine(nameStartCharPos607);


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:59:31: ( WS )?
            int alt24=2;
            int LA24_0 = input.LA(1);

            if ( ((LA24_0 >= '\t' && LA24_0 <= '\n')||LA24_0=='\r'||LA24_0==' ') ) {
                alt24=1;
            }
            switch (alt24) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:59:31: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:60:9: ( ATTRIBUTE ( WS )? )*
            loop26:
            do {
                int alt26=2;
                int LA26_0 = input.LA(1);

                if ( (LA26_0==':'||(LA26_0 >= 'A' && LA26_0 <= 'Z')||LA26_0=='_'||(LA26_0 >= 'a' && LA26_0 <= 'z')) ) {
                    alt26=1;
                }


                switch (alt26) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:60:11: ATTRIBUTE ( WS )?
            	    {
            	    mATTRIBUTE(); 


            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:60:21: ( WS )?
            	    int alt25=2;
            	    int LA25_0 = input.LA(1);

            	    if ( ((LA25_0 >= '\t' && LA25_0 <= '\n')||LA25_0=='\r'||LA25_0==' ') ) {
            	        alt25=1;
            	    }
            	    switch (alt25) {
            	        case 1 :
            	            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:60:21: WS
            	            {
            	            mWS(); 


            	            }
            	            break;

            	    }


            	    }
            	    break;

            	default :
            	    break loop26;
                }
            } while (true);


            match("/>"); 



            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "EMPTY_ELEMENT"

    // $ANTLR start "ATTRIBUTE"
    public final void mATTRIBUTE() throws RecognitionException {
        try {
            CommonToken name=null;
            CommonToken value=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:64:5: (name= GENERIC_ID ( WS )? '=' ( WS )? value= VALUE )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:64:7: name= GENERIC_ID ( WS )? '=' ( WS )? value= VALUE
            {
            int nameStart652 = getCharIndex();
            int nameStartLine652 = getLine();
            int nameStartCharPos652 = getCharPositionInLine();
            mGENERIC_ID(); 
            name = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, nameStart652, getCharIndex()-1);
            name.setLine(nameStartLine652);
            name.setCharPositionInLine(nameStartCharPos652);


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:64:23: ( WS )?
            int alt27=2;
            int LA27_0 = input.LA(1);

            if ( ((LA27_0 >= '\t' && LA27_0 <= '\n')||LA27_0=='\r'||LA27_0==' ') ) {
                alt27=1;
            }
            switch (alt27) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:64:23: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            match('='); 

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:64:31: ( WS )?
            int alt28=2;
            int LA28_0 = input.LA(1);

            if ( ((LA28_0 >= '\t' && LA28_0 <= '\n')||LA28_0=='\r'||LA28_0==' ') ) {
                alt28=1;
            }
            switch (alt28) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:64:31: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            int valueStart664 = getCharIndex();
            int valueStartLine664 = getLine();
            int valueStartCharPos664 = getCharPositionInLine();
            mVALUE(); 
            value = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, valueStart664, getCharIndex()-1);
            value.setLine(valueStartLine664);
            value.setCharPositionInLine(valueStartCharPos664);


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "ATTRIBUTE"

    // $ANTLR start "END_TAG"
    public final void mEND_TAG() throws RecognitionException {
        try {
            CommonToken name=null;

            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:68:5: ( '</' ( WS )? name= GENERIC_ID ( WS )? '>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:68:7: '</' ( WS )? name= GENERIC_ID ( WS )? '>'
            {
            match("</"); 



            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:68:12: ( WS )?
            int alt29=2;
            int LA29_0 = input.LA(1);

            if ( ((LA29_0 >= '\t' && LA29_0 <= '\n')||LA29_0=='\r'||LA29_0==' ') ) {
                alt29=1;
            }
            switch (alt29) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:68:12: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            int nameStart691 = getCharIndex();
            int nameStartLine691 = getLine();
            int nameStartCharPos691 = getCharPositionInLine();
            mGENERIC_ID(); 
            name = new CommonToken(input, Token.INVALID_TOKEN_TYPE, Token.DEFAULT_CHANNEL, nameStart691, getCharIndex()-1);
            name.setLine(nameStartLine691);
            name.setCharPositionInLine(nameStartCharPos691);


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:68:32: ( WS )?
            int alt30=2;
            int LA30_0 = input.LA(1);

            if ( ((LA30_0 >= '\t' && LA30_0 <= '\n')||LA30_0=='\r'||LA30_0==' ') ) {
                alt30=1;
            }
            switch (alt30) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:68:32: WS
                    {
                    mWS(); 


                    }
                    break;

            }


            match('>'); 

            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "END_TAG"

    // $ANTLR start "COMMENT"
    public final void mCOMMENT() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:72:2: ( '<!--' ( options {greedy=false; } : . )* '-->' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:72:4: '<!--' ( options {greedy=false; } : . )* '-->'
            {
            match("<!--"); 



            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:72:11: ( options {greedy=false; } : . )*
            loop31:
            do {
                int alt31=2;
                int LA31_0 = input.LA(1);

                if ( (LA31_0=='-') ) {
                    int LA31_1 = input.LA(2);

                    if ( (LA31_1=='-') ) {
                        int LA31_3 = input.LA(3);

                        if ( (LA31_3=='>') ) {
                            alt31=2;
                        }
                        else if ( ((LA31_3 >= '\u0000' && LA31_3 <= '=')||(LA31_3 >= '?' && LA31_3 <= '\uFFFF')) ) {
                            alt31=1;
                        }


                    }
                    else if ( ((LA31_1 >= '\u0000' && LA31_1 <= ',')||(LA31_1 >= '.' && LA31_1 <= '\uFFFF')) ) {
                        alt31=1;
                    }


                }
                else if ( ((LA31_0 >= '\u0000' && LA31_0 <= ',')||(LA31_0 >= '.' && LA31_0 <= '\uFFFF')) ) {
                    alt31=1;
                }


                switch (alt31) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:72:38: .
            	    {
            	    matchAny(); 

            	    }
            	    break;

            	default :
            	    break loop31;
                }
            } while (true);


            match("-->"); 



            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "COMMENT"

    // $ANTLR start "CDATA"
    public final void mCDATA() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:76:2: ( '<![CDATA[' ( options {greedy=false; } : . )* ']]>' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:76:4: '<![CDATA[' ( options {greedy=false; } : . )* ']]>'
            {
            match("<![CDATA["); 



            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:76:16: ( options {greedy=false; } : . )*
            loop32:
            do {
                int alt32=2;
                int LA32_0 = input.LA(1);

                if ( (LA32_0==']') ) {
                    int LA32_1 = input.LA(2);

                    if ( (LA32_1==']') ) {
                        int LA32_3 = input.LA(3);

                        if ( (LA32_3=='>') ) {
                            alt32=2;
                        }
                        else if ( ((LA32_3 >= '\u0000' && LA32_3 <= '=')||(LA32_3 >= '?' && LA32_3 <= '\uFFFF')) ) {
                            alt32=1;
                        }


                    }
                    else if ( ((LA32_1 >= '\u0000' && LA32_1 <= '\\')||(LA32_1 >= '^' && LA32_1 <= '\uFFFF')) ) {
                        alt32=1;
                    }


                }
                else if ( ((LA32_0 >= '\u0000' && LA32_0 <= '\\')||(LA32_0 >= '^' && LA32_0 <= '\uFFFF')) ) {
                    alt32=1;
                }


                switch (alt32) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:76:43: .
            	    {
            	    matchAny(); 

            	    }
            	    break;

            	default :
            	    break loop32;
                }
            } while (true);


            match("]]>"); 



            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "CDATA"

    // $ANTLR start "PCDATA"
    public final void mPCDATA() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:79:17: ( (~ '<' )+ )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:79:19: (~ '<' )+
            {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:79:19: (~ '<' )+
            int cnt33=0;
            loop33:
            do {
                int alt33=2;
                int LA33_0 = input.LA(1);

                if ( ((LA33_0 >= '\u0000' && LA33_0 <= ';')||(LA33_0 >= '=' && LA33_0 <= '\uFFFF')) ) {
                    alt33=1;
                }


                switch (alt33) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:
            	    {
            	    if ( (input.LA(1) >= '\u0000' && input.LA(1) <= ';')||(input.LA(1) >= '=' && input.LA(1) <= '\uFFFF') ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    if ( cnt33 >= 1 ) break loop33;
                        EarlyExitException eee =
                            new EarlyExitException(33, input);
                        throw eee;
                }
                cnt33++;
            } while (true);


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "PCDATA"

    // $ANTLR start "VALUE"
    public final void mVALUE() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:81:16: ( ( '\\\"' (~ '\\\"' )* '\\\"' | '\\'' (~ '\\'' )* '\\'' ) )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:82:9: ( '\\\"' (~ '\\\"' )* '\\\"' | '\\'' (~ '\\'' )* '\\'' )
            {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:82:9: ( '\\\"' (~ '\\\"' )* '\\\"' | '\\'' (~ '\\'' )* '\\'' )
            int alt36=2;
            int LA36_0 = input.LA(1);

            if ( (LA36_0=='\"') ) {
                alt36=1;
            }
            else if ( (LA36_0=='\'') ) {
                alt36=2;
            }
            else {
                NoViableAltException nvae =
                    new NoViableAltException("", 36, 0, input);

                throw nvae;

            }
            switch (alt36) {
                case 1 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:82:11: '\\\"' (~ '\\\"' )* '\\\"'
                    {
                    match('\"'); 

                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:82:16: (~ '\\\"' )*
                    loop34:
                    do {
                        int alt34=2;
                        int LA34_0 = input.LA(1);

                        if ( ((LA34_0 >= '\u0000' && LA34_0 <= '!')||(LA34_0 >= '#' && LA34_0 <= '\uFFFF')) ) {
                            alt34=1;
                        }


                        switch (alt34) {
                    	case 1 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:
                    	    {
                    	    if ( (input.LA(1) >= '\u0000' && input.LA(1) <= '!')||(input.LA(1) >= '#' && input.LA(1) <= '\uFFFF') ) {
                    	        input.consume();
                    	    }
                    	    else {
                    	        MismatchedSetException mse = new MismatchedSetException(null,input);
                    	        recover(mse);
                    	        throw mse;
                    	    }


                    	    }
                    	    break;

                    	default :
                    	    break loop34;
                        }
                    } while (true);


                    match('\"'); 

                    }
                    break;
                case 2 :
                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:83:11: '\\'' (~ '\\'' )* '\\''
                    {
                    match('\''); 

                    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:83:16: (~ '\\'' )*
                    loop35:
                    do {
                        int alt35=2;
                        int LA35_0 = input.LA(1);

                        if ( ((LA35_0 >= '\u0000' && LA35_0 <= '&')||(LA35_0 >= '(' && LA35_0 <= '\uFFFF')) ) {
                            alt35=1;
                        }


                        switch (alt35) {
                    	case 1 :
                    	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:
                    	    {
                    	    if ( (input.LA(1) >= '\u0000' && input.LA(1) <= '&')||(input.LA(1) >= '(' && input.LA(1) <= '\uFFFF') ) {
                    	        input.consume();
                    	    }
                    	    else {
                    	        MismatchedSetException mse = new MismatchedSetException(null,input);
                    	        recover(mse);
                    	        throw mse;
                    	    }


                    	    }
                    	    break;

                    	default :
                    	    break loop35;
                        }
                    } while (true);


                    match('\''); 

                    }
                    break;

            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "VALUE"

    // $ANTLR start "GENERIC_ID"
    public final void mGENERIC_ID() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:88:5: ( ( LETTER | '_' | ':' ) ( options {greedy=true; } : LETTER | '0' .. '9' | '.' | '-' | '_' | ':' )* )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:88:7: ( LETTER | '_' | ':' ) ( options {greedy=true; } : LETTER | '0' .. '9' | '.' | '-' | '_' | ':' )*
            {
            if ( input.LA(1)==':'||(input.LA(1) >= 'A' && input.LA(1) <= 'Z')||input.LA(1)=='_'||(input.LA(1) >= 'a' && input.LA(1) <= 'z') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:9: ( options {greedy=true; } : LETTER | '0' .. '9' | '.' | '-' | '_' | ':' )*
            loop37:
            do {
                int alt37=7;
                switch ( input.LA(1) ) {
                case 'A':
                case 'B':
                case 'C':
                case 'D':
                case 'E':
                case 'F':
                case 'G':
                case 'H':
                case 'I':
                case 'J':
                case 'K':
                case 'L':
                case 'M':
                case 'N':
                case 'O':
                case 'P':
                case 'Q':
                case 'R':
                case 'S':
                case 'T':
                case 'U':
                case 'V':
                case 'W':
                case 'X':
                case 'Y':
                case 'Z':
                case 'a':
                case 'b':
                case 'c':
                case 'd':
                case 'e':
                case 'f':
                case 'g':
                case 'h':
                case 'i':
                case 'j':
                case 'k':
                case 'l':
                case 'm':
                case 'n':
                case 'o':
                case 'p':
                case 'q':
                case 'r':
                case 's':
                case 't':
                case 'u':
                case 'v':
                case 'w':
                case 'x':
                case 'y':
                case 'z':
                    {
                    alt37=1;
                    }
                    break;
                case '0':
                case '1':
                case '2':
                case '3':
                case '4':
                case '5':
                case '6':
                case '7':
                case '8':
                case '9':
                    {
                    alt37=2;
                    }
                    break;
                case '.':
                    {
                    alt37=3;
                    }
                    break;
                case '-':
                    {
                    alt37=4;
                    }
                    break;
                case '_':
                    {
                    alt37=5;
                    }
                    break;
                case ':':
                    {
                    alt37=6;
                    }
                    break;

                }

                switch (alt37) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:36: LETTER
            	    {
            	    mLETTER(); 


            	    }
            	    break;
            	case 2 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:45: '0' .. '9'
            	    {
            	    matchRange('0','9'); 

            	    }
            	    break;
            	case 3 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:56: '.'
            	    {
            	    match('.'); 

            	    }
            	    break;
            	case 4 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:62: '-'
            	    {
            	    match('-'); 

            	    }
            	    break;
            	case 5 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:68: '_'
            	    {
            	    match('_'); 

            	    }
            	    break;
            	case 6 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:89:74: ':'
            	    {
            	    match(':'); 

            	    }
            	    break;

            	default :
            	    break loop37;
                }
            } while (true);


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "GENERIC_ID"

    // $ANTLR start "LETTER"
    public final void mLETTER() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:93:2: ( 'a' .. 'z' | 'A' .. 'Z' )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:
            {
            if ( (input.LA(1) >= 'A' && input.LA(1) <= 'Z')||(input.LA(1) >= 'a' && input.LA(1) <= 'z') ) {
                input.consume();
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                recover(mse);
                throw mse;
            }


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "LETTER"

    // $ANTLR start "WS"
    public final void mWS() throws RecognitionException {
        try {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:97:14: ( ( ' ' | '\\t' | '\\n' | '\\r' )+ )
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:98:9: ( ' ' | '\\t' | '\\n' | '\\r' )+
            {
            // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:98:9: ( ' ' | '\\t' | '\\n' | '\\r' )+
            int cnt38=0;
            loop38:
            do {
                int alt38=2;
                int LA38_0 = input.LA(1);

                if ( ((LA38_0 >= '\t' && LA38_0 <= '\n')||LA38_0=='\r'||LA38_0==' ') ) {
                    alt38=1;
                }


                switch (alt38) {
            	case 1 :
            	    // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:
            	    {
            	    if ( (input.LA(1) >= '\t' && input.LA(1) <= '\n')||input.LA(1)=='\r'||input.LA(1)==' ' ) {
            	        input.consume();
            	    }
            	    else {
            	        MismatchedSetException mse = new MismatchedSetException(null,input);
            	        recover(mse);
            	        throw mse;
            	    }


            	    }
            	    break;

            	default :
            	    if ( cnt38 >= 1 ) break loop38;
                        EarlyExitException eee =
                            new EarlyExitException(38, input);
                        throw eee;
                }
                cnt38++;
            } while (true);


            }


        }
        finally {
        	// do for sure before leaving
        }
    }
    // $ANTLR end "WS"

    public void mTokens() throws RecognitionException {
        // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:1:8: ( DOCUMENT )
        // C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\xml.g:1:10: DOCUMENT
        {
        mDOCUMENT(); 


        }


    }


    protected DFA18 dfa18 = new DFA18(this);
    static final String DFA18_eotS =
        "\45\uffff";
    static final String DFA18_eofS =
        "\45\uffff";
    static final String DFA18_minS =
        "\1\74\12\11\2\uffff\12\11\2\0\7\11\1\0\1\11\1\0\2\11";
    static final String DFA18_maxS =
        "\1\74\12\172\2\uffff\7\172\1\47\1\172\1\47\2\uffff\6\172\1\75\1"+
        "\uffff\1\172\1\uffff\2\172";
    static final String DFA18_acceptS =
        "\13\uffff\1\1\1\2\30\uffff";
    static final String DFA18_specialS =
        "\27\uffff\1\3\1\1\7\uffff\1\2\1\uffff\1\0\2\uffff}>";
    static final String[] DFA18_transitionS = {
            "\1\1",
            "\2\2\2\uffff\1\2\22\uffff\1\2\31\uffff\1\3\6\uffff\32\3\4\uffff"+
            "\1\3\1\uffff\32\3",
            "\2\2\2\uffff\1\2\22\uffff\1\2\31\uffff\1\3\6\uffff\32\3\4\uffff"+
            "\1\3\1\uffff\32\3",
            "\2\12\2\uffff\1\12\22\uffff\1\12\14\uffff\1\7\1\6\1\14\12\5"+
            "\1\11\3\uffff\1\13\2\uffff\32\4\4\uffff\1\10\1\uffff\32\4",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\12\2\uffff\1\12\22\uffff\1\12\14\uffff\1\7\1\6\1\14\12\5"+
            "\1\11\3\uffff\1\13\2\uffff\32\4\4\uffff\1\10\1\uffff\32\4",
            "\2\12\2\uffff\1\12\22\uffff\1\12\14\uffff\1\7\1\6\1\14\12\5"+
            "\1\11\3\uffff\1\13\2\uffff\32\4\4\uffff\1\10\1\uffff\32\4",
            "\2\12\2\uffff\1\12\22\uffff\1\12\14\uffff\1\7\1\6\1\14\12\5"+
            "\1\11\3\uffff\1\13\2\uffff\32\4\4\uffff\1\10\1\uffff\32\4",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\12\2\uffff\1\12\22\uffff\1\12\16\uffff\1\14\12\uffff\1\25"+
            "\3\uffff\1\13\2\uffff\32\25\4\uffff\1\25\1\uffff\32\25",
            "",
            "",
            "\2\15\2\uffff\1\15\22\uffff\1\15\16\uffff\1\14\12\uffff\1\25"+
            "\2\uffff\1\24\1\13\2\uffff\32\25\4\uffff\1\25\1\uffff\32\25",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\15\2\uffff\1\15\22\uffff\1\15\14\uffff\1\22\1\21\1\14\12"+
            "\20\1\23\2\uffff\1\24\1\13\2\uffff\32\16\4\uffff\1\17\1\uffff"+
            "\32\16",
            "\2\26\2\uffff\1\26\22\uffff\1\26\1\uffff\1\27\4\uffff\1\30",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\26\2\uffff\1\26\22\uffff\1\26\1\uffff\1\27\4\uffff\1\30",
            "\42\40\1\41\uffdd\40",
            "\47\42\1\43\uffd8\42",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\37\2\uffff\1\37\22\uffff\1\37\14\uffff\1\34\1\33\1\uffff"+
            "\12\32\1\36\2\uffff\1\24\3\uffff\32\31\4\uffff\1\35\1\uffff"+
            "\32\31",
            "\2\37\2\uffff\1\37\22\uffff\1\37\34\uffff\1\24",
            "\42\40\1\41\uffdd\40",
            "\2\44\2\uffff\1\44\22\uffff\1\44\16\uffff\1\14\12\uffff\1\25"+
            "\3\uffff\1\13\2\uffff\32\25\4\uffff\1\25\1\uffff\32\25",
            "\47\42\1\43\uffd8\42",
            "\2\44\2\uffff\1\44\22\uffff\1\44\16\uffff\1\14\12\uffff\1\25"+
            "\3\uffff\1\13\2\uffff\32\25\4\uffff\1\25\1\uffff\32\25",
            "\2\44\2\uffff\1\44\22\uffff\1\44\16\uffff\1\14\12\uffff\1\25"+
            "\3\uffff\1\13\2\uffff\32\25\4\uffff\1\25\1\uffff\32\25"
    };

    static final short[] DFA18_eot = DFA.unpackEncodedString(DFA18_eotS);
    static final short[] DFA18_eof = DFA.unpackEncodedString(DFA18_eofS);
    static final char[] DFA18_min = DFA.unpackEncodedStringToUnsignedChars(DFA18_minS);
    static final char[] DFA18_max = DFA.unpackEncodedStringToUnsignedChars(DFA18_maxS);
    static final short[] DFA18_accept = DFA.unpackEncodedString(DFA18_acceptS);
    static final short[] DFA18_special = DFA.unpackEncodedString(DFA18_specialS);
    static final short[][] DFA18_transition;

    static {
        int numStates = DFA18_transitionS.length;
        DFA18_transition = new short[numStates][];
        for (int i=0; i<numStates; i++) {
            DFA18_transition[i] = DFA.unpackEncodedString(DFA18_transitionS[i]);
        }
    }

    class DFA18 extends DFA {

        public DFA18(BaseRecognizer recognizer) {
            this.recognizer = recognizer;
            this.decisionNumber = 18;
            this.eot = DFA18_eot;
            this.eof = DFA18_eof;
            this.min = DFA18_min;
            this.max = DFA18_max;
            this.accept = DFA18_accept;
            this.special = DFA18_special;
            this.transition = DFA18_transition;
        }
        public String getDescription() {
            return "41:7: ( START_TAG ( ELEMENT |t= PCDATA |t= CDATA |t= COMMENT |pi= PI )* END_TAG | EMPTY_ELEMENT )";
        }
        public int specialStateTransition(int s, IntStream _input) throws NoViableAltException {
            IntStream input = _input;
        	int _s = s;
            switch ( s ) {
                    case 0 : 
                        int LA18_34 = input.LA(1);

                        s = -1;
                        if ( (LA18_34=='\'') ) {s = 35;}

                        else if ( ((LA18_34 >= '\u0000' && LA18_34 <= '&')||(LA18_34 >= '(' && LA18_34 <= '\uFFFF')) ) {s = 34;}

                        if ( s>=0 ) return s;
                        break;

                    case 1 : 
                        int LA18_24 = input.LA(1);

                        s = -1;
                        if ( ((LA18_24 >= '\u0000' && LA18_24 <= '&')||(LA18_24 >= '(' && LA18_24 <= '\uFFFF')) ) {s = 34;}

                        else if ( (LA18_24=='\'') ) {s = 35;}

                        if ( s>=0 ) return s;
                        break;

                    case 2 : 
                        int LA18_32 = input.LA(1);

                        s = -1;
                        if ( (LA18_32=='\"') ) {s = 33;}

                        else if ( ((LA18_32 >= '\u0000' && LA18_32 <= '!')||(LA18_32 >= '#' && LA18_32 <= '\uFFFF')) ) {s = 32;}

                        if ( s>=0 ) return s;
                        break;

                    case 3 : 
                        int LA18_23 = input.LA(1);

                        s = -1;
                        if ( ((LA18_23 >= '\u0000' && LA18_23 <= '!')||(LA18_23 >= '#' && LA18_23 <= '\uFFFF')) ) {s = 32;}

                        else if ( (LA18_23=='\"') ) {s = 33;}

                        if ( s>=0 ) return s;
                        break;
            }
            NoViableAltException nvae =
                new NoViableAltException(getDescription(), 18, _s, input);
            error(nvae);
            throw nvae;
        }

    }
 

}