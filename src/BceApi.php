<?php
/**
 * Created by PhpStorm.
 * User: odeen
 * Date: 2018/1/19
 * Time: 下午3:14
 */
namespace Westery\Baidubce;

use Illuminate\Support\Facades\Log;

class BceApi
{

    public function request($method,$path,$params)
    {


       $headers = [
           "Host" => config('baidubce.host'),
           "Content-Type" => "application/json; charset=utf-8",
       ];

       $sign = $this->sign($method,$path,$headers,$params);
       $headers['Authorization'] = $sign;




    }

    public function sign($method,$path,$headers,$params)
    {
        $signer = new Signer();
        $timestamp = new \DateTime();
        $timestamp->setTimestamp(time());
        $options = array(SignOption::TIMESTAMP => $timestamp);
        return $signer->sign(config('baidubce.default'),$method,$path,$headers,$params,$options);
    }


}