<?php

namespace Tools\phpunit;

trait CardCollectionTrait
{
    public function count(): int
    {
        return count($this->cards);
    }
}
