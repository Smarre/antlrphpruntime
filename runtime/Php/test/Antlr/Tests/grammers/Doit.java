import org.antlr.runtime.*;
import org.antlr.runtime.tree.*;
import java.io.*;

public class Doit {

    int my_i = 0;
    
    public static void main(String[] args) throws Exception {
        for (String s: args) {
            try {
                System.out.println("Input file is " + s);
                File inFile = new File(s);
                String inFileName = inFile.getName();
                System.setIn(new FileInputStream(s));
                ANTLRInputStream input = new ANTLRInputStream(System.in);
		myxml lexer = new myxml(input);
		Token token;
		for (;;)
		{
		    token = lexer.nextToken();
		    System.out.println("TT = " + token.getType());
		    System.out.println("TV = " + token.getText());
		    System.out.println();
		    if (token.getType() == Token.EOF)
			break;
		}

            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
}
