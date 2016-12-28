<?php

/**
 * Class NewsController
 * Управление новостями
 */
class NewsController
{
    /*Метод получает все новости и выводит их на странице*/
    public function actionAll()
    {
        $view = new View();

        try {
            $items = NewsModel::findAll();
        } catch (PDOException $e403) {
            header('HTTP/1.0 403 Forbidden');
            $view->error = 'Подключение не удалось: ' . $e403->getMessage();

            $log = new ErrorLog(__FILE__, __LINE__, $e403->getCode(), $e403->getMessage());
            $log->logError();
            $view->display('news/error.php');
            die;
        }


        /*Работает магический метод __set($name, $value) и заполняет свойство $data*/
        $view->items = $items;
        $view->display('news/all.php');

    }

    /**
     * Вывод в браузер отдельной новости
     */
    public function actionOne()
    {
        $id = $_GET['id'];
        $view = new View();
/*
        $upd = new NewsModel();
        var_dump($upd->delete($id));
        die;
*/

    if (false === $view->item = NewsModel::findOneByPk($id)) {
        throw new E404Ecxeption('Новости не существует');
    }
    $view->display('news/one.php');
    }
}