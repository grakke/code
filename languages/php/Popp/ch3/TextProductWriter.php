<?php

namespace Popp\ch3;

class TextProductWriter extends ShopProductWriter
{

    public function write(): void
    {
        $str = "PRODUCTS:\n";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "\n";
        }
        print $str;
    }
}
