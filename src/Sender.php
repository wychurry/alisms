<?php
/**
 * Created by PhpStorm.
 * User: wyc20
 * Date: 2016/6/24
 * Time: 14:39
 */

namespace Gamrule\AliSMS;


use Gamrule\AliSMS\top\TopClient;
use Gamrule\AliSMS\top\AlibabaAliqinFcSmsNumSendRequest;

class Sender {

    public function __construct() {

    }

    public static function send($phone, $param, $sign_name, $template){
        $client = new TopClient();
        $client->appkey = getenv("ALISMS_KEY");
        $client->secretKey = getenv("ALISMS_SECRETKEY");
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName($sign_name);
        $req->setSmsParam($param);
        $req->setRecNum($phone);
        $req->setSmsTemplateCode($template);
        $resp = $client->execute($req);
        return $resp;
    }
}