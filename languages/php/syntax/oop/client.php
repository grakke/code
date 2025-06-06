<?php

namespace syntax\oop;

// 延迟绑定 Late Static Bindings

use stdClass;
use syntax\ns\Debug as nDebug;

include 'B.php';
include "ProcessSale.php";
include "Product.php";
include "Mailer.php";
include "Totalizer.php";
include "Totalizer2.php";
include "Totalizer3.php";
include "OwnIterator.php";
include "Child.php";
include "Person.php";
include "Benz.php";
include "./../ns/Debug.php";

// static
B::test();
var_dump(B::create());

Child::getSelf();
$child = Child::getInstance();

$child->selfFoo();
$child->staticFoo();
$child->thisFoo();

//Benz::tests();
Benz::getClass();


// 回调 匿名函数 闭包
$logger = function ($product) {
    print " logging ({$product->name})\n";
};
$logger1 = fn($product) => print " logging1 ({$product->name})\n";

$markup = 3;
$counter = fn(Product $product) => print "($product->name) marked up price: " .
    ($product->price + $markup) . "\n";

$processor = new ProcessSale();
$processor->registerCallback($logger);
$processor->registerCallback($logger1);
$processor->registerCallback([new Mailer(), "doMail"]);
$processor->registerCallback(Totalizer::warnAmount());
$processor->registerCallback(Totalizer2::warnAmount(8));
$processor->registerCallback((new Totalizer3)->warnAmount(8));
$processor->registerCallback($counter);

$processor->sale(new Product("shoes", 6));
print "\n";
$processor->sale(new Product("coffee", 6));


$it = new OwnIterator();
foreach ($it as $key => $value) {
    echo $key . '@@' . $value . PHP_EOL;
}

var_dump(!($it instanceof stdClass)); # true


if (class_exists('Person')) {
    echo 'class Person exists.' . PHP_EOL;
    printf('%s%s', Person::NATIONNATITLTY, PHP_EOL);

    $person = new Person('John');
    $person->setAge(22);
    $person->say();

    $person->run('teacher');
    $person->eat('John', 'apple');
    $person->output(
        new class implements PersonWriter {
            public function write(Person $person): void
            {
                print $person->getName() . " " . $person->getAge() . "\n";
            }
        }
    );
    $person->output(
        new class ("/tmp/persondump") implements PersonWriter {
            private $path;

            public function __construct(string $path)
            {
                $this->path = $path;
            }

            public function write(Person $person): void
            {
                file_put_contents($this->path, $person->getName() . " " . $person->getAge() . "\n");
            }
        }
    );
    unset($person);
} else {
    echo 'class Person not exists.' . PHP_EOL;
}

$obj = (object)['1' => 'foo'];
var_dump(isset($obj->{'1'}));

class Debug
{
    public static function helloWorld(): void
    {
        echo 'Hello from ' . __NAMESPACE__ . "\n";
    }
}


Debug::helloworld();
nDebug::helloWorld();
\syntax\ns\Debug::helloWorld();
