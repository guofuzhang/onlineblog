<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-27 0027
 * Time: 23:04
 */
//$data post请求是传输的数据
//封装一个curl请求函数,通过curl获取到的返回值的达到token
function curl_http($url,$data=null){
    $ch=curl_init();//格式化输出
    curl_setopt($ch,CURLOPT_URL,$url);//设置请求的地址
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);////post请求禁止服务器端ssl验证
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
//    判断数据请求方式,post还是get请求,如果传递过来有data,则是post
    if(!empty($data)){
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//将post提交的内容传递过去


    }

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回的是一个执行后的字符串
    $res=curl_exec($ch);//执行请求
    curl_close($ch);
    return $res;

}
//封装一个获取token值的函数access_token
function getToken(){
    $appid="wx242d211d5ce134cd";
    $secret="08b3774c30218b83e56a3e9e90a2ce51";
    $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
    $res=curl_http($url);
    $info=json_decode($res);
    return $info->access_token;

}