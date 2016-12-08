<?php

/*Статическое связывание!!! Вместо self::$table(которое привязывает переменную к данному классу, а не к дочернему),
 в строкее 16 используется static::$table, которое позволяет подставлять в переменную $table значение
дочернего класса*/

abstract class AbstractModel
{

    protected static $table;
    protected static $class;

    /*Метод получает все записи из таблицы и возвращает массив соответствующих объектов*/
    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY add_news DESC';
        return $db->queryAll($sql, static::$class);
    }

    /*Метод осуществляет поиск заданной записи в таблице и возвращает объект соответствующего типа*/
    public static function getOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }

    public static function addNews()
    {
        $db = new DB();
        $title = $_POST['title'];
        $text = $_POST['article'];
        $sql = "INSERT INTO " . static::$table . " (`title`) VALUES ('" . $title . "')";
        if (false == $db->exec($sql)) {
            return false;
        }
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT 1';
        $id = $db->queryOne($sql, static::$class)->id;

        $file = new File();
        $file_name = $file->getFileName($id);

        $sql = "UPDATE " . static::$table . " SET path='" . $file_name . "' WHERE id=" . $id;
        if (false == $db->exec($sql)) {
            return false;
        }

        return $file->upload($text);
    }

}