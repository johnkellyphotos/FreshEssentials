<?php
/* Smarty version 4.3.1, created on 2023-04-09 20:33:48
  from '/home/john/Desktop/App/carmel/www/views/template/theme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6433677c5bcca8_62944971',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07c7bd3fa6f33fb342b8b6ba16d62c52841ea059' => 
    array (
      0 => '/home/john/Desktop/App/carmel/www/views/template/theme.tpl',
      1 => 1681090427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./nav-menu.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_6433677c5bcca8_62944971 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    </head>
    <body>
    <?php $_smarty_tpl->_subTemplateRender("file:./nav-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("../".((string)$_smarty_tpl->tpl_vars['controllerName']->value)."/".((string)$_smarty_tpl->tpl_vars['views']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:./footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
</html><?php }
}
