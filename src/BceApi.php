<?php
/**
 * Created by PhpStorm.
 * User: odeen
 * Date: 2018/1/19
 * Time: 下午3:14
 */
namespace Westery\Baidubce;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class BceApi
{


    public function request($method,$path,$params)
    {

       $headers = [
           "host" => config('baidubce.host'),
           "content-type" => 'application/json'
//           'content-type'=>'application/json; charset=utf-8',
//        'content-length'=> 0,
//        'User-Agent'=> 'This is the user-agent'
       ];
//       echo $method;
//       echo $path;
//       print_r($headers);
//       print_r($params);exit;
       $sign = $this->sign($method,$path,$headers,$params);
       $headers['Authorization'] = $sign;
       print_r($headers);
       //exit;
//       $client = new Client();
//       $full_url = config('baidubce.host').$path;
//
//       $res = $client->request($method,$full_url,['headers'=>$headers]);
//       return $res;


    }

    public function sign($method,$path,$headers,$params)
    {
        $signer = new Signer();
        $timestamp = new \DateTime();
        $timestamp->setTimestamp(time());
        $options = [SignOption::TIMESTAMP => $timestamp];
        $credient= config('baidubce.default');
        return $signer->sign($credient,$method,$path,$headers,$params,$options);
    }


}