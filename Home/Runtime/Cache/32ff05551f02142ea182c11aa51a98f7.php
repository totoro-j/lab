<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>

<html>
<head><meta charset="UTF-8">
<title>信息修改</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_info.css" />>
    <!--判断-->
    <script>
	$(function(){
		var error1=new Array();
			$('input[name="tel"]').blur(function(){
				var phoneNum=$(this).val();
				var reg=/^1\d{10}$/;
				if(reg.test(phoneNum)){
					error1=0;
					$('#nmessage').css("color","#23a946").text("格式正确！");
				}else{
					error1=1;
					$('#nmessage').css("color","red").text("请输入11位有效手机号码！");
				}
				if(phoneNum.length==0){
					$('#nmessage').css("color","red").text("号码不能为空！");
				}
			})

		$('div.con').click(function(){
				if(error1==1){
					return false;
				}else{
					$('form[name="connection_change"]').submit();
				}
		});
	})；
    </script>
</head>
<body>
  <div id="infor">
        <div class="can_1">修改信息</div>
        <!--form-->
        <form action="__URL__/con_edit" method="post" name="connection_change">
		<span class="title">联系电话：</span><input type='text' name='tel' onkeyup="value=this.value.replace(/\D+/g,'')" value='<?php echo ($data["tel"]); ?>'/> <span id="nmessage"></span><br/>
		<span class="title"> 邮箱：</span><input type='text' name='mail' value="<?php echo ($data["mail"]); ?>"/><br/> 
		<span class="title"> 请输入验证码：<input type='text' name='code'/></span><div class="code"><img src='__APP__/Public/code?w=60&h=25' onclick='this.src=this.src+"?"+Math.random()'/></div>
		<div class='con'>提交</div>
		<input class="login" type="submit" value="提交" />
	</form>
<!--end form-->
 </div>
  
</body>
</html>