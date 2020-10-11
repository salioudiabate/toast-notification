<?php


namespace Ndoto\Notification\Toast\Livewire;


use Livewire\Component;

class ToastComponent extends Component
{
    public $toast;

    public $shown = false;

    protected $listeners = ['toastNotificationListener', 'dismiss'];

    public function toastNotificationListener($toast)
    {
        $this->shown = true;
        $this->toast = $toast;
    }

    public function render()
    {
        return view('toastnotification::livewire.toast');
    }

    public function dismiss($isShown)
    {
        $this->shown = $isShown;
    }

}