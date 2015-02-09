<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/stastic_view.css" />
<title>机时统计界面</title>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript" src="/Public/Js/Base.js"></script>
<script type="text/javascript" src="/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/Public/Js/Ajax/ThinkAjax.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".count_button").click(function(){
		$(".stastic_words").show();
	});
});
</script>
<script type="text/javascript">
$("document").ready(function(){
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
</script>
<!--文本框改变的js-->
<script type="text/javascript">
$("document").ready(function(){
	$("select").click(function(){
		if($(".user_search option:selected").text()=="时间")
		{
			$(".search_detail_1").show();
			$(".search_detail").hide();
      $("#search_button_1").show();
       $("#search_button_2").hide();
		}
		else
		{
			$(".search_detail_1").hide();
			$(".search_detail").show();
      $("#search_button_1").hide();
       $("#search_button_2").show();
		}
			})
})	  
</script>
<!--切换表格的js-->
<script type="text/javascript">
$("document").ready(function(){
$("#search_button_1").click(function(){
  $("#stastic_check").hide();
  $("#time_table").show();
  
})
$("#search_button_2").click(function(){
  $("#stastic_check").show();
  $("#time_table").hide();
  
})
})
</script>
<!--表格扩展js-->
<script type="text/javascript">
$(document).ready(function(){
        $(".foldInfo").hide();
        $(".foldButton").click(function(){                
                $(this).parent().next(".foldInfo").toggle();
        })
})
</script>
</head>

<body>
<h2 style="color:#219E69;margin:0 auto;"> 预约历史查询</h2>
<div class="check_stastic">
<!--搜索框表格-->
<table>
	<form name="stastic_search"  method="post" action="__URL__/search">	
	<tr>
	<td>
    <select class="user_search" id="searchform" name="searchform">
  	<option value="choose">-----请选择-----</option>
  	<option value="testname" >实验名称</option>
  	<option value="uid">申请人姓名</option>
  	<option value="principal">课题负责人姓名</option>
    <option value="time" id="time">时间</option>
	</select></td>
	<td><input type="text"   class="search_detail" value="请输入搜索内容"  id="search" name="search" onFocus="clearContent(this)" onBlur="validateTel()" /></td>  
  <td style="display:none" class="search_detail_1">起始时间:<input type="text"   placeholder="起始时间"  id="search1" name="search1" onFocus="clearContent(this)" onBlur="validateTel()" /></td>
  <td style="display:none" class="search_detail_1">结束时间:<input type="text"   placeholder="结束时间"  id="search2" name="search2" onFocus="clearContent(this)"   onBlur="validateTel()" /></td>
  <!--专属时间的button-->
  <td><input type="submit" id="search_button_1" class="search_button" value="搜索" style="display:none;" /></td>
  <!--其他的button-->
	<td><input type="submit" id="search_button_2"class="search_button" value="搜索"/></td>
  </tr>
	</form>
</table>
<!--搜索框表格结束-->

<!--普通实验表格-->
<table class="stastic_check" id="stastic_check">
<tr>
  <th style="width:500px;">实验名称</th>
  <th>申请人姓名</th>
  <th>课题负责人姓名</th>
  <th>预约机时统计</th>
  <th>历史预约详情</th>
  <th>停止实验</th>
  <th>预约总计</th>
</tr>
<?php if(is_array($entry_list)): $i = 0; $__LIST__ = $entry_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
   <td><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["testname"]); ?></td>
   <td><a href="__APP__/User/check/id/<?php echo ($vo["uid"]); ?>"><?php echo ($vo["truename"]); ?></td>
   <td><?php echo ($vo["principal"]); ?></td>
   <td></td>
   <td><!--机时统计入口--><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>">详情</a></td>
   <td class="info_correct"><a href="__URL__/cancel/id/<?php echo ($vo["id"]); ?>" class="cancel" onclick="return confirm('确认后将停止该实验！')">停止实验</a></td>
  <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="conditions"></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<!--普通实验表格结束-->

<!--时间表格-->
<table  id="time_table" style="display:none;">
  
<!--A实验-->
<tr title="点击显示详细内容">
  <td class="foldButton">
    <table class="stastic_check">
    <tr>
    <th style="width:1200px;">实验名称</th>
    </tr>
    <tr>
    <td style="width:1200px;height:30px"><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["testname"]); ?></td>
    </tr>
    </table>
  </td class="foldButton">
</tr>
<!--A实验详细-->
<tr class="foldInfo" >
  <td >
   <table class="stastic_check" style="margin:0px;">
    <!--表头-->
    <tr>
     <th>在该段时间内预约</th>
     <th>申请人姓名</th>
     <th>课题负责人姓名</th>
     <th>预约机时统计</th>
     <th>历史预约详情</th>
     <th>停止实验</th>
     <th>预约总计</th>
    </tr>
    <!--表身-->
    <tr>
     <td ><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>"></td>
     <td><a href="__APP__/User/check/id/<?php echo ($vo["uid"]); ?>"></td>
     <td></td>
     <td></td>
     <td><!--机时统计入口--><a href="">详情</a></td>
     <td class="info_correct"><a href="" class="cancel" onclick="return confirm('确认后将停止该实验！')">停止实验</a></td>
     <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="conditions"></td>
    </tr>
    <tr >
     <td ><a href="__URL__/checkentry/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["testname"]); ?></td>
     <td><a href="__APP__/User/check/id/<?php echo ($vo["uid"]); ?>"><?php echo ($vo["truename"]); ?></td>
     <td></td>
     <td></td>
     <td><!--机时统计入口--><a href="">详情</a></td>
     <td class="info_correct"><a href="" class="cancel" onclick="return confirm('确认后将停止该实验！')">停止实验</a></td>
    <td><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="conditions"></td>
    </tr>
   </table>
 </td>
</tr>
<!--A实验结束-->






</table>

<!--时间统计表格结束-->
<div class="user_show"><?php echo ($show); ?></div>
<!--统计结果-->
<input type="button" value="统计所选实验" class="count_button" onclick="Check()"/><div class="stastic_words" id
="result">
</div>
</div>
</body>
</html>