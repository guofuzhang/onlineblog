<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
header("content-type:text/html;charset=utf-8");
//var_dump($mysql_obj);
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from article where art_id =$id ";
    $arr= $mysql_obj->fetchOne($sql,1);
//    echo "<pre>";
//    var_dump($arr);
    $smarty->assign("arr",$arr);
    $smarty->display("../View/ArticleEdit.html");
    $smarty->clearCache("../View/ArticleEdit.html");
}

if(!empty($_POST)){
//    var_dump($_POST);
    $str_main=addslashes($_POST["content"]);
    $_POST["content"]="$str_main";
    $str="";
    foreach ($_POST as $k=>$v)
    {
        $str.="$k='$v',";
    }


    $str=rtrim($str,",");




    $sql="update article set {$str} WHERE art_id=$id";
//    echo $sql;
   $res= $mysql_obj->exec($sql);
   if($res)
   {
       echo "<script>if(window.confirm('恭喜您修改成功')){window.location.href='http://www.kuaidianwoba.com/admin/Controller/articlelist_controller.php'}</script>";
   }
}







//    if (!empty($_POST)){
////存入文件
//        if (!empty($_FILES)){
//            $img= $_FILES['file_upload']['name'];
//            $ext=pathinfo($img,PATHINFO_EXTENSION);
//            $name="img_".uniqid().".".$ext;
//            $filename='./up_image/'.$name;
//            $src=$_FILES['file_upload']['tmp_name'];
//            move_uploaded_file($src,$filename);
//        }
//
//
//
//     foreach ($_POST as $v)
//     {
//        $arr_article[]= "'$v'";
//     }
//
////     print_r($arr_article);
//
//     $arr_article_str=implode(",",$arr_article);
//        $last_time=date('y-m-d H:i:s',time());
//        $last_time_str="'$last_time'";
//     $sql="insert into article VALUES (null,'$filename',$arr_article_str,$last_time_str)";
//     echo $sql;
//     $mysql_obj->exec($sql);
//
//
//    }






