<?php

namespace DesignPatterns;

class Phone
{
    private $dialer;
    private array $digitButtons;

    public function __construct()
    {
        $this->dialer = new Dialer();
        for ($i =0;$i<10;$i++ ) {
            $this->digitButton[$i] = new Button();
        }
    }
}
