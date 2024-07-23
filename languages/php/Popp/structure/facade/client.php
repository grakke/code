<?php

use Popp\structure\facade\ProductFacade;

include "ProductFacade.php";

$facade = new ProductFacade(__DIR__ . '/test2.txt');
print_r($facade->getProducts());
$object = $facade->getProduct("234");
print_r($object);
