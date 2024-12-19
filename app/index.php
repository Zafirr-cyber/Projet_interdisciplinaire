<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'departement';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

require_once   'controllers/' . ucfirst($controller) . 'Controller.php';

$controllerName = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerName();
$controllerInstance->$action();

?>