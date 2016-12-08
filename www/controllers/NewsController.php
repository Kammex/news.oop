<?php


class NewsController
{
    /*Метод получает все новости и выводит их на странице*/
    public function actionAll()
    {
        $news = new News();
        $items = $news->getAllNews();
        include __DIR__ . '/../views/news/all.php';

    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $news = new News();
        $item = $news->getOneNews($id);
        include __DIR__ . '/../views/news/one.php';
    }
}