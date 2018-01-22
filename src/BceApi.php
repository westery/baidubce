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


    public function request($method,$path,$query=[],$params=[])
    {

       $headers = [
           "Host" => config('baidubce.host'),
           "Content-Type" => 'application/json'
       ];
       $sign = $this->sign($method,$path,$headers,$query);
       $headers['Authorization'] = $sign;
       $client = new Client();
       $full_url = config('baidubce.host').$path;
       $options = [];
       $options['headers'] = $headers;
       if(!empty($query)){
           $options['query'] = $query;
       }

       if(!empty($params)){
           $options['json'] = $params;
       }

       $res = $client->request($method,$full_url,$options);
       return $res;


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