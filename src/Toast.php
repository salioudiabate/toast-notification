<?php


namespace Ndoto\Notification\Toast;

/**
 * Represents a Toast.
 *
 * All methods of this class allow fluent api.
 *
 * eg:
 * <code>
 * ->title('')->description('')->icon('')->durationInMillis(5000)->autoDismiss(true)->build();
 * </code>
 *
 * @package Ndoto\Notification\Toast
 */
class Toast
{
    private $title;
    private $description;
    private $icon = null;
    private $durationInMillis = 5000;
    private $autoDismiss = true;
    private $model = "toast";
    private $type = "info";

    public function __construct()
    {
        //
    }

    /**
     * Sets the title of the Toast Message.
     *
     * @param $title string title message.
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Sets the description of the Toast Message.
     *
     * @param $description string description message.
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Sets the icon of the Toast Message.
     *
     * @param $icon string icon.
     * @return $this
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Sets the display duration.
     *
     * @param $durationInMillis int duration in milliseconds.
     * @return $this
     */
    public function durationInMillis($durationInMillis)
    {
        $this->durationInMillis = $durationInMillis;
        return $this;
    }

    /**
     * Indicates whether or not the toast show auto dismiss itself.
     *
     * @param $autoDismiss boolean true to auto dismiss.
     * @return $this
     */
    public function autoDismiss($autoDismiss)
    {
        $this->autoDismiss = $autoDismiss;
        return $this;
    }

    /**
     * Sets notification model (toast or alert).
     *
     * @param $model string toast or alert.
     * @return Toast
     */
    public function model($model): self
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @param string $type
     * @return Toast
     */
    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets an instance of the Toast.
     *
     * @return $this
     */
    public function build()
    {
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getDurationInMillis(): int
    {
        return $this->durationInMillis ?: 0;
    }

    /**
     * @return bool
     */
    public function isAutoDismiss(): bool
    {
        return $this->autoDismiss;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

}