<?php

namespace Moddit\Simplicate\Facades;

use Illuminate\Support\Facades\Facade;

class SimplicateService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'simplicate-service';
    }
}