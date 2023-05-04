# Fresh

Fresh is a lightweight, minimalistic PHP framework built using PHP 8.2 and Smarty 4. Fresh is a simple MVC style framework for PHP projects that is easy to use and understand.

## Getting started

Fresh is designed to be run on an Apache server, but you can run it through localhost as well if your local host has support for emulating .htaccess files.

1. Navigate to the directory you want Fresh to be installed in on your machine. In most cases, this will be in your website's root folder.
2. run `git init`.
3. run `git clone https://github.com/johnkellyphotos/FreshEssentials.git`.
4. run `chmod +x Fresh.sh` to add execute permissions to the Fresh shell script.
5. run `./Fresh.sh --create` to create a new project. This will create directories and a few files to get you started using Fresh.

If your server is not configured to utilize .htaccess files, Fresh will not properly route. You will need to enable .htaccess on your server.