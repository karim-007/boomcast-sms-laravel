<?php

namespace Karim007\BoomcastSmsLaravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static sentSms($phone_number, $message)
 * @method static bulkSms($phone_numbers, $message)
 */
class BoomCastSms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'boomcast';
    }
}
