<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
$a1=mysql_connect("0acdbf874755618a.7host.cn","hongzhulei","18215579");
$a2=mysql_select_db("hongzhulei");
$a3=mysql_query("set names utf8");
$sql="select * from article";
$res=mysql_query($sql);
$arrs=mysql_fetch_assoc($res);
echo "数据库连接"."<pre>";
var_dump($a1);
echo "选择数据库"."<pre>";
var_dump($a2);
echo "设置字符集"."<pre>";
var_dump($a3);
echo "执行slq语句"."<pre>";
var_dump($res);
echo "打印数据"."<pre>";
var_dump($arrs);



