<?php

function __autoload($class)
{
    $classParts = explode('\\', $class);

    foreach ($classParts as $key => $part) {
        if (isset($classParts[$key + 1])) {
            $classParts[$key] = lcfirst($part);
        }
    }
    $classParts[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
    if (file_exists($path)) {
        require $path;
    }
}

spl_autoload_register('__autoload');

require __DIR__ . '/vendor/autoload.php';



