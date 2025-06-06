<?php

namespace Application\Services\Core;

use Closure;

class Container
{
    protected static $instance;
    protected $bindings = [];

    private function __construct()
    {
        // 禁止从外部实例化
    }

    // 单例模式获取全局实例
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            return self::$instance = new self;
        }
        return self::$instance;
    }

    public function bind($key, $value)
    {
        if (isset($this->bindings[$key])) {
            return;
        }
        $this->bindings[$key] = $value;
    }

    // 绑定接口实例/键值对数组容器

    public function resolve($key)
    {
        $value = $this->bindings[$key];
        if ($value instanceof Closure) {
            return call_user_func($value);
        }

        return $value;
    }

    // 从容器中解析绑定的内容

    private function __clone()
    {
        // 禁止从外部克隆对象
    }
}
