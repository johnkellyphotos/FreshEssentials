<?php

// Set the environment variable for the URL path
putenv('APP_GET_PARAMETER_FOR_PATH=APP_UrlPath__');

// Get the request URI
$requestUri = $_SERVER[ 'REQUEST_URI' ];

// If the request URI does not end with a slash, redirect to a version of the URL that does
if (!preg_match('/\/$/', $requestUri) && empty($_GET) && !str_ends_with($requestUri, '?')) {
    header('Location: ' . $requestUri . '/');
    exit;
}

// Parse the URL path and set it as a GET parameter
$urlPath = preg_replace('/^\/?(.*?)\/?$/', '$1', $requestUri);
if (!empty($urlPath) && $urlPath !== 'src/init.php') {
    $_GET[ getenv('APP_GET_PARAMETER_FOR_PATH') ] = $urlPath;
}

require_once __DIR__ . '/src/init.php';
