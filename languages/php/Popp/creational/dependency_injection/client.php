<?php

namespace Popp\creational\dependency_injection;

use Popp\creational\factory\ApptEncoder;

include "ObjectAssembler.php";
include "../factory/BloggsApptEncoder.php";
include "AppointmentMaker.php";
include "TerrainFactory.php";
include "../prototype/Sea.php";
include "../prototype/EarthSea.php";
include "../prototype/Plains.php";
include "../prototype/MarsPlains.php";
include "../prototype/Forest.php";
include "../prototype/EarthForest.php";

$assembler = new ObjectAssembler("objects.xml");

$encoder = $assembler->getComponent(ApptEncoder::class);
$apptmaker = new AppointmentMaker($encoder);
$out = $apptmaker->makeAppointment();
print $out;

$apptmaker = $assembler->getComponent(AppointmentMaker::class);
$out = $apptmaker->makeAppointment();
print $out;

$terrainfactory = $assembler->getComponent(TerrainFactory::class);
$plains = $terrainfactory->getPlains();

# TODO：Fatal error: Uncaught Error: Typed property Popp\creational\dependency_injection\AppointmentMaker::$encoder must not be accessed before initialization in /Users/henry/Workspace/code/PHP/Popp/creational/dependency_injection/AppointmentMaker.php:19
