<?php

use Ndoto\Notification\Toast\ToastNotification;

if (! function_exists('toast')) {
    /**
     * ToastNotification.
     *
     * @return ToastNotification
     */
    function toast() : ToastNotification
    {
        return app('toast-notification')->model('toast');
    }
}

if (! function_exists('alert')) {
    /**
     * ToastNotification.
     *
     * @return ToastNotification
     */
    function alert() : ToastNotification
    {
        return app('toast-notification')->model('alert');
    }
}

if (! function_exists('toastScripts')) {
    /**
     * Import Toast notification script files
     *
     * @return string
     */
    function toastScripts(): string
    {
        return '<script type="text/javascript" src="'.asset('vendor/ndoto/toast-notification/js/toast-notification.js').'"></script>';
    }
}

if (! function_exists('toastStyles')) {
    /**
     * Import Toast notification style files
     *
     * @return string
     */
    function toastStyles(): string
    {
        return '<link rel="stylesheet" type="text/css" href="'.asset('vendor/ndoto/toast-notification/css/toast-notification.css').'"/>';
    }
}

if (! function_exists('getToastDuration')) {
    function getToastDuration($toast)
    {
        return ($toast['autoDismiss']) ? ($toast['duration'] != 0 ? $toast['duration'] : config('toast-notification.duration')) : config('toast-notification.longDuration');
    }
}
