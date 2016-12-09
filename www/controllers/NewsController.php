<?php


class NewsController
{
    /*Метод получает все новости и выводит их на странице*/
    public function actionAll()
    {
        $news = new News();
        $view = new View();
        $view->data('news', $news->getAllNews());
        $view->display('all.php');

        /*
        $items = $news->getAllNews();
        include __DIR__ . '/../views/news/all.php';
        */

    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $news = new News();
        $view = new View();
        $view->data('news', $news->getOneNews($id));
        $view->display('one.php');
        /*
        $item = $news->getOneNews($id);
        include __DIR__ . '/../views/news/one.php';
        */
    }
}