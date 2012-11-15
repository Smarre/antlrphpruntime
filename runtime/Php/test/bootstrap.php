<?php

spl_autoload_register(function ($class) {
    if (strpos($class, "Antlr\Runtime") !== false) {
        require __DIR__ . "/../src/" .
        str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    } else if (strpos($class, "Antlr\Tests") !== false) {
        require __DIR__ . "/" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    }
});