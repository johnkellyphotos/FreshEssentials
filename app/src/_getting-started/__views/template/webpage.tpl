<!DOCTYPE html>
<html>
	<head>
		<title>{$page.title}</title>
		<meta charset="UTF-8">
		<meta name="description" content="{$page.description}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
		<style>{$AppCSS}</style>
	</head>
	<body>
        {include file="./nav-menu.tpl"}
		<div id="page-content">
            {include file="../$controllerName/$view"}
		</div>
        {include file="./footer.tpl"}
	</body>
</html>