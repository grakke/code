<?php

namespace DesignPatterns\Creational\AbstractFactory\Json;

use DesignPatterns\Creational\AbstractFactory\Picture as BasePicture;

/**
 * Picture类
 *
 * 该类是以 JSON 格式输出的具体图片组件类
 */
class Picture extends BasePicture
{
    public function render(): string
    {
        return json_encode(array('title' => $this->name, 'path' => $this->path));
    }
}
