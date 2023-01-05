<?php

namespace Karim007\BoomcastSmsLaravel\Sms;

class BaseApi
{
    /**
     * @var string $baseUrl
     */
    protected $baseUrl;
    protected $masking;
    protected $userName;
    protected $password;
    protected $MsgType;

    public function __construct()
    {
        $this->masking = config("boomcast.masking");
        $this->userName = config("boomcast.user_name");
        $this->password = config("boomcast.password");
        $this->MsgType = config("boomcast.message_type");
        $this->baseUrl();
    }

    /**
     * Nagad Base Url
     * if sandbox is true it will be sandbox url otherwise it is host url
     */
    private function baseUrl()
    {
        $url='https://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?';
        if ($this->masking) $url .= 'masking=' . $this->masking;
        $url .= '&userName=' . $this->userName. '&password=' . $this->password.
            '&MsgType=' . $this->MsgType;
        $this->baseUrl = $url;
    }
}
