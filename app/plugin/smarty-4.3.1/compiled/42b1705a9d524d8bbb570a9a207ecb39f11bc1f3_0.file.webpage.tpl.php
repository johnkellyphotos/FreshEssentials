<?php
/* Smarty version 4.3.1, created on 2023-04-09 20:57:56
  from '/home/john/Desktop/App/carmel/www/views/template/webpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64336d24728c28_06349746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42b1705a9d524d8bbb570a9a207ecb39f11bc1f3' => 
    array (
      0 => '/home/john/Desktop/App/carmel/www/views/template/webpage.tpl',
      1 => 1681091872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./nav-menu.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_64336d24728c28_06349746 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <style><?php echo $_smarty_tpl->tpl_vars['freshCSS']->value;?>
</style>
        <!-- Font Awesome -->
        <link
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
                rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
                href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
                rel="stylesheet"
        />
        <!-- MDB -->
        <link
                href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
                rel="stylesheet"
        />
    </head>
    <body>
    <?php $_smarty_tpl->_subTemplateRender("file:./nav-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="page-content">
        <?php $_smarty_tpl->_subTemplateRender("../".((string)$_smarty_tpl->tpl_vars['controllerName']->value)."/".((string)$_smarty_tpl->tpl_vars['views']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:./footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
    <!-- MDB -->
    <?php echo '<script'; ?>

            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
    ><?php echo '</script'; ?>
>
</html><?php }
}
