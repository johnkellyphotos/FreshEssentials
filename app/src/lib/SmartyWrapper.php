<?php

namespace src\lib;

use lib\components\Form;
use lib\components\Input;

trait SmartyWrapper
{
    public function configureSmarty(): void
    {
        $this->smarty->setTemplateDir(APP_VIEW_DIRECTORY);
        $this->smarty->setCompileDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/compiled");
        $this->smarty->setConfigDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/config");
        $this->smarty->setCacheDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/template_cache");
    }


    private function assignSmartyBaseVariables(): void
    {
        $this->smarty->assign(
            'pageTitle',
            Helper::toSpaceCase($this->viewName != DEFAULT_ACTION ? $this->viewName : $this->controllerName)
        );
        $this->smarty->assign('controllerName', $this->controllerName);
        $this->smarty->assign('view', $this->viewName . '.tpl');
        $this->smarty->assign(
            'AppCSS',
            Helper::loadCssFiles([
                'app',
            ])
        );
        $this->smarty->assign('AppJs', Helper::loadJsScripts(['App']));
        $this->smarty->assign(
            'pageDescription',
            'Welcome to ' . APP_NAME . ' - ' . Helper::toSpaceCase(
                $this->viewName != DEFAULT_ACTION ? $this->viewName : $this->controllerName
            )
        );
        $this->smarty->assign('app', Helper::getAppInfo());
        $this->smarty->assign('request', $this->request);
        $this->smarty->registerClass("Form", Form::class);
        $this->smarty->registerClass("Input", Input::class);
        $this->smarty->registerClass("Helper", Helper::class);
    }

    private function assignSmartyViewData(array $data): void
    {
        foreach ([...$data, ...$this->viewData] as $key => $value) {
            $this->smarty->assign($key, $value); // TODO check if key already exists and decline to overwrite
        }
    }
}