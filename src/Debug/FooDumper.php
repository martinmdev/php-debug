<?php

namespace Martinm\Debug;

class FooDumper
{
    public function dump()
    {
        var_dump(...func_get_args());
    }
}
