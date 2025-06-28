<?php

/**
 * PHP Constants Demonstration and Comparison
 *
 * This file demonstrates different ways to define constants in PHP
 * and shows the differences between define() and const keywords.
 */

// Method 1: Using define() function (runtime definition)
// Can be used anywhere in the code, even inside functions
define("LANGUAGE", "PHP");
echo "Language: " . LANGUAGE . PHP_EOL;

// Method 2: Using const keyword (compile-time definition)
// Must be declared at the top level, not inside functions
const FRAMEWORK1 = "Laravel";
echo "Framework 1: " . FRAMEWORK1 . PHP_EOL;

// Method 3: Conditional constant definition
// Only defines if not already defined (prevents redefinition errors)
defined("FRAMEWORK") || define("FRAMEWORK", "Yii");
echo "Language and Framework: " . LANGUAGE . " " . FRAMEWORK . PHP_EOL;

// Method 4: Using const with arrays (PHP 7.0+)
const FRAMEWORKS = ["Laravel", "Symfony", "CodeIgniter"];
echo "Available Frameworks: " . implode(", ", FRAMEWORKS) . PHP_EOL;

// Method 5: Class constants
class Config {
    const VERSION = "8.0";
    const AUTHOR = "PHP Community";

    public static function getInfo(): string {
        return "PHP " . self::VERSION . " by " . self::AUTHOR;
    }
}

echo "Config Info: " . Config::getInfo() . PHP_EOL;

// Demonstrating built-in constants
echo "File: " . __FILE__ . PHP_EOL;
echo "Line: " . __LINE__ . PHP_EOL;
echo "OS: " . PHP_OS . PHP_EOL;
echo "PHP Version: " . PHP_VERSION . PHP_EOL;

// Error handling for constant redefinition
try {
    // This will cause an error if LANGUAGE is already defined
    if (!defined("LANGUAGE")) {
        define("LANGUAGE", "JavaScript");
    } else {
        echo "LANGUAGE constant is already defined with value: " . LANGUAGE . PHP_EOL;
    }
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

// Demonstrating constant case sensitivity
define("CASE_SENSITIVE", "UPPERCASE");
define("case_sensitive", "lowercase");

echo "CASE_SENSITIVE: " . CASE_SENSITIVE . PHP_EOL;
echo "case_sensitive: " . case_sensitive . PHP_EOL;

// Performance comparison note
echo PHP_EOL . "Note: const is slightly faster than define() as it's resolved at compile time." . PHP_EOL;
