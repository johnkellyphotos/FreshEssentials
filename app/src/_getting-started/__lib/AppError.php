<?php

namespace lib;

use JetBrains\PhpStorm\NoReturn;
use src\controllers\AppController;
use Throwable;

class AppError
{
    #[NoReturn] public static function create(Throwable $e): void
    {
        $Controller = new AppController();
        $Controller->display($Controller->internalServerError($e));
        exit;
    }
    
    public static function log(string $error, ?array $data = null): void
    {
        if (!file_exists(ERROR_LOG_FILE)) {
            $file = fopen(ERROR_LOG_FILE, 'w');
            fclose($file);
        }
        
        if (!empty($data)) {
            $data = ' Data: ' . json_encode($data);
        }
        
        $errorContent = date('Y-m-d H:i:s') . " - Error: $error$data\n";
        file_put_contents(ERROR_LOG_FILE, $errorContent . PHP_EOL, FILE_APPEND);
    }
}