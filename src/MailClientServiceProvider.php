<?php

namespace Morganov\MailClient;

use Illuminate\Support\ServiceProvider;

class MailClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish config for services
        $this->publishes([
           __DIR__.'config' => base_path('config'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register provider
        //$this->app->make('');
        
        // merge config
        $this->mergeConfigFrom(
            __DIR__.'/config/mail_client', 'mail_client'
        );
    }
    
    public function provides()
    {
        return ['Morganov\MailClient\MailClientServiceProvider'];
    }
}
