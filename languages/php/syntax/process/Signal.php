<?php

namespace syntax\process;

final class Signal
{
    public static int $signo = 0;
    protected static $ini = null;

    public static function set($signo): void
    {
        self::$signo = $signo;
    }

    public static function get(): int
    {
        return (self::$signo);
    }

    public static function reset(): void
    {
        self::$signo = 0;
    }
}
