<h1 style="color: red;">404: The page cannot be found.</h1>
<h2>{$errorMessage}</h2>

{$actionHTML = Helper::clean(Helper::dashCaseToCamelCase($request->action))}

<p>Are you trying to create a new path to `<i>{$request->path}</i>`? You are currently seeing the
    `page-not-found.tpl` view, but you can create a new controller, action and view to make this route work.</p>
<p>
<ol>
    <li>Ensure the controller `{$controllerName}` exists. A file <i>`/controller/{$controllerName}Controller.php`</i>
        should exists.
    </li>
    <li>The controller `{$controllerName}` should have an action `{$request->action}` defined. You should name the action as the camelCase version of your dash-case url path. The url path `{$request->action}` in dash-case is `{$actionHTML}` in camelCase. Inside the file <i>`/controller/{$controllerName}Controller.php`</i>, you should see
        <pre class="php-code"><code>
    {Helper::toCodeHTML("public function $actionHTML(): void
    {
    }"
                )}
        </code></pre>
    </li>
</ol>
</p>