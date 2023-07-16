<?php

use Popp\structure\composite\UnitScript;

require './../../../vendor/autoload.php';


## 组合模式
$new = new \Popp\structure\composite\TroopCarrier();
$new->addUnit(new \Popp\structure\composite\Archer());
$new->addUnit(new \Popp\structure\composite\LaserCanon());


$comp = UnitScript::joinExisting(new \Popp\structure\composite\Cavalry(), $new);
echo $comp->bombardStrength().PHP_EOL;

$res = new \Popp\structure\composite\Army();
$res->addUnit($comp);
echo $res->bombardStrength().PHP_EOL;

$new->addUnit(new \Popp\structure\composite\Cavalry());

$textdump = new \Popp\structure\composite\TextDumpArmyVisitor();
$new->accept($textdump);
print $textdump->getText().PHP_EOL;

$taxCollection = new \Popp\structure\composite\TaxCollectionVisitor();
$new->accept($taxCollection);
print $taxCollection->getReport();
print 'TOTAL:'.$taxCollection->getTax().PHP_EOL;
