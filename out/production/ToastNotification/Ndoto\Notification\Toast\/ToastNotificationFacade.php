<?php

namespace Ndoto\Notification\Toast;

use Illuminate\Support\Facades\Facade;

class ToastNotificationFacade extends Facade
{
    private $title;
    private $description;

    public function __construct()
    {
        $this->title = "";
        $this->description = "";
    }

    public function danger($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function info($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function success($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

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
