<?php

/*Статическое связывание!!! Вместо self::$table(которое привязывает переменную к данному классу, а не к дочернему),
 в строкее 16 используется static::$table, которое позволяет подставлять значение в переменную $table значение
дочернего класса*/

abstract class AbstractModel
{

    protected static $table;
    protected static $class;

    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY add_news DESC';
        return $db->queryAll($sql, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }

}