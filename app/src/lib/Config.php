<?php

namespace src\lib;

use Exception;

class Config
{
    public static function fetch(string $credential): ?array
    {
        $filename = ".config.json";
        $path = APP_DIRECTORY . "/$filename";

        try {
            $credentials = json_decode(file_get_contents($path), true)[$credential] ?? null;
            if (empty($credentials)) {
                throw new Exception('Could not open credentials for: ' . $credential);
            }
            return $credentials;
        } catch (Exception $e) {
            AppError::create($e);
        }
    }
}