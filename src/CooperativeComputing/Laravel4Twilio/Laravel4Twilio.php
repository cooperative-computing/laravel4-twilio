<?php namespace CooperativeComputing\Laravel4Twilio;

class Laravel4Twilio
{

    /**
     * Stores the Twilio settings from the Configuration File
     * 
     * @var array
     */
    private $config;

    /**
     * Class Constructor. 
     *
     * Loads the configuration parameters from the config file and stores them in a private property
     */
    public function __construct()
    {
        $this->config = \Config::get('laravel4-twilio::twilio');
    }

    /**
     * Creates a new Twilio SDK Instance
     * 
     * @return instance Returns the Twilio Services Class Instance
     */
    private function getTwilioInstance()
    {
        return new \Services_Twilio($this->config['sid'], $this->config['token']);
    }

    /**
     * Sends a SMS Message via Twilio
     * 
     * @param  string $to      Full Phone Number of the Receiver
     * @param  string $message Message Body of the SMS
     * @param  string $from    Optional: From Phone Number registered in Twilio
     * 
     * @return mixed
     */
    public function sendMessage($to, $message, $from=null)
    {
        $twilio = $this->getTwilioInstance();
        try {
            $message = $twilio->account->messages->create(array(
                'From' => is_null($from) ? $this->config['from'] : $from,
                'To'   => $to,
                'Body' => $message
            ));

            return array(
                'status'  => 'success',
                'code'    => 200,
                'message' => $message->sid
            );
        }
        catch (\ErrorException $e)
        {
            return array(
                'status'  => 'error',
                'code'    => $e->getCode(),
                'message' => $e->getMessage()
            );

        }
    }
}
