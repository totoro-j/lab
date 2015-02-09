<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"></div><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>核磁共振中心后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/admin.css" />
	<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
	<base href="__ROOT__/index.php/Index/index" target="iframe">
	<script type="text/javascript">
$("document").ready(function(){
$("img").click(function(){
  $(".detail").toggle();
  
})

})
</script>

</head>
<body>


<div id="top">
	<ul class="t_menu">
		<!--  强行分开预约系统
        <li><a class="hover" href="__APP__/Appointment/index">预约系统</a></li>
     -->   
        <li><a class="hover" href="__ROOT__/index.php/Index/index">门户管理</a></li>
     
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
				<span>门户管理</span>
			</h2>
			<li><a  class="hover" href="__ROOT__/index.php/Index/index">全局预览</a></li>
            <li><a href="__APP__/Article/ListBanner">滚动图片</a></li>
            <li><a href="__APP__/Article/ListFocus">焦点关注</a></li>
            <li><a href="__APP__/Article/ListNews">综合新闻</a></li>
            <li><a href="__APP__/Article/ListNotice">通知公告</a></li>
	    <li><a href="__APP__/Article/ListArticle">论文管理</a></li>
	    <li><a href="__APP__/Recycle/index">项目回收站<img src="__PUBLIC__/Images/detail.png" style="width:13px;height:13px;margin-bottom:-13px;margin-left:50px"/></a></li>
	    <ul style="display:none;" class="detail">
	        	 <li><a href="__APP__/Recycle/recycle_picture">滚动图片回收站</a></li>
                 <li><a href="__APP__/Recycle/recycle_focus">焦点关注回收站</a></li>
                 <li><a href="__APP__/Recycle/recycle_news">综合新闻回收站</a></li>
                 <li><a href="__APP__/Recycle/recycle_notify">通知公告回收站</a></li>
                 <li><a href="__APP__/Recycle/recycle_thesis">论文管理回收站</a></li>
	        </ul>
		
	</div>
</div>
<div id="right" style="width: 1200px; height:768px;">
	<iframe src="#" name="iframe" id="con"  ></iframe>
</div>
</div>

</body>
</html>