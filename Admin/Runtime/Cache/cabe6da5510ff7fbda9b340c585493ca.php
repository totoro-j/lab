<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="text.css">
<title>公告发布系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/notice.css" />
</head>

<body>
<h2 style="color:#219E69;margin:0 auto;margin-top:2px;font-weight:bold;">通知公告管理</h2>
<div class="billboard"   >
<div class="billboard_text">
<form method="get"  action="__URL__/noticeadd" >
<h3>上传公告</h3>
  
<p>日期&nbsp;&nbsp;<?php echo ($time); ?></p>  <p>发布者ID:<?php echo (session('username')); ?></p>
  

<textarea name="content" placeholder="请在此输入最新公告..."></textarea>
  <br/>
  <input type="submit" value="提交" class="buttom" >
  </form>
  </div>
</div>
<div class="billboard_history">
     <h3>历史公告</h3>
     <form class="billboard_history_scroll" action="__URL__/del">
	<?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="billboard_history_detail">
     <div class="billboard_history_detail_info">
	<p name="content" style="float:left;font-size:20px"><?php echo ($vo["content"]); ?></p><br>
	<p style="float:right;font-size:5px"><?php echo ($vo["truename"]); ?>发布于 <?php echo ($vo["time"]); ?><a href="__URL__/del?id=<?php echo ($vo["id"]); ?>">删除</a></p>
	
</div>
<br>		
     </div><?php endforeach; endif; else: echo "" ;endif; ?>
     </form>
    </div>
</body>
</html>