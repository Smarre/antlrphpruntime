// $ANTLR 3.1.3 ??? 05, 2009 23:29:28 PolyDifferentiator.g 2009-05-06 00:12:21

import org.antlr.runtime.*;
import org.antlr.runtime.tree.*;import java.util.Stack;
import java.util.List;
import java.util.ArrayList;


public class PolyDifferentiator extends TreeParser {
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


        public PolyDifferentiator(TreeNodeStream input) {
            this(input, new RecognizerSharedState());
        }
        public PolyDifferentiator(TreeNodeStream input, RecognizerSharedState state) {
            super(input, state);
             
        }
        
    protected TreeAdaptor adaptor = new CommonTreeAdaptor();

    public void setTreeAdaptor(TreeAdaptor adaptor) {
        this.adaptor = adaptor;
    }
    public TreeAdaptor getTreeAdaptor() {
        return adaptor;
    }

    public String[] getTokenNames() { return PolyDifferentiator.tokenNames; }
    public String getGrammarFileName() { return "PolyDifferentiator.g"; }


    public static class poly_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };

    // $ANTLR start "poly"
    // PolyDifferentiator.g:9:1: poly : ( ^( '+' poly poly ) | ^( MULT INT ID ) -> INT | ^( MULT c= INT ^( '^' ID e= INT ) ) -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) ) | ^( '^' ID e= INT ) -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) ) | INT -> INT[\"0\"] | ID -> INT[\"1\"] );
    public final PolyDifferentiator.poly_return poly() throws RecognitionException {
        PolyDifferentiator.poly_return retval = new PolyDifferentiator.poly_return();
        retval.start = input.LT(1);

        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree c=null;
        CommonTree e=null;
        CommonTree char_literal1=null;
        CommonTree MULT4=null;
        CommonTree INT5=null;
        CommonTree ID6=null;
        CommonTree MULT7=null;
        CommonTree char_literal8=null;
        CommonTree ID9=null;
        CommonTree char_literal10=null;
        CommonTree ID11=null;
        CommonTree INT12=null;
        CommonTree ID13=null;
        PolyDifferentiator.poly_return poly2 = null;

        PolyDifferentiator.poly_return poly3 = null;


        CommonTree c_tree=null;
        CommonTree e_tree=null;
        CommonTree char_literal1_tree=null;
        CommonTree MULT4_tree=null;
        CommonTree INT5_tree=null;
        CommonTree ID6_tree=null;
        CommonTree MULT7_tree=null;
        CommonTree char_literal8_tree=null;
        CommonTree ID9_tree=null;
        CommonTree char_literal10_tree=null;
        CommonTree ID11_tree=null;
        CommonTree INT12_tree=null;
        CommonTree ID13_tree=null;
        RewriteRuleNodeStream stream_INT=new RewriteRuleNodeStream(adaptor,"token INT");
        RewriteRuleNodeStream stream_MULT=new RewriteRuleNodeStream(adaptor,"token MULT");
        RewriteRuleNodeStream stream_ID=new RewriteRuleNodeStream(adaptor,"token ID");
        RewriteRuleNodeStream stream_9=new RewriteRuleNodeStream(adaptor,"token 9");

        try {
            // PolyDifferentiator.g:9:5: ( ^( '+' poly poly ) | ^( MULT INT ID ) -> INT | ^( MULT c= INT ^( '^' ID e= INT ) ) -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) ) | ^( '^' ID e= INT ) -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) ) | INT -> INT[\"0\"] | ID -> INT[\"1\"] )
            int alt1=6;
            alt1 = dfa1.predict(input);
            switch (alt1) {
                case 1 :
                    // PolyDifferentiator.g:9:7: ^( '+' poly poly )
                    {
                    root_0 = (CommonTree)adaptor.nil();

                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal1=(CommonTree)match(input,8,FOLLOW_8_in_poly35); 
                    char_literal1_tree = (CommonTree)adaptor.dupNode(char_literal1);

                    root_1 = (CommonTree)adaptor.becomeRoot(char_literal1_tree, root_1);



                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly37);
                    poly2=poly();

                    state._fsp--;

                    adaptor.addChild(root_1, poly2.getTree());
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly39);
                    poly3=poly();

                    state._fsp--;

                    adaptor.addChild(root_1, poly3.getTree());

                    match(input, Token.UP, null); adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }


                    }
                    break;
                case 2 :
                    // PolyDifferentiator.g:10:4: ^( MULT INT ID )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    MULT4=(CommonTree)match(input,MULT,FOLLOW_MULT_in_poly46);  
                    stream_MULT.add(MULT4);



                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    INT5=(CommonTree)match(input,INT,FOLLOW_INT_in_poly48);  
                    stream_INT.add(INT5);

                    _last = (CommonTree)input.LT(1);
                    ID6=(CommonTree)match(input,ID,FOLLOW_ID_in_poly50);  
                    stream_ID.add(ID6);


                    match(input, Token.UP, null); adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 10:20: -> INT
                    {
                        adaptor.addChild(root_0, stream_INT.nextNode());

                    }

                    retval.tree = root_0;
                    }
                    break;
                case 3 :
                    // PolyDifferentiator.g:11:4: ^( MULT c= INT ^( '^' ID e= INT ) )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    MULT7=(CommonTree)match(input,MULT,FOLLOW_MULT_in_poly62);  
                    stream_MULT.add(MULT7);



                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    c=(CommonTree)match(input,INT,FOLLOW_INT_in_poly66);  
                    stream_INT.add(c);

                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_2 = _last;
                    CommonTree _first_2 = null;
                    CommonTree root_2 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal8=(CommonTree)match(input,9,FOLLOW_9_in_poly69);  
                    stream_9.add(char_literal8);



                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    ID9=(CommonTree)match(input,ID,FOLLOW_ID_in_poly71);  
                    stream_ID.add(ID9);

                    _last = (CommonTree)input.LT(1);
                    e=(CommonTree)match(input,INT,FOLLOW_INT_in_poly75);  
                    stream_INT.add(e);


                    match(input, Token.UP, null); adaptor.addChild(root_1, root_2);_last = _save_last_2;
                    }


                    match(input, Token.UP, null); adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }


                    		String c2 = String.valueOf((c!=null?Integer.valueOf(c.getText()):0)*(e!=null?Integer.valueOf(e.getText()):0));
                    		String e2 = String.valueOf((e!=null?Integer.valueOf(e.getText()):0)-1);
                    		


                    // AST REWRITE
                    // elements: 9, MULT, INT, ID, INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 16:8: -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) )
                    {
                        // PolyDifferentiator.g:16:11: ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot((CommonTree)adaptor.create(MULT, "*"), root_1);

                        adaptor.addChild(root_1, (CommonTree)adaptor.create(INT, c2));
                        // PolyDifferentiator.g:16:31: ^( '^' ID INT[e2] )
                        {
                        CommonTree root_2 = (CommonTree)adaptor.nil();
                        root_2 = (CommonTree)adaptor.becomeRoot(stream_9.nextNode(), root_2);

                        adaptor.addChild(root_2, stream_ID.nextNode());
                        adaptor.addChild(root_2, (CommonTree)adaptor.create(INT, e2));

                        adaptor.addChild(root_1, root_2);
                        }

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;
                    }
                    break;
                case 4 :
                    // PolyDifferentiator.g:17:4: ^( '^' ID e= INT )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal10=(CommonTree)match(input,9,FOLLOW_9_in_poly113);  
                    stream_9.add(char_literal10);



                    match(input, Token.DOWN, null); 
                    _last = (CommonTree)input.LT(1);
                    ID11=(CommonTree)match(input,ID,FOLLOW_ID_in_poly115);  
                    stream_ID.add(ID11);

                    _last = (CommonTree)input.LT(1);
                    e=(CommonTree)match(input,INT,FOLLOW_INT_in_poly119);  
                    stream_INT.add(e);


                    match(input, Token.UP, null); adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }


                    		String c2 = String.valueOf((e!=null?Integer.valueOf(e.getText()):0));
                    		String e2 = String.valueOf((e!=null?Integer.valueOf(e.getText()):0)-1);
                    		


                    // AST REWRITE
                    // elements: 9, INT, ID, INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 22:8: -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) )
                    {
                        // PolyDifferentiator.g:22:11: ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot((CommonTree)adaptor.create(MULT, "*"), root_1);

                        adaptor.addChild(root_1, (CommonTree)adaptor.create(INT, c2));
                        // PolyDifferentiator.g:22:31: ^( '^' ID INT[e2] )
                        {
                        CommonTree root_2 = (CommonTree)adaptor.nil();
                        root_2 = (CommonTree)adaptor.becomeRoot(stream_9.nextNode(), root_2);

                        adaptor.addChild(root_2, stream_ID.nextNode());
                        adaptor.addChild(root_2, (CommonTree)adaptor.create(INT, e2));

                        adaptor.addChild(root_1, root_2);
                        }

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;
                    }
                    break;
                case 5 :
                    // PolyDifferentiator.g:23:4: INT
                    {
                    _last = (CommonTree)input.LT(1);
                    INT12=(CommonTree)match(input,INT,FOLLOW_INT_in_poly155);  
                    stream_INT.add(INT12);



                    // AST REWRITE
                    // elements: INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 23:12: -> INT[\"0\"]
                    {
                        adaptor.addChild(root_0, (CommonTree)adaptor.create(INT, "0"));

                    }

                    retval.tree = root_0;
                    }
                    break;
                case 6 :
                    // PolyDifferentiator.g:24:4: ID
                    {
                    _last = (CommonTree)input.LT(1);
                    ID13=(CommonTree)match(input,ID,FOLLOW_ID_in_poly169);  
                    stream_ID.add(ID13);



                    // AST REWRITE
                    // elements: 
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 24:11: -> INT[\"1\"]
                    {
                        adaptor.addChild(root_0, (CommonTree)adaptor.create(INT, "1"));

                    }

                    retval.tree = root_0;
                    }
                    break;

            }
            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return retval;
    }
    // $ANTLR end "poly"

    // Delegated rules


    protected DFA1 dfa1 = new DFA1(this);
    static final String DFA1_eotS =
        "\12\uffff";
    static final String DFA1_eofS =
        "\12\uffff";
    static final String DFA1_minS =
        "\1\4\1\uffff\1\2\3\uffff\1\5\1\6\2\uffff";
    static final String DFA1_maxS =
        "\1\11\1\uffff\1\2\3\uffff\1\5\1\11\2\uffff";
    static final String DFA1_acceptS =
        "\1\uffff\1\1\1\uffff\1\4\1\5\1\6\2\uffff\1\2\1\3";
    static final String DFA1_specialS =
        "\12\uffff}>";
    static final String[] DFA1_transitionS = {
            "\1\2\1\4\1\5\1\uffff\1\1\1\3",
            "",
            "\1\6",
            "",
            "",
            "",
            "\1\7",
            "\1\10\2\uffff\1\11",
            "",
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
            return "9:1: poly : ( ^( '+' poly poly ) | ^( MULT INT ID ) -> INT | ^( MULT c= INT ^( '^' ID e= INT ) ) -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) ) | ^( '^' ID e= INT ) -> ^( MULT[\"*\"] INT[c2] ^( '^' ID INT[e2] ) ) | INT -> INT[\"0\"] | ID -> INT[\"1\"] );";
        }
    }
 

    public static final BitSet FOLLOW_8_in_poly35 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_poly37 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly39 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_MULT_in_poly46 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_poly48 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_ID_in_poly50 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_MULT_in_poly62 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_poly66 = new BitSet(new long[]{0x0000000000000200L});
    public static final BitSet FOLLOW_9_in_poly69 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_ID_in_poly71 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_poly75 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_9_in_poly113 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_ID_in_poly115 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_poly119 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_poly155 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ID_in_poly169 = new BitSet(new long[]{0x0000000000000002L});

}