// $ANTLR 3.1.3 ??? 05, 2009 23:29:28 PolyPrinter.g 2009-05-06 00:12:22

import org.antlr.runtime.*;
import org.antlr.runtime.tree.*;import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

import org.antlr.stringtemplate.*;
import org.antlr.stringtemplate.language.*;
import java.util.HashMap;
public class PolyPrinter extends TreeParser {
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


        public PolyPrinter(TreeNodeStream input) {
            this(input, new RecognizerSharedState());
        }
        public PolyPrinter(TreeNodeStream input, RecognizerSharedState state) {
            super(input, state);
             
        }
        
    protected StringTemplateGroup templateLib =
      new StringTemplateGroup("PolyPrinterTemplates", AngleBracketTemplateLexer.class);

    public void setTemplateLib(StringTemplateGroup templateLib) {
      this.templateLib = templateLib;
    }
    public StringTemplateGroup getTemplateLib() {
      return templateLib;
    }
    /** allows convenient multi-value initialization:
     *  "new STAttrMap().put(...).put(...)"
     */
    public static class STAttrMap extends HashMap {
      public STAttrMap put(String attrName, Object value) {
        super.put(attrName, value);
        return this;
      }
      public STAttrMap put(String attrName, int value) {
        super.put(attrName, new Integer(value));
        return this;
      }
    }

    public String[] getTokenNames() { return PolyPrinter.tokenNames; }
    public String getGrammarFileName() { return "PolyPrinter.g"; }


    public static class poly_return extends TreeRuleReturnScope {
        public StringTemplate st;
        public Object getTemplate() { return st; }
        public String toString() { return st==null?null:st.toString(); }
    };

    // $ANTLR start "poly"
    // PolyPrinter.g:8:1: poly : ( ^( '+' a= poly b= poly ) -> template(a=$a.stb=$b.st) \"<a>+<b>\" | ^( MULT a= poly b= poly ) -> template(a=$a.stb=$b.st) \"<a><b>\" | ^( '^' a= poly b= poly ) -> template(a=$a.stb=$b.st) \"<a>^<b>\" | INT -> {%{$INT.text}} | ID -> {%{$ID.text}});
    public final PolyPrinter.poly_return poly() throws RecognitionException {
        PolyPrinter.poly_return retval = new PolyPrinter.poly_return();
        retval.start = input.LT(1);

        CommonTree INT1=null;
        CommonTree ID2=null;
        PolyPrinter.poly_return a = null;

        PolyPrinter.poly_return b = null;


        try {
            // PolyPrinter.g:8:5: ( ^( '+' a= poly b= poly ) -> template(a=$a.stb=$b.st) \"<a>+<b>\" | ^( MULT a= poly b= poly ) -> template(a=$a.stb=$b.st) \"<a><b>\" | ^( '^' a= poly b= poly ) -> template(a=$a.stb=$b.st) \"<a>^<b>\" | INT -> {%{$INT.text}} | ID -> {%{$ID.text}})
            int alt1=5;
            switch ( input.LA(1) ) {
            case 8:
                {
                alt1=1;
                }
                break;
            case MULT:
                {
                alt1=2;
                }
                break;
            case 9:
                {
                alt1=3;
                }
                break;
            case INT:
                {
                alt1=4;
                }
                break;
            case ID:
                {
                alt1=5;
                }
                break;
            default:
                NoViableAltException nvae =
                    new NoViableAltException("", 1, 0, input);

                throw nvae;
            }

            switch (alt1) {
                case 1 :
                    // PolyPrinter.g:8:7: ^( '+' a= poly b= poly )
                    {
                    match(input,8,FOLLOW_8_in_poly34); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_poly_in_poly39);
                    a=poly();

                    state._fsp--;

                    pushFollow(FOLLOW_poly_in_poly43);
                    b=poly();

                    state._fsp--;


                    match(input, Token.UP, null); 


                    // TEMPLATE REWRITE
                    // 8:29: -> template(a=$a.stb=$b.st) \"<a>+<b>\"
                    {
                        retval.st = new StringTemplate(templateLib, "<a>+<b>",
                      new STAttrMap().put("a", (a!=null?a.st:null)).put("b", (b!=null?b.st:null)));
                    }


                    }
                    break;
                case 2 :
                    // PolyPrinter.g:9:4: ^( MULT a= poly b= poly )
                    {
                    match(input,MULT,FOLLOW_MULT_in_poly65); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_poly_in_poly69);
                    a=poly();

                    state._fsp--;

                    pushFollow(FOLLOW_poly_in_poly73);
                    b=poly();

                    state._fsp--;


                    match(input, Token.UP, null); 


                    // TEMPLATE REWRITE
                    // 9:26: -> template(a=$a.stb=$b.st) \"<a><b>\"
                    {
                        retval.st = new StringTemplate(templateLib, "<a><b>",
                      new STAttrMap().put("a", (a!=null?a.st:null)).put("b", (b!=null?b.st:null)));
                    }


                    }
                    break;
                case 3 :
                    // PolyPrinter.g:10:4: ^( '^' a= poly b= poly )
                    {
                    match(input,9,FOLLOW_9_in_poly95); 

                    match(input, Token.DOWN, null); 
                    pushFollow(FOLLOW_poly_in_poly100);
                    a=poly();

                    state._fsp--;

                    pushFollow(FOLLOW_poly_in_poly104);
                    b=poly();

                    state._fsp--;


                    match(input, Token.UP, null); 


                    // TEMPLATE REWRITE
                    // 10:26: -> template(a=$a.stb=$b.st) \"<a>^<b>\"
                    {
                        retval.st = new StringTemplate(templateLib, "<a>^<b>",
                      new STAttrMap().put("a", (a!=null?a.st:null)).put("b", (b!=null?b.st:null)));
                    }


                    }
                    break;
                case 4 :
                    // PolyPrinter.g:11:4: INT
                    {
                    INT1=(CommonTree)match(input,INT,FOLLOW_INT_in_poly125); 


                    // TEMPLATE REWRITE
                    // 11:13: -> {%{$INT.text}}
                    {
                        retval.st = new StringTemplate(templateLib,(INT1!=null?INT1.getText():null));
                    }


                    }
                    break;
                case 5 :
                    // PolyPrinter.g:12:4: ID
                    {
                    ID2=(CommonTree)match(input,ID,FOLLOW_ID_in_poly139); 


                    // TEMPLATE REWRITE
                    // 12:12: -> {%{$ID.text}}
                    {
                        retval.st = new StringTemplate(templateLib,(ID2!=null?ID2.getText():null));
                    }


                    }
                    break;

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

    // Delegated rules


 

    public static final BitSet FOLLOW_8_in_poly34 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_poly39 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly43 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_MULT_in_poly65 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_poly69 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly73 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_9_in_poly95 = new BitSet(new long[]{0x0000000000000004L});
    public static final BitSet FOLLOW_poly_in_poly100 = new BitSet(new long[]{0x0000000000000370L});
    public static final BitSet FOLLOW_poly_in_poly104 = new BitSet(new long[]{0x0000000000000008L});
    public static final BitSet FOLLOW_INT_in_poly125 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ID_in_poly139 = new BitSet(new long[]{0x0000000000000002L});

}