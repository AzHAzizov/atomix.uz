<?php


function __autoload($class)
{
    require __DIR__.DIRECTORY_SEPARATOR.str_replace('\\', '/', $class) . '.php';
    
}