<?php

use exception\MissingActionException;
use exception\MissingControllerException;
use src\controllers\AppController;
use src\lib\Helper;

try {
    ['controller' => $controller, 'controllerName' => $controllerName, 'action' => $action] = Helper::deconstructURL(Helper::getURLPath());
    if (class_exists($controller)) {
        $Controller = new $controller();
        if (method_exists($Controller, $action)) {
            $data = $Controller->{$action}() ?? [];
            /* @var AppController $Controller */
            $Controller->setView(Helper::camelCaseToDashCase($action), true);
            $Controller->display($data);
        } else {
            throw new MissingActionException("The action '$action' for controller '$controllerName' could not be found.");
        }
    } else {
        throw new MissingControllerException("The controller $controllerName could not be found.");
    }
} catch (MissingControllerException | MissingActionException $e) {
    $Controller = new AppController();
    $Controller->display($Controller->pageNotFound($e->getMessage()));
} catch (Throwable $e) {
    $Controller = new AppController();
    $Controller->display($Controller->internalServerError($e));
}
