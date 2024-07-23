<?php

namespace syntax\oop\Trit;

trait fileLogger
{
    public function logmessage($message, $level = 'DEBUG')
    {
        echo 'A';
    }
}

trait sysLogger
{
    public function logmessage($message, $level = 'ERROR')
    {
        echo 'B';
    }
}

class fileStorage
{
    use fileLogger, sysLogger {
        fileLogger::logmessage insteadof sysLogger;
        sysLogger::logmessage as private logsysmessage;
    }

    public function store($data)
    {
        $this->logmessage($data);
        $this->logsysmessage($data);
    }
}

(new fileStorage())->store('C');
