<?php

use Popp\creational\singleton\Preferences;

require "./Preferences.php";

$pref = Preferences::getInstance();

$pref->setProperty("name", "Henry");
unset($pref);

print Preferences::getInstance()->getProperty("name"). "\n";

$pref = Preferences::getInstance();
$pref->setProperty("name", "Walcott");
unset($pref);

print Preferences::getInstance()->getProperty("name");
