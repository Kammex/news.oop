<?php

class DB
{
    private $dbh;
    private $className = 'stdClass';

    /*Метод создает соединение с БД*/
    public function __construct()
    {
        $config = Config::getDBConfig();
        $dns = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];
        $this->dbh = new PDO($dns, $config['user'], $config['pass']);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbh->query('SET NAMES utf8');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    /*Выполнение запросов выборки*/
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    /*Выполнение прочих запросов*/
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}