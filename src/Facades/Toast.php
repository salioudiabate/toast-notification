<?php

namespace Ndoto\Notification\Toast\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Toast
 *
 * @package Ndoto\Notification\Toast\Facades
 */
class Toast extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toast';
    }
}
