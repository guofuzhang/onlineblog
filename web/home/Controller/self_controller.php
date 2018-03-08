<?php

/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
//获取记录数\
    if(!empty($_POST)){
        $arr_post=$_POST;
        $name=$arr_post['name'];
        $main=$arr_post['main'];
        $time=date("Y-m-d;H-i-s");
        $sql_insert="insert into message VALUES (null,'$name','$main','$time')";
        echo $sql_insert;
        $mysql_obj->exec($sql_insert);
}

$sql="select * from message ORDER BY 'comment_id'";
$arr_comment=$mysql_obj->fetchAll($sql,3);
//    print_r($arr_comment);
    if(!empty($arr_comment)){
        $smarty->assign("comments",$arr_comment);
    }
    $smarty->assign("arr",$arrs[0]);
    $smarty->display("../View/lw-aboutme.html");










//print_r($arrs);




