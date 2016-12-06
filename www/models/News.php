<?php

class News
    extends AbstractModel
{
    public $id;
    public $title;
    public $path;
    public $add_news;

    protected static $table = 'news';
    protected static $class = 'News';

}