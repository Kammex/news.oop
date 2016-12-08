<?php


class File
{

    protected $file_name = '';

    /*Метод генерирует имя файла в зависимости от id записи в БД*/
    public function getFileName($id)
    {
        if (false == $num = (int)$id) {
            return false;
        }

        $len = strlen((string)$num);
        switch ($len) {
            case 1:
                $this->file_name = '000' . $num . '.txt';
                break;
            case 2:
                $this->file_name = '00' . $num. '.txt';
                break;
            case 3:
                $this->file_name = '0' . $num . '.txt';
                break;
            case 4:
                $this->file_name = $num . '.txt';
                break;
            default:
                $this->file_name = false;
        }
        return $this->file_name;

    }

    /*Метод формирует новое имя файла для записи новости в зависимости от последнего id статьи в базе данных*/
    public function createFileName($id)
    {
        return $this->getFileName($id + 1);
    }

    /*Получение контента файла*/
    public function getContent($id)
    {
        $path = __DIR__ . '/../news/' . $this->getFileName($id);
        if (!file_exists($path)) {
            return false;
        }
        return implode('<br>', file($path));
    }

    /*Сохранение текста новости в файле на сервере*/
    public function upload($text)
    {
        if ('' == $this->file_name) {
            return false;
        }

        $path = __DIR__ . '/../articles/' . $this->file_name;
        if (file_put_contents($path, $text)) {
            return true;
        }
        return false;
    }

}