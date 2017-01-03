<?php

namespace App\Controllers;

use App\Models\News as NewsModel;
use App\Sources\View;
use App\Sources\ErrorLog;

/**
 * Class AdminController
 * Класс администрирования
 */
class Admin
{

    /**
     * @return bool
     * Добавление новой новости
     */
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
            header('Location: /');
        } else {
            $error = 'Произошла ошибка при загрузке новости';
            header('Location: /views/news/error.php');
        }
    }

    /**
     * Удаление новости
     */
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

    /**
     * @return bool
     * Редактирование новости
     */
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

    /**
     * Просмотр лога с исключениями
     */
    public function actionViewLogs()
    {
        $view = new View();
        $arr = ErrorLog::getLogs();
        $arr = array_reverse($arr);
        $items = [];
        foreach ($arr as $key => $value)
        {
            $sub_arr = explode('___', $value);
            $items[$key] = $sub_arr;
        }
        $view->items = $items;
        $view->display('logs.php');
    }
}