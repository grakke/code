<?php

namespace syntax\reflect;

class Circle
{
        public const PI = 3.14;//半径
/**
     * @var int
     */
    public $radius;//圆心点
/**
     * @var Point
     */
    public Point $center;

    public function __construct(Point $point, $radius = 1)
    {
        $this->center = $point;
        $this->radius = $radius;
    }

    //打印圆点的坐标
    public function printCenter()
    {
        printf('center coordinate is (%d, %d)', $this->center->x, $this->center->y);
    }

    //计算圆形的面积
    public function area()
    {
        return self::PI * pow($this->radius, 2);
    }
}
