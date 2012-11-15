#!/bin/bash

export ANTLR_LIB=`pwd`
export CLASSPATH=$CLASSPATH:$ANTLR_LIB/antlr.jar
ls $ANTLR_LIB/antlr.jar

cp runtime/Php/test/Antlr/Tests/grammers/*.tokens runtime/Php/test/Antlr/Tests/generated

for file in runtime/Php/test/Antlr/Tests/grammers/*.g
do
	java -jar antlr.jar -fo runtime/Php/test/Antlr/Tests/generated ${file}
done