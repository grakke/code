<?php

namespace Popp\ch3;

class BookProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int|float $price,
        private int $numPages
    ) {
        parent::__construct($title, $firstName, $mainName, $price);
    }

    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

    public function getSummaryLine():string
    {
        $base = parent::getSummeryLine();

        return $base . ":page count - ". $this->getNumberOfPages(). ", Price: ". $this->getPrice();
    }

    public function getPrice():float
    {
        return $this->price;
    }
}
