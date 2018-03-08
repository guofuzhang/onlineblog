<?php
/**
  * wechat php test
  */
//define your token
define("TOKEN", "weixin");
require "./common.php";
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];


      	//extract post data

		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);//这个是发送过来的内容
                $time = time();
            $Recognition=$postObj->Recognition;
                global $arr;
                $MsgType=$postObj->MsgType;//定义变量接收传递过来的类型
                switch ($MsgType)
                {
                    case "text":
                        if($keyword=="?"){ $msgType="text";
//                        '\r'是回车，'\n'是换行，前者使光标到行首，后者使光标下移一格，通常敲一个回车键，即是回车，又是换行（\r\n）。Unix中每行结尾只有“<换行>”，即“\n”；Windows中每行结尾是“<换行><回车>”，即“\n\r”；Mac中每行结尾是“<回车>”。
                            $contentStr =  "【1】特种服务号码\r\n【2】通讯服务号码\r\n【3】银行服务号码\r\n【4】用户反馈\r\n";
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="1"){ $msgType="text";
//
                            $contentStr = "常用特种服务号码：
匪警：110
火警：119
急救中心：120";
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="2"){ $msgType="text";
//
                            $contentStr = "常用通讯服务号码：
中移动：10086
中电信：10000
中联通：10010";
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="3"){ $msgType="text";
//
                            $contentStr = "银行服务号码
建设银行：95533
工商银行：99588
农业银行：95599";
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="4"){ $msgType="text";
//
                            $contentStr = "尊敬的用户，为了更好的为您服务，请将系统的不足之处反馈给我们。
反馈格式：@+建议内容";
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="@"){ $msgType="text";
//
                            $contentStr = "感谢您的宝贵建议，我们会努力为您提供更好的服务！";
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}else if($keyword=="图片"){
                            $msgType="image";
                            $mediaid= "yQtnp7rUziwNTUlZ4EXJN1e2PviRdO0-n-5ECpCVYLUmdNVZnkiVGsRCkMGKA2C-";
                            $resultStr = sprintf($arr['imgTpl'], $fromUsername, $toUsername, $time, $msgType,$mediaid);
                            echo $resultStr;}else if($keyword=="音乐"){
                            $msgType="music";
                            $title="来吧,一起震撼";
                            $desc="张学友原声大碟,不容错过";
                            $music="http://weiweixin.applinzi.com/music.mp3";
                            $resultStr = sprintf($arr['musicTpl'], $fromUsername, $toUsername, $time, $msgType,$title,$desc,$music,$music);
                            echo $resultStr;}else if($keyword=="单图文"){
                            $msgType="news";
                            $count=1;
                            $item="<item>
                                    <Title><![CDATA['一篇可以改变你一生的文字']]></Title>
                                    <Description><![CDATA['毒鸡汤的励志书籍,好好看吧,总会有好处的']]></Description>
                                    <PicUrl><![CDATA[http://weiweixin.applinzi.com/image/1.jpg]]></PicUrl>
                                    <Url><![CDATA[www.kuaidianwoba.com]]></Url>
                                    </item>";
                            $resultStr = sprintf($arr['newsTpl'], $fromUsername, $toUsername, $time, $msgType,$count,$item);
                            echo $resultStr;}else if($keyword=="多图文"){
                            $msgType="news";
                            $count=4;
                            $item="";
                            for($i=1;$i<5;$i++){
                                $item.="<item>
                                    <Title><![CDATA['一篇可以改变你一生的文字--第{$i}章']]></Title>
                                    <Description><![CDATA['毒鸡汤的励志书籍,好好看吧,总会有好处的']]></Description>
                                    <PicUrl><![CDATA[http://weiweixin.applinzi.com/image/{$i}.jpg]]></PicUrl>
                                    <Url><![CDATA[www.kuaidianwoba.com]]></Url>
                                    </item>";
                                $resultStr = sprintf($arr['newsTpl'], $fromUsername, $toUsername, $time, $msgType,$count,$item);
                                echo $resultStr;
                            }
                            }else{
                                $msgType="text";
                                $key="d5567df93bfc43739c37cfedbff90483";
                                $url="http://www.tuling123.com/openapi/api?key={$key}&info={$keyword}";
//
                          $res=file_get_contents($url);
                          $res=json_decode($res);
                          $contentStr=$res->text;
                            $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            echo $resultStr;}

                    break;
//                        图片格式
                    case "image":
                        $msgType="text";
                        $contentStr = "这个图片貌似还阔以";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;



                    case "voice":
                        $msgType="text";
                        $contentStr = "您发送的是一个语音,消息是{$Recognition}";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "video":
                        $msgType="text";
                        $contentStr = "额,上传了一个视频吗?";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "shortvideo":
                        $msgType="text";
                        $contentStr = "小视频,更清新";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "location":
                        $msgType="text";
                        $positionx=$postObj->Location_X;
                        $positiony=$postObj->Location_Y;
                        $contentStr = "我知道你在哪里了，纬度是{$positionx},经度是{$positiony}，你跑不了了";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                    case "link":
                        $msgType="text";
                        $contentStr = "点击这个链接,或许你可以看到世界";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;

                case "event":
                    if($postObj->Event=="subscribe"){
                        $msgType="text";
                        $contentStr = "所有的坚持,只为遇见你";
                        $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;}else
                            if ($postObj->Event=="CLICK"){
                   if($postObj->EventKey=="V1001_TODAY_MUSIC"){
                       $msgType="music";
                       $title="来吧,一起震撼";
                       $desc="张学友原声大碟,不容错过";
                       $music="http://weiweixin.applinzi.com/music.mp3";
                       $resultStr = sprintf($arr['musicTpl'], $fromUsername, $toUsername, $time, $msgType,$title,$desc,$music,$music);
                       echo $resultStr;
                   } else if($postObj->EventKey=="V1001_GOOD"){
                       $msgType="text";
                       $contentStr = "感谢你的点赞,我们会做的更好";
                       $resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                       echo $resultStr;
                                }

                    }

                    break;

                }




//                以下是源代码,上面是开代码
//				if(!empty( $keyword ))
//				{
//
//
//              		$msgType = "text";
//                	$contentStr = "终于见到你了";
//                	$resultStr = sprintf($arr['textTpl'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
//                	echo $resultStr;
//                }else{
//                	echo "Input something...";
//                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>