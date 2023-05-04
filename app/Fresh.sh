#!/bin/bash

app_name=$1


if [ -z $app_name ]; then
  echo "Error: You must specify an app name."
  exit 1
fi

# create directory if it doesn't exist
if [ ! -d "$app_name" ]; then
    while true; do
        read -p "Create a new project '$app_name'? (y/n) " yn
        case $yn in
            [Yy]* ) echo "Continuing..."; break;;
            [Nn]* ) echo "Exiting..."; exit;;
            * ) echo "Valid options only y or n.";;
        esac
    done
    mkdir -p "$app_name"
else
  echo "Error: Directory \"$app_name\" already exists."
  exit 1
fi

while true; do
    read -p "Create a new prohect '$app_name'? (y/n) " yn
    case $yn in
        [Yy]* ) echo "Continuing..."; break;;
        [Nn]* ) echo "Exiting..."; exit;;
        * ) echo "Valid options only y or n.";;
    esac
done

echo "Creating $app_name/ directory";

echo "Creating $app_name/ subdirectories";

mkdir -p "$app_name/controller"
mkdir -p "$app_name/lib"
mkdir -p "$app_name/lib/components/"
mkdir -p "$app_name/model"
mkdir -p "$app_name/scripts"
mkdir -p "$app_name/styles"

echo "Creating $app_name/ views";

mkdir -p "$app_name/views"
mkdir -p "$app_name/views/template/"
mkdir -p "$app_name/views/Home/"
mkdir -p "$app_name/views/components/"

echo "Creating $app_name/ config file";

touch ".config.json"
echo '{"database":{"host":"","username":"","password":"","dbname":""}}' > '.config.json'

echo "Creating $app_name/ model";

# create sample model
touch "$app_name/model/UserModel.php"
echo '<?php

namespace model;

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
}
' > "$app_name/model/UserModel.php"

echo "Creating $app_name/ view templates";

# create views
touch "$app_name/views/template/nav-menu.tpl"
touch "$app_name/views/template/footer.tpl"
touch "$app_name/views/template/webpage.tpl"
touch "$app_name/views/Home/index.tpl"

# put default content in views
echo '<nav>Put your nav HTML here</nav>' > "$app_name/views/template/nav-menu.tpl"
echo '<footer>Put your footer HTML here</footer>' > "$app_name/views/template/footer.tpl"
echo '<!DOCTYPE html><html><head></head><body>{include file="./nav-menu.tpl"}{include file="../$controllerName/$view"}{include file="./footer.tpl"}</body></html>' > "$app_name/views/template/webpage.tpl"
echo '<h1>{$message}</h1>' > "$app_name/views/Home/index.tpl"

echo "Creating $app_name/ components";

touch "$app_name/views/components/file.tpl"
touch "$app_name/views/components/select.tpl"
touch "$app_name/views/components/submit.tpl"
touch "$app_name/views/components/table.tpl"
touch "$app_name/views/components/text.tpl"

echo "Creating $app_name/ inputs";

# create input components
touch "$app_name/lib/components/Input.php"
echo "<?php

namespace lib\components;

use src\App;

class Input extends App
{
    use InputHelper;

    public const ATTRIBUTES = 'attributes';
    public const DESCRIPTION = 'description';
    public const LABEL = 'label';
    public const OPTIONS = 'options';
    public const WRAPPER_CLASS = 'wrapper-lib';

    /* input valid attributes */
    public const ACCEPT = 'accept';
    public const AUTOCOMPLETE = 'autocomplete';
    public const CLASSNAME = 'classname';
    public const DATA_API_URL = 'data-url';
    public const DATA_ATTR = 'data_attr';
    public const DATA_TRIGGER_EVENT = 'data_trigger_event';
    public const MAX = 'max';
    public const MIN = 'min';
    public const NAME = 'name';
    public const PLACEHOLDER = 'placeholder';
    public const REQUIRED = 'required';
    public const STYLE = 'style';
    public const VALUE = 'value';

    public static function text(array $data = []): string
    {
        return self::_viewComponent('text', $data);
    }

    public static function select(array $data = []): string
    {
        self::addClass($data, 'form-select');
        return self::_viewComponent('select', $data);
    }

    public static function file(array $data = []): string
    {
        return self::_viewComponent('file', $data);
    }

    public static function submit(array $data = []): string
    {
        return self::_viewComponent('submit', $data);
    }
}" > "$app_name/lib/components/Input.php"


echo "Creating $app_name/ HomeController";

# create home controller
touch "$app_name/controller/HomeController.php"
echo "<?php

namespace controller;

use src\controllers\AppController;

class HomeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        return [
            'message' => 'Welcome to Fresh',
        ]
    }
}" > "$app_name/controller/HomeController.php"


echo "Creating $app_name/ .htaccess";

# create .htaccess

touch "$app_name/.htaccess"
echo 'Options +FollowSymLinks
RewriteEngine On
RewriteBase /
SetEnv APP_GET_PARAMETER_FOR_PATH APP_UrlPath__
SetEnvIf Request_URI ^.*$ APP_GET_PARAMETER_FOR_PATH__=APP_UrlPath__

RewriteCond %{REQUEST_URI} !/src/init.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} !(.*)/$
RewriteRule ^(.*)$ http://%{HTTP_HOST}/$1/ [L,R=301]

RewriteCond %{REQUEST_URI} !/src/init.php
RewriteRule ^(.*)$ /src/init.php?%{ENV:APP_GET_PARAMETER_FOR_PATH__}=$1 [QSA,L]' > "$app_name/.htaccess"