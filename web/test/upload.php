<?php
//(0)声明网页内容类型
header("content-type:text/html;charset=utf-8");

//将上传的临时文件移动到upload目录中
//print_r($_FILES);
//判断上传文件是否有错误
print_r($_FILES);
//if($_FILES['upload']['error']!=0)
//{
//	echo "上传文件有错误发生！";
//	exit();
//}
////判断上传文件的大小，是否超过规定(以3MB为例)
//if($_FILES['upload']['size']>3*1024*1024)
//{
//	echo "上传文件超出官网的要求！";
//	exit();
//}
////将临时文件移动到，当前根目录 ./upload中
//$src = $_FILES['upload']['tmp_name']; //临时文件
//$dst = "./upload/".$_FILES['upload']['name']; //目标文件
//if(!move_uploaded_file($src,$dst))
//{
//	echo "上传文件移动失败！";
//	exit();
//}
//echo "<h2>文件上传成功</h2>";