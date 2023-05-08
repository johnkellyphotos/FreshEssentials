<?php

namespace controller;

use src\controllers\AppController;
use src\lib\events\Events;
use src\lib\events\EventType;

class HomeController extends AppController
{
	public function __construct()
	{
		parent::__construct();
        Events::addEventListener(EventType::ERROR, function() {
            echo 'When an error occurs inside this controller, this function will be invoked.';
        });
	}
	
	public function index(): array
	{
		return [
			'message' => 'Welcome to Fresh!',
		];
	}
}