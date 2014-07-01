<?php namespace CooperativeComputing\Laravel4Twilio\Facades;

use Illuminate\Support\Facades\Facade;

class Laravel4Twilio extends Facade
{
    
    /**
     * Get the registered name of the component.
     *
     * @return  string Returns the name of the component registered in Service Provider 
     */
    protected static function getFacadeAccessor()
    {
        return 'twilio';
    }
}
