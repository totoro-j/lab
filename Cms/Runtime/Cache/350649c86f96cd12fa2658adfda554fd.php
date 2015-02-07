<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head><meta charset="utf-8"><title>用户审核模块</title><link rel="stylesheet" href="__PUBLIC__/Css/Admin/user_check.css" ><script src="__PUBLIC__/Js/jquery.js" type="text/javascript"></script><script type="text/javascript">	      $(function(){  
		$(".pass1").click
		(
		function(){
		if($('#check_button1').text()=='等待通过'){
				
		if(confirm('确认通过？')){$('#check_button1').text("已审核").css("color","#219E69");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">           $(function(){  
		$(".refuse1").click
		(
		function(){
		if($('#check_button1').text()=='等待通过'){
				
		if(confirm('确认拒绝？')){$('#check_button1').text("未通过").css("color","#F33");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">	      $(function(){  
		$(".pass2").click
		(
		function(){
		if($('#check_button2').text()=='等待通过'){
				
		if(confirm('确认通过？')){$('#check_button2').text("已审核").css("color","#219E69");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">           $(function(){  
		$(".refuse2").click
		(
		function(){
		if($('#check_button2').text()=='等待通过'){
				
		if(confirm('确认拒绝？')){$('#check_button2').text("未通过").css("color","#F33");return true;}
		return false;
		}}
		
		);
			
			})
			
</script><script type="text/javascript">	      $(function(){  
		$(".pass3").click
		(
		function(){
		if($('#check_button3').text()=='等待通过'){
				
		if(confirm('确认通过？')){$('#check_button3').text("已审核").css("color","#219E69");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">           $(function(){  
		$(".refuse3").click
		(
		function(){
		if($('#check_button3').text()=='等待通过'){
				
		if(confirm('确认拒绝？')){$('#check_button3').text("未通过").css("color","#F33");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">	      $(function(){  
		$(".pass4").click
		(
		function(){
		if($('#check_button4').text()=='等待通过'){
				
		if(confirm('确认通过？')){$('#check_button4').text("已审核").css("color","#219E69");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">           $(function(){  
		$(".refuse4").click
		(
		function(){
		if($('#check_button4').text()=='等待通过'){
				
		if(confirm('确认拒绝？')){$('#check_button4').text("未通过").css("color","#F33");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">	      $(function(){  
		$(".pass5").click
		(
		function(){
		if($('#check_button5').text()=='等待通过'){
				
		if(confirm('确认通过？')){$('#check_button5').text("已审核").css("color","#219E69");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">           $(function(){  
		$(".refuse5").click
		(
		function(){
		if($('#check_button5').text()=='等待通过'){
				
		if(confirm('确认拒绝？')){$('#check_button5').text("未通过").css("color","#F33");return true;}
		return false;
		}}
		
		);
			
			})
</script><script type="text/javascript">    function validateTel(){
		var foundResult=document.getElementById("appointment_check");
		var notfoundResult=document.getElementById("notfound");
		if(foundResult.rows.length==2){
			notfoundResult.style.display='table-cell';
			foundResult.width=1050;
		}
	}
</script></head><body onLoad="validateTel()"><h2 style="color:#219E69;margin:0 auto;"> 审核注册用户</h2><div class="check_table"><table class="appointment_check" id="appointment_check"><tr><th>用户名</th><th>用户姓名</th><th>课题组负责人</th><th>注册时间</th><th>审核情况</th><th colspan="2">审核操作</th></tr><tr><td colspan="7" id="notfound">未找到相关数据</td></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><a href="__URL__/check/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["username"]); ?></a></td><td><a href="__URL__/check/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["truename"]); ?></a></td><td><a href="__URL__/check/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["principal"]); ?></a></td><td><?php echo ($vo["time"]); ?></td><td><div id="check_button1" class="check_button"><a >等待通过</a></div></td><td><a href="__URL__/pass/id/<?php echo ($vo["id"]); ?>"><div class="pass1">通过</div></a></td><td><a href="__URL__/refuse/id/<?php echo ($vo["id"]); ?>"><div class="refuse1">拒绝</div></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table><div class="user_show"><?php echo ($show); ?></div></table></div></body></html>