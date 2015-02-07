<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_info.css" />
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_detail.css" />>
		<title>预约记录</title>
	</head>
<body>
  <div id="infor">
    <div class="can_1">预约记录</div>
<!--table1-->
  <table >
	<form name="person_app"  method="post" action="__URL__/order_search">	
	<tr>
	<td>
    <select class="user_search" id="searchform" name="searchform">
  	<option value="choose">---请选择实验课题---</option>
	<?php if(is_array($chosen_list)): $i = 0; $__LIST__ = $chosen_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["testname"]); ?>'><?php echo ($vo["testname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>	
	</select></td>
	<td><input type="submit" class="search_button" value="搜索"/></td>
    </tr>
	</form>
  </table>
<!--table2-->
  <table class="stastic_check">
  <tr >
  <th style="width:500px;">实验名称</th>
  <th>课题负责人姓名</th>
  <th>起始时间</th>
  <th>结束时间</th>
  <th>总时长</th>
  <th>申请时间</th>
  <th>实验状态</th>
  <th>操作</th>
  <th>备注</th>
  </tr>
  <tr>
<?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$at): $mod = ($i % 2 );++$i;?><td><a href="__URL__/event_detail/id/<?php echo ($at["eid"]); ?>"><?php echo ($at["testname"]); ?></a></td>
   <td><?php echo ($at["principal"]); ?></td>
   <td><?php echo ($at["starttime"]); ?></td>
   <td><?php echo ($at["finaltime"]); ?></td>
   <td><?php echo ($at["hours"]); ?></td>
   <td><?php echo ($at["ordertime"]); ?></td>
   <td><?php switch($at["state"]): case "0": ?>待审核<?php break; case "1": ?>进行中<?php break; default: ?>未知状态<?php endswitch;?></td>
   <td><a href="#">删除预约</a></td>
   <td>管理员修改操作！</td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
    <div>鹅鹅鹅<?php echo ($show); ?></div>
</div>

</body>
</html>