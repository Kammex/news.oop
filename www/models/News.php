<?php

class News
    extends AbstractModel
{
    public $id;
    public $title;
    public $path;
    public $add_news;
    public $text;

    protected static $table = 'news';
    protected static $class = 'News';

    /*Метод собирает объект новостей, название и дата создания которых содержатся в базе, а контент - в соответсвующем файле*/
    public function getAllNews()
    {
        $all_news = self::getAll();
        $content = new File();
        foreach ($all_news as $key => $news)
        {
            $news->text = $content->getContent($news->id);
        }
        return $all_news;
    }

    /*Метод собирает объект новости, название и дата которого находятся в базе, а контент - в файле*/
    public function getOneNews($id)
    {
        $news = self::getOne($id);
        $content = new File();
        $news->text = $content->getContent($news->id);
        return $news;
    }

    /*Добавление новой новости*/
    public static function addNews($title, $text)
    {
        $db = new DB();
        $sql = "INSERT INTO " . self::$table . " (`title`) VALUES ('" . $title . "')";
        if (false == $db->exec($sql)) {
            return false;
        }
        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY id DESC LIMIT 1';
        $id = $db->queryOne($sql, self::$class)->id;

        $file = new File();
        $file_name = $file->getFileName($id);

        $sql = "UPDATE " . self::$table . " SET path='" . $file_name . "' WHERE id=" . $id;
        if (false == $db->exec($sql)) {
            return false;
        }

        return $file->upload($text);
    }

}