<?php

namespace syntax\di;

class Newspaper implements iReader
{
    public function getContext(): string
    {
        return "Newspaper:林书豪17+9助尼克斯击败老鹰……";
    }
}
