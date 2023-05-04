<?php

/** @noinspection PhpIncludeInspection */
require_once APP_DIRECTORY . "/lib/exception/MissingClassException.php";

use exception\MissingClassException;
use src\lib\AppError;

spl_autoload_register(function ($class) {
    $originalClass = $class;
    try {
        $class = str_replace('\\', '/', $class);

        $possiblePaths = [
            '/',
            '/src/',
            '/controller/',
            '/lib/',
            '/model/',
            '/plugin/',
            '/exception/',
        ];
        foreach ($possiblePaths as $possiblePath) {
            $fullClassPath = APP_DIRECTORY . $possiblePath . $class . ".php";
            if (file_exists($fullClassPath)) {
                include_once $fullClassPath;
                return;
            }
        }
        throw new MissingClassException("Unable to find lib: " . $class);
    } catch (MissingClassException $e) {
        AppError::log($e->getMessage(), ['lib' => $originalClass]);
    }
});