<?php

namespace syntax\ns;

class Test
{
    public static function print(): void
    {
        printf("这是一个测试类: %s\n", __CLASS__);
    }
}
