<?php

namespace syntax\reflect;

include 'Student.php';
include 'Printer.php';
include 'Circle.php';
include 'Point.php';


$refl_class = new \ReflectionClass(Student::class);
$object = $refl_class->newInstanceArgs(["obama", 100]);
echo get_class($object) . "\n";
echo $object->getName() . "\n";

$refl_method = $refl_class->getMethod("setBase");
echo get_class($refl_method) . "\n";

$parameters = $refl_method->getParameters();
foreach ($parameters as $parameter) {
    echo $parameter->getName() . "\n";

    if ($parameter->isDefaultValueAvailable()) {
        echo $parameter->getDefaultValue() . "\n";
    }
}

function display($a, $b, Printer $printer)
{
    echo "called" . "\n";
}

//$refl_function = new \ReflectionFunction("display");
//$parameters = $refl_function->getParameters();
//foreach ($parameters as $parameter) {
//    echo $parameter->getName() . "\n";
//    if ($parameter->isDefaultValueAvailable()) {
//        echo $parameter->getDefaultValue() . "\n";
//    }
//}


$refl_class = new \ReflectionClass(Circle::class);
$refl_args = new \ReflectionClass(Point::class);

$object = $refl_class->newInstanceArgs([$refl_args, 100]);
echo get_class($object) . PHP_EOL;
echo $object->area();

print ReflectionUtil::getClassSource(
    new \ReflectionClass(CdProduct::class)
);
