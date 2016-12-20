<?php


class NewsController
{
    /*Метод получает все новости и выводит их на странице*/
    public function actionAll()
    {
        $view = new View();
        $items = NewsModel::findAll();

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
        $view->item = NewsModel::findOneByPk($id);
        $view->display('news/one.php');
    }
}