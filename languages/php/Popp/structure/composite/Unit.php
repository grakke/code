<?php

namespace Popp\structure\composite;

abstract class Unit
{
    private int $depth = 0;

    public function getComposite()
    {
        return null;
    }

    abstract public function bombardStrength();

    // Visitor
    public function accept(ArmyVisitor $visitor)
    {
        $method = "visit".basename(str_replace('\\', '/', get_class($this)));
        $visitor->$method($this);
    }

    public function setDepth($depth): void
    {
        $this->depth = $depth;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }
}
