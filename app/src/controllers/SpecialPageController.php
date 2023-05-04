<?php
/** @noinspection PhpArrayShapeAttributeCanBeAddedInspection */

namespace src\controllers;

use Throwable;

trait SpecialPageController
{
    public function pageNotFound(?string $message = null): array
    {
        $this->setHeader("HTTP/1.0 404 Not Found");
        $this->setView('page-not-found');
        return ['errorMessage' => $message];
    }

    public function forbidden(): void
    {
        header('HTTP/1.0 403 Forbidden');
    }

    public function internalServerError(Throwable $e): array
    {
        $this->setView('internal-server-error', true);
        $this->setHeader("HTTP/1.0 500 Internal Server Error");
        return [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'code' => $e->getCode(),
            'stack_trace' => $e->getTrace(),
        ];
    }

    /** @noinspection PhpUnused */
    public function temporaryRedirect(string $url, int $code = 301): void
    {
    }

    /** @noinspection PhpUnused */
    public function permanentRedirect(string $url, int $code = 301): void
    {
    }
}