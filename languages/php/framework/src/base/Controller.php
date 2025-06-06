<?php

namespace framework\src\base;

use sf\base\Action;

class Controller
{
    /**
     * @var string the ID of this controller.
     */
    public $id;
    /**
     * @var Action the action that is currently being executed.
     */
    public $action;
}
