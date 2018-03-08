<?php
//声明页面字符集
header("content-type:text/html;charset=utf-8");
//判断表单是否提交
if(isset($_POST['ac']) && $_POST['ac']=='login')
{
	//获取表单提交值
	$username = $_POST['username'];
	$password = $_POST['password'];
	//输出结果
	echo "用户名:$username , 密码:$password";
}else
{
	//如果表单没有提交，就认为是非法操作
	echo "非法操作！";
}