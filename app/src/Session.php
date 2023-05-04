<?php

namespace src;

use src\lib\Helper;

class Session
{
    private array $session;

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->session = $_SESSION;
        $this->_setRequestParametersByType();
    }

    private function _setRequestParametersByType(): void
    {
        foreach ($this->session as $key => $value) {
            $request[$key] = match (true) {
                strtolower($value) == 'null' => null,
                strtolower($value) == 'true' => true,
                strtolower($value) == 'false' => false,
                Helper::isJson($value) => json_decode($value),
                is_numeric($value) => $value * 1,
                default => $value,
            };
        }
        unset($request);
    }

    public function session(?string $key = null): mixed
    {
        if (empty($key)) {
            return $this->session;
        }
        return $this->session[$key] ?? null;
    }

    public function setSession(string $key, mixed $value): void
    {
        $this->session[$key] = $value;
    }
}