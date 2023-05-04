<?php

namespace controller;

use JetBrains\PhpStorm\ArrayShape;
use lib\documentation\Documentation;
use src\controllers\AppController;
use src\lib\Helper;

/** @noinspection PhpUnused */

class DocumentationController extends AppController
{
    private Documentation $documentation;

    public function __construct()
    {
        parent::__construct();
        $this->documentation = new Documentation();
    }

    /** @noinspection PhpUnused */
    #[ArrayShape(['documentationDirectory' => "array"])] public function index(): array
    {
        return [
            'documentationDirectory' => $this->documentation->getDocumentationDirectory(),
        ];
    }

    /** @noinspection PhpUnused */
    public function howItWorks(): array
    {
        $this->setDocumentationDefault();
        return !empty($this->request->arguments[0]) ? [] : [
            'documentationDirectory' => $this->documentation->getDocumentationDirectory($this->request->action),
        ];
    }

    /** @noinspection PhpUnused */

    private function setDocumentationDefault(): void
    {
        $paths = !empty($this->request->arguments) ? '/' . implode('/', $this->request->arguments) : '';
        $file = APP_DOCUMENTATION_DIRECTORY . $this->request->action . $paths . '.md';
        if (file_exists($file)) {
            $this->setView('documentation');
            $this->viewData['documentation'] = Helper::camelCaseToDashCase(trim(debug_backtrace()[1]['function']));
            $this->viewData['documentation_mark_down'] = $this->documentation->markdownToHtml(
                file_get_contents($file) ?? ''
            ); /* TODO better error handling */
        } elseif (!empty($this->request->arguments)) {
            $this->setView($this->request->arguments[count($this->request->arguments) - 1] ?? 'documentation');
        }
    }

    /** @noinspection PhpUnused */

    #[ArrayShape(['documentationDirectory' => "array"])] public function components(): array
    {
        $this->setDocumentationDefault();
        return ['documentationDirectory' => $this->documentation->getDocumentationDirectory($this->request->action)];
    }

    public function creatingANewProject(): void
    {
        $this->setDocumentationDefault();
    }
}