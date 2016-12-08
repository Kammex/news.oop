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


}