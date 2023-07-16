<?php
declare(strict_types=1);

namespace Popp\ch3;

require_once __DIR__ . '/../../vendor/autoload.php';

$cd = new CdProduct('CD', 'Henry', 'Lee', 40, 70);
$cd->setDiscount(12);
$book = new BookProduct('Book', 'Arsène', 'Wenger', 60, 80);
$book->setDiscount(15);

echo $cd->calculateTax(100) . "\n";

$u = new UtilityService();
print $u->calculateTax(100) . "\n";
print $u->basicTax(100) . "\n";

echo $cd->generateId(). "\n";


//ShopProductWriter::addProduct($cd);
//ShopProductWriter::addProduct($book);
//ShopProductWriter::write();
$writer = new TextProductWriter();
$writer->addProduct($cd);
$writer->addProduct($book);
$writer->write();


$dsn = "sqlite:/Users/henry/Workspace/code/PHP/Popp/ch3/db";
$pdo = new \PDO($dsn, null, null);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);

var_dump($obj);
