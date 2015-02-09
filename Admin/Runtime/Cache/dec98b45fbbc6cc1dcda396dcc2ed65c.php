<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>查看最新消息</title>


<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/greet.css" />


</head>

<body>

    <h2 style="color:#219E69;margin:0 auto;margin-top:2px;font-weight:bold;">查看最新消息</h2>
   <div class="greet_table">   
    <div class="greet_item">
          <div class="greet_title">实验申请</div>
         <p><a href="__APP__/Entry/entryview">待处理申请：<span>(30)</span></a></p>
    </div>
    
    <div class="greet_item">
         <div class="greet_title">新用户申请</div>
         <p><a href="__APP__/User/usercheck">待处理申请：<span>(30)</span></a></p>
    </div>
    
    <div class="greet_item">
         <div class="greet_title">用户预约</div>
         <p><a href="__APP__/Entry/entrycheck">未读消息：<span>(30)</span></a></p>
    </div> 
   </div> 

</body>
</html>