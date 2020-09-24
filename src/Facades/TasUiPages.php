<?php

namespace TallAndSassy\TasUiPages\Facades;

use Illuminate\Support\Facades\Facade;

class TasUiPages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tasuipages';
    }
}
