#!/bin/bash
#
# This script allows to execute the org.antlr.Tool class and to pass the
# command line arguments to it
#
ANTLRPATH=`realpath \`dirname $0\``
CLASSPATH="${ANTLRPATH}/lib/antlr-3.2.jar:${ANTLRPATH}/lib/antlr-2.7.7.jar:${ANTLRPATH}/lib/gunit.jar:${ANTLRPATH}/lib/stringtemplate-3.2.jar:${ANTLRPATH}/lib/antlr-php.jar"
/usr/bin/env java -classpath ${CLASSPATH} org.antlr.Tool $@