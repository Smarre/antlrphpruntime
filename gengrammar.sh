#!/bin/bash

export ANTLR_LIB=`pwd`
export CLASSPATH=$CLASSPATH:$ANTLR_LIB/antlr.jar
ls $ANTLR_LIB/antlr.jar

cp runtime/Php/test/Antlr/Tests/grammers/*.tokens runtime/Php/test/Antlr/Tests/generated
java -jar antlr.jar -fo runtime/Php/test/Antlr/Tests/generated runtime/Php/test/Antlr/Tests/grammers/$1

