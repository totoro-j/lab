<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"></div><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>核磁共振中心后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	<base href="__URL__/greet" target="iframe">
	

</head>
<body>


<div id="top">
     
	<ul class="t_menu">
		
        <li><a class="hover" href="__URL__/greet">实验预约管理系统</a></li>
        <!-- <li><a href="__ROOT__/index.php/Index/index">门户管理</a></li> -->
    
    </ul>
    <ul class="t_user">
    	<li><em class="t_user_ico1"></em>欢迎你，管理员 <?php echo (session('username')); ?></li>
	<li><a href="__ROOT__/index.php/Index/index">实验室首页</li>
	<li><a href="__ROOT__/default.php/Index/index">预约系统首页</li>
    	<li><a href="__APP__/Login/doLogout" target="_top">退出登陆</a></li>
    </ul>
</div>
<div class="bod">
<div id="menu">
	<div id="left" style="height: 908px;">
		<ul class="l_menu" style="display:block;">
			<h2 class="l_menu_title">
				<i class="icon_01"></i>
				<span>预约系统</span>
			</h2>       <!--  添加各分页面链接  -->
			<li><a class="hover" href="__URL__/greet">查看最新消息</a></li>
            <li><a href="__APP__/Appointment/index">当前机时预约</a></li>
			<li><a href="__APP__/Notice/index">通知公告管理</a></li>
			<li><a href="__APP__/Entry/entrycheck">审核实验申请</a></li>
			<li><a href="__APP__/Entry/entryview">实验列表查询</a></li>
            <li><a href="__APP__/User/usercheck">审核注册用户</a></li>
            <li><a href="__APP__/User/userview">正式用户管理</a></li>
	    <li><a href="#">项目回收站</a></li>
			
		</ul>
	
	</div>
</div>
<div id="right" style="width: 1200px; height:768px;">
	<iframe src="#" name="iframe" id="con"  ></iframe>
</div>
</div>

</body>
</html>