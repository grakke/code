<?php

namespace Popp\creational\abstract_factory;

include "BloggsCommsManager.php";
include "MegaCommsManager.php";
include "AppConfig.php";

$instance = new BloggsCommsManager();
$bloggsObj = $instance->make(CommsManager::TTD);
print $instance->getHeader() . $bloggsObj->encode() . $instance->getFooter() . "\n";

$instance = new MegaCommsManager();
$megaObj = $instance->make(CommsManager::CONTACT);
print $instance->getHeader() . $megaObj->encode() . $instance->getFooter(). "\n";


# object generate decide
$commsMgr = AppConfig::getInstance()->getCommsManager();
print $commsMgr->getApptEncoder()->encode();
