<?php

/**
 * @APP Info
 */

/* REQUIRED. The name of your application. */
const APP_NAME = 'Fresh'; /* (STRING) */

/* The contact name for your application. */
const APP_CONTACT_NAME = ''; /* (STRING) */

/* The contact email for your application. */
const APP_CONTACT_EMAIL = ''; /* (STRING) */

/* The GIT repo URL for your application. */
const APP_GIT_REPO = 'https://github.com/johnkellyphotos/Fresh'; /* (STRING) */


/**
 * @APP SETTINGS
 */


/* The version of your application. This is optional and only for debugging purposes.*/
const APP_VERSION = '1.0.01'; /* (STRING) */

/* The default action (method) that should be called inside a controller if not specified in a URL path. */
const DEFAULT_ACTION = 'index'; /* (STRING) */

/* The default controller (lib) that should be called if not specified in a URL path. */
const DEFAULT_CONTROLLER = 'Home'; /* (STRING) */

/* Enable or disable your app for dispatching and monitoring events */
const ENABLE_EVENTS = true; /* (boolean) */

/* Enable or disable errors and warnings from displaying. Set to false for production applications. */
const ENABLE_ERRORS = true; /* (boolean) */

/* Force URLs to canonicalize and appropriately set the META tag */
const FORCE_CANONICALIZATION = false; /* (boolean) */

/* Force HTTPS in your application */
const REQUIRE_HTTPS = false; /* (boolean) */


/**
 * @DIRECTORY PATHS
 */

/* The base directory for your application. */
const APP_BASE_DIRECTORY = APP_DIRECTORY . "/";

/* The directory for application source code */
const APP_SRC_DIRECTORY = APP_DIRECTORY . "/src/";

/* The directory for applications views */
const APP_VIEW_DIRECTORY = APP_DIRECTORY . "/views/";

/* The directory for third party plugins */
const APP_PLUGIN_DIRECTORY = APP_DIRECTORY . "/plugin/";

/* The directory for application documentation */
const APP_DOCUMENTATION_DIRECTORY = APP_DIRECTORY . "/documentation/";

/**
 * @SMARTY PATHS
 */

/* The smarty compiled files directory */
const SMARTY_COMPILED = "../smarty-4.3.1/compiled";

/* The smarty config directory */
const SMARTY_CONFIG = "../smarty-4.3.1/config";

/* The smarty template cache directory */
const SMARTY_TEMPLATE_CACHE = "../smarty-4.3.1/template_cache";