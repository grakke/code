<?php

namespace Popp\creational\prototype;

require './../../../vendor/autoload.php';

class TerrainFactory
{
    private $sea;
    private $forest;
    private $plains;

    public function __construct(Sea $sea, Forest $forest, Plains $plains)
    {
        $this->forest = $forest;
        $this->sea = $sea;
        $this->plains = $plains;
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
