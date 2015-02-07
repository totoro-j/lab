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
     <!--table-->
	 <table border='1' width="500" align='center' class="show_check">
		<input type='hidden' name='id' value="<?php echo ($dat["id"]); ?>"/>
           <tr>
             <th colspan="4">实验详情</th>
           </tr>  
            <tr>
			  <td>实验名称：<?php echo ($dat["id"]); ?></td>
			  <td>课题负责人：<?php echo ($dat["principal"]); ?></td>
            </tr>  
            <tr>
			  <td>预计被试数：<?php echo ($dat["total"]); ?></td>
			  <td>实验状态：<?php echo ($dat["state"]); ?></td>
            <tr>
			 <td colspan="2"><center>申请时间：<?php echo ($dat["time"]); ?></td>
            </tr>
	    <tr>
		    <td colspan="2">实验描述：<?php echo ($dat["testcontent"]); ?></td>
	    </tr>
	    <tr>
		    <td colspan="2" style="background-color:#219E69;font-color:white;text-align:center;"><a onClick="history.go(-1);" style="color:#eee;cursor:pointer;">返回</a></td>
         </tr>
		</table>
		<!--end table-->
	</div>
	</body>
	</html>