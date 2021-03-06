<?php


namespace Ndoto\Notification\Toast\Livewire;


use Livewire\Component;

class AlertComponent extends Component
{
    public $toast;

    public $shown = false;

    protected $listeners = ['alertNotificationListener', 'dismiss'];

    public function alertNotificationListener($toast)
    {
        $this->shown = true;
        $this->toast = $toast;
    }

    public function render()
    {
        return view('toastnotification::livewire.alert');
    }

    public function dismiss($isShown)
    {
        $this->shown = $isShown;
    }

}