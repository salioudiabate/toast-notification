<?php

namespace Ndoto\Notification\Toast;

use Illuminate\Support\Facades\Facade;

/**
 * Class ToastFacade
 *
 *
 *
 * @package Ndoto\Notification\Toast
 */
class ToastFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toast';
    }
}
