<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * JsonFactory类
 *
 * JsonFactory 是用于创建 JSON 组件的工厂
 */
class JsonFactory extends AbstractFactory
{


    public function createPicture(string $path, string $name = ''): Picture
    {
        return new Json\Picture($path, $name);
    }

    public function createText(string $content): Text
    {
        return new Json\Text($content);
    }
}
