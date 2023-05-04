<?php

namespace controller;

use src\controllers\AppController;

/** @noinspection PhpUnused */

class APIController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    /** @noinspection PhpUnused */
    public function index(): void
    {
        $this->json([
            'success' => true,
            'output' => 'test!',
            'get' => $this->request->get(),
        ]);
    }
}