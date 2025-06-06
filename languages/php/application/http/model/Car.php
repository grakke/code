<?php

namespace Application\http\model;

use Application\Model\app;

class Car
{
    const WIDTH = 2;
    const HEIGHT = 1.5;
    public static $name = '卡丁车';
    public static $model;
    public $color = 'red';
    public $address;
    protected $engine;

    public function __construct(app\models\Engine $engine, $address)
    {
        $this->engine = $engine;
        $this->address = $address;
    }

    /**
     * dirve
     *
     * @return void
     */
    public function drive()
    {
    }

    public function fuel()
    {
    }
}
