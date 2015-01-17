<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Left</title>
	</head>
	<body>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><p>留言题目：</p><?php echo ($vo["title"]); ?><br/>
		<p>留言内容：</p><?php echo ($vo["content"]); ?><br/>
		<p>留言时间：</p><?php echo (date('Y m d H:i:s',$vo["time"])); ?><br/>
		<p>留言人：</p><?php echo ($vo["username"]); ?><br/>
		<p>附件名：</p><?php echo ($vo["filename"]); ?><br/>
		<hr/><?php endforeach; endif; ?>

		<?php echo ($show); ?>
	</body>
</html>