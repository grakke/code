<?php

namespace syntax\di;

class Book implements iReader
{
    public function getContext()
    {
        return 'Book:很久很久以前有一个阿拉伯的故事……';
    }
}
