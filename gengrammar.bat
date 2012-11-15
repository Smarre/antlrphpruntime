@echo off
SET CLASSPATH=%CLASSPATH%;.\lib\antlr-3.1.3-php.jar;.\lib\antlr-2.7.7.jar;.\lib\antlr-runtime-3.1.3.jar;.\lib\gunit.jar;.\lib\stringtemplate-3.2.jar 
java org.antlr.Tool %1 %2 %3 %4 %5 %6 %7

