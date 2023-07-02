<?php

namespace lib;

use src\lib\Helper;

class Routes
{
	private const REDIRECT = [];
	private const CUSTOM_ROUTES = [
		'/Old/' => '/New/',
		'/Old/*' => '/Home/*', // '*' passes everything after the match to the new URL
	];
	
	public static function checkIfRouteRedirects(): void
	{
		$url = Helper::getURLPath();
		$formattedUrl = strtolower(trim($url, '/')) . '/';
		if (isset(self::REDIRECT[ $formattedUrl ])) {
			$newURL = self::REDIRECT[ $formattedUrl ];
			header("Location: /$newURL", true, 301);
			exit;
		}
	}
	
	public static function enforceWWW(): void
	{
		if (!str_starts_with($_SERVER[ 'HTTP_HOST' ], 'www.')) {
			$redirectUrl = 'http://www.' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
			header('Location: ' . $redirectUrl, true, 301);
			exit;
		}
	}
	
	public static function getCustomRoutes(string $url): string
	{
		foreach (self::CUSTOM_ROUTES as $path => $route) {
			if (str_ends_with($path, '*') && str_starts_with($url, substr($path, 0, -1))) {
				if (str_ends_with($route, '*')) {
					$route = substr($route, 0, -1);
				}
				$path = substr($path, 0, -1);
				return preg_replace("~$path~", $route, $url, 1);
			} elseif (!empty(self::CUSTOM_ROUTES[ $url ])) {
				return self::CUSTOM_ROUTES[ $url ];
			}
		}
		return $url;
	}
}