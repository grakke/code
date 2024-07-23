<?php

namespace DesignPatterns\Creational\AbstractFactory\Json;

use DesignPatterns\Creational\AbstractFactory\Text as BaseText;

/**
 * Class Text
 *
 * 该类是以 JSON 格式输出的具体文本组件类
 */
class Text extends BaseText
{
    public function render(): string
    {
        return json_encode(array('content' => $this->text));
    }
}
