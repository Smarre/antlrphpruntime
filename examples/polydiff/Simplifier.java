// $ANTLR 3.1.3 ??? 05, 2009 23:29:28 Simplifier.g 2009-05-06 00:12:23

import org.antlr.runtime.*;
import org.antlr.runtime.tree.*;import java.util.Stack;
import java.util.List;
import java.util.ArrayList;
import java.util.Map;
import java.util.HashMap;

public class Simplifier extends TreeParser {
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


        public Simplifier(TreeNodeStream input) {
            this(input, new RecognizerSharedState());
        }
        public Simplifier(TreeNodeStream input, RecognizerSharedState state) {
            super(input, state);
             
        }
        
    protected TreeAdaptor adaptor = new CommonTreeAdaptor();

    public void setTreeAdaptor(TreeAdaptor adaptor) {
        this.adaptor = adaptor;
    }
    public TreeAdaptor getTreeAdaptor() {
        return adaptor;
    }

    public String[] getTokenNames() { return Simplifier.tokenNames; }
    public String getGrammarFileName() { return "Simplifier.g"; }


    public static class poly_return extends TreeRuleReturnScope {
        CommonTree tree;
        public Object getTree() { return tree; }
    };

    // $ANTLR start "poly"
    // Simplifier.g:10:1: poly : ( ^( '+' a= INT b= INT ) -> INT[String.valueOf($a.int+$b.int)] | ^( '+' ^( '+' a= INT p= poly ) b= INT ) -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] ) | ^( '+' ^( '+' p= poly a= INT ) b= INT ) -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] ) | ^( '+' p= poly q= poly ) -> {$p.tree.toStringTree().equals(\"0\")}? $q -> {$q.tree.toStringTree().equals(\"0\")}? $p -> ^( '+' $p $q) | ^( MULT INT poly ) -> {$INT.int==1}? poly -> ^( MULT INT poly ) | ^( '^' ID e= INT ) -> {$e.int==1}? ID -> {$e.int==0}? INT[\"1\"] -> ^( '^' ID INT ) | INT | ID );
    public final Simplifier.poly_return poly() throws RecognitionException {
        Simplifier.poly_return retval = new Simplifier.poly_return();
        retval.start = input.LT(1);

        CommonTree root_0 = null;

        CommonTree _first_0 = null;
        CommonTree _last = null;

        CommonTree a=null;
        CommonTree b=null;
        CommonTree e=null;
        CommonTree char_literal1=null;
        CommonTree char_literal2=null;
        CommonTree char_literal3=null;
        CommonTree char_literal4=null;
        CommonTree char_literal5=null;
        CommonTree char_literal6=null;
        CommonTree MULT7=null;
        CommonTree INT8=null;
        CommonTree char_literal10=null;
        CommonTree ID11=null;
        CommonTree INT12=null;
        CommonTree ID13=null;
        Simplifier.poly_return p = null;

        Simplifier.poly_return q = null;

        Simplifier.poly_return poly9 = null;


        CommonTree a_tree=null;
        CommonTree b_tree=null;
        CommonTree e_tree=null;
        CommonTree char_literal1_tree=null;
        CommonTree char_literal2_tree=null;
        CommonTree char_literal3_tree=null;
        CommonTree char_literal4_tree=null;
        CommonTree char_literal5_tree=null;
        CommonTree char_literal6_tree=null;
        CommonTree MULT7_tree=null;
        CommonTree INT8_tree=null;
        CommonTree char_literal10_tree=null;
        CommonTree ID11_tree=null;
        CommonTree INT12_tree=null;
        CommonTree ID13_tree=null;
        RewriteRuleNodeStream stream_INT=new RewriteRuleNodeStream(adaptor,"token INT");
        RewriteRuleNodeStream stream_MULT=new RewriteRuleNodeStream(adaptor,"token MULT");
        RewriteRuleNodeStream stream_ID=new RewriteRuleNodeStream(adaptor,"token ID");
        RewriteRuleNodeStream stream_9=new RewriteRuleNodeStream(adaptor,"token 9");
        RewriteRuleNodeStream stream_8=new RewriteRuleNodeStream(adaptor,"token 8");
        RewriteRuleSubtreeStream stream_poly=new RewriteRuleSubtreeStream(adaptor,"rule poly");
        try {
            // Simplifier.g:15:5: ( ^( '+' a= INT b= INT ) -> INT[String.valueOf($a.int+$b.int)] | ^( '+' ^( '+' a= INT p= poly ) b= INT ) -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] ) | ^( '+' ^( '+' p= poly a= INT ) b= INT ) -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] ) | ^( '+' p= poly q= poly ) -> {$p.tree.toStringTree().equals(\"0\")}? $q -> {$q.tree.toStringTree().equals(\"0\")}? $p -> ^( '+' $p $q) | ^( MULT INT poly ) -> {$INT.int==1}? poly -> ^( MULT INT poly ) | ^( '^' ID e= INT ) -> {$e.int==1}? ID -> {$e.int==0}? INT[\"1\"] -> ^( '^' ID INT ) | INT | ID )
            int alt1=8;
            alt1 = dfa1.predict(input);
            switch (alt1) {
                case 1 :
                    // Simplifier.g:15:7: ^( '+' a= INT b= INT )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal1=(CommonTree)match(input,8,FOLLOW_8_in_poly43); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_8.add(char_literal1);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    a=(CommonTree)match(input,INT,FOLLOW_INT_in_poly47); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(a);

                    _last = (CommonTree)input.LT(1);
                    b=(CommonTree)match(input,INT,FOLLOW_INT_in_poly51); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(b);


                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    if ( state.backtracking==0 ) {
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 15:26: -> INT[String.valueOf($a.int+$b.int)]
                    {
                        adaptor.addChild(root_0, (CommonTree)adaptor.create(INT, String.valueOf((a!=null?Integer.valueOf(a.getText()):0)+(b!=null?Integer.valueOf(b.getText()):0))));

                    }

                    retval.tree = root_0;}
                    }
                    break;
                case 2 :
                    // Simplifier.g:17:4: ^( '+' ^( '+' a= INT p= poly ) b= INT )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal2=(CommonTree)match(input,8,FOLLOW_8_in_poly64); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_8.add(char_literal2);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_2 = _last;
                    CommonTree _first_2 = null;
                    CommonTree root_2 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal3=(CommonTree)match(input,8,FOLLOW_8_in_poly67); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_8.add(char_literal3);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    a=(CommonTree)match(input,INT,FOLLOW_INT_in_poly71); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(a);

                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly75);
                    p=poly();

                    state._fsp--;
                    if (state.failed) return retval;
                    if ( state.backtracking==0 ) stream_poly.add(p.getTree());

                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_1, root_2);_last = _save_last_2;
                    }

                    _last = (CommonTree)input.LT(1);
                    b=(CommonTree)match(input,INT,FOLLOW_INT_in_poly80); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(b);


                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: INT, 8, p
                    // token labels: 
                    // rule labels: retval, p
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    if ( state.backtracking==0 ) {
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
                    RewriteRuleSubtreeStream stream_p=new RewriteRuleSubtreeStream(adaptor,"rule p",p!=null?p.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 18:8: -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] )
                    {
                        // Simplifier.g:18:11: ^( '+' $p INT[String.valueOf($a.int+$b.int)] )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(stream_8.nextNode(), root_1);

                        adaptor.addChild(root_1, stream_p.nextTree());
                        adaptor.addChild(root_1, (CommonTree)adaptor.create(INT, String.valueOf((a!=null?Integer.valueOf(a.getText()):0)+(b!=null?Integer.valueOf(b.getText()):0))));

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;}
                    }
                    break;
                case 3 :
                    // Simplifier.g:20:4: ^( '+' ^( '+' p= poly a= INT ) b= INT )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal4=(CommonTree)match(input,8,FOLLOW_8_in_poly108); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_8.add(char_literal4);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_2 = _last;
                    CommonTree _first_2 = null;
                    CommonTree root_2 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal5=(CommonTree)match(input,8,FOLLOW_8_in_poly111); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_8.add(char_literal5);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly115);
                    p=poly();

                    state._fsp--;
                    if (state.failed) return retval;
                    if ( state.backtracking==0 ) stream_poly.add(p.getTree());
                    _last = (CommonTree)input.LT(1);
                    a=(CommonTree)match(input,INT,FOLLOW_INT_in_poly119); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(a);


                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_1, root_2);_last = _save_last_2;
                    }

                    _last = (CommonTree)input.LT(1);
                    b=(CommonTree)match(input,INT,FOLLOW_INT_in_poly124); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(b);


                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: p, INT, 8
                    // token labels: 
                    // rule labels: retval, p
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    if ( state.backtracking==0 ) {
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
                    RewriteRuleSubtreeStream stream_p=new RewriteRuleSubtreeStream(adaptor,"rule p",p!=null?p.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 21:8: -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] )
                    {
                        // Simplifier.g:21:11: ^( '+' $p INT[String.valueOf($a.int+$b.int)] )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(stream_8.nextNode(), root_1);

                        adaptor.addChild(root_1, stream_p.nextTree());
                        adaptor.addChild(root_1, (CommonTree)adaptor.create(INT, String.valueOf((a!=null?Integer.valueOf(a.getText()):0)+(b!=null?Integer.valueOf(b.getText()):0))));

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;}
                    }
                    break;
                case 4 :
                    // Simplifier.g:23:4: ^( '+' p= poly q= poly )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal6=(CommonTree)match(input,8,FOLLOW_8_in_poly152); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_8.add(char_literal6);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly156);
                    p=poly();

                    state._fsp--;
                    if (state.failed) return retval;
                    if ( state.backtracking==0 ) stream_poly.add(p.getTree());
                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly160);
                    q=poly();

                    state._fsp--;
                    if (state.failed) return retval;
                    if ( state.backtracking==0 ) stream_poly.add(q.getTree());

                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: q, q, p, 8, p
                    // token labels: 
                    // rule labels: retval, q, p
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    if ( state.backtracking==0 ) {
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);
                    RewriteRuleSubtreeStream stream_q=new RewriteRuleSubtreeStream(adaptor,"rule q",q!=null?q.tree:null);
                    RewriteRuleSubtreeStream stream_p=new RewriteRuleSubtreeStream(adaptor,"rule p",p!=null?p.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 23:24: -> {$p.tree.toStringTree().equals(\"0\")}? $q
                    if ((p!=null?((CommonTree)p.tree):null).toStringTree().equals("0")) {
                        adaptor.addChild(root_0, stream_q.nextTree());

                    }
                    else // 24:8: -> {$q.tree.toStringTree().equals(\"0\")}? $p
                    if ((q!=null?((CommonTree)q.tree):null).toStringTree().equals("0")) {
                        adaptor.addChild(root_0, stream_p.nextTree());

                    }
                    else // 25:8: -> ^( '+' $p $q)
                    {
                        // Simplifier.g:25:11: ^( '+' $p $q)
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(stream_8.nextNode(), root_1);

                        adaptor.addChild(root_1, stream_p.nextTree());
                        adaptor.addChild(root_1, stream_q.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;}
                    }
                    break;
                case 5 :
                    // Simplifier.g:27:4: ^( MULT INT poly )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    MULT7=(CommonTree)match(input,MULT,FOLLOW_MULT_in_poly207); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_MULT.add(MULT7);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    INT8=(CommonTree)match(input,INT,FOLLOW_INT_in_poly209); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(INT8);

                    _last = (CommonTree)input.LT(1);
                    pushFollow(FOLLOW_poly_in_poly211);
                    poly9=poly();

                    state._fsp--;
                    if (state.failed) return retval;
                    if ( state.backtracking==0 ) stream_poly.add(poly9.getTree());

                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: INT, poly, poly, MULT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    if ( state.backtracking==0 ) {
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 27:21: -> {$INT.int==1}? poly
                    if ((INT8!=null?Integer.valueOf(INT8.getText()):0)==1) {
                        adaptor.addChild(root_0, stream_poly.nextTree());

                    }
                    else // 28:8: -> ^( MULT INT poly )
                    {
                        // Simplifier.g:28:11: ^( MULT INT poly )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(stream_MULT.nextNode(), root_1);

                        adaptor.addChild(root_1, stream_INT.nextNode());
                        adaptor.addChild(root_1, stream_poly.nextTree());

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;}
                    }
                    break;
                case 6 :
                    // Simplifier.g:30:4: ^( '^' ID e= INT )
                    {
                    _last = (CommonTree)input.LT(1);
                    {
                    CommonTree _save_last_1 = _last;
                    CommonTree _first_1 = null;
                    CommonTree root_1 = (CommonTree)adaptor.nil();_last = (CommonTree)input.LT(1);
                    char_literal10=(CommonTree)match(input,9,FOLLOW_9_in_poly242); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_9.add(char_literal10);



                    match(input, Token.DOWN, null); if (state.failed) return retval;
                    _last = (CommonTree)input.LT(1);
                    ID11=(CommonTree)match(input,ID,FOLLOW_ID_in_poly244); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_ID.add(ID11);

                    _last = (CommonTree)input.LT(1);
                    e=(CommonTree)match(input,INT,FOLLOW_INT_in_poly248); if (state.failed) return retval; 
                    if ( state.backtracking==0 ) stream_INT.add(e);


                    match(input, Token.UP, null); if (state.failed) return retval;adaptor.addChild(root_0, root_1);_last = _save_last_1;
                    }



                    // AST REWRITE
                    // elements: 9, ID, INT, ID, INT
                    // token labels: 
                    // rule labels: retval
                    // token list labels: 
                    // rule list labels: 
                    // wildcard labels: 
                    if ( state.backtracking==0 ) {
                    retval.tree = root_0;
                    RewriteRuleSubtreeStream stream_retval=new RewriteRuleSubtreeStream(adaptor,"rule retval",retval!=null?retval.tree:null);

                    root_0 = (CommonTree)adaptor.nil();
                    // 30:21: -> {$e.int==1}? ID
                    if ((e!=null?Integer.valueOf(e.getText()):0)==1) {
                        adaptor.addChild(root_0, stream_ID.nextNode());

                    }
                    else // 31:8: -> {$e.int==0}? INT[\"1\"]
                    if ((e!=null?Integer.valueOf(e.getText()):0)==0) {
                        adaptor.addChild(root_0, (CommonTree)adaptor.create(INT, "1"));

                    }
                    else // 32:8: -> ^( '^' ID INT )
                    {
                        // Simplifier.g:32:11: ^( '^' ID INT )
                        {
                        CommonTree root_1 = (CommonTree)adaptor.nil();
                        root_1 = (CommonTree)adaptor.becomeRoot(stream_9.nextNode(), root_1);

                        adaptor.addChild(root_1, stream_ID.nextNode());
                        adaptor.addChild(root_1, stream_INT.nextNode());

                        adaptor.addChild(root_0, root_1);
                        }

                    }

                    retval.tree = root_0;}
                    }
                    break;
                case 7 :
                    // Simplifier.g:34:4: INT
                    {
                    root_0 = (CommonTree)adaptor.nil();

                    _last = (CommonTree)input.LT(1);
                    INT12=(CommonTree)match(input,INT,FOLLOW_INT_in_poly293); if (state.failed) return retval;
                    if ( state.backtracking==0 ) {
                    INT12_tree = (CommonTree)adaptor.dupNode(INT12);

                    adaptor.addChild(root_0, INT12_tree);
                    }

                    if ( state.backtracking==0 ) {
                    }
                    }
                    break;
                case 8 :
                    // Simplifier.g:35:4: ID
                    {
                    root_0 = (CommonTree)adaptor.nil();

                    _last = (CommonTree)input.LT(1);
                    ID13=(CommonTree)match(input,ID,FOLLOW_ID_in_poly298); if (state.failed) return retval;
                    if ( state.backtracking==0 ) {
                    ID13_tree = (CommonTree)adaptor.dupNode(ID13);

                    adaptor.addChild(root_0, ID13_tree);
                    }

                    if ( state.backtracking==0 ) {
                    }
                    }
                    break;

            }
            if ( state.backtracking==0 ) {

            retval.tree = (CommonTree)adaptor.rulePostProcessing(root_0);
            }
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

    // $ANTLR start synpred1_Simplifier
    public final void synpred1_Simplifier_fragment() throws RecognitionException {   
        CommonTree a=null;
        CommonTree b=null;

        // Simplifier.g:15:7: ( ^( '+' a= INT b= INT ) )
        // Simplifier.g:15:7: ^( '+' a= INT b= INT )
        {
        match(input,8,FOLLOW_8_in_synpred1_Simplifier43); if (state.failed) return ;

        match(input, Token.DOWN, null); if (state.failed) return ;
        a=(CommonTree)match(input,INT,FOLLOW_INT_in_synpred1_Simplifier47); if (state.failed) return ;
        b=(CommonTree)match(input,INT,FOLLOW_INT_in_synpred1_Simplifier51); if (state.failed) return ;

        match(input, Token.UP, null); if (state.failed) return ;

        }
    }
    // $ANTLR end synpred1_Simplifier

    // $ANTLR start synpred2_Simplifier
    public final void synpred2_Simplifier_fragment() throws RecognitionException {   
        CommonTree a=null;
        CommonTree b=null;
        Simplifier.poly_return p = null;


        // Simplifier.g:17:4: ( ^( '+' ^( '+' a= INT p= poly ) b= INT ) )
        // Simplifier.g:17:4: ^( '+' ^( '+' a= INT p= poly ) b= INT )
        {
        match(input,8,FOLLOW_8_in_synpred2_Simplifier64); if (state.failed) return ;

        match(input, Token.DOWN, null); if (state.failed) return ;
        match(input,8,FOLLOW_8_in_synpred2_Simplifier67); if (state.failed) return ;

        match(input, Token.DOWN, null); if (state.failed) return ;
        a=(CommonTree)match(input,INT,FOLLOW_INT_in_synpred2_Simplifier71); if (state.failed) return ;
        pushFollow(FOLLOW_poly_in_synpred2_Simplifier75);
        p=poly();

        state._fsp--;
        if (state.failed) return ;

        match(input, Token.UP, null); if (state.failed) return ;
        b=(CommonTree)match(input,INT,FOLLOW_INT_in_synpred2_Simplifier80); if (state.failed) return ;

        match(input, Token.UP, null); if (state.failed) return ;

        }
    }
    // $ANTLR end synpred2_Simplifier

    // $ANTLR start synpred3_Simplifier
    public final void synpred3_Simplifier_fragment() throws RecognitionException {   
        CommonTree a=null;
        CommonTree b=null;
        Simplifier.poly_return p = null;


        // Simplifier.g:20:4: ( ^( '+' ^( '+' p= poly a= INT ) b= INT ) )
        // Simplifier.g:20:4: ^( '+' ^( '+' p= poly a= INT ) b= INT )
        {
        match(input,8,FOLLOW_8_in_synpred3_Simplifier108); if (state.failed) return ;

        match(input, Token.DOWN, null); if (state.failed) return ;
        match(input,8,FOLLOW_8_in_synpred3_Simplifier111); if (state.failed) return ;

        match(input, Token.DOWN, null); if (state.failed) return ;
        pushFollow(FOLLOW_poly_in_synpred3_Simplifier115);
        p=poly();

        state._fsp--;
        if (state.failed) return ;
        a=(CommonTree)match(input,INT,FOLLOW_INT_in_synpred3_Simplifier119); if (state.failed) return ;

        match(input, Token.UP, null); if (state.failed) return ;
        b=(CommonTree)match(input,INT,FOLLOW_INT_in_synpred3_Simplifier124); if (state.failed) return ;

        match(input, Token.UP, null); if (state.failed) return ;

        }
    }
    // $ANTLR end synpred3_Simplifier

    // $ANTLR start synpred4_Simplifier
    public final void synpred4_Simplifier_fragment() throws RecognitionException {   
        Simplifier.poly_return p = null;

        Simplifier.poly_return q = null;


        // Simplifier.g:23:4: ( ^( '+' p= poly q= poly ) )
        // Simplifier.g:23:4: ^( '+' p= poly q= poly )
        {
        match(input,8,FOLLOW_8_in_synpred4_Simplifier152); if (state.failed) return ;

        match(input, Token.DOWN, null); if (state.failed) return ;
        pushFollow(FOLLOW_poly_in_synpred4_Simplifier156);
        p=poly();

        state._fsp--;
        if (state.failed) return ;
        pushFollow(FOLLOW_poly_in_synpred4_Simplifier160);
        q=poly();

        state._fsp--;
        if (state.failed) return ;

        match(input, Token.UP, null); if (state.failed) return ;

        }
    }
    // $ANTLR end synpred4_Simplifier

    // Delegated rules

    public final boolean synpred2_Simplifier() {
        state.backtracking++;
        int start = input.mark();
        try {
            synpred2_Simplifier_fragment(); // can never throw exception
        } catch (RecognitionException re) {
            System.err.println("impossible: "+re);
        }
        boolean success = !state.failed;
        input.rewind(start);
        state.backtracking--;
        state.failed=false;
        return success;
    }
    public final boolean synpred1_Simplifier() {
        state.backtracking++;
        int start = input.mark();
        try {
            synpred1_Simplifier_fragment(); // can never throw exception
        } catch (RecognitionException re) {
            System.err.println("impossible: "+re);
        }
        boolean success = !state.failed;
        input.rewind(start);
        state.backtracking--;
        state.failed=false;
        return success;
    }
    public final boolean synpred4_Simplifier() {
        state.backtracking++;
        int start = input.mark();
        try {
            synpred4_Simplifier_fragment(); // can never throw exception
        } catch (RecognitionException re) {
            System.err.println("impossible: "+re);
        }
        boolean success = !state.failed;
        input.rewind(start);
        state.backtracking--;
        state.failed=false;
        return success;
    }
    public final boolean synpred3_Simplifier() {
        state.backtracking++;
        int start = input.mark();
        try {
            synpred3_Simplifier_fragment(); // can never throw exception
        } catch (RecognitionException re) {
            System.err.println("impossible: "+re);
        }
        boolean success = !state.failed;
        input.rewind(start);
        state.backtracking--;
        state.failed=false;
        return success;
    }


    protected DFA1 dfa1 = new DFA1(this);
    static final String DFA1_eotS =
        "\12\uffff";
    static final String DFA1_eofS =
        "\12\uffff";
    static final String DFA1_minS =
        "\1\4\1\0\10\uffff";
    static final String DFA1_maxS =
        "\1\11\1\0\10\uffff";
    static final String DFA1_acceptS =
        "\2\uffff\1\5\1\6\1\7\1\10\1\1\1\2\1\3\1\4";
    static final String DFA1_specialS =
        "\1\uffff\1\0\10\uffff}>";
    static final String[] DFA1_transitionS = {
            "\1\2\1\4\1\5\1\uffff\1\1\1\3",
            "\1\uffff",
            "",
            "",
            "",
            "",
            "",
            "",
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
            return "10:1: poly : ( ^( '+' a= INT b= INT ) -> INT[String.valueOf($a.int+$b.int)] | ^( '+' ^( '+' a= INT p= poly ) b= INT ) -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] ) | ^( '+' ^( '+' p= poly a= INT ) b= INT ) -> ^( '+' $p INT[String.valueOf($a.int+$b.int)] ) | ^( '+' p= poly q= poly ) -> {$p.tree.toStringTree().equals(\"0\")}? $q -> {$q.tree.toStringTree().equals(\"0\")}? $p -> ^( '+' $p $q) | ^( MULT INT poly ) -> {$INT.int==1}? poly -> ^( MULT INT poly ) | ^( '^' ID e= INT ) -> {$e.int==1}? ID -> {$e.int==0}? INT[\"1\"] -> ^( '^' ID INT ) | INT | ID );";
        }
        public int specialStateTransition(int s, IntStream _input) throws NoViableAltException {
            TreeNodeStream input = (TreeNodeStream)_input;
        	int _s = s;
            switch ( s ) {
                    case 0 : 
                        int LA1_1 = input.LA(1);

                         
                        int index1_1 = input.index();
                        input.rewind();
                        s = -1;
                        if ( (synpred1_Simplifier()) ) {s = 6;}

                        else if ( (synpred2_Simplifier()) ) {s = 7;}

                        else if ( (synpred3_Simplifier()) ) {s = 8;}

                        else if ( (synpred4_Simplifier()) ) {s = 9;}

                         
                        input.seek(index1_1);
                        if ( s>=0 ) return s;
                        break;
            }
            if (state.backtracking>0) {state.failed=true; return -1;}
            NoViableAltException nvae =
                new NoViableAltException(getDescription(), 1, _s, input);
            error(nvae);
            throw nvae;
        }
    }
 

    public static final BitSet FOLLOW_8_in_poly43 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_poly47 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_poly51 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_8_in_poly64 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_8_in_poly67 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_poly71 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly75 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_poly80 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_8_in_poly108 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_8_in_poly111 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_poly115 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_poly119 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_poly124 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_8_in_poly152 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_poly156 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly160 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_MULT_in_poly207 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_poly209 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly211 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_9_in_poly242 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_ID_in_poly244 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_poly248 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_poly293 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ID_in_poly298 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_8_in_synpred1_Simplifier43 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_synpred1_Simplifier47 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_synpred1_Simplifier51 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_8_in_synpred2_Simplifier64 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_8_in_synpred2_Simplifier67 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_INT_in_synpred2_Simplifier71 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_synpred2_Simplifier75 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_synpred2_Simplifier80 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_8_in_synpred3_Simplifier108 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_8_in_synpred3_Simplifier111 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_synpred3_Simplifier115 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_INT_in_synpred3_Simplifier119 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_synpred3_Simplifier124 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_8_in_synpred4_Simplifier152 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_synpred4_Simplifier156 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_synpred4_Simplifier160 = new BitSet(new long[]{0x0000000000000008L});

}