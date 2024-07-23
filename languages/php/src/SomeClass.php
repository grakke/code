<?php declare(strict_types=1);

namespace Src;

final class SomeClass
{
    public function doSomething(Dependency $dependency): string
    {
        $result = '';

        // ...

        return $result . $dependency->doSomething();
    }
}
