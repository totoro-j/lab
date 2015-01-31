<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head><meta charset="utf-8"><title>修改用户信息</title><link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/user_view.css" /><script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script><!--输入完成后校验效果--><script type="text/javascript">    function clearContent(myText){
		if(myText.style.color!="black"){
		myText.value='';
		myText.style.color="black";
		}
	}
</script><script type="text/javascript">    function validateTel(){
		var myTel=document.getElementById("search");
		var val=myTel.value;
		if(val.length==0){
			myTel.value='请输入搜索内容';
			myTel.style.color="#999";
		}
	}
</script><script type="text/javascript">	 function delect()
	 { if(confirm("确认删除此用户？")) {return true;}
		 else{ return false;}
	 }
</script><script  type="text/javascript">function rep(){
	var button=this;
	if(confirm('确认后将重置用户密码为MCIcenter，请谨慎操作！这里是测试')) {
		return true;}
         else{ return false;}
	}
</script></head><body><h2 style="color:#219E69;margin:0 auto;"> 正式用户管理</h2><div class="user_information"><table><form name 'send' method="post" action="__URL__/search"><tr><td><select class="user_search" id="searchform" name="searchform"><option value="choose">-----请选择-----</option><option value="name">姓名</option><option value="sex">性别</option><option value="unit">单位</option><option value="department">学院(部门)</option><option value="job">身份</option><option value="principal">课题组负责人</option><option value="tel">联系电话</option><option value="email">邮箱</option><option value="role">权限</option></select></td><td><input type="text"   class="search_detail" value="请输入搜索内容"  id="search" name="search" onFocus="clearContent(this)" onBlur="validateTel()" /></td><td><input type="submit" class="search_button" value="搜索"/></td></form></table><table  class="user_info"><tr><th>姓名</th><th>性别</th><th>单位</th><th>学院(部门)</th><th>身份</th><th>课题组负责人</th><th>联系电话</th><th>邮箱</th><th>注册时间</th><th>权限</th><th>操作</th><th>密码重置</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tt"><td><a href="__URL__/check/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["truename"]); ?></td><td><?php if($vo["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td><td><?php echo ($vo["unit"]); ?></td><td><?php echo ($vo["department"]); ?></td><td><?php if($vo["degree"] == 2): ?>博士<?php else: ?>硕士<?php endif; ?></td><td><?php echo ($vo["principal"]); ?></td><td><?php echo ($vo["tel"]); ?></td><td><?php echo ($vo["mail"]); ?></td><td><?php echo ($vo["time"]); ?></td><td><?php if($vo["role"] == 1): ?>正式用户<?php else: ?>管理员<?php endif; ?></td><td class="info_correct"><a href="__URL__/del/id/<?php echo ($vo["id"]); ?>)" class="delete" onclick="return confirm('确认后将删除该用户，请谨慎操作！')">删除用户</a></td><td class="pwd_reset" id="but"><a href="__URL__/repwd/id/<?php echo ($vo["id"]); ?>" class="button"   onclick="return rep(this)">重置密码</a></td></tr><script>	if('<?php echo ($vo["password"]); ?>'=='20575ebc2b40c6eb6f3f51fd9f0ae5fa'){

	$(".tt ").children("td:last").children("a").css("color","gray");
	$(".tt ").children("td:last").children("a").text("已重置");
	$(".tt ").children("td:last").children("a").attr("onclick", "");
	$(".tt ").children("td:last").children("a").css({"cursor":"default"});
	
	}else{
	$(".tt ").children("td:last").children("a").css("color","#219E69").text("重置密码").attr('href', '__URL__/repwd/id/<?php echo ($vo["id"]); ?>)');
	}
</script><?php endforeach; endif; else: echo "" ;endif; ?></table><div class="user_show"><?php echo ($show); ?></div></div></body></html>