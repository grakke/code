<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * ComparatorInterface类
 */
interface ComparatorInterface
{
    /**
     * @param mixed $a
     * @param mixed $b
     *
     * @return bool
     */
    public function compare(mixed $a, mixed $b): bool;
}
