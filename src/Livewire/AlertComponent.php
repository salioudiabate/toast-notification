<?php


namespace Ndoto\Notification\Toast\Livewire;


use Livewire\Component;

class AlertComponent extends Component
{

    public $toast;
    public $shown = true;

    protected $listeners = ['alertNotificationListener'];

    public function alertNotificationListener($toast)
    {
        $this->toast = $toast;
    }

    public function render()
    {
        return view('toastnotification::livewire.alert');
    }

    public function dismiss()
    {
        $this->shown = false;
    }

}