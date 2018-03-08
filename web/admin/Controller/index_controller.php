<?php

/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user



require_once "base_controller.php";
if (!empty($_SESSION['username']))
{
//var_dump($mysql_obj);
    $sql="select * from blog_admin_user";
    $arrs= $mysql_obj->fetchAll($sql,1);
    if (!empty($arrs)){
        $arrs['s_name']=$_SESSION['username'];
        $smarty->assign("arrs",$arrs);
        $smarty->display("../View/UserIndex.html");
    }

    $arr=$_POST;
    $last_ip=$_SERVER['SERVER_ADDR'];
    $last_time=$_SERVER['REQUEST_TIME'];
    $last_ip_str= "'$last_ip'";
    $last_time_str="'$last_time'";


    if(!empty($_POST)){
        $arr_code['password']=md5($arr['password']);
        $arr_end=array_replace($arr,$arr_code);
        foreach ($arr_end as $v){
            $arr2[]="'$v'";
        }

        $str=implode(",",$arr2);
        $sql=" insert into blog_admin_user VALUES (null,{$str},$last_ip_str,$last_time_str)";
//echo $sql;
        $mysql_obj->exec($sql);
    }

    if(!empty($_GET)){
        if(!empty($_GET['a'])&$_GET['a']=="del"){
            $id=$_GET['id'];
            $sql="delete  from blog_admin_user WHERE id={$id}";
            $res=$mysql_obj->exec($sql);
            if ($res)
            {
                echo "删除成功";
            }
        }

        if(!empty($_GET['a'])&$_GET['a']=="logout"){
            session_destroy();
            header("location:http://www.kuaidianwoba.com/admin/Controller/log_controller.php");

        }
    }

}else
    {
        echo "请重新登录";
        header("location:http://www.kuaidianwoba.com/admin/Controller/log_controller.php");

    }




