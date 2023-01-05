# Boomcast SMS API for PHP/Laravel Framework

[![Downloads](https://img.shields.io/packagist/dt/karim007/boomcast-sms-laravel)](https://packagist.org/packages/karim007/boomcast-sms-laravel)
[![Starts](https://img.shields.io/packagist/stars/karim007/boomcast-sms-laravel)](https://packagist.org/packages/karim007/boomcast-sms-laravel)

## Features

## Requirements

- PHP >=7.4
- Laravel >= 6
- illuminate/support >= 6
- guzzlehttp/guzzle >= 7

## Installation

```bash
composer require karim007/boomcast-sms-laravel
```

### vendor publish (config)

```bash
php artisan vendor:publish --provider="Karim007\BoomcastSmsLaravel\BoomcastServiceProvider"
```

After publish config file setup your credential. you can see this in your config directory boomcast.php file

```
"masking"=> env("BOOMCAST_MASKING", ''),
"user_name"=> env("BOOMCAST_USER_NAME", ''),
"password"=> env("BOOMCAST_PASSWORD", ''),
"message_type"=> env("BOOMCAST_MESSAGE_TYPE", 'TEXT'),
```

### Set .env configuration

```
BOOMCAST_MASKING='' #your masking name
BOOMCAST_USER_NAME=""
BOOMCAST_PASSWORD=""
```

## Usage
### 1. create a controller
```
php artisan make:controller BoomCastSmsController
```

### 2. add this routes
```
Route::get('single/sms',[App\Http\Controllers\BoomCastSmsController::class,'singleSms'])->name('boomcast.sms');
Route::get('bulk/sms',[App\Http\Controllers\BoomCastSmsController::class,'bulkSms'])->name('boomcast.bulk.sms');
```

### 3. Sent Sms BoomCastSmsController
```
use Karim007\BoomcastSmsLaravel\Facade\BoomCastSms;
class BoomCastSmsController extends Controller
{
    public function singleSms()
    {
        return BoomCastSms::sentSms('01521XXXXXX','This is test sms');
    }

    public function bulkSms()
    {   
        //bulk sms maximum 20 phone number at a time
        return BoomCastSms::bulkSms(['01521XXXXXX','88012345678'],'This is test sms');
    }
}
```


Contributions to the Boomcast sms package you are welcome. Please note the following guidelines before submitting your pull
request.

- Follow [PSR-4](http://www.php-fig.org/psr/psr-4/) coding standards.
- Read Boomcast API documentations first. Please contact with Boomcast for their api documentation and sandbox access.

## License

This repository is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2022 [md abdul karim](https://github.com/karim-007). We are not affiliated with Boomcast and don't give any guarantee. 
