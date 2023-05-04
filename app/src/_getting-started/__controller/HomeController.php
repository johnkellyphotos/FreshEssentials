<?php

namespace controller;

use src\controllers\AppController;

class HomeController extends AppController
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(): array
	{
		return [
			'message' => 'Welcome to Fresh!',
		];
	}
}