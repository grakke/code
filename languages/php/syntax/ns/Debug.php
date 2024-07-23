<?php

namespace syntax\ns;

class Debug
{
    public static function helloWorld(): void
    {
        echo 'Hello from ' . __NAMESPACE__. "\n";
    }
}
