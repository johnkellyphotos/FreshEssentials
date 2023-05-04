<?php

set_error_handler(
/**
 * @throws ErrorException
 */ function ($errorNo, $errorStr, $errorFile, $errorLine) {
    throw new ErrorException($errorStr, $errorNo, 0, $errorFile, $errorLine);
}
);

define("APP_DIRECTORY", $_SERVER['DOCUMENT_ROOT'] ?? '');

/** @noinspection PhpIncludeInspection */
require_once APP_DIRECTORY . "/src/config.php";

if (ENABLE_ERRORS) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}

/** @noinspection PhpIncludeInspection */
require_once APP_PLUGIN_DIRECTORY . "smarty-4.3.1/libs/Smarty.class.php";
/** @noinspection PhpIncludeInspection */
require_once APP_SRC_DIRECTORY . "autoloader.php";
/** @noinspection PhpIncludeInspection */
require_once APP_SRC_DIRECTORY . "App.php";
/** @noinspection PhpIncludeInspection */
require_once APP_SRC_DIRECTORY . "router.php";
