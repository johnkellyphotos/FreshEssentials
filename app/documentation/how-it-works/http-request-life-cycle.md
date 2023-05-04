# Fresh HTTP Request Life Cycle

The Fresh HTTP request lifecycle is very simple and easy to understand. All routing and 
handling is automatically handled with as little overhead as possible.

Request lifecycle:
1. Apache routes all traffic to **/.htaccess**
2. The .htaccess file forwards ALL urls to our php script, **/html/src/init.php**. The full URL path is captured in .htaccess and passed as a `$_GET` parameter to */html/src/init.php*.
3. The script **/html/src/init.php** initializes all the needed dependencies and invokes **/html/src/Fresh/router.php**.
4. Inside **/html/src/Fresh/router.php**, the full URL passed from **.htaccess** is parsed to determine the appropriate controller and action to use. The script **/html/src/Fresh/router.php** attempts to determine if the controller exists, and if so, if the controller has a defined action matching the URL request. If so, the script initialized the controller and invokes the action corresponding to the URL requested.
5. The web page is displayed to the user

### Example

Requested URL: https://www.[your-website].com/Home/about-us

1. The request *https://www.[your-website].com/Home/about-us* is parsed through **.htaccess**. **.htaccess** determines there is no trailing slash (/), so the URL is rewritten to have the trailing slash.
2. **.htaccess** passes the full requested URL to the **/html/src/init.php** script. The URL is passed as a $_GET parameter, indexed as 'freshUrlPath' (`$_GET['freshUrlPath']`).
3. The **/html/src/init.php** script invokes all the needed files and dependencies, finally invoking the router, **/html/src/Fresh/router.php**.
4. The router parses the sample url, including converting dash-case URL parameters into camelCase URL parameters, which determines 'Home' will be the controller, and 'about-us' (becomes 'aboutUs') is the action.
6. **/html/src/Fresh/router.php** attempts to initialize 'HomeController' which controller should have a method corresponding to action 'aboutUs'. The goal for this script is to work like the following cope snip-it: 
```php
$HomeController = new \controller\HomeController();
$HomeController->aboutUs();
```
7. If a valid method is found, the dynamically initialized class for the controller invokes the method 'aboutUs'. If the class and method cannot be found, the page not found controller is initiated.
8. The individual controller initialized will inherit the AppController (in this case, HomeController.php inherits AppController.php). Any data handling can be handled inside the controller action (`public function aboutUs(): void`).
9. The action (aboutUs) calls the parent method `protected function display(array $data = []): void` to display the associated view. The view file, by default, is named as the dash-case version of the action being invoked. IE, aboutUs() has associated default view **about-us.tpl**.