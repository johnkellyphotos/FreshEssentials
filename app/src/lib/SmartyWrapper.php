<?php

namespace src\lib;

use lib\components\Form;
use lib\components\Input;
use Throwable;

trait SmartyWrapper
{
    public function configureSmarty(): void
    {
        $this->smarty->setTemplateDir(APP_VIEW_DIRECTORY);
        $this->smarty->setCompileDir(APP_PLUGIN_DIRECTORY . SMARTY_COMPILED);
        $this->smarty->setConfigDir(APP_PLUGIN_DIRECTORY . SMARTY_CONFIG);
        $this->smarty->setCacheDir(APP_PLUGIN_DIRECTORY . SMARTY_TEMPLATE_CACHE);
    }

    private function assignSmartyBaseVariables(): void
    {
        $this->smarty->assign(
            'page', [
                'title' => Helper::clean($this->title ?? Helper::toSpaceCase($this->viewName != DEFAULT_ACTION ? $this->viewName : $this->controllerName)),
                'description' => Helper::clean($this->description ?? (APP_NAME . ' - ' . Helper::toSpaceCase(
                            $this->viewName != DEFAULT_ACTION ? $this->viewName : $this->controllerName
                        )))
            ]
        );
        $this->smarty->assign('controllerName', Helper::clean($this->controllerName));
        $this->smarty->assign('view', Helper::clean($this->viewName) . '.tpl');
        $this->smarty->assign(
            'AppCSS',
            Helper::loadCssFiles([
                'app',
            ])
        );
        $this->smarty->assign('AppJs', Helper::loadJsScripts(['App']));

        try {
            if (!isset($this->smarty->registered_plugins['block']['php'])) {
                $this->smarty->registerPlugin('block', 'php', function ($params, $content) {
                    return isset($content) ? Helper::colorizePHPForHTML($content) : '';
                });
            }
        } catch (Throwable $e) {
            AppError::create($e);
        }

        $this->smarty->assign('app', Helper::getAppInfo());
        $this->smarty->assign('request', $this->request);
        $this->smarty->registerClass("Form", Form::class);
        $this->smarty->registerClass("Input", Input::class);
        $this->smarty->registerClass("Helper", Helper::class);
    }

    private
    function assignSmartyViewData(array $data): void
    {
        foreach ([...$data, ...$this->viewData] as $key => $value) {
            $this->smarty->assign($key, $value); // TODO check if key already exists and decline to overwrite
        }
    }
}