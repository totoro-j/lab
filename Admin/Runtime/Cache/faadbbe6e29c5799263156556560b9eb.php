<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/stastic_view.css" /><title>机时统计界面</title><script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script><script type="text/javascript" src="/Public/Js/Base.js"></script><script type="text/javascript" src="/Public/Js/prototype.js"></script><script type="text/javascript" src="/Public/Js/mootools.js"></script><script type="text/javascript" src="/Public/Js/Ajax/ThinkAjax.js"></script><script type="text/javascript">$(document).ready(function(){
	
	$(".count_button").click(function(){
		$(".stastic_words").show();
	});
});
</script><script type="text/javascript">$("document").ready(function(){
$(".count_button").click(function(){
var info = "";
var items = $('[name = "conditions"]:checkbox:checked');

for (var i = 0; i < items.length; i++) {
     // 如果i+1等于选项长度则取值后添加空字符串，否则为逗号
     info = info + items.get(i).value + (((i + 1)== items.length) ? '':'^');
}


$.ajax({
   type : 'post',
   url: "__URL__/entrystatic",
   dataType:'json',
   data : {
           interface :info
   },
   success: function(data){
           alert('从 '+data[0]+' 到 '+data[1]+', 所选实验用时共计：'+data[2]+'小时。');
   }
});});})
</script></head><body><h2 style="color:#219E69;margin:0 auto;"> 预约历史查询</h2><div class="check_stastic"><table><form name="stastic_search"  method="post" action="__URL__/search"><tr><td><select class="user_search" id="searchform" name="searchform"><option value="choose">-----请选择-----</option><option value="testname" >实验名称</option><option value="uid">申请人姓名</option><option value="principal">课题负责人姓名</option></select></td><td><input type="text"   class="search_detail" value="请输入搜索内容"  id="search" name="search" onFocus="clearContent(this)" onBlur="validateTel()" /></td><td><input type="submit" class="search_button" value="搜索"/></td></tr></form></table><table class="stastic_check"><tr><th style="width:500px;">实验名称</th><th>申请人姓名</th><th>课题负责人姓名</th><th>单次预约机时</th><th>机时明细</th><th>取消预约</th><th>机时统计</th></tr><?php if(is_array($entry_list)): $i = 0; $__LIST__ = $entry_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["testname"]); ?></td><td><a href="__APP__/User/check/id/<?php echo ($vo["uid"]); ?>"><?php echo ($vo["truename"]); ?></td><td><?php echo ($vo["principal"]); ?></td><td><?php echo ($vo["hour"]); ?>小时</td><td><!--机时明细入口--><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>">详情</a></td><td class="info_correct"><a href="__URL__/cancel/id/<?php echo ($vo["id"]); ?>" class="cancel" onclick="return confirm('确认后将取消该预约！')">取消通过</a></td><td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="conditions"></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table><div class="user_show"><?php echo ($show); ?></div><!--统计结果--><input type="button" value="统计所选实验" class="count_button" onclick="Check()"/><div class="stastic_words" id
="result"></div></div></body></html>