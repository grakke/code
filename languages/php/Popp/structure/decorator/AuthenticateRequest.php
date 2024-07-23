<?php

namespace Popp\structure\decorator;

class AuthenticateRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        print __CLASS__.":authenticating request\n";
        $this->processrequest->process($req);
    }
}
