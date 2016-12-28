<?php

/*Front-controller*/

//Подключение автозагрузки
require_once __DIR__ . '/autoload.php';

/*С помощью метода Get передаются имя контроллера и выполняемого метода*/
/*Создаются переменные, содержащие переданые класс и метод необходимого контроллера, при этом назначаются значения\
по умолчанию, такие как 'News' & 'All'*/

//Часть имени вызываемого класса контроллера
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
//Часть имени используемого метода класса контроллера
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

/*Формируется полное имя класса контролера*/
$controllerClassName = $ctrl . 'Controller';

/*Создание объекта заданного класса*/
$controller = new $controllerClassName;

/*Формирование переменной, содержащей полное имя вызываемого метода*/
$method = 'action' . $act;


try {
    try{
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


