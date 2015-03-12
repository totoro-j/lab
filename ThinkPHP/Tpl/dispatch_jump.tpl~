<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
a{
	text-decoration: none;
}
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
/*header*/
#header{
	height: 75px;
	padding-top:10px;
}
#logo{
	font-family:"微软雅黑";
	width: 350px;
	height: 45px;
	margin-left:45px;
	margin-top:10px;
	float: left;
}
#logo a{
	font-size: 28px;
	padding: 0 auto;
	text-decoration:none;
	color:#23a96f;
}
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top:30px;padding-left:25px;margin-bottom:100px;}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
h1{
	text-align:center;
	padding-top:80px;
	
	
}
img{
	
	width:200px;
	height:200px;
	margin:0 auto;
	display:block;
	
	padding-top:30px;
	
	
	
}

.success,.error{
	text-align:center;
}
/*footer*/
#footer{
	clear:both;
	height:80px;
	width:1225px;
	margin:0 auto;
	margin-bottom:15px;
}
#footer p{
	clear:left;
	text-align:center;
	font-family:Arial,"微软雅黑";
	font-size:12px;
	padding-top:12px;
	padding-left:15px;
	
}
</style>
</head>
<body>
<div class="system-message">
<!--header-->
  <div id="header">
    <div id="logo"><a href="">核磁共振实验室预约系统</a></div>
  </div>
<!--end header-->
<present name="message">
<h1> Success！</h1>
<img src="__PUBLIC__/images/icon_check.png" />
<p class="success"><?php echo($message); ?></p>
<else/>
<h1> Error！</h1>
<img src="__PUBLIC__/images/icon_error.png" />
<p class="error"><?php echo($error); ?></p>
</present>
<p class="detail"></p>
<p class="jump" style="text-align:center;">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
<div id="footer" style="border-top:2px solid #ccc;padding-top:30px;text-align:center;margin-top:20px;"><p><small>©  2014  MUHESTUDIO.net    All Rights Reserved.<br/>木盒设计工作室    版权所有</small></div>
</div>

<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>

</body>
</html>
