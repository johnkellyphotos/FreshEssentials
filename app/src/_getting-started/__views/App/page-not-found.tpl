<h1 style="color: red;">404: The page cannot be found.</h1>
<h2>{$errorMessage}</h2>

{$actionHTML = Helper::dashCaseToCamelCase($request->action)}
<p>Are you trying to create a new path to `<i>{$request->path}</i>`? You are currently seeing the
    `page-not-found.tpl` view, but you can create a new controller, action and view to make this route work.</p>
<p>
<ol>
    <li>Ensure the controller `{$request->controller}` exists. A file <i>`/controller/{$controllerName}
            Controller.php`</i>
        should exist to access this URL path. If it does not exist, you will need to create a {$request->controller} controller.
    </li>
    <li>The controller `{$request->controller}` should have an action `{$request->action}` defined. You should name the
        action as the camelCase version of your dash-case url path. The url path `{$request->action}` in dash-case is
        `{$actionHTML}` in camelCase.
    </li>
    <li>Create a view file inside `<i>/views/{$request->controller}/</i>` called `<i>{$request->action}.tpl</i>`. Put
        your HTML contents inside that new file.
    </li>
</ol>
</p>
Inside the file <i>`/controller/{$request->controller}Controller.php`</i>, you should have the following:
<pre class="php-code">
    <code>
    {php lang="php"}
<?php

    namespace controller;

    use src\controllers\AppController;

    class {$request->controller}Controller extends AppController
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function {$actionHTML}(): void
        {
        }
    }{/php}
    </code>
</pre>

<p>You can change the 404 page by editing the `<i>/views/App/page-not-found.tpl</i>` file.</p>