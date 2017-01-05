<?php

use App\Sources\E404Ecxeption;
use App\Sources\ErrorLog;
use App\Sources\View;

/*Front-controller*/

//Подключение автозагрузки
require_once __DIR__ . '/autoload.php';


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

//Часть имени вызываемого класса контроллера
$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';

//Часть имени используемого метода класса контроллера
if (!empty($pathParts[2]) && is_numeric($pathParts[2])) {
    $act = 'One';
    $_GET['id'] = $pathParts[2];
} elseif (!empty($pathParts[2]) && !is_numeric($pathParts[2])) {
    $act = ucfirst($pathParts[2]);
} else {
    $act = 'All';
}


/*С помощью метода Get передаются имя контроллера и выполняемого метода*/
/*Создаются переменные, содержащие переданые класс и метод необходимого контроллера, при этом назначаются значения\
по умолчанию, такие как 'News' & 'All'*/

//Часть имени вызываемого класса контроллера
//$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
//Часть имени используемого метода класса контроллера
//$act = isset($_GET['act']) ? $_GET['act'] : 'All';




try {
    try{
        /*Формируется полное имя класса контролера*/
        $controllerClassName = 'App\\Controllers\\' . $ctrl;

        /*Создание объекта заданного класса*/
        $controller = new $controllerClassName;

        /*Формирование переменной, содержащей полное имя вызываемого метода*/
        $method = 'action' . $act;

        /*Вызов необходимого метода*/
        $controller->$method();
    }
    catch (E404Ecxeption $e404) {
        header('HTTP/1.0 404 Not Found');
        $view = new View();
        $view->error = $e404->getMessage();

        $log = new ErrorLog(__FILE__, __LINE__, $e404->getCode(), $e404->getMessage());
        $log->logError();

        $view->display('news/error.php');}
    }
catch (PDOException $e403) {
    header('HTTP/1.0 403 Forbidden');
    $view = new View();
    $view->error = 'Подключение не удалось: ' . $e403->getMessage();

    $log = new ErrorLog(__FILE__, __LINE__, $e403->getCode(), $e403->getMessage());
    $log->logError();

    $view->display('news/error.php');
    die;
}


