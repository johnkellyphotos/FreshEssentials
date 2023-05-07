<?php

/** @noinspection PhpIncludeInspection */
require_once APP_DIRECTORY . "/src/lib/exception/MissingClassException.php";

use exception\MissingClassException;
use src\controllers\AppController;
use src\lib\AppError;

spl_autoload_register(function ($class)
{
    $originalClass = $class;
    try {
        $class = str_replace('\\', '/', $class);
        
        $possiblePaths = [
            '/',
            '/src/',
            '/src/lib/',
            '/controller/',
            '/lib/',
            '/model/',
            '/plugin/',
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
        $Controller = new AppController();
        $Controller->display($Controller->internalServerError($e));
        exit;
    }
});