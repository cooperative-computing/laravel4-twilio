# Twilio Package for Laravel 4
This package is a wrapper created on top of the official Twilio SDK to be used as a Laravel 4 Package. 

## Installation
Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cooperative-computing/laravel4-twilio`.

	"require": {
		"cooperative-computing/laravel4-twilio": "dev-master"
	}

Next, update Composer from the Terminal:
	
	composer update

Once composer has finished updating the dependencies, you need to add the Service Provider. Open `app/config/app.php`, and add a new item to the providers array.

	'CooperativeComputing\Laravel4Twilio\Laravel4TwilioServiceProvider',

Then, add a Facade for more convenient usage. In `app/config/app.php` add the following line to the aliases array:

	'Twilio'          => 'CooperativeComputing\Laravel4Twilio\Facades\Laravel4Twilio',

Publish package config files from the Terminal
	
	php artisan config:publish cooperative-computing/laravel4-twilio

Edit `app/config/packages/cooperative-computing/laravel4-twilio/twilio.php` with your appropriate Twilio settings.

## Usage
Sending a SMS Message

	Twilio::sendMessage(<recipient_number>, <message_body>, [from_number]);

This method will return you an associative array in the response with the following keys:

* status = success/error
* code = 200 (if success) / Twilio SDK Error Code (if error)
* message = Message SID (if success) / Error Message (if error)
 
Example:	
```php
<?php
	Twilio::sendMessage('+14158141829', 'Hello from Twilio');
?>
```
	
## License
laravel4-twilio is open-source software licensed under the [MIT License](http://opensource.org/licenses/MIT, "MIT License")
