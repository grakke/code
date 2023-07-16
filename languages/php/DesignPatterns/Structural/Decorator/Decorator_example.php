<?php

//被装饰者基类
interface Component
{
    public function operation();
}

//装饰者基类
abstract class Decorator implements Component
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}

//具体装饰者类
class ConcreteComponent implements Component
{
    public function operation()
    {
        echo 'do operation'.PHP_EOL;
    }
}

//具体装饰类A
class ConcreteDecoratorA extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationA();
    }

    private function addOperationA()
    {
        echo 'do operation A'.PHP_EOL;
    }
}

//具体装饰类B
class ConcreteDecoratorB extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationB();
    }

    private function addOperationB()
    {
        echo 'do operation B'.PHP_EOL;
    }
}

//测试代码
$comp = new ConcreteComponent();
$decA = new ConcreteDecoratorA($comp);
$decB = new ConcreteDecoratorB($decA);
$decB->operation();
