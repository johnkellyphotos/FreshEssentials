<?php

namespace lib;

use src\lib\Helper;

class Routes
{
	private const REDIRECT = [];
	
	public static function checkIfRouteRedirects(): void
	{
		$url = Helper::getURLPath();
		$formattedUrl = strtolower(trim($url, '/')) . '/';
		if (isset(self::REDIRECT[$formattedUrl])) {
			$newURL = self::REDIRECT[$formattedUrl];
			header("Location: /$newURL", true, 301);
			exit;
		}
	}
	
	public static function enforceWWW(): void
	{
		if (!str_starts_with($_SERVER['HTTP_HOST'], 'www.')) {
			$redirectUrl = 'http://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			header('Location: ' . $redirectUrl, true, 301);
			exit;
		}
	}
}