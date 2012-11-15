@echo off
set PROJ_PATH=%CD%

cd runtime\Php\test

"%PHP_PEAR_BIN_DIR%\phpunit.bat" --bootstrap bootstrap.php --verbose Antlr\Tests\%1
