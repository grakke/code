<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Creational\AbstractFactory\AbstractFactory;
use DesignPatterns\Creational\AbstractFactory\HtmlFactory;
use DesignPatterns\Creational\AbstractFactory\JsonFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public static function getFactories(): array
    {
        return [
            [new JsonFactory()],
            [new HtmlFactory()]
        ];
    }

    /**
     * 客户端无需关心传递过来的是什么工厂类，只需以想要的方式渲染任意想要的组件即可
     *
     * @dataProvider getFactories
     *
     * @param AbstractFactory $factory
     */
    public function testComponentCreation(AbstractFactory $factory)
    {
        $article = [
            $factory->createPicture('/image.jpg', 'laravel-academy'),
            $factory->createText('LaravelAcademy.org')
        ];

        $this->assertContainsOnly('DesignPatterns\Creational\AbstractFactory\MediaInterface', $article);
    }
}
