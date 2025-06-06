<?php

namespace syntax\ioc;

class FileILog implements iLog
{
    public function write()
    {
        echo 'file log write...';
    }
}
