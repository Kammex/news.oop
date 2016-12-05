<?php

require_once __DIR__ . '/models/News.php';

$items = News::getAll();

include __DIR__ . '/views/index.php';


/*Front-controller

require_once __DIR__ . '/autoload.php';

/*С помощью метода Get передаются имя контроллера и выполняемого метода
/*Создаются переменные, содержащие переданые класс и метод, при этом назначаются значения по умолчанию,
такие как 'News' & 'All'
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

/*Формируется имя класса контролера
$controllerClassName = $ctrl . 'Controller';

/*Автоматическое подключение необходимого класса файла
//require_once __DIR__ . '/controllers/' . $controllerClassName . '.php';

/*Создание переменной заданного класса
$controller = new $controllerClassName;

/*Формирование переменной с необходимым методом
$method = 'action' . $act;

/*Вызов нужного метода
$controller->$method();

*/