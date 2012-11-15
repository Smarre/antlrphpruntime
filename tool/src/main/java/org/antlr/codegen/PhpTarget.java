/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package org.antlr.codegen;
import org.antlr.tool.Grammar;
/**
 *
 * @author sidharth
 */
public class PhpTarget extends Target{
	public String getTargetCharLiteralFromANTLRCharLiteral(
			CodeGenerator generator, String literal) {
		int c = Grammar.getCharValueFromGrammarCharLiteral(literal);
		return String.valueOf(c);
    }


	public String encodeIntAsCharEscape(int v) {
			String hex = Integer.toHexString(v&0xff);
			return"\\x"+hex;
	}


}
