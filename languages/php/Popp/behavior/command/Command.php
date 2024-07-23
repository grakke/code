<?php

namespace Popp\behavior\command;

abstract class Command
{
    abstract public function execute(CommandContext $context);
}
