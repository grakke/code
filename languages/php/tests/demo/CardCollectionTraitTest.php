<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use Tools\phpunit\Card;
use Tools\phpunit\CardCollectionTrait;

class CardCollectionTraitTest extends TestCase
{
    private $cardCollection;

    public function setUp(): void
    {
        $this->cardCollection = $this->getObjectForTrait(CardCollectionTrait::class);
    }

    public function testCountOnEmpty()
    {
        $this->assertEquals(0, $this->cardCollection->count());
    }

    public function testAddCardAffectAttribute()
    {
        $card = new Card('A', 'Spades');
        $this->cardCollection->addCard($card);
        $this->assertAttributeEquals(array($card), 'cards', $this->cardCollection);
    }
}
