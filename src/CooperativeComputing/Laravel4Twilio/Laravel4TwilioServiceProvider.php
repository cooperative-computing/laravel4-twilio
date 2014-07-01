<?php namespace CooperativeComputing\Laravel4Twilio;

use Illuminate\Support\ServiceProvider;

class Laravel4TwilioServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('cooperative-computing/laravel4-twilio');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['twilio'] = $this->app->share(function ($app) {
            return new Laravel4Twilio();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('twilio');
    }
}
