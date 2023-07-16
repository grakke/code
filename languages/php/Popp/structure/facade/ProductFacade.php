<?php

namespace Popp\structure\facade;

include "ProductAnalyse.php";

class ProductFacade
{
    private array $products = [];

    public function __construct(private string $file)
    {
        $this->compile();
    }

    private function compile(): void
    {
        $lines = ProductAnalyse::getProductFileLines($this->file);
        foreach ($lines as $line) {
            $id = ProductAnalyse::getIDFromLine($line);
            $name = ProductAnalyse::getNameFromLine($line);
            $this->products[$id] = ProductAnalyse::getProductObjectFromID($id, $name);
        }
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProduct(string $id): ?Product
    {
        if (isset($this->products[$id])) {
            return $this->products[$id];
        }
        return null;
    }
}
