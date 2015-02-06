<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_info.css" />
        	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_detail.css" />
		<title>详细信息</title>
	</head>
<body>
    <div id="infor">
    <div class="can_1">实验记录</div>
<table class="stastic_check">
<tr>
  <th style="width:500px;">实验名称</th>
  <th>课题负责人姓名</th>
  <th>申请时间</th>
  <th>实验状态</th>
</tr>
<?php if(is_array($event_list)): $i = 0; $__LIST__ = $event_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
   <td><a href="__URL__/event_detail/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["testname"]); ?></a></td>
   <td><?php echo ($vo["principal"]); ?></td>
   <td><?php echo ($vo["time"]); ?></td>
   <td><?php switch($vo["state"]): case "0": ?>待审核<?php break; case "1": ?>进行中<?php break; default: ?>未知状态<?php endswitch;?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
  <div class="event_show">鹅鹅鹅饿鹅鹅鹅饿鹅鹅鹅<?php echo ($show); ?></div>
    </div>
</body>
</html>