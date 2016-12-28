<?php

/**
 * Class Config
 */
class Config
{

    protected static $db = 'test';
    protected static $host = 'localhost';
    protected static $user = 'root';
    protected static $pass = '1234';

    /**
     * @return array
     * Возвращает настройки для подключения к БД
     */
    public static function getDBConfig()
    {
        return [
            'host' => self::$host,
            'user' => self::$user,
            'pass' => self::$pass,
            'db' => self::$db
        ];
    }
}