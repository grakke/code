<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function ($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
//                'sebastianbergmann\\raytracer\\puttingittogether' => '/src/PuttingItTogether.php',
//                'sebastianbergmann\\raytracer\\testpattern' => '/fakes/TestPattern.php',
//                'sebastianbergmann\\raytracer\\testshape' => '/fakes/TestShape.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
