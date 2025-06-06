<?php

namespace Test\demo;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Tools\phpunit\Card;
use Tools\phpunit\CardCollection;
use Tools\phpunit\iPlayer;

class iPlayerTest extends TestCase
{
    private $player;
    private $hand;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->hand = new CardCollection();
        $this->hand->addCard(new Card('A', 'Spades'));
        $this->player = $this->getMockForAbstractClass(
            iPlayer::class,
            array('John Smith', $this->hand)
        );
    }

    public function testRequestCardCallsChooseCardNumber()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('A'));
        $this->assertEquals('A', $this->player->requestCard());
    }
}
