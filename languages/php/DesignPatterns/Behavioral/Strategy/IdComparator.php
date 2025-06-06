<?php

namespace DesignPatterns\Behavioral\Strategy;

/**
 * IdComparator类
 */
class IdComparator implements ComparatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function compare(mixed $a, mixed $b): bool
    {
        if ($a['id'] == $b['id']) {
            return 0;
        } else {
            return $a['id'] < $b['id'] ? -1 : 1;
        }
    }
}
