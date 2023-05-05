<!DOCTYPE html>
<html>
	<head>
		<title>{$pageTitle}</title>
		<meta charset="UTF-8">
		<meta name="description" content="{$pageDescription}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
        {include file="./nav-menu.tpl"}
		<div>
            {include file="../$controllerName/$view"}
		</div>
        {include file="./footer.tpl"}
	</body>
</html>