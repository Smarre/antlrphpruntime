@echo off
SET ANTLR_LIB=..\..\lib
SET CLASSPATH=%CLASSPATH%;%ANTLR_LIB%\antlr-3.1.3-php.jar;%ANTLR_LIB%\antlr-2.7.7.jar;%ANTLR_LIB%\antlr-runtime-3.1.3.jar;%ANTLR_LIB%\gunit.jar;%ANTLR_LIB%\stringtemplate-3.2.jar 

echo Generating CommonLexer.g, Simple.g
java org.antlr.Tool CommonLexer.g 
java org.antlr.Tool Simple.g 


