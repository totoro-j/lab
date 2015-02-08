<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/basic.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/login.css" />
		<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
		<script>
			$(function(){
				$('div[title="login"]').click(function(){
					$('form[name="myForm"]').submit();
				});
		</script>
	</head>
	<body>
		<form action='__URL__/doLogin' method='post' name='myForm'>
        <h3>后台系统登录</h3>
			<span class="title">用户名：<input type='text' name='username' autofocus="autofocus" autocomplete="off"/></span><br/>
			<span class="title">密　码：<input type='password' name='password'/></span><br/>
			<span class="title">验证码：<input type='text' name='code'/></span><div class="code"><img src='__APP__/Public/code?w=60&h=25' onclick='this.src=this.src+"?"+Math.random()'/></div>
                <div title='buttons' class="buttons">
			<input title='login' class="login" type="submit" value="登录" />
            	</div>
		</form>
	</body>
</html>