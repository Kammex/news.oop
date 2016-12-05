<?php

require_once __DIR__ . '/../classes/DB.php';

class News
{
    public $id;
    public $title;
    public $path;
    public $add_news;

    public static function getAll()
    {
        $db = new DB;
        return $db->query('SELECT * FROM news ORDER BY add_news DESC', 'News');
    }
}