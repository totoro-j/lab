<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://115.29.151.191:9999/index.html -->
<html xmlns="http://www.w3.org/1999/xhtml" debug="true"><div id="FirebugChannel" style="display:none;">FB_deactivate</div><script src="chrome-extension://bmagokdooijbeehmkpknfglimnifench/firebug-lite.js" id="FirebugLite" firebugignore="true" extension="Chrome"></script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>预约系统个人中心</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter.css" />
	<link rel="shortcut icon" href="__PUBLIC__/Images/20141203072011410_easyicon_net_128.ico"/>
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/ucenter.js"></script>
	<!--<base target="iframe">--><base target="iframe">
	
</head>
<body>
	<!--header-->
	<div id="header">
   		<div id="logo"><a href="__URL__/index" target="_blank">预约系统个人中心</a>
   	    </div>
        <div id="user">
   			<ul>
   				<li>欢迎你，用户 <?php echo (session('username')); ?></a></li>
   				<li><a href="__URL__/info_pwd">密码修改</a></li>
				<li><a href="__APP__/Login/doLogout">退出登陆</a></li>
   				<li><a href="__APP__/Index/index" target="_blank">返回主页</a></li>				
   			</ul>
   		</div>
   </div>
   <!--end header-->
   <!--menu-->
   <div id="menu">
	<div id="left" style="height: 908px; ">
		<ul class="l_menu" style="display:block;">
			<li style="width:300px;height:50px;color: #23a96f;padding:20px 20px 0 36px;font-size: 28px;">个人中心</li>
			<li><a href="__URL__/info">个人信息</a></li>
			<li><a href="__URL__/order">预约记录</a></li>
			<li><a href="__URL__/event">实验记录</a></li>
			<li><a href="__URL__/info">回收站</a></li>
			
		</ul>
		<div class="l_dragbar"></div>
		<div class="l_dragbar_mid" style="top: 415px;"></div>
	</div>
   </div>
   <!--end menu-->
   <!--iframe-->
<div id="right" style="width: 1720px; height: 908px;">
	<iframe src="__URL__/info" name="iframe" frameborder="yes" border="0" scrolling="yes"></iframe>
</div>
<iframe src="__URL__/info" frameborder="0" id="FirebugUI"  style="border: 0px; visibility: visible; z-index: 2147483647; position: fixed; width: 100%; left: 0px; bottom: 0px; height: 300px; display: none; "></iframe>
</body>
</html>