<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>项目回收站</title>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/stastic_view.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/recycle_detail.css" />
</head>
<body>
	<h2 style="color:#219E69;margin:0 auto;margin-top:2px;font-weight:bold;"><?php switch($no["parentid"]): case "1": ?>焦点新闻<?php break; case "2": ?>综合新闻<?php break; case "3": ?>通知公告<?php break; case "4": ?>重要论文<?php break; endswitch;?></h2>
<div class="detail">
	<h3>标题</h3>
	<h4><?php echo ($no["title"]); ?></h4>
	<h3>作者</h3>
	<h4><?php echo ($no["editor"]); ?></h4>
	<h3>上传时间</h3>
	<h4><?php echo ($no["date"]); ?></h4>
	<h3>内容</h3>
	<p><?php echo ($no["content"]); ?></p>
</div>
	<!--执行选项-->
    <table style="margin-top:30px;">
    <tr>
      <td><input type="submit" value="恢复" class="search_button" id="recover" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-right:10px;"/></td>
      <td><input type="submit" value="删除" class="search_button" id="delete" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-left:10px;"/></td>
      <td><a style="margin-left:10px; color:#219E69;"  href ="javascript:" onclick="self.location=document.referrer;">返回</a></td>
     </tr>
    </table>
<!--执行选项完-->
</body>
</html>