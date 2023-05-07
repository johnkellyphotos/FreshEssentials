<?php

namespace src\controllers;

use Exception;
use JetBrains\PhpStorm\NoReturn;
use Smarty;
use SmartyException;
use src\{App, Request, Session};
use src\lib\{AppError, Helper, SmartyWrapper};

class AppController extends App
{
    use SpecialPageController;
    use SmartyWrapper;

    public Request $request;
    public Session $session;
    private Smarty $smarty;

    private string $controllerName;
    private string $header;
    protected bool $renderView = true;
    protected string $viewName;
    protected array $viewData = [];


    public function __construct()
    {
        $this->setControllerName();
        $this->request = new Request();
        $this->session = new Session();
        $this->smarty = new Smarty();
        $this->configureSmarty();
    }

    private function setControllerName(): void
    {
        $controllerPathComponents = explode('\\', get_called_class());
        $controller = $controllerPathComponents[count($controllerPathComponents) - 1];
        $this->controllerName = str_replace('Controller', '', $controller);
    }

    public function display(array $data = []): void
    {
        if (!$this->renderView) {
            return;
        }

        $this->assignSmartyBaseVariables();
        $this->assignSmartyViewData($data);
        $this->_display();
    }

    private function _display(): void
    {
        if (!empty($this->header)) {
            $this->displayHeader();
        }
        try {
            $this->smarty->display('template/webpage.tpl');
        } catch (Exception | SmartyException $e) {
            AppError::log("Error displaying smarty template.", [
                'controllerName' => $this->controllerName,
                'template' => $this->viewName,
                'message' => $e->getMessage(),
            ]);
            $this->display($this->internalServerError($e));
            exit;
        }
    }

    public function setView(?string $viewName, bool $doNotOverWrite = false): void
    {
        if ($doNotOverWrite && !empty($this->viewName)) {
            return;
        }
        $this->viewName = Helper::camelCaseToDashCase($viewName);
    }

    public function setController(?string $controllerName): void
    {
        $this->controllerName = $controllerName;
    }
    
    public function setHeader(string $header): void
    {
        $this->header = $header;
    }

    private function displayHeader(): void
    {
        header($this->header);
    }

    public function json(array $json = []): void
    {
        $this->renderView = false;
        header('Content-type: application/json');
        header('Cache-Control: no-cache, must-revalidate');
        echo json_encode($json);
    }

    #[NoReturn] public function table(array $table = []): void
    {
        $this->setView('table');
        $this->display([
            'specialView' => 'table.tpl',
            'table' => $table,
        ]);
        exit;
    }
}