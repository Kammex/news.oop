<?php

/*Статическое связывание!!! Вместо self::$table(которое привязывает переменную к данному классу, а не к дочернему),
 в строкее 16 используется static::$table, которое позволяет подставлять в переменную $table значение
дочернего класса*/

abstract class AbstractModel
{
    static protected $table;
    protected $data = [];

    /*Установка клаассу несуществующего свойства*/
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /*Возвращает значение несуществующего свойства*/
    public function __get($name)
    {
        return $this->data[$name];
    }

    /*Проверка на существование значения свойства, записанного с помощью сеттера*/
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /*Возвращает все записи в таблице*/
    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY add_news DESC';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    /*Поиск одной записи по первичному ключу*/
    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        $res = $db->query($sql, [':id' => $id]);
        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }

    /*Поиск всех записей в таблице с заданным значением заданного поля*/
    public static function findByColumn($column, $value)
    {
        $class = get_called_class();
        $key = ':' . $column;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=' . $key;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':value' => $value]);
    }

    /*Поиск одной записи в таблице с заданным значением заданного поля*/
    public static function findOneByColumn($column, $value)
    {
        $res = static::findByColumn($column, $value);
        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }

    /*Добавление новой записи*/
    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        //$this->data
        //['title' => 'Foo', 'text' => 'Bar']
        //для подстановки
        //[':title' => 'Foo', ':text' => 'Bar']
        $sql = 'INSERT INTO ' . static::$table . ' 
            (' . implode(', ', $cols) . ')
            VALUES 
            (' . implode(', ', array_keys($data)) . ')
        ';

        $db = new DB();
        if ($db->execute($sql, $data)) {
            $this->id = $db->lastInsertId();
            return true;
        }
        return false;
    }

    /*Изменение существующей записи*/
    protected function update()
    {
        $data = [];
        $data[':id'] = $this->id;
        $data[':title'] = $this->title;
        $data[':text'] = $this->text;

        $sql = 'UPDATE ' . static::$table . ' 
            SET title=:title, 
            text=:text 
            WHERE id=:id';
        $db = new DB();
        return $db->execute($sql, $data);
    }

    /*Удаление существующей записи*/
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        return $db->execute($sql, [':id' => $this->id]);
    }

    /*Создание/редактирование новости*/
    public function save()
    {
        if (!isset($this->id)) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }
}