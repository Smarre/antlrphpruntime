grammar Simple;

options {
  language = Php;
}

// pull in all rules even if not referenced so comments etc... work
import CommonLexer; 

file : 'program' ID ';' 
      	//java: {System.out.println("found program "+$ID.text);}
	{echo "found program " . $ID.text . "\n";}
	decl+
     ;

decl : 'var' ID ('=' expr)? ';'       
	//java: {System.out.println("found var "+$ID.text);}		
        {echo "found var " . $ID.text . "\n";}
     ;

expr : INT | FLOAT ;
