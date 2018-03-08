<?php
/* Smarty version 3.1.30, created on 2017-07-29 19:48:07
  from "F:\exercise\0718\my_blog_0729\admin\View\UserIndex.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597c75f7943082_13966650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11579f8981f2c160e48b60d7f53aac7b567c4b19' => 
    array (
      0 => 'F:\\exercise\\0718\\my_blog_0729\\admin\\View\\UserIndex.html',
      1 => 1501328885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597c75f7943082_13966650 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="./Css/public.css" rel="stylesheet" type="text/css" />
<title>用户管理</title>
</head>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrs']->value, 'arr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->value) {
echo $_smarty_tpl->tpl_vars['arr']->value['logname'];?>
111
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu="self.event.returnValue=false">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>用户管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="#">管理首页</a>&nbsp;|&nbsp;
			<a href="#">添加用户</a>
		</td>
	</tr>
</table>
<br />
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title">
		<td align="center">编号</td>
		<td align="center">用户名</td>
		<td align="center">真实姓名</td>
		<td align="center">联系电话</td>
		<td align="center">角色</td>
		<td align="center">最后登录IP</td>
		<td align="center">最后登录时间</td>
		<td align="center">登录总次数</td>
		<td align="center">账号状态</td>
		<td align="center">操作选项</td>
	</tr>
	<tr class="tdbg">
		<td align="center">10010</td>
		<td align="center">admin</td>
		<td align="center">张三丰</td>
		<td align="center">010-82311766</td>
		<td align="center">超级管理员</td>
		<td align="center">127.0.0.1</td>
		<td align="center">2016-12-25 10:20</td>
		<td align="center">135</td>
		<td align="center">正常|关闭</td>
		<td align="center">
			<a href="#">修改</a> | 
			<a href="#">删除</a>
		</td>
	</tr>
</table>
</body>
</html>
<?php }
}
