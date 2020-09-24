<?php

namespace TallAndSassy\TasUiPages;

use Illuminate\Support\ServiceProvider;

class TasUiPagesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tassy');
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tallandsassy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tallandsassy');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        \Livewire::component('tassy::user-settings', \TallAndSassy\TasUiPages\Http\Livewire\UserSettings::class);

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tasuipages.php', 'tasuipages');

        // Register the service the package provides.
        $this->app->singleton('tasuipages', function ($app) {
            return new TasUiPages;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['tasuipages'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/tasuipages.php' => config_path('tasuipages.php'),
        ], 'tasuipages.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/tallandsassy'),
        ], 'tasuipages.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/tallandsassy'),
        ], 'tasuipages.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tallandsassy'),
        ], 'tasuipages.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
