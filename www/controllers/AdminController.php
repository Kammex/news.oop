<?php


class AdminController
{

    public function actionAddNews()
    {
        include __DIR__ . '/../views/news/add.php';

        if(empty($_POST)) {
            return false;
        }

        if (News::addNews()) {
            header('Location: /');
        } else {
            header('Location: /views/news/error.php');
        }
    }

}