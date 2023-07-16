<?php

namespace syntax\di;

require '../../vendor/autoload.php';

class Mother
{
    public function narrate(iReader $book)
    {
        return $book->getContext();
    }
}
