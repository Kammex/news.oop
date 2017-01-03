<?php

namespace App\Models;

/**
 * Class NewsModel
 * @property $id
 * @property $title
 * @property $text
 * @property $add_news
 */
class News
    extends AbstractModel
{
    protected static $table = 'news';

}