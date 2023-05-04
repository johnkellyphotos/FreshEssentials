<!DOCTYPE html>
<html>
<head>
    <title>{$pageTitle}</title>
    <style>{$AppCSS}</style>

    <meta charset="UTF-8">
    <meta name="description" content="{$pageDescription}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
{include file="./nav-menu.tpl"}
<div id="page-content">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {foreach from=$request->paths item=path}
                    <li class="breadcrumb-item"><a href="{$path.urlBase}">{ucwords($path.plainText)}</a></li>
                {/foreach}
            </ol>
        </nav>
    </div>
    <div class="container">
        {if empty($specialView)}
            {include file="../$controllerName/$view"}
        {else}
            {include file="../components/$specialView"}
        {/if}
    </div>
</div>
{include file="./footer.tpl"}
</body>

<script>{$AppJs}</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</html>