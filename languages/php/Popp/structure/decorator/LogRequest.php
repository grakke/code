<?php

namespace Popp\structure\decorator;

class LogRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        print __CLASS__.":Logging request\n";
        $this->processrequest->process($req);

        print __CLASS__.":Logging request AFTER\n";
    }
}
