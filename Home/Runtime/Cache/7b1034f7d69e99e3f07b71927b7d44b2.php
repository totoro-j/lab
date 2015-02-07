<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>

<html>
<head><meta charset="UTF-8">
<title>个人信息界面</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_pwd.css" />>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script>
	$(function(){
		var error1=new Array();	
			$('input[name="password"]').blur(function(){
				var password=$(this).val();
				if(password.length<6 && password.length>0){
					error1['password1']=1;
					$('#pmessage0').css("color","red").text("密码长度少于6位！");
				}else if(password.length==0){
					error1['password1']=1;
					$('#pmessage0').css("color","red").text("密码不能为空!");
				}else{
					error1['password1']=0;
					$('#pmessage0').css("color","#23a946").text("OK!");
				}
			});

		var error2=new Array();	
			$('input[name="newpwd"]').blur(function(){
				var password=$(this).val();
				if(password.length<6 && password.length>0){
					error2['password2']=1;
					$('#pmessage1').css("color","red").text("密码长度少于6位！");
				}else if(password.length==0){
					error2['password2']=1;
					$('#pmessage1').css("color","red").text("密码不能为空!");
				}else{
					error2['password2']=0;
					$('#pmessage1').css("color","#23a946").text("OK!");
				}
			});

		var error3=new Array();	
			$('input[name="repwd"]').blur(function(){
				var password=$('input[name="newpwd"]').val();
				var repassword=$(this).val();
				if(password!==repassword){
					error3['password3']=1;
					$('#pmessage2').css("color","red").text("两次密码输入不一致！");
				}else{
					error3['password3']=0;
					$('#pmessage2').css("color","#23a946").text("输入一致！");
				}
			});

		$('div.password_btn').click(function(){
				if(error1['password1']==1 || error2['password2']==1 || error3['password3']==1){
					return false;
				}else{
					$('form[name="password_change"]').submit();
				}
			});
		});

</script>
</head>
<body>
	<div id="infor">
	<div class="can_1">密码修改</div>
	<!--form-->
	<form action="__URL__/pwd" method="post" name="password_change" >
	<span class="title"> 输入原密码：</span><input type='password' name='password' id="pass0" placeholder="密码不少于六位数" /> <span id="pmessage0"></span><br/>
	<span class="title"> 输入新密码：</span><input type='password' name='newpwd' id="pass1" placeholder="密码不少于六位数" /> <span id="pmessage1"></span><br/>
	<span class="title"> 请确认密码：</span><input type='password' name='repwd' id="pass2"/><span id="pmessage2"></span><br/>
	<span class="title"> 请输入验证码：<input type='text' name='code'/></span><div class="code"><img src='__APP__/Public/code?w=60&h=25' onclick='this.src=this.src+"?"+Math.random()'/></div>
	<div class='password_btn'>提交</div>
    </form>
    <!--end form-->
</div>
</body>
</html>