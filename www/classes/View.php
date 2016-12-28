<?php

/**
 * Class View
 * Класс для управвления отображением контента
 */
class View
    implements Iterator
{

    private $position = 0;
    private $keys = [];

    protected $data = [];

    public function __construct()
    {
        $this->position = 0;
    }

    /*Метод вызывается при попытке записать значение в необъявленное свойство класса/объекта*/
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /*Метод вызывается при попытке прочитать несуществующее  свойство объекта*/
    public function __get($name)
    {
        return $this->data[$name];
    }

    /*Метод осуществляет формирование контента, выводимого в браузер*/
    public function render($template)
    {
        //$this->data['items'] --> $items
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }
        //var_dump($this->data['item']); die;
        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * @param $template
     * Вывод на экран заданного контента
     */
    public function display($template)
    {
        echo $this->render($template);
    }


    /*Rewind the Iterator to the first element*/
    public function rewind()
    {
        //var_dump(__METHOD__);
        $this->keys = array_keys($this->data);
        $this->position = 0;
    }

    /*Return the current element*/
    public function current()
    {
        //var_dump(__METHOD__);
        return $this->data[$this->keys[$this->position]];
    }


    /* Return the key of the current element*/
    public function key()
    {
        //var_dump(__METHOD__);
        return $this->keys[$this->position];
    }

    /*Move forward to next element*/
    public function next()
    {
        //var_dump(__METHOD__);
        ++$this->position;
    }

    /*Checks if current position is valid*/
    public function valid()
    {
        //var_dump(__METHOD__);
        return isset($this->keys[$this->position]);
    }

}