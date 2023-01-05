<?php

namespace Karim007\BoomcastSmsLaravel\Sms;

use Illuminate\Support\Facades\Http;

class BoomCast extends BaseApi
{

    public function sentSms($phone_number, $message)
    {
        $msg =[
            'success'=>0,
            'message'=>'Invalid request',
            'msisdn'=>$phone_number,
        ];
        try {
            $url       = $this->baseUrl.'&receiver=' . $phone_number. '&message=' . $message;
            $response =  Http::post($url);
            $data = $response->json();
            if (count($data)){
                return $data[0];
            }
            return $msg;
        }catch (\Exception $e){
            return $msg;
        }
    }
    public function bulkSms(array $phone_numbers, $message)
    {
        $data=[];
        if (count($phone_numbers) > 0 && count($phone_numbers) <= 20){
            foreach ($phone_numbers as $phone){
                $data[] = $this->sentSms($phone, $message);
            }
            return $data;
        }
        return [
            'success'=>0,
            'message'=>'Invalid request',
        ];

    }

}
