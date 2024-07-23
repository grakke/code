<?php

namespace syntax\reflect;

class Point
{
    public $x;
    public $y;

    /**
     * Point constructor.
     * @param int $x horizontal value of point's coordinate
     * @param int $y vertical value of point's coordinate
     */
    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }
}
