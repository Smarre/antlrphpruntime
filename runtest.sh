#!/bin/bash

export PROJ_PATH=`pwd`
alias phpunit='php.exe c:\\Program\ Files\ \(x86\)\\NuSphere\\PhpED\\php53\\phpunit'

cd runtime/Php/test

phpunit "$2" --bootstrap bootstrap.php Antlr/Tests/$1
