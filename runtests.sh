#!/bin/bash
# Call by: "./runtests.sh"

file=test
if [[ $1 ]]; then
	file=test/$1
fi

export PROJ_PATH=`pwd`
cd runtime/Php/test

phpunit "$2" --bootstrap bootstrap.php Antlr/Tests