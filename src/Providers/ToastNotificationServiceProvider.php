<?php

namespace Ndoto\Notification\Toast\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Ndoto\Notification\Toast\Livewire\ToastComponent;
use Ndoto\Notification\Toast\Livewire\AlertComponent;
use Ndoto\Notification\Toast\Toast;
use Ndoto\Notification\Toast\ToastNotification;

class ToastNotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/toast-notification.php', 'toastnotification');
        $this->publishConfigAndAssets();

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'toastnotification');

        Livewire::component('toast-component', ToastComponent::class);
        Livewire::component('alert-component', AlertComponent::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('toast-notification', function ($app) {
            return $app->make(ToastNotification::class);
        });

        $this->app->bind('toast', function () {
            return new Toast();
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    private function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/toast-notification.php' => config_path('toast-notification.php'),
            ], 'toastnotification-config');
        }
    }

    /**
     * Publish Config
     *
     * @return void
     */
    private function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/ndoto/toast-notification'),
        ], 'toastnotification-assets');
    }

    public function publishConfigAndAssets()
    {
        $this->publishAssets();
        $this->publishConfig();
    }
}
