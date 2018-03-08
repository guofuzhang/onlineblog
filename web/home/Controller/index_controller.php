<?php

/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
require_once "base_controller.php";
//$arrs=$mysql_obj->fetchAll($sql,3);
$sql="select * from article  ";
//获取记录数\
$records=$mysql_obj->get_count($sql);
//设定每页的长度
$pagesize=3;

//分页数
$pages=ceil($records/$pagesize);

if (!empty($_GET['pagenow']))
{
    $pagenow=$_GET['pagenow'];//假如传过来的pagenwo
    if($pagenow<=$pages&$pagenow>0){
        $start=($pagenow-1)*$pagesize;
        $pre=$pagenow-1;
        $next=$pagenow+1;
//        echo $pre;
    }else{
       die("<a href='?pagenow=1'>您输入的页面超出范围,请点击我返回</a>>");
    }
}
else
{
    $pagenow=1;//默认第一页
    $start=0;//从记录0开始,到末尾结束
    $pre=1;
    $next=1;
}

$sql="select * from article ORDER BY created_at  DESC limit $start ,$pagesize ";
//echo $sql;
$arrs=$mysql_obj->fetchAll($sql,3);


    $arr11['pagenow']=$pagenow;
    $arr11['start']=$start;
    $arr11['pagesize']=$pagesize;
    $arr11['pages']=$pages;
    $arr11['pre']=$pre;
    $arr11['next']=$next;

//var_dump($arrs);

$smarty->assign("arrs",$arrs);
$smarty->assign("arr11",$arr11);
$smarty->display("../View/lw-index.html");
$smarty->clearAllCache();
