<?php

# const vs variable:in different position in memory
define("LANGUAGE", "PHP");
echo LANGUAGE . PHP_EOL;

const FRAMEWORK1 = "Laravel";
echo FRAMEWORK1 . PHP_EOL;

defined("FRAMEWORK") || define("FRAMEWORK", "Yii");
echo LANGUAGE . " " . FRAMEWORK . PHP_EOL;

echo __FILE__ . " " . __LINE__ . " " . PHP_OS . " " . PHP_VERSION;
