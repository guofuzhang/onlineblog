<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户列表</title>
</head>
<body>
<?php
$con = mysql_connect("localhost","root","");

mysql_query("set names utf8");
mysql_select_db("zhiye",$con);

$pageSize = 1;   //每页显示的数量
$rowCount = 0;   //要从数据库中获取
$pageNow = 1;    //当前显示第几页

//如果有pageNow就使用，没有就默认第一页。
if (!empty($_GET['pageNow'])){
    $pageNow = $_GET['pageNow'];
}

$pageCount = 0;  //表示共有多少页

$sql1 = "select count(id) from user";
$res1 = mysql_query($sql1);

if($row1=mysql_fetch_row($res1)){
    $rowCount = $row1[0];
}

//计算共有多少页，ceil取进1
$pageCount = ceil(($rowCount/$pageSize));

//使用sql语句时，注意有些变量应取出赋值。
$pre = ($pageNow-1)*$pageSize;

$sql2 = "select * from user limit $pre,$pageSize";
$res2 = mysql_query($sql2);

while($row=mysql_fetch_assoc($res2)){
    echo $row['user_name']."<br>";
    echo $row['name']."<br>";
    echo $row['email']."<br>";
    echo $row['password']."<br>";
    echo $row['tel']."<br>";
}
for ($i=1;$i<=$pageCount;$i++){
    echo "<a href='userList.php?pageNow=$i'>$i</a> ";
}
?>
</body>
</html>
当有大量数据时，就不能使用上述方法。
<?php
$con = mysql_connect("localhost","root","");

mysql_query("set names utf8");
mysql_select_db("zhiye",$con);

$pageSize = 1;   //每页显示的数量
$rowCount = 0;   //要从数据库中获取
$pageNow = 1;    //当前显示第几页

//如果有pageNow就使用，没有就默认第一页。
if (!empty($_GET['pageNow'])){
    $pageNow = $_GET['pageNow'];
}

$pageCount = 0;  //表示共有多少页

$sql1 = "select count(id) from user";
$res1 = mysql_query($sql1);

if($row1=mysql_fetch_row($res1)){
    $rowCount = $row1[0];
}

//计算共有多少页，ceil取进1
$pageCount = ceil(($rowCount/$pageSize));

//使用sql语句时，注意有些变量应取出赋值。
$pre = ($pageNow-1)*$pageSize;

$sql2 = "select * from user limit $pre,$pageSize";
$res2 = mysql_query($sql2);

//$sql = "select * from user";
//$res = mysql_query($sql,$con);

while($row=mysql_fetch_assoc($res2)){
    echo $row['user_name']."<br>";
    echo $row['name']."<br>";
    echo $row['email']."<br>";
    echo $row['password']."<br>";
    echo $row['tel']."<br>";
}
if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='userList.php?pageNow=$prePage'>pre</a> ";
}
if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='userList.php?pageNow=$nextPage'>next</a> ";
    echo "当前页{$pageNow}/共{$pageCount}页";
}
echo "<br/><br/>";
?>

<form action="userList.php">
    <input type="text" name="pageNow">
    <input type="submit" value="GO">
</form>