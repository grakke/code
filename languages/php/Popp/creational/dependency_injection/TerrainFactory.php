<?php

namespace Popp\creational\dependency_injection;

use Popp\creational\prototype\Forest;
use Popp\creational\prototype\Plains;
use Popp\creational\prototype\Sea;

class TerrainFactory
{
    #[InjectConstructor(Sea::class, Plains::class, Forest::class)]
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }

    public function getSea()
    {
        return clone $this->sea;
    }

    public function getForest()
    {
        return clone $this->forest;
    }

    public function getPlains()
    {
        return clone $this->plains;
    }
}
