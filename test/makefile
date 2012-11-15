top: doit

lx:
	java -jar ../antlr.jar xxx.g
	javac -cp ../antlr.jar Doit.java xxx.java
	java -cp '.;../antlr.jar' Doit mm.html

doit: l p c x


l:
	java -jar ../antlr.jar HTMLLexer.g

p:
	java -jar ../antlr.jar HTMLParser.g

c:
	javac -cp ../antlr.jar Doit.java HTMLLexer.java HTMLParser.java

x:
	java -cp '.;../antlr.jar' Doit drugs.html
