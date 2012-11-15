@echo off
set PROJ_PATH=%CD%

"%PHP_PEAR_BIN_DIR%\phpunit.bat" --bootstrap test/bootstrap.php -d include_path="%PROJ_PATH%;%PROJ_PATH%\runtime\Php;%PHP_PEAR_BIN_DIR%\pear" --verbose test
