<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-22 0022
 * Time: 21:32
 */
$ch=curl_init();
$appid="wx242d211d5ce134cd";
$scret="08b3774c30218b83e56a3e9e90a2ce51";
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$scret}";

curl_setopt($ch, CURLOPT_URL, $url);


curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$res= curl_exec($ch);
var_dump($res);
//var_dump(curl_exec($ch));
curl_close($ch);
$info=json_decode($res);
echo $info->access_token;

//echo file_get_contents($url);