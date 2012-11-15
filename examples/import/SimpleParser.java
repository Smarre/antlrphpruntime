// $ANTLR 3.1.3 ??? 19, 2009 17:38:18 Simple.g 2009-04-19 17:48:53

import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

public class SimpleParser extends Parser {
    public static final String[] tokenNames = new String[] {
        "<invalid>", "<EOR>", "<DOWN>", "<UP>", "ID", "INT", "FLOAT", "ESC", "CHAR", "STRING", "COMMENT", "LINE_COMMENT", "WS", "'program'", "';'", "'var'", "'='"
    };
    public static final int WS=12;
    public static final int T__16=16;
    public static final int T__15=15;
    public static final int LINE_COMMENT=11;
    public static final int T__14=14;
    public static final int ESC=7;
    public static final int T__13=13;
    public static final int CHAR=8;
    public static final int FLOAT=6;
    public static final int INT=5;
    public static final int COMMENT=10;
    public static final int ID=4;
    public static final int EOF=-1;
    public static final int STRING=9;

    // delegates
    // delegators


        public SimpleParser(TokenStream input) {
            this(input, new RecognizerSharedState());
        }
        public SimpleParser(TokenStream input, RecognizerSharedState state) {
            super(input, state);
             
        }
        

    public String[] getTokenNames() { return SimpleParser.tokenNames; }
    public String getGrammarFileName() { return "Simple.g"; }



    // $ANTLR start "file"
    // Simple.g:6:1: file : 'program' ID ';' ( decl )+ ;
    public final void file() throws RecognitionException {
        Token ID1=null;

        try {
            // Simple.g:6:6: ( 'program' ID ';' ( decl )+ )
            // Simple.g:6:8: 'program' ID ';' ( decl )+
            {
            match(input,13,FOLLOW_13_in_file18); 
            ID1=(Token)match(input,ID,FOLLOW_ID_in_file20); 
            match(input,14,FOLLOW_14_in_file22); 
            System.out.println("found program "+(ID1!=null?ID1.getText():null));
            // Simple.g:7:8: ( decl )+
            int cnt1=0;
            loop1:
            do {
                int alt1=2;
                int LA1_0 = input.LA(1);

                if ( (LA1_0==15) ) {
                    alt1=1;
                }


                switch (alt1) {
            	case 1 :
            	    // Simple.g:7:8: decl
            	    {
            	    pushFollow(FOLLOW_decl_in_file33);
            	    decl();

            	    state._fsp--;


            	    }
            	    break;

            	default :
            	    if ( cnt1 >= 1 ) break loop1;
                        EarlyExitException eee =
                            new EarlyExitException(1, input);
                        throw eee;
                }
                cnt1++;
            } while (true);


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "file"


    // $ANTLR start "decl"
    // Simple.g:10:1: decl : 'var' ID ( '=' expr )? ';' ;
    public final void decl() throws RecognitionException {
        Token ID2=null;

        try {
            // Simple.g:10:6: ( 'var' ID ( '=' expr )? ';' )
            // Simple.g:10:8: 'var' ID ( '=' expr )? ';'
            {
            match(input,15,FOLLOW_15_in_decl48); 
            ID2=(Token)match(input,ID,FOLLOW_ID_in_decl50); 
            // Simple.g:10:17: ( '=' expr )?
            int alt2=2;
            int LA2_0 = input.LA(1);

            if ( (LA2_0==16) ) {
                alt2=1;
            }
            switch (alt2) {
                case 1 :
                    // Simple.g:10:18: '=' expr
                    {
                    match(input,16,FOLLOW_16_in_decl53); 
                    pushFollow(FOLLOW_expr_in_decl55);
                    expr();

                    state._fsp--;


                    }
                    break;

            }

            match(input,14,FOLLOW_14_in_decl59); 
            System.out.println("found var "+(ID2!=null?ID2.getText():null));

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "decl"


    // $ANTLR start "expr"
    // Simple.g:14:1: expr : ( INT | FLOAT );
    public final void expr() throws RecognitionException {
        try {
            // Simple.g:14:6: ( INT | FLOAT )
            // Simple.g:
            {
            if ( (input.LA(1)>=INT && input.LA(1)<=FLOAT) ) {
                input.consume();
                state.errorRecovery=false;
            }
            else {
                MismatchedSetException mse = new MismatchedSetException(null,input);
                throw mse;
            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "expr"

    // Delegated rules


 

    public static final BitSet FOLLOW_13_in_file18 = new BitSet(new long[]{0x0000000000000010L});
    public static final BitSet FOLLOW_ID_in_file20 = new BitSet(new long[]{0x0000000000004000L});
    public static final BitSet FOLLOW_14_in_file22 = new BitSet(new long[]{0x0000000000008000L});
    public static final BitSet FOLLOW_decl_in_file33 = new BitSet(new long[]{0x0000000000008002L});
    public static final BitSet FOLLOW_15_in_decl48 = new BitSet(new long[]{0x0000000000000010L});
    public static final BitSet FOLLOW_ID_in_decl50 = new BitSet(new long[]{0x0000000000014000L});
    public static final BitSet FOLLOW_16_in_decl53 = new BitSet(new long[]{0x0000000000000060L});
    public static final BitSet FOLLOW_expr_in_decl55 = new BitSet(new long[]{0x0000000000004000L});
    public static final BitSet FOLLOW_14_in_decl59 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_set_in_expr0 = new BitSet(new long[]{0x0000000000000002L});

}