<?php

namespace lib\components;

use Smarty;
use src\lib\AppError;
use src\lib\Helper;
use Throwable;

class Table
{
    use InputHelper;

    public static function create(array $table): string
    {
        $smarty = new Smarty();
        $smarty->setTemplateDir(APP_VIEW_DIRECTORY);
        $smarty->setCompileDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/compiled");
        $smarty->setConfigDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/config");
        $smarty->setCacheDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/template_cache");

        $smarty->registerClass("Helper", Helper::class);
        $smarty->assign("table", $table);

        try {
            return $smarty->fetch('components/table.tpl') ?: '';
        } catch (Throwable $e) {
            AppError::create($e);
        }
    }
}