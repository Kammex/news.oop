<?php


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

    public function actionOne()
    {
        $id = $_GET['id'];
        $view = new View();
/*
        $upd = new NewsModel();
        var_dump($upd->delete($id));
        die;
*/

        try {
            try {
                $view->item = NewsModel::findOneByPk($id);
            } catch (E404Ecxeption $e404) {
                header('HTTP/1.0 404 Not Found');
                $view = new View();
                $view->error = $e404->getMessage();

                $log = new ErrorLog(__FILE__, __LINE__, $e404->getCode(), $e404->getMessage());
                $log->logError();

                $view->display('news/error.php');
            }
        } catch (PDOException $e403) {
            header('HTTP/1.0 403 Forbidden');
            $view->error = 'Подключение не удалось: ' . $e403->getMessage();

            $log = new ErrorLog(__FILE__, __LINE__, $e403->getCode(), $e403->getMessage());
            $log->logError();

            $view->display('news/error.php');
            die;
        }


        $view->display('news/one.php');
    }
}