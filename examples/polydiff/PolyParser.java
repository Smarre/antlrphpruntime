// $ANTLR 3.1.3 ??? 05, 2009 23:29:28 Poly.g 2009-05-06 00:12:20

import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;


import org.antlr.runtime.tree.*;

public class PolyParser extends Parser {
    public static final String[] tokenNames = new String[] {
        "<invalid>", "<EOR>", "<DOWN>", "<UP>", "MULT", "INT", "ID", "WS", "'+'", "'^'"
    };
    public static final int WS=7;
    public static final int INT=5;
    public static final int MULT=4;
    public static final int ID=6;
    public static final int EOF=-1;
    public static final int T__9=9;
    public static final int T__8=8;

    // delegates
    // delegators


        public PolyParser(TokenStream input) {
            this(input, new RecognizerSharedState());
        }
        public PolyParser(TokenStream input, RecognizerSharedState state) {
            super(input, state);
             
        }
        
    protected TreeAdaptor adaptor = new CommonTreeAdaptor();

    public void setTreeAdaptor(TreeAdaptor adaptor) {
        this.adaptor = adaptor;
    }
    public TreeAdaptor getTreeAdaptor() {
        return adaptor;
    }

    public String[] getTokenNames() { return PolyParser.tokenNames; }
    public String getGrammarFileName() { return "Poly.g"; }


    public static class poly_return extends ParserRuleReturnScope {
        Object tree;
        public Object getTree() { return tree; }
    };

    // $ANTLR start "poly"
    // Poly.g:5:1: poly : term ( '+' term )* ;
    public final PolyParser.poly_return poly() throws RecognitionException {
        PolyParser.poly_return retval = new PolyParser.poly_return();
        retval.start = input.LT(1);

        Object root_0 = null;

        Token char_literal2=null;
        PolyParser.term_return term1 = null;

        PolyParser.term_return term3 = null;


        Object char_literal2_tree=null;

        try {
            // Poly.g:5:5: ( term ( '+' term )* )
            // Poly.g:5:7: term ( '+' term )*
            {
            root_0 = (Object)adaptor.nil();

            pushFollow(FOLLOW_term_in_poly24);
            term1=term();

            state._fsp--;

            adaptor.addChild(root_0, term1.getTree());
            // Poly.g:5:12: ( '+' term )*
            loop1:
            do {
                int alt1=2;
                int LA1_0 = input.LA(1);

                if ( (LA1_0==8) ) {
                    alt1=1;
                }


                switch (alt1) {
            	case 1 :
            	    // Poly.g:5:13: '+' term
            	    {
            	    char_literal2=(Token)match(input,8,FOLLOW_8_in_poly27); 
            	    char_literal2_tree = (Object)adaptor.create(char_literal2);
            	    root_0 = (Object)adaptor.becomeRoot(char_literal2_tree, root_0);

            	    pushFollow(FOLLOW_term_in_poly30);
            	    term3=term();

            	    state._fsp--;

            	    adaptor.addChild(root_0, term3.getTree());

            	    }
            	    break;

            	default :
            	    break loop1;
                }
            } while (true);


            }

            retval.stop = input.LT(-1);

            retval.tree = (Object)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (Object)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }
        finally {
        }
        return retval;
    }
    // $ANTLR end "poly"

    public static class term_return extends ParserRuleReturnScope {
        Object tree;
        public Object getTree() { return tree; }
    };

    // $ANTLR start "term"
    // Poly.g:8:1: term : ( INT ID -> ^( MULT[\"*\"] INT ID ) | INT exp -> ^( MULT[\"*\"] INT exp ) | exp | INT | ID );
    public final PolyParser.term_return term() throws RecognitionException {
        PolyParser.term_return retval = new PolyParser.term_return();
        retval.start = input.LT(1);

        Object root_0 = null;

        Token INT4=null;
        Token ID5=null;
        Token INT6=null;
        Token INT9=null;
        Token ID10=null;
        PolyParser.exp_return exp7 = null;

        PolyParser.exp_return exp8 = null;


        Object INT4_tree=null;
        Object ID5_tree=null;
        Object INT6_tree=null;
        Object INT9_tree=null;
        Object ID10_tree=null;
        RewriteRuleTokenStream stream_INT=new RewriteRuleTokenStream(adaptor,"token INT");
        RewriteRuleTokenStream stream_ID=new RewriteRuleTokenStream(adaptor,"token ID");
        RewriteRuleSubtreeStream stream_exp=new RewriteRuleSubtreeStream(adaptor,"rule exp");
        try {
            // Poly.g:8:5: ( INT ID -> ^( MULT[\"*\"] INT ID ) | INT exp -> ^( MULT[\"*\"] INT exp ) | exp | INT | ID )
            int alt2=5;
            int LA2_0 = input.LA(1);

            if ( (LA2_0==INT) ) {
                int LA2_1 = input.LA(2);

                if ( (LA2_1==ID) ) {
                    int LA2_3 = input.LA(3);

                    if ( (LA2_3==9) ) {
                        alt2=2;
                    }
                    else if ( (LA2_3==EOF||LA2_3==8) ) {
                        alt2=1;
                    }
                    else {
                        NoViableAltException nvae =
                            new NoViableAltException("", 2, 3, input);

                        throw nvae;
                    }
                }
                else if ( (LA2_1==EOF||LA2_1==8) ) {
                    alt2=4;
                }
                else {
                    NoViableAltException nvae =
                        new NoViableAltException("", 2, 1, input);

                    throw nvae;
                }
            }
            else if ( (LA2_0==ID) ) {
                int LA2_2 = input.LA(2);

                if ( (LA2_2==9) ) {
                    alt2=3;
                }
                else if ( (LA2_2==EOF||LA2_2==8) ) {
                    alt2=5;
                }
                else {
                    NoViableAltException nvae =
                        new NoViableAltException("", 2, 2, input);

                    throw nvae;
                }
            }
            else {
                NoViableAltException nvae =
                    new NoViableAltException("", 2, 0, input);

                throw nvae;
            }
            switch (alt2) {
                case 1 :
                    // Poly.g:8:7: INT ID
                    {
                    INT4=(Token)match(input,INT,FOLLOW_INT_in_term44);  
                    stream_INT.add(INT4);

                    ID5=(Token)match(input,ID,FOLLOW_ID_in_term46);  
                    stream_ID.add(ID5);



                    // AST REWRITE
                    // elements: ID, INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (Object)adaptor.nil();
                    // 8:15: -> ^( MULT[\"*\"] INT ID )
                    {
                        // Poly.g:8:18: ^( MULT[\"*\"] INT ID )
                        {
                        Object root_1 = (Object)adaptor.nil();
                        root_1 = (Object)adaptor.becomeRoot((Object)adaptor.create(MULT, "*"), root_1);

                        adaptor.addChild(root_1, stream_INT.nextNode());
                        adaptor.addChild(root_1, stream_ID.nextNode());

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;
                    }
                    break;
                case 2 :
                    // Poly.g:9:7: INT exp
                    {
                    INT6=(Token)match(input,INT,FOLLOW_INT_in_term66);  
                    stream_INT.add(INT6);

                    pushFollow(FOLLOW_exp_in_term68);
                    exp7=exp();

                    state._fsp--;

                    stream_exp.add(exp7.getTree());


                    // AST REWRITE
                    // elements: INT, exp
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (Object)adaptor.nil();
                    // 9:15: -> ^( MULT[\"*\"] INT exp )
                    {
                        // Poly.g:9:18: ^( MULT[\"*\"] INT exp )
                        {
                        Object root_1 = (Object)adaptor.nil();
                        root_1 = (Object)adaptor.becomeRoot((Object)adaptor.create(MULT, "*"), root_1);

                        adaptor.addChild(root_1, stream_INT.nextNode());
                        adaptor.addChild(root_1, stream_exp.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;
                    }
                    break;
                case 3 :
                    // Poly.g:10:7: exp
                    {
                    root_0 = (Object)adaptor.nil();

                    pushFollow(FOLLOW_exp_in_term87);
                    exp8=exp();

                    state._fsp--;

                    adaptor.addChild(root_0, exp8.getTree());

                    }
                    break;
                case 4 :
                    // Poly.g:11:7: INT
                    {
                    root_0 = (Object)adaptor.nil();

                    INT9=(Token)match(input,INT,FOLLOW_INT_in_term95); 
                    INT9_tree = (Object)adaptor.create(INT9);
                    adaptor.addChild(root_0, INT9_tree);


                    }
                    break;
                case 5 :
                    // Poly.g:12:4: ID
                    {
                    root_0 = (Object)adaptor.nil();

                    ID10=(Token)match(input,ID,FOLLOW_ID_in_term100); 
                    ID10_tree = (Object)adaptor.create(ID10);
                    adaptor.addChild(root_0, ID10_tree);


                    }
                    break;

            }
            retval.stop = input.LT(-1);

            retval.tree = (Object)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (Object)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }
        finally {
        }
        return retval;
    }
    // $ANTLR end "term"

    public static class exp_return extends ParserRuleReturnScope {
        Object tree;
        public Object getTree() { return tree; }
    };

    // $ANTLR start "exp"
    // Poly.g:15:1: exp : ID '^' INT ;
    public final PolyParser.exp_return exp() throws RecognitionException {
        PolyParser.exp_return retval = new PolyParser.exp_return();
        retval.start = input.LT(1);

        Object root_0 = null;

        Token ID11=null;
        Token char_literal12=null;
        Token INT13=null;

        Object ID11_tree=null;
        Object char_literal12_tree=null;
        Object INT13_tree=null;

        try {
            // Poly.g:15:5: ( ID '^' INT )
            // Poly.g:15:7: ID '^' INT
            {
            root_0 = (Object)adaptor.nil();

            ID11=(Token)match(input,ID,FOLLOW_ID_in_exp113); 
            ID11_tree = (Object)adaptor.create(ID11);
            adaptor.addChild(root_0, ID11_tree);

            char_literal12=(Token)match(input,9,FOLLOW_9_in_exp115); 
            char_literal12_tree = (Object)adaptor.create(char_literal12);
            root_0 = (Object)adaptor.becomeRoot(char_literal12_tree, root_0);

            INT13=(Token)match(input,INT,FOLLOW_INT_in_exp118); 
            INT13_tree = (Object)adaptor.create(INT13);
            adaptor.addChild(root_0, INT13_tree);


            }

            retval.stop = input.LT(-1);

            retval.tree = (Object)adaptor.rulePostProcessing(root_0);
            adaptor.setTokenBoundaries(retval.tree, retval.start, retval.stop);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
    	retval.tree = (Object)adaptor.errorNode(input, retval.start, input.LT(-1), re);

        }
        finally {
        }
        return retval;
    }
    // $ANTLR end "exp"

    // Delegated rules


 

    public static final BitSet FOLLOW_term_in_poly24 = new BitSet(new long[]{0x0000000000000102L});
    public static final BitSet FOLLOW_8_in_poly27 = new BitSet(new long[]{0x0000000000000060L});
    public static final BitSet FOLLOW_term_in_poly30 = new BitSet(new long[]{0x0000000000000102L});
    public static final BitSet FOLLOW_INT_in_term44 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_ID_in_term46 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_INT_in_term66 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_exp_in_term68 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_exp_in_term87 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_INT_in_term95 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ID_in_term100 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ID_in_exp113 = new BitSet(new long[]{0x0000000000000200L});
    public static final BitSet FOLLOW_9_in_exp115 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_exp118 = new BitSet(new long[]{0x0000000000000002L});

}