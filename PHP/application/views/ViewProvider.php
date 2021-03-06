<?php

namespace Application\services\View;

use Application\services\Core\Container;
use Application\services\View\Engine\PhpEngine;

class ViewProvider
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function register()
    {
        $this->container->bind('view', function () {
            $config = $this->container->resolve('view.engine');
            $method = 'register'.ucfirst($config).'Engine';
            if (!method_exists($this, $method)) {
                throw new \Exception('对应的视图模板引擎暂不支持!');
            }
            $engine = call_user_func([$this, $method]);
            $basePath = $this->container->resolve('view.path');
            return new View($engine, $basePath);
        });
    }

    public function registerPhpEngine()
    {
        return new PhpEngine();
    }
}
