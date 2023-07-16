<?php

namespace syntax\oop;

class Totalizer2
{
    public static function warnAmount($amt): callable
    {
        $count = 0;
        return function ($product) use ($amt, &$count) {
            $count += $product->price;
            print " count: $count\n";
            if ($count > $amt) {
                print " high price reached: {$count}\n";
            }
        };
    }
}
