<?php

namespace Popp\structure\decorator;

class MainProcess extends ProcessRequest
{
    public function process(RequestHelper $req)
    {
        print __CLASS__.":Doing something useful with request\n";
    }
}
