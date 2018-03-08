<?php

/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user



require_once "base_controller.php";
$smarty->display("../View/UserAdd.html");

if (!empty($_SESSION['username']))
{
//var_dump($mysql_obj);

    if(!empty($_POST)){

        $arr=$_POST;
        $last_ip=$_SERVER['REMOTE_ADDR'];

        $last_time=$_SERVER['REQUEST_TIME'];


        $last_ip_str= "'$last_ip'";
        $last_time_str="'$last_time'";


        $arr['password']=md5($arr['password']);

        foreach ($arr as $v){
            $arr2[]="'$v'";
        }


        $str=implode(",",$arr2);
        $sql=" insert into blog_admin_user VALUES (null,{$str},$last_ip_str,$last_time_str)";
//        var_dump($sql);
//        die("以上没问题");

        $mysql_obj->exec($sql);
    }
}else
{
    echo "请重新登录";
    header("refresh:2;url=http://www.kuaidianwoba.com/admin/Controller/log_controller.php");
}




