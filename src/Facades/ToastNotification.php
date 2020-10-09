<?php

namespace Ndoto\Notification\Toast\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ToastNotification
 *
 * @package Ndoto\Notification\Toast\Facades
 */
class ToastNotification extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toast-notification';
    }
}
