<?php
/**
 * File in a directory tree the same as namespace. Example:
 * //file classes/my_class.php
 * namespace classes;
 * class My_class {}
 *
 * //file index.php
 * require 'autoloader.php';
 * $myClass= new classes\My_class;
 **/

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($class)) . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
});