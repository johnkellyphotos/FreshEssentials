# Fresh

Fresh is a lightweight, minimalistic PHP framework built using PHP 8.2 and Smarty 4. Fresh is a simple MVC style framework for PHP projects that is easy to use and understand.

## License

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This project is licensed under the [MIT License](LICENSE). See the [LICENSE](LICENSE) file for more details.

## Getting started

Fresh uses .htaccess and therefore is designed to be run on an Apache server. However, you can run it without Apache (or needing to use.htaccess) by using the 'index.php' file to simulate routing in the app root directory to emulate the behavior of the .htaccess file in non-Apache environments.

1. Open a new terminal on your device, navigate to the directory you want Fresh to be installed in on your machine. In most cases, this will be in your website's root folder.
2. run `git clone https://github.com/johnkellyphotos/FreshEssentials.git`.
3. run `chmod +x Fresh.sh` to add execute permissions to the Fresh shell script.
4. run `./Fresh.sh --create` to create a new project. This will create directories and a few files to get you started using Fresh.
