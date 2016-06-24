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

    public static function send($phone, $param){
        $client = new TopClient();
        $client->appkey = getenv("ALISMS_KEY");
        $client->secretKey = getenv("ALISMS_SECRETKEY");
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName(getenv("ALISMS_SIGNNAME"));
        $req->setSmsParam($param);
        $req->setRecNum($phone);
        $req->setSmsTemplateCode(getenv("ALISMS_TEMPLATE"));
        $resp = $client->execute($req);
        return $resp;
    }
}