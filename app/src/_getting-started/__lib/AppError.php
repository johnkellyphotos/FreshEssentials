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
        // log data;
    }
}