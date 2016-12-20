<?php


class AdminController
{

    public function actionAddNews()
    {
        $view = new View();
        $view->display('news/add.php');
        if(empty($_POST) || !isset($_POST['title']) || !isset($_POST['article'])) {
            return false;
        }

        $article = new NewsModel();
        $article->title = $_POST['title'];
        $article->text = nl2br($_POST['article']);
        if ($article->save()) {
            var_dump($article->id); die;
            header('Location: /');
        } else {
            header('Location: /views/news/error.php');
        }
    }

    public function actionDelNews()
    {
        $news = new NewsModel();
        $news->id = $_POST['del'];
        if (!isset($_POST['del'])) {
            header('Location: /views/news/error.php');
        }
        //$id = $_POST['del'];

        if ($news->delete()) {
            header('Location: /');
        } else {
            header('Location: /views/news/error.php');
        }
    }

    public function actionEditNews ()
    {
        if (!isset($_POST['edit']) && !isset($_POST['id'])) {
            return false;
        }

        if (isset($_POST['edit'])) {
            $id = $_POST['edit'];
            $view = new View();
            $view->item = NewsModel::findOneByPk($id);
            $view->display('news/edit.php');
        } else {
            $article = new NewsModel();
            $article->id = $_POST['id'];
            $article->title = $_POST['title'];
            $article->text = nl2br($_POST['article']);

            $article->save();
            header('Location: /');

        }
    }
}