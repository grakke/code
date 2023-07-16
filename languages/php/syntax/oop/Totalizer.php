<?php

namespace syntax\oop;

class Totalizer
{
    public static function warnAmount(): callable
    {
        return function (Product $product) {
            if ($product->price > 5) {
                print " reached high price: {$product->price}\n";
            }
        };
    }
}
