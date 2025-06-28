<?php

/**
 * PHP Function, Closure, and Arrow Function Comprehensive Guide
 *
 * - Value and reference passing
 * - Scope and global/static variables
 * - Closures and use keyword
 * - Variadic functions
 * - Arrow functions
 * - Modern PHP features
 * - Error handling and compatibility
 */

declare(strict_types=1);

// === 1. VALUE PASSING ===
$a = 1;
$b = 2;
function add(int $a, int $b): int
{
    $a += $b;
    return $a;
}

$c = add($a, $b);
printf("Value passing: a = %d, c = %d\n", $a, $c);

// === 2. REFERENCE PASSING ===
function add_v(int &$a, int $b): void
{
    $a += $b;
}

add_v($a, $b);
printf("Reference passing: a = %d\n", $a);

// === 3. SCOPE DEMO ===
$d = 10;
function myFunction($d)
{
    echo "myFunction param: $d\n";
    ++$d;
    echo "myFunction incremented: $d\n";
}

myFunction($d++); // 传入10, 函数内改变对外无影响
echo "d after myFunction: $d\n";

$f = 7;
function myFunction1(&$d)
{
    return $d++;
}

echo "myFunction1 returned: " . myFunction1($f) . ", f now: $f\n";
echo $f . PHP_EOL;

// === 4. CLOSURE (ANONYMOUS FUNCTION) ===
$add = function (int $a, int $b) {
    return $a + $b;
};
echo "Closure: $a + $b = " . $add($a, $b) . "\n";

// === 5. DYNAMIC FUNCTION NAME ===
function multi(int $a, int $b): int
{
    return $a * $b;
}

$add = 'multi';
echo "Dynamic function: $a x $b = " . $add($a, $b) . "\n";

// === 6. CLOSURE WITH USE KEYWORD ===
$a = 5;
$b = 6;
$closure = function () use ($a, $b) {
    return $a * $b;
};
echo "Closure with use: " . $closure() . "\n";

// === 7. GLOBAL KEYWORD ===
$n1 = 100;
$n2 = 54;
function sub()
{
    global $n1, $n2;
    return $n1 - $n2;
}

echo "Global keyword: " . sub() . "\n";

// === 8. CLOSURE SCOPE VS GLOBAL ===
function add1($n1, $n2)
{
    return function () use ($n1, $n2) {
        return $n1 + $n2;
    };
}

function add2()
{
    return function () {
        global $n1, $n2, $n3;
        return $n1 + $n2 + $n3;
    };
}

$n1 = 1;
$n2 = 3;
$n3 = 4;
$add = add1($n1, $n2);
$sum = $add();
echo "Closure scope: $n1 + $n2 = $sum\n";

$add = add2();
$sum = $add();
echo "Closure global: $n1 + $n2 + $n3 = $sum\n";

// === 9. VARIADIC FUNCTIONS ===
function sum(...$numbers)
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    printf("Variadic: count = %d, sum = %d\n", func_num_args(), $sum);
}

sum(1, 2, 3, 4, 5);

// === 10. DEFAULT PARAMETERS ===
function sayHello($name, $age = 28)
{
    echo "Hello $name, you are $age years old\n";
}

sayHello("Maxsu", 27);
sayHello("Henry");

// === 11. REFERENCE PARAMETER ===
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
    echo $string . "\n";
}

$str = 'This is a string, ';
add_some_extra($str);

// === 12. ARRAY DEFAULTS ===
function makecoffee($types = array("cappuccino"), $coffeeMaker = null)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of " . join(", ", $types) . " with $device.\n";
}

echo makecoffee();
echo makecoffee(array("cappuccino", "lavazza"), "teapot");

// === 13. POST/INCREMENT ===
function increment($i)
{
    echo $i++ . "\n";
}

$i = 10;
increment($i);

function increment1(&$i)
{
    echo $i++ . "\n";
}

$i = 10;
increment1($i);
echo $i . "\n";

// === 14. RETURNING VALUES ===
function sum1(...$numbers)
{
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo "sum1: " . sum1(1, 2, 3, 4) . "\n";

// === 15. LIST DESTRUCTURING ===
function small_numbers()
{
    return array(0, 1, 2);
}

list($zero, $one, $two) = small_numbers();

// === 16. RECURSION ===
function display($number)
{
    if ($number <= 5) {
        echo "$number ";
        display($number + 1);
    }
}

display(1);
echo "\n";

// === 17. FUNCTION VARIABLE CALLS ===
function foo()
{
    echo "In foo()\n";
}

function bar($arg = '')
{
    echo "In bar(); argument was '$arg'.\n";
}

function echoit($string)
{
    echo $string . "\n";
}

$func = 'foo';
$func();

$func = 'bar';
$func('tests');

$func = 'echoit';
$func('tests');

// === 18. CLOSURE CALLBACK ===
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world') . "\n";

// === 19. CLOSURE WITH USE (BY REFERENCE) ===
$message = 'hello';
$example = function () use ($message) {
    echo $message;
};
echo $example() . "\n";

function getClosure($n)
{
    $a = 100;
    return function ($m) use ($n, &$a) {
        $a += $n + $m;
        echo $a . "\n";
    };
}

$fn = getClosure(1);
$fn(1);
$fn(2);
$fn(3);

// === 20. CLASS METHOD CLOSURE (DEMO, COMMENTED) ===
// $dog = new \syntax\oop\Dog("Rover", "red");
// $dog->greet("Hello")();
// $dog->swim()();
// $dog();
// $class = new ReflectionClass('Dog');
// $closure = $class->getMethod('privateMethod')->getClosure($dog);
// $closure();

// === 21. RANDOM BYTES/INT (PHP 7+) ===
if (function_exists('random_bytes') && function_exists('random_int')) {
    $bytes = random_bytes(5);
    echo "random_bytes: " . bin2hex($bytes) . "\n";
    echo "random_int: " . random_int(100, 999) . "\n";
} else {
    echo "random_bytes/random_int not available in this PHP version.\n";
}

// === 22. SCOPE: GLOBAL, STATIC, LOCAL ===
$x = 5;
$y = 10;
function myTest()
{
    global $x, $y;
    $y = $x + $y;
    echo "myTest: y = $y\n";
}

myTest();

function myTest1()
{
    static $x = 0;
    echo "myTest1: x = $x\n";
    $x++;
}

myTest1();
myTest1();
myTest1();

function myTest2($x)
{
    echo "myTest2: x = $x\n";
}

myTest2(5);

// === 23. UNSET GLOBALS ===
function destroy_foo()
{
    global $foo;
    // unset($foo);
    unset($GLOBALS['bar']);
    // echo $foo; // Notice: Undefined variable: foo
}

$foo = 'bar';
destroy_foo();
echo "foo after destroy_foo: $foo\n";

// === 24. FUNC_GET_ARGS DEMO ===
function foo1()
{
    $args = func_get_args();
    foreach ($args as $k => $v) {
        echo "arg" . ($k + 1) . ": $v ";
    }
    echo "\n";
}

foo1();
foo1('hello');
foo1('hello', 'world', 'again');

// === 25. IS_COUNTABLE DEMO (PHP 7.3+) ===
if (function_exists('is_countable')) {
    echo "is_countable array: " . (is_countable(['ANull', 'B', 3]) ? 'yes' : 'no') . "\n";
    echo "is_countable ArrayIterator: " . (is_countable(new ArrayIterator()) ? 'yes' : 'no') . "\n";
    // use syntax\php7\ANull if available
    if (class_exists('syntax\\php7\\ANull')) {
        echo "is_countable ANull: " . (is_countable(new \syntax\php7\ANull()) ? 'yes' : 'no') . "\n";
    }
    $array = ['ANull', 'B', 3];
    if (is_countable($array)) {
        var_dump(count($array));
    }
}

// === 26. ARROW FUNCTIONS (PHP 7.4+) ===
$name = "John";
$fn1 = fn ($msg) => $msg . ' ' . $name;
echo "Arrow fn1: "; var_export($fn1("Hello")); echo "\n";
$fn = fn ($msg1) => fn ($msg2) => $msg1 . ' ' . $msg2 . ' ' . $name;
echo "Arrow fn2: "; var_export($fn("Hello")("Hi")); echo "\n";
$fn = fn (string $msg = 'Hi'): string => $msg . ' ' . $name;
$fn2 = fn (...$x) => $x;
$fn3 = fn (&$x) => $x++;
$x = 1;
$fn3($x);
echo "Arrow fn3 x: $x\n";
var_export($fn("Hello"));
var_export($fn());
var_export($fn2(1, 2, 3));

echo "=== FUNCTION DEMO COMPLETED ===\n";
