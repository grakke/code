<?php

namespace Popp\structure\decorator;

abstract class ProcessRequest
{
    abstract public function process(RequestHelper $req);
}
