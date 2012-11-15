
 History
 =======

October 2008 - initiation and work on the project by Sidharth Kuruvila

Starting from April 2009   - contributions by Yauhen Yakimovich


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
