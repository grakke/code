<?php

namespace syntax\oop;

class Mailer
{
    public function doMail(Product $product): void
    {
        print " mailing ({$product->name})\n";
    }
}
