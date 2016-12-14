<?php


class NewsController
{
    /*Метод получает все новости и выводит их на странице*/
    public function actionAll()
    {
        $news = new News();
        $view = new View();
        $items = $news->getAllNews();

        /*Работает магический метод __set($name, $value) и заполняет свойство $data*/
        $view->items = $items;

        $view->display('news/all.php');

    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $news = new News();
        $view = new View();

        $view->item = $news->getOneNews($id);

/*
        $view->foo = 'bar';
        foreach ($view as $key => $value) {
            var_dump($key);
            echo '<br><br>';
        }
*/
        $view->display('news/one.php');
    }
}