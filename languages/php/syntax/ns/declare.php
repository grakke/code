<?php

namespace Bar\subnamespace;

const FOO = 1;
function foo()
{
    echo 'function' . "\n";
}

class foo
{
    public function __construct()
    {
        echo 'My class construct' . "\n";
    }

    public static function staticmethod()
    {
        echo 'Static Method' . "\n";
    }
}

new foo();
new \Bar\subnamespace\foo();

foo();
\Bar\subnamespace\foo();
namespace\foo();

echo namespace\FOO . "\n";
echo FOO . "\n";
