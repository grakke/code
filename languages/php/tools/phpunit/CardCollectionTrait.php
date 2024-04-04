<?php

namespace syntax\phpunit;

trait CardCollectionTrait
{
    public function count(): int
    {
        return count($this->cards);
    }
}
