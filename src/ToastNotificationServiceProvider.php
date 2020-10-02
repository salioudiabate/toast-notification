<?php

namespace Ndoto\Notification\Toast;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ToastNotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ToastNotification.php', 'toastnotification');

        $this->publishConfig();

        // $this->loadViewsFrom(__DIR__.'/resources/views', 'toastnotification');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
    * Get route group configuration array.
    *
    * @return array
    */
    private function routeConfiguration()
    {
        return [
            'namespace'  => "Ndoto\Notification\Toast\Http\Controllers",
            'middleware' => 'api',
            'prefix'     => 'api'
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('toast-notification', function () {
            return new ToastNotification();
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
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ToastNotification.php' => config_path('ToastNotification.php'),
            ], 'config');
        }
    }
}
