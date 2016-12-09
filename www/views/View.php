<?php


class View
{

    public $folder;
    public $items;

    public function data($folder, $items)
    {
        $this->folder = $folder;
        $this->items = $items;
    }

    public function display($file_name)
    {
        if (file_exists($file = __DIR__ . '/' . $this->folder . '/' . $file_name)){
            include __DIR__ . '/' . $this->folder . '/' . $file_name;
        }

    }

}