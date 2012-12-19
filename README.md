
Installation
============

There is no prebuilt packages at the moment, you need to compile your own version
from the source. 

    # install antlr 3.4 (or later)
    vi build.properties
    ant

If ant ran successfully, you have antlr-php.jar at directory lib/, which contains 
php runtime that can be used with Ant.

Installation from PEAR
----------------------

PHP runtime can be installed from PEAR:

    pear channel-discover pear.smar.fi
    pear install channel://pear.smar.fi/antlrphpruntime-0.0.4

Manual installation
-------------------

PHP runtime can be packaged and installed using PEAR, with commands

    pear package
    pear install [package_name]

Now the runtime can be used as any other PEAR package.

Helper script
-------------

There is also helper script install.rb which installs libraries to
/usr/local/share/antlr-php and binaries /usr/local/bin.

Usage
=====

In theory usage happens by using antlr’s org.antlr.Tool to compile your grammar.
You need to set both antlr.jar and antlr-php.jar to CLASSPATH and then run

    java org.antlr.Tool Grammar.g 

which results to a tokens file and lexer and parser files written in PHP.

There is also helper script gen-antlr-php which can be used to do this generation.

    # ensure you ran install.rb
    gen-antlr-php -g Foo.g

It automatically loads antlr instance with correct classpath and uses correct antlr
tool for generation.

History
=======

October 2008 - initiation and work on the project by Sidharth Kuruvila

Starting from April 2009   - contributions by Yauhen Yakimovich

Notes from 2012
---------------

I found this version from http://codinggorilla.domemtech.com/?p=995. The author seems to be
Ken Domino, which changes are made by him can be looked by doing diff from initial commit
of this repository and comparing it to the code at https://code.google.com/p/antlrphpruntime/
which seems to be unmaintained by now. Hence I went and created yet another fork. 

Development
===========

Some examples are already working (See examples/import). Runtime is in alpha status. Primary
milstone is aimed at verification of Lexer, Parser generation.

A working ATNLRv3 tool with php target suppport can be found inside a "lib" folder.
File is called antlr-3.1.3-php.jar, you need to make sure that it is in your classpath together
with the rest of files in "lib". 

To make changes to Php target integration with a tool, take a look inside a "tool" folder. You can start
from looking at Php.stg StringTemplate group file.
You will also need a copy of ANTLR Tool sources to develop the php target. To do this copy the contents
of the directory "tool" into the corresponding directory in the anltr 3.1.3 source bundle. You can get the antlr
source bundle at http://www.antlr.org/download/. 

The test cases, found in the test directory, need PHPUnit3 to run. This should be available through pear,
instructions here http://www.phpunit.de/manual/3.3/en/installation.html, so I just download it
from http://pear.phpunit.de/get/.
