import java.io.*;
import org.antlr.runtime.*;
import org.antlr.runtime.debug.DebugEventSocketProxy;


public class __Test__ {

    public static void main(String args[]) throws Exception {
        myxml lex = new myxml(new ANTLRFileStream("C:\\Personal\\Work\\development-website\\antlrphpruntime\\v2src\\runtime\\Php\\test\\Antlr\\Tests\\grammers\\t012lexerXML.input", "UTF8"));
        CommonTokenStream tokens = new CommonTokenStream(lex);

 g = new (tokens, 49100, null);
        try {
            g.DOCUMENT();
        } catch (RecognitionException e) {
            e.printStackTrace();
        }
    }
}