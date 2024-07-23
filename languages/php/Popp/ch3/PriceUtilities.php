<?php

namespace Popp\ch3;

trait PriceUtilities
{

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }

    abstract public function getTaxRate(): float;
}
