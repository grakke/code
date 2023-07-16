<?php

namespace Popp\ch3;

// warp Trait
class UtilityService extends Service
{
    use PriceUtilities;
    use TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        PriceUtilities::calculateTax as basicTax;
    }
    public int $taxrate = 30;

    public function getTaxRate(): float
    {
        return 20;
    }
}
