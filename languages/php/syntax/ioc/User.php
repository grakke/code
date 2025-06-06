<?php

namespace syntax\ioc;

class User
{
    protected $log;

    public function __construct(iLog $log)
    {
        $this->log = $log;
    }

    public function login()
    {
        echo 'login success...';
        $this->log->write();
    }
}
