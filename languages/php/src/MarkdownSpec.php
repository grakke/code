<?php

namespace Src;

use PhpSpec\ObjectBehavior;
use spec\Markdown;

class MarkdownSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->toHtml("Hi, there")->shouldReturn("<p>Hi, there</p>");
    }
}
