<?php

namespace Tools\phpunit;

class Card
{
    private $number;
    private $suit;

    public function __construct($number, $suit)
    {
        $this->number = $number;
        $this->suit = $suit;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * Returns true if the given card is in the same set
     * @param Card $card
     * @return bool
     * @assert (new Card(3, 'h'), new Card(3, 's')) == true
     * @a
     * */
    public function isInMatchingSet(Card $card)
    {
        return ($this->getNumber() == $card->getNumber());
    }

    public function getNumber()
    {
        return $this->number;
    }
}
