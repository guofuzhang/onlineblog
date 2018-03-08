<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";

//获取记录数\




if(empty($_GET)){
die("页面访问不存在");

}else{
    $id=$_GET['id'];
    $id=$_GET['id'];
    $pre=$id-1;
    $next=$id+1;
    $sql="select * from article WHERE art_id={$id}";
    $arrs=$mysql_obj->fetchAll($sql,3);
    if(!empty($_POST)){
        $arr_post=$_POST;
       $name=$arr_post['name'];
       $main=$arr_post['main'];
       $time=date("Y-m-d;H-i-s");
       $sql_insert="insert into comment VALUES (null,'$name','$main',$id,'$time')";
       echo $sql_insert;
       $mysql_obj->exec($sql_insert);

    }
}

if($arrs=="nothing in your table"){
    die("对不起,博客已经被您阅读完了");

}else{
    $sql="select * from comment where article_id={$id}";
    $arr_comment=$mysql_obj->fetchAll($sql,3);
//    print_r($arr_comment);
    if(!empty($arr_comment)){
        $smarty->assign("comments",$arr_comment);
    }
    $smarty->assign("arr",$arrs[0]);
    $arr1=array("id"=>$id,"pre"=>$pre,"next"=>$next);
    $smarty->assign("arr1",$arr1);
    $smarty->display("../View/lw-article.html");

}








//print_r($arrs);




