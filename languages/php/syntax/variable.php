<?php

/**
 * PHP Variables Comprehensive Guide
 *
 * This file demonstrates various variable concepts in PHP including:
 * - Variable declaration and naming
 * - Value assignment vs reference assignment
 * - Variable variables
 * - Memory management
 * - Performance monitoring
 */

declare(strict_types=1);

echo "=== 1. VARIABLE DECLARATION AND NAMING ===\n";

# Variable naming rules: starts with $, supports letters, numbers, underscore
# Cannot start with a number, supports Unicode characters (but ASCII is recommended)
$foo = 'Bob';
$bar = 'Henry';
$user_name = 'Alice';  // snake_case (recommended)
$userName = 'Bob';     // camelCase
$UserName = 'Charlie'; // PascalCase (for classes)

echo "Variables: $foo, $bar, $user_name, $userName, $UserName\n";

echo "\n=== 2. VALUE ASSIGNMENT (COPY) ===\n";

# Value assignment - creates a copy
$original = 'Original Value';
$copy = $original;  // Creates a copy
$copy = 'Modified Copy';

echo "Original: $original\n";
echo "Copy: $copy\n";
echo "Original unchanged: " . ($original === 'Original Value' ? 'true' : 'false') . "\n";

echo "\n=== 3. REFERENCE ASSIGNMENT ===\n";

# Reference assignment - multiple variables point to the same memory address
$reference = &$original;
$reference = 'Modified via Reference';

echo "Original: $original\n";
echo "Reference: $reference\n";
echo "Same memory address: " . ($original === $reference ? 'true' : 'false') . "\n";

echo "\n=== 4. VARIABLE VARIABLES ===\n";

# Variable variables - using variable names as variable names
$greeting = "Hello World";
$varName = "greeting";
echo "Direct: $greeting\n";
echo "Via variable variable: " . $$varName . "\n";

# More complex example
$user = 'john';
$john = 'John Doe';
$jane = 'Jane Smith';
$current_user = 'jane';

echo "Current user: " . $$current_user . "\n";

echo "\n=== 5. ARRAY ASSIGNMENT BEHAVIOR ===\n";

# Arrays are copied by value (shallow copy)
$original_array = [1, 2, 3, 'nested' => ['a', 'b']];
$copied_array = $original_array;
$copied_array[1] = 22;
$copied_array['nested'][0] = 'modified';

echo "Original array: ";
print_r($original_array);
echo "Copied array: ";
print_r($copied_array);

# Deep copy using serialize/unserialize
$deep_copy = unserialize(serialize($original_array));
$deep_copy['nested'][1] = 'deep_modified';
echo "Deep copy: ";
print_r($deep_copy);

echo "\n=== 6. MEMORY MANAGEMENT ===\n";

function monitorMemory(string $label): void {
    echo "$label: " . number_format(memory_get_usage()) . " bytes\n";
}

monitorMemory("Initial Memory Usage");

# Memory usage demonstration
$large_array = [];
for ($i = 0; $i < 10000; $i++) {
    $large_array[] = md5((string)$i);
}

monitorMemory("After creating large array");

# Remove half of the array
for ($i = 0; $i < 5000; $i++) {
    unset($large_array[$i]);
}

monitorMemory("After removing half of array");

# Force garbage collection
gc_collect_cycles();
monitorMemory("After garbage collection");

echo "Peak Memory Usage: " . number_format(memory_get_peak_usage()) . " bytes\n";

echo "\n=== 7. PERFORMANCE MONITORING ===\n";

function measureExecutionTime(callable $callback, string $label): void {
    $start_time = microtime(true);
    $start_memory = memory_get_usage();

    $result = $callback();

    $end_time = microtime(true);
    $end_memory = memory_get_usage();

    echo "$label:\n";
    echo "  Execution time: " . number_format(($end_time - $start_time) * 1000, 2) . " ms\n";
    echo "  Memory used: " . number_format($end_memory - $start_memory) . " bytes\n";
    echo "  Result: $result\n\n";
}

# Test different operations
measureExecutionTime(function() {
    $sum = 0;
    for ($i = 0; $i < 100000; $i++) {
        $sum += $i;
    }
    return $sum;
}, "Simple loop calculation");

measureExecutionTime(function() {
    $array = [];
    for ($i = 0; $i < 10000; $i++) {
        $array[] = $i;
    }
    return count($array);
}, "Array creation");

echo "\n=== 8. VARIABLE SCOPE ===\n";

$global_var = "I'm global";

function testScope(): void {
    global $global_var;  // Access global variable
    $local_var = "I'm local";

    echo "Inside function:\n";
    echo "  Global var: $global_var\n";
    echo "  Local var: $local_var\n";

    // Static variable - retains value between function calls
    static $static_var = 0;
    $static_var++;
    echo "  Static var: $static_var\n";
}

testScope();
testScope();
testScope();

echo "Outside function - Global var: $global_var\n";

echo "\n=== 9. VARIABLE TYPE CHECKING ===\n";

$variables = [
    'string' => 'Hello',
    'integer' => 42,
    'float' => 3.14,
    'boolean' => true,
    'array' => [1, 2, 3],
    'null' => null
];

foreach ($variables as $type => $value) {
    echo "$type: " . gettype($value) . " - ";
    var_dump($value);
}

echo "\n=== 10. VARIABLE VALIDATION ===\n";

function validateVariable($var, string $name): void {
    echo "Validating $name:\n";
    echo "  Type: " . gettype($var) . "\n";
    echo "  Is null: " . (is_null($var) ? 'yes' : 'no') . "\n";
    echo "  Is empty: " . (empty($var) ? 'yes' : 'no') . "\n";
    echo "  Is set: " . (isset($var) ? 'yes' : 'no') . "\n";
    echo "  Value: ";
    var_dump($var);
    echo "\n";
}

validateVariable('Hello', 'string_var');
validateVariable('', 'empty_string');
validateVariable(0, 'zero');
validateVariable(null, 'null_var');
validateVariable($undefined_var ?? null, 'undefined_var');

echo "=== VARIABLE OPERATIONS COMPLETED ===\n";
