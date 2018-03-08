﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="../View/Css/public.css" rel="stylesheet" type="text/css" />
<title>文章管理</title>
    <script src="../View/Js/jquery.js"></script>
<script charset="utf-8" src="../View/Js/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="../View/Js/editor/lang/zh_CN.js"></script>
<script type="text/javascript">
//引入KindEditor在线编辑器
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
});
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="border">
	<tr class="topbg"><td>文章管理</td></tr>
	<tr class="tdbg">
		<td height="30">&nbsp;&nbsp;
			<a href="http://www.kuaidianwoba.com/admin/Controller/articlelist_controller.php">管理文章</a>&nbsp;|&nbsp;
			<a href="http://www.kuaidianwoba.com/admin/Controller/article_controller.php">添加文章</a>
		</td>
	</tr>
</table>
<br />
<form name="form1" method="post" action="" enctype="multipart/form-data">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="border">
	<tr class="title"><td colspan="2" align="center">添加文章</td></tr>
	<tr class="tdbg">
		<td width="100" height="30" align="right">分&nbsp;&nbsp;类：</td>
	<td>
		<select name="category_id">
			<option value="0">无分类</option>
			<option value="1">----新闻咨询</option>
			<option value="2">----PHP培训</option>
		</select>
	</td>
	</tr>
	<tr class="tdbg">
		<td height="30"  align="right">标&nbsp;&nbsp;题：</td>
		<td><input name="title" type="text" size="90" maxlength="50" /></td>
	</tr>

	<tr class="tdbg">
		<td height="30"  align="right">作者：</td>
		<td><input name="author" type="text" size="90" maxlength="50" /></td>
	</tr>

	<tr class="tdbg">
		<td height="30"  align="right">摘要：</td>
		<td><input name="main" type="text" size="90" maxlength="50" /></td>
	</tr>



    <tr class="tdbg">
        <td height="30"  align="right">图片上传：</td>
        <td><input id="file_upload" name="file_upload" type="file" ></td>
    </tr>
	<tr class="tdbg">
		<td height="30" align="right">排&nbsp;&nbsp;序：</td>
		<td>
			<input name="orderby" type="text" value="50" size="2" maxlength="3" />
			<span style="padding-left:20px;">置顶：</span>
			<input name="top" type="checkbox" value="1" />
		</td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">内&nbsp;&nbsp;容：</td>
		<td><textarea name="content" style="width:95%;height:300px;"></textarea></td>
	</tr>
	<tr class="tdbg">
		<td height="30" align="right">&nbsp;</td>
		<td>
			<input type="submit" value="添加" />
			<input type="button" onclick="history.go(-1)" value="返回" />
		</td>
	</tr>
</table>
</form>

</body>


</html>
