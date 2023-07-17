<?php

namespace src;

use src\lib\Helper;

class Request
{
    private array $get;
    private array $post;

    public readonly string $controller;
    public readonly string $action;
    public readonly string $queryString;
    public readonly string $rawUrl;
    public readonly string $path;
    public readonly array $paths;
    public readonly array $arguments;

    public function __construct()
    {
        $this->_configure();
        $this->get = $_GET;
        $this->post = $_POST;
        $this->_setRequestParametersByType();
    }

    private function _createPathComponents(): void
    {
        $pathComponents = array_filter(explode('/', $this->path)) ?? [];
        $paths = $arguments = [];
        $urlBase = '/';
        $index = 0;
        foreach ($pathComponents as $pathComponent) {
            ++$index;
            $urlBase .= "$pathComponent/";
            $paths[] = [
                'pathComponent' => $pathComponent,
                'plainText' => Helper::toSpaceCase($pathComponent),
                'urlBase' => $urlBase,
            ];
            switch ($index) {
                case 1:
                    $this->controller = $pathComponent;
                    break;
                case 2:
                    $this->action = !empty($pathComponent) ? $pathComponent : DEFAULT_ACTION;
                    break;
                default:
                    $arguments[] = $pathComponent;
                    break;
            }
        }
        if (!isset($this->action)) {
            $this->action = DEFAULT_ACTION;
        }
        $this->arguments = $arguments;
        $this->paths = $paths;
    }

    private function _configure(): void
    {
        $this->rawUrl = $_SERVER[ 'REQUEST_URI' ] ?? '';
    
        if (str_contains($this->rawUrl, '?')) {
            $strippedString = strstr($this->rawUrl, '?', true);
            $this->path = substr($strippedString, 0, -1);
        } else {
            $this->path = $this->rawUrl;
        }
        $this->queryString = substr($this->rawUrl, 0, strpos($this->rawUrl, "?"));

        $this->_createPathComponents();
        unset($_GET[getenv('APP_GET_PARAMETER_FOR_PATH')]);
    }

    private function _setRequestParametersByType(): void
    {
        foreach ([&$this->get, &$this->post] as &$request) {
            foreach ($request as $key => $value) {
                $request[$key] = match (true) {
                    strtolower($value) == 'null' => null,
                    strtolower($value) == 'true' => true,
                    strtolower($value) == 'false' => false,
                    Helper::isJson($value) => json_decode($value),
                    is_numeric($value) => $value * 1,
                    default => $value,
                };
            }
        }
        unset($request);
    }

    public function get(?string $key = null): mixed
    {
        if (empty($key)) {
            return $this->get;
        }
        return $this->get[$key] ?? null;
    }

    public function post(?string $key = null): mixed
    {
        if (empty($key)) {
            return $this->post;
        }
        return $this->post[$key] ?? null;
    }
}