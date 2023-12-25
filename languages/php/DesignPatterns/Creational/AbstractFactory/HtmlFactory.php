<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * HtmlFactory类
 *
 * HtmlFactory 是用于创建 HTML 组件的工厂
 */
class HtmlFactory extends AbstractFactory
{
    public function createPicture(string $path, string $name = ''): Picture
    {
        return new Html\Picture($path, $name);
    }

    public function createText(string $content): Text
    {
        return new Html\Text($content);
    }
}
