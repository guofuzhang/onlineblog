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
    $sql="select * from blog_admin_user";
    $arrs= $mysql_obj->fetchAll($sql,1);
    $smarty->display("../View/ArticleAdd.php");

    if (!empty($_POST)){
//存入文件
        if (!empty($_FILES)){
            $img= $_FILES['file_upload']['name'];
            $ext=pathinfo($img,PATHINFO_EXTENSION);
            $name="img_".uniqid().".".$ext;
            $filename='./up_image/'.$name;
            $src=$_FILES['file_upload']['tmp_name'];
            move_uploaded_file($src,$filename);
        }



     foreach ($_POST as $v)
     {
        $arr_article[]= "'$v'";
     }

       $arr_article[5]=addslashes($arr_article[5]);
        $arr_article[5]="'$arr_article[5]'";
//        $arr_article[5]=addslashes($arr_article[5]);
//        echo  $arr_article[5];

        $arr_article_str=implode(",",$arr_article);
        $last_time=date('y-m-d H:i:s',time());
        $last_time_str="'$last_time'";
     $sql="insert into article VALUES (null,'$filename',$arr_article_str,$last_time_str)";
//     echo $sql;

    $res= $mysql_obj->exec($sql);
    if($res){
        echo "<script>if(window.confirm('恭喜添加成功')){window.location.href='http://www.kuaidianwoba.com/admin/Controller/articlelist_controller.php'}</script>";
    }
    }






