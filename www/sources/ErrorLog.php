<?php

namespace App\Sources;

/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.12.16
 * Time: 17:52
 * Класс для логирования в файл пойманных исключений
 */
class ErrorLog
{

    protected $time;
    protected $file;
    protected $line;
    protected $code;
    protected $message;
    public $dump;
    protected static $data = [];

    /**
     * ErrorLog constructor.
     * @param string $file
     * @param int $line
     * @param int $code
     * @param string $message
     * Конструктор класса. Создает объект, содержащий информацию о времени пойманного исключения, передаваемом сообщении,
     * и месте его возникновения
     */
    public function __construct($file = __FILE__, $line = __LINE__, $code = 0, $message = 'error')
    {
        $date = new \DateTime();
        $this->time = $date->format('Y-m-d H:i:s');
        $this->file = $file;
        $this->line = $line;
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * @return int
     * Метод, записывющий данные об исключении в текстовый файл
     */
    public function logError() {

        $this->dump = $this->time . '___' . $this->message . '___' . $this->code . '___' . $this->file . ':' . $this->line . PHP_EOL;
        $file = __DIR__ . '/../logs/logs.txt';
        return file_put_contents($file, $this->dump, FILE_APPEND);
    }

    /**
     * @return array
     * Статический метод класса, позволяющий считать все исключения из лог-файла
     */
    public static function getLogs()
    {
        $file = __DIR__ . '/../logs/logs.txt';
        self::$data = file($file);
        return self::$data;
    }

}