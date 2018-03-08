<?php
/**
 * Created by PhpStorm.
 * User: zhangqingbai
 * Date: 2017-07-29 0029
 * Time: 17:12
 */
//my_blog_sql表明 blog_admin_user
//require_once "base_controller.php";
////var_dump($mysql_obj);
//$sql="select * from blog_admin_user";
//$arrs= $mysql_obj->fetchAll($sql,3);//获取到所有的内容
//$records=$mysql_obj->get_count($sql);//获取到总记录数
////3.循环展示出每一条结果

//4.设置一页展示数量$pagesize,
//5.get方式得到当前页,默认是1
///6.计算出共有多少页:records/pagesize===pages
/// 按照每页显示的数量取得数据,,
/// select * from student order by id desc limit $startrow,$pagesize;
/// //注意:开始行和长度,从startrow开始,长度是pagesize
///
/// 1.默认是1,每页显示2条,
/// 判断是否有,没有的话 page=1,有的话page得到,
/// 判断page和startrow之间的关系,1页:1-2;2:3-4;3:5-6//2n-1,2n-1+pagesize;
/// 5页,1:1-5;6-10;start=
/// 6.循环输出每一页的页数,$start   $end  $i++ {}
///     注意:如果当前页就是i,输出,span,标签,其他输出a标签,
//mysql_connect("127.0.0.1","root","root");
//mysql_selectdb("itcast");
$pdo=new PDO("mysql:dbhost=127.0.0.1;dbname=itcast;","root","root");
$pdostatement=$pdo->query("select * from student");
//print_r($res);
$arrs=$pdostatement->fetchAll(2);
//echo "<pre>";
//var_dump($arrs);
$records=$pdostatement->rowCount();//共有多少条记录
//echo $records;
$pagesize=5;//每页展示5个
$pages=ceil($records/$pagesize);
//echo $pages;//总页数
//分析:默认第几页?
//////////////////////////////////////////注意:上条sql语句是为了分页获取相关数据,
if (!empty($_GET['pagenow']))
{
    $pagenow=$_GET['pagenow'];//假如传过来的pagenwo
    if($pagenow<=$pages&$pagenow>0){
        $start=($pagenow-1)*$pagesize;
        $pre=$pagenow-1;
        $next=$pagenow+1;
//        echo $pre;
    }
}
else
{
     $pagenow=1;//默认第一页
    $start=0;//从记录0开始,到末尾结束
}




$pdostatement=$pdo->query("select * from student ORDER BY id DESC limit $start,$pagesize");
$arrs=$pdostatement->fetchAll(2);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table rules="all" width="600px" bgcolor="#f0f8ff">
    <thead style="height: 20px">
    <th>编号</th>
    <th>姓名</th>
    </thead>
    <?php foreach ($arrs as $arr){

    ?>

        <tbody>
        <tr>

            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['name']?></td>
        </tr>


        </tbody>
    <?php }?>
</table>
<?php if($pagenow==1){
    echo ("<span href='?pagenow={$pagenow}'><<上一页</span>");


}else{
    echo "<a href='?pagenow={$pre}'><<上一页</a>";
}   ?>
<div align="center" style="display: inline-block">
<?php for ($i=1;$i<=$pages;$i++){

    if($i==$pagenow){
        echo "<span href='?pagenow={$i}' style='height: 10px;width: 30px;background: pink;margin-left: 1px'>".$i."</span>";

    }else{echo "<a href='?pagenow={$i}' style='height: 10px;width: 30px;background: pink;margin-left: 1px'>".$i."</a>";}


} ?>
</div>

<span>
    <?php
    if($pagenow==$pages){
    echo "<span href='?pagenow={$pages}'>下一页>></span>";}else {
        echo "<a href='?pagenow={$pages}'>下一页>></a>";
    }
    ?>



</span>




</body>
</html>






