<?php

/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.12.16
 * Time: 17:52
 */
class ErrorLog
{

    protected $time;
    protected $file;
    protected $line;
    protected $code;
    protected $message;
    public $dump;


    public function __construct($file = __FILE__, $line = __LINE__, $code = 0, $message = 'error')
    {
        $date = new DateTime();
        $this->time = $date->format('Y-m-d H:i:s');
        $this->file = $file;
        $this->line = $line;
        $this->code = $code;
        $this->message = $message;
    }

    public function logError() {

        $this->dump = $this->time . ': ' . $this->message . ', code: ' . $this->code . ' in ' . $this->file . ':' . $this->line . PHP_EOL;
        $file = __DIR__ . '/../logs/logs.txt';
        return file_put_contents($file, $this->dump, FILE_APPEND);
    }


}