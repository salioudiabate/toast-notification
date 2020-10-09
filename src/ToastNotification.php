<?php


namespace Ndoto\Notification\Toast;


use Livewire\Component;
use Ndoto\Notification\Toast\Store\Session;

class ToastNotification
{
    /**
     * The session key.
     */
    const SESSION_KEY = "ndoto_toast_notification";

    /**
     * @var Session
     */
    public $session;

    public $model = "toast"; // or alert

    public $toast = [];

    /**
     * ToastNotification constructor.
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @param null $title
     * @param null $description
     * @param int $duration
     * @param bool $autoDismiss
     * @return $this
     */
    public function danger($title = null, $description = null, $duration = 0, $autoDismiss = true)
    {
        $this->buildToast($title, $description, null, $duration, $autoDismiss, 'danger');

        return $this;
    }

    /**
     * @param null $title
     * @param null $description
     * @param int $duration
     * @param bool $autoDismiss
     * @return $this
     */
    public function default($title = null, $description = null, $duration = 0, $autoDismiss = true)
    {
        $this->buildToast($title, $description, null, $duration, $autoDismiss, 'default');

        return $this;
    }

    /**
     * @param null $title
     * @param null $description
     * @param int $duration
     * @param bool $autoDismiss
     * @return $this
     */
    public function info($title = null, $description = null, $duration = 0, $autoDismiss = true)
    {
        $this->buildToast($title, $description, null, $duration, $autoDismiss, 'info');

        return $this;
    }

    /**
     * @param null $title
     * @param null $description
     * @param int $duration
     * @param bool $autoDismiss
     * @return $this
     */
    public function success($title = null, $description = null, $duration = 0, $autoDismiss = true)
    {
        $this->buildToast($title, $description, null, $duration, $autoDismiss, 'success');

        return $this;
    }

    /**
     * @param null $title
     * @param null $description
     * @param int $duration
     * @param bool $autoDismiss
     * @return $this
     */
    public function warning($title = null, $description = null, $duration = 0, $autoDismiss = true)
    {
        $this->buildToast($title, $description, null, $duration, $autoDismiss, 'warning');

        return $this;
    }

    /**
     * @param null $title
     * @param null $description
     * @param null $icon
     * @param int $duration
     * @param bool $autoDismiss
     * @param string $type
     * @return $this
     */
    public function buildToast($title = null, $description = null, $icon = null, $duration = 5, $autoDismiss = true, $type = 'info')
    {
        $toast = app('toast')->title($title)
                    ->description($description)
                    ->type($type)
                    ->model($this->getModel())
                    ->icon($icon) // To Implement custom icon feature later
                    ->durationInMillis($duration)
                    ->autoDismiss($autoDismiss);

        $this->session->flash(static::SESSION_KEY, $this->convertToastToArray($toast));

        return $this;
    }

    private function convertToastToArray(Toast $toast)
    {
        $this->toast = [
           'title' => $toast->getTitle(),
           'description' => $toast->getDescription(),
           'type' => $toast->getType(),
           'model' => $toast->getModel(),
           'icon' => $toast->getIcon(),
           'duration' => $toast->getDurationInMillis(),
           'autoDismiss' => $toast->isAutoDismiss(),
        ];

        return $this->toast;
    }

    public function livewire(Component $component)
    {
        if ($this->getModel() === "toast") {
            $component->emit('toastNotificationListener', $this->toast);
        }

        if ($this->getModel() === "alert") {
            $component->emit('alertNotificationListener', $this->toast);
        }

        return $this;
    }

    /**
     * @param string $model
     * @return ToastNotification
     */
    public function model(string $model): self
    {
        $this->model = $model ?: $this->getModel();
        return $this;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

}