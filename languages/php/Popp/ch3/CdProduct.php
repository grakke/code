<?php

namespace Popp\ch3;

class CdProduct extends ShopProduct
{

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price,
        private int $playLength
    ) {
        parent::__construct($title, $firstName, $mainName, $price);
    }

    protected int $taxrate = 40;

    public function getPlayLength(): int
    {
        return $this->playLength;
    }

    public function getSummaryLine():string
    {
        $base = parent::getSummeryLine();

        return $base . ": playing time - {$this->getPlayLength()}". ", Price: ". $this->getPrice();
    }
}
