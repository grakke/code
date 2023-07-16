<?php

namespace Popp\ch8;

include 'Seminar.php';
include 'Lecture.php';
include 'TimedCostStrategy.php';
include 'FixedCostStrategy.php';
include 'RegistrationMgr.php';

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());

$mgr = new RegistrationMgr();
foreach ($lessons as $lesson) {
    print "lesson charge {$lesson->cost()}. ";
    print "Charge type: {$lesson->chargeType()}\n";
    $mgr->register($lesson);
}
