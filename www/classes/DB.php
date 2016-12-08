<?php

class DB
{
    private $link;

    /*Метод создает ссоединение с БД*/
    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '1234', 'test');
        mysqli_query($this->link, 'SET NAMES utf8');
        return $this->link;
    }

    /*Метод осуществляет выбор всех записей и возвращает массив объектов*/
    public function queryAll($sql, $class = 'stdClass')
    {
        $res = mysqli_query($this->link, $sql);
        if (false === $res) {
            return false;
        }

        $ret = [];
        while ($row = mysqli_fetch_object($res, $class)) {
            $ret[] = $row;
        }
        return $ret;
    }

    /*Метод выбирает одну запись из БД по заданному запросу и возвращает объект*/
    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }

    /*Метод выполняет запросы изменения, удаления и вставки*/
    public function exec($sql)
    {
        return mysqli_query($this->link, $sql);
    }

}