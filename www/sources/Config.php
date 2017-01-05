<?php

namespace App\Sources;

/**
 * Class Config
 */
class Config
{

    protected static $db = 'test';
    protected static $host = 'localhost';
    protected static $user = 'root';
    protected static $pass = '1234';

    protected static $mail = [
        'host' => 'smtp.gmail.com',
        'debug' => 2,
        'auth' => true,
        'port' => 587,
        'username' => 'ovantykuz@gmail.com',
        'password' => 'Diabolik1',
        'addreply' => 'ovantykuz@ukr.net',
        'secure' => 'tls',
        'mail_name' => 'Oleg Antykuz'
    ];

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

    public static function getMailConfig()
    {
        return [
            'host' => self::$mail['host'],
            'debug' => self::$mail['debug'],
            'auth' => self::$mail['auth'],
            'port' => self::$mail['port'],
            'username' => self::$mail['username'],
            'password' => self::$mail['password'],
            'addreply' => self::$mail['addreply'],
            'secure' => self::$mail['secure'],
            'mail_name' => self::$mail['mail_name']
        ];
    }
}