<?php

namespace Tools\phpunit;

use RuntimeException;

abstract class iPlayer
{
    public function requestCard()
    {
        $cardNumber = $this->chooseCardNumber();
        if (!$this->hasCard($cardNumber)) {
            throw new RuntimeException('Invalid card chosen by player');
        }

        return $cardNumber;
    }

    abstract protected function chooseCardNumber();
}
