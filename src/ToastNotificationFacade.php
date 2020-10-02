<?php

namespace Ndoto\Notification\Toast;

use Illuminate\Support\Facades\Facade;

class ToastNotificationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'toast-notification';
    }
}
