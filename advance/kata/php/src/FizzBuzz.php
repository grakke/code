<?php

declare(strict_types=1);

namespace swkberlin;

class FizzBuzz
{
    public $result = [];
    public function exectute(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->result[$i] = $this->getContentByKey($i);
        }
    }

    public function getContentByKey($i): mixed
    {
        $i++;
        $res = '';

        if ($i % 3 == 0) {
            $res .= 'Fizz';
        }
        if ($i % 5 == 0) {
            $res .= 'Buzz';
        }

        if ($res == '') {
            $res = $i;
        }

        return $res;
    }
}
