<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
//var_dump($mysql_obj);

$sql="select * from article ORDER BY `art_id` DESC ";
$arrs= $mysql_obj->fetchAll($sql,1);
$smarty->assign("arrs",$arrs);
$smarty->display("../View/ArticleIndex.html");
if(!empty($_GET)){

//    以上为展示展示列表,即默认为展示列表
    $id=$_GET['id'];
    $sql="select img from article where art_id = $id";
    $res=$mysql_obj->fetchAll($sql,1);

    if($res!="nothing in your table"){
        $name=$res[0]['img'];//得到图片的地址,并删除图片
//        $name= "./up_image/000.png";
        $del=@unlink($name);
    }
    $sql="delete from comment where article_id=$id";
    $mysql_obj->exec($sql);
    $sql="delete  from article where art_id=$id";
    $res=$mysql_obj->exec($sql);

    if($res){
        echo "<script>if(window.confirm('删除成功')){window.location.href='http://www.kuaidianwoba.com/admin/Controller/articlelist_controller.php'}</script>";
    }

//
    
}










