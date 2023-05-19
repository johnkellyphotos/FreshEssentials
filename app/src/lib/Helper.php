<?php

namespace src\lib;

use JetBrains\PhpStorm\ArrayShape;
use lib\AppError;

class Helper
{
    public static function camelCaseToDashCase(string $string): string
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $string));
    }

    public static function camelCaseToUnderScoreCase(string $string): string
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1_', $string));
    }

    public static function dashCaseToCamelCase(string $string): string
    {
        $str = str_replace('-', '', ucwords($string, '-'));
        return lcfirst($str);
    }

    public static function toSpaceCase(string $string): string
    {
        $str = self::camelCaseToDashCase($string);
        $str = str_replace('_', '-', $str);
        $str = explode('-', $str);
        return ucfirst(implode(' ', $str));
    }

    #[ArrayShape([
        'controllerName' => "string",
        'controller' => "string",
        'action' => "string",
        'arguments' => "string[]",
    ])] public static function deconstructURL(string $urlString): array
    {
        $urls = explode('/', $urlString);
        if (empty($urls[0])) {
            unset($urls[0]);
            $urls = array_values($urls);
        }
        $url = [
            'controllerName' => ucfirst(Helper::dashCaseToCamelCase(!empty($urls[0]) ? $urls[0] : 'Home')),
            'controller' => "\controller\\" . ucfirst(
                    Helper::dashCaseToCamelCase(!empty($urls[0]) ? $urls[0] : 'Home')
                ) . "Controller",
            'action' => Helper::dashCaseToCamelCase(!empty($urls[1]) ? $urls[1] : 'index'),
        ];
        unset($urls[0]);
        unset($urls[1]);
        if (!empty($urls)) {
            $url['arguments'] = $urls;
        }
        return $url;
    }

    #[ArrayShape(['name' => "string", 'html' => "string", 'version' => "string"])] public static function getAppInfo(): array
    {
        return [
            'name' => APP_NAME,
            'html' => '<span class="app-name">' . APP_NAME . '</span>',
            'version' => APP_VERSION,
        ];
    }

    public static function removeExtension(string $filename): string
    {
        $position = strrpos($filename, '.');
        if (empty($position)) {
            return $filename;
        }
        return str_replace(substr($filename, $position), '', $filename);
    }

    public static function minifyCss(string $css): string
    {
        // Remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        // Remove tabs, spaces, newlines, and other whitespace
        $css = preg_replace('/\s+/', ' ', $css);
        // Remove unnecessary semicolons
        $css = str_replace(';}', '}', $css);
        // Remove unnecessary spaces around selectors
        $css = preg_replace('/\s*([{}|:;,])\s*/', '$1', $css);
        // Return minified CSS
        return trim($css);
    }

    public static function loadCssFiles(array $files = []): string
    {
        $css = '';
        foreach ($files as $file) {
            if (!file_exists(APP_BASE_DIRECTORY . "css/$file.css")) {
                AppError::log('Unable to load css file. File does not exists: ' . $file);
                continue;
            }
            $css .= file_get_contents(APP_BASE_DIRECTORY . "css/$file.css");
        }
        return Helper::minifyCss($css);
    }

    public static function loadJsScripts(array $files = []): string
    {
        $css = '';
        foreach ($files as $file) {
            if (!file_exists(APP_BASE_DIRECTORY . "scripts/$file.js")) {
                AppError::log('Unable to load JavaScript file. File does not exists: ' . $file);
                continue;
            }
            $css .= file_get_contents(APP_BASE_DIRECTORY . "scripts/$file.js");
        }
        return Helper::minifyCss($css);
    }

    public static function cleanPath(string $path): string
    {
        return preg_replace("#/{2,}#", "/", $path);
    }

    public static function isJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public static function getURLPath(): string
    {
        return $_SERVER['REQUEST_URI'] ??
            (!empty($_GET[getenv('APP_GET_PARAMETER_FOR_PATH')]) ? $_GET[getenv(
                'APP_GET_PARAMETER_FOR_PATH'
            )] : DEFAULT_CONTROLLER);
    }

    public static function classBaseName(string $class): string
    {
        $class = is_object($class) ? get_class($class) : $class;
        return basename(str_replace('\\', '/', $class));
    }

    public static function modelNameToTableName(string $modelName): string
    {
        $modelName = self::classBaseName($modelName);
        $pos = strripos($modelName, 'model');
        if ($pos !== false) {
            // Remove the last occurrence of the word from the string
            $modelName = substr($modelName, 0, $pos) . str_ireplace('model', '', substr($modelName, $pos));
        }
        return self::camelCaseToUnderScoreCase($modelName) . 's';
    }

    public static function clean(?string $string): ?string
    {
        if ($string === null) {
            return null;
        }
        return htmlspecialchars($string);
    }

    public static function colorizePHPForHTML(string $string): string
    {
        // encode less than signs
        $string = str_replace('<?', '&lt;?', $string);

        // color code function and method names
        $string = preg_replace_callback('/\bfunction\s+(\w+)\s*\(/', function ($matches) {
            return str_replace($matches[1], "<span style='color:#e3e16b'>" . $matches[1] . "</span>", $matches[0]);
        }, $string);

        // color code variable names
        $string = preg_replace_callback('/(\$)\w+/', function ($matches) {
            return "<span style='color:#d58ced'>" . $matches[0] . "</span>";
        }, $string);

        // highlight remaining keywords
        $keyWords = [
            '&lt;?php',
            'namespace',
            'public',
            'static',
            'function',
            'void',
            'int',
            'string',
            'array',
            'mixed',
            'null',
            'class',
            'extends',
            'use',
            'parent',
            'new',
        ];

        foreach ($keyWords as $word) {
            $string = str_replace($word, "<span style='color:#EE9922'>" . $word . "</span>", $string);
        }
        return $string;
    }
}
