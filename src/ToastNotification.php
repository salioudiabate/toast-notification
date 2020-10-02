<?php


namespace Ndoto\Notification\Toast;


class ToastNotification
{
    private $title;
    private $description;

    public function __construct()
    {
        //
    }

    public function danger($title = null, $description = null)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function info($title = null, $description = null)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function success($title = null, $description = null)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function warning($title = null, $description = null)
    {
        $this->title = $title;
        $this->description = $description;
    }

    private function buildToast($title = null, $description = null, $icon = null, $duration = 5, $autoDismiss = true)
    {
        $this->title = $title;
        $this->description = $description;
    }
}