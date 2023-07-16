<?php

namespace Popp\structure\facade;

include "Product.php";

class ProductAnalyse
{
    public static function getProductFileLines(string $file): array
    {
        return file($file);
    }

    public static function getProductObjectFromId(string $id, string $productname): Product
    {
        // some kind of database lookup
        return new Product($id, $productname);
    }

    public static function getNameFromLine(string $line): string
    {
        if (preg_match("/.*-(.*)\s\d+/", $line, $array)) {
            return str_replace('_', ' ', $array[1]);
        }
        return '';
    }

    public static function getIDFromLine($line): int|string
    {
        if (preg_match("/^(\d{1,3})-/", $line, $array)) {
            return $array[1];
        }
        return -1;
    }
}
