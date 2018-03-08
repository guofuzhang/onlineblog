<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
$smarty->display("../View/login.html");
if (!empty($_POST)){
    $name=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="select * from blog_admin_user WHERE  logname='{$name}'";
    $arrs= $mysql_obj->fetchAll($sql,1);
    if(!empty($arrs)&$arrs[0]['password']==$password){
        $_SESSION['username']=$_POST['username'];
//        这个是定义了一个全局变量,如果登录了,就登录到展示页面
        header("refresh:0;url=".ZONE."admin/Controller/index_controller.php");

    }else
    {
        echo '<script>window.alert("请输入正确的用户名或密码")</script>';
    }


}




