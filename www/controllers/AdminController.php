<?php


class AdminController
{

    public function actionAddNews()
    {
        $view = new View();
        $view->data('news', null);
        $view->display('add.php');
        /*
        include __DIR__ . '/../views/news/add.php';
        */
        if(empty($_POST)) {
            return false;
        }

        if (News::addNews($_POST['title'], $_POST['article'])) {
            header('Location: /');
        } else {
            header('Location: /views/news/error.php');
        }
    }

}