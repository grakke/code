<?php

namespace DesignPatterns\Creational\StaticFactory;

class StaticFactory
{
    public static function factory(string $type): FormatterInterface
    {
        $className = __NAMESPACE__ . '\Format' . ucfirst($type);

        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Missing format class.');
        }

        return new $className();
    }
}
