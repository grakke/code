<?php

namespace Popp\creational\factory;

include "BloggsCommsManager.php";
include "MegaCommsManager.php";

$instance = new BloggsCommsManager();
print $instance->getHeader() . $instance->getApptEncoder()->encode() . $instance->getFooter() . PHP_EOL;

$instance = new MegaCommsManager();
print $instance->getHeader() . $instance->getApptEncoder()->encode() . $instance->getFooter();
