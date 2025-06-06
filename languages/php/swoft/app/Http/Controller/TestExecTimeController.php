<?php

namespace App\Http\Controller;

use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * 运算时间测试类
 *
 * @Controller()
 */
class TestExecTimeController
{
    /**
     * 闭包递归 计算阶乘
     *
     * @RequestMapping(route="tests/{number}")
     *
     * @param int $number
     *
     * @return array
     */
    public function factorial(int $number): array
    {
        $factorial = function ($arg) use (&$factorial) {
            if ($arg == 1) {
                return $arg;
            }

            return $arg * $factorial($arg - 1);
        };

        return [$factorial($number)];
    }

    /**
     * 计算1～1000的和，最后休眠1s
     *
     * @RequestMapping()
     */
    public function sumAndSleep(): array
    {
        $sum = 0;
        for ($i = 1; $i <= 1000; $i++) {
            $sum += $i;
        }

        usleep(1000);
        return [$sum];
    }
}
