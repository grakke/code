<?php

namespace Popp\structure\decorator;

class StructureRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        print __CLASS__.":structuring request data \n";
        $this->processrequest->process($req);
        print __CLASS__.":structuring request data AFTER \n";
    }
}
