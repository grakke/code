<?php

namespace Popp\ch3;

trait IdentityTrtait
{
    public function generateId(): string
    {
        return uniqid();
    }
}
