<?php

class DB
{
    private $link;

    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '1234', 'test');
        mysqli_query($this->link, 'SET NAMES utf8');
        return $this->link;
    }

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

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }
}