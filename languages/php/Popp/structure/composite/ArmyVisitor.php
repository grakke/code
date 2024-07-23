<?php

namespace Popp\structure\composite;

abstract class ArmyVisitor
{
    abstract public function visit(Unit $node);

    public function visitArcher(Archer $node): void
    {
        $this->visit($node);
    }

    public function visitCavalry(Cavalry $node): void
    {
        $this->visit($node);
    }

    public function visitLaserCanon(LaserCanon $node): void
    {
        $this->visit($node);
    }

    public function visitTroopCarrier(TroopCarrier $node): void
    {
        $this->visit($node);
    }

    public function visitArmy(Army $node): void
    {
        $this->visit($node);
    }
}
