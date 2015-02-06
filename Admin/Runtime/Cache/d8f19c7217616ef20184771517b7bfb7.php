<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/show.css" />
		<title>详细信息</title>
	</head>
	<body>
	<h2 style="color:#219E69;margin:0 auto;"> 预约详细信息</h2>
	<table border='1' width="500" align='center' class="show_check">
		<input type='hidden' name='id' value="<?php echo ($data["id"]); ?>"/>
           <tr>
             <th colspan="4">预约信息</th>
           </tr>  
            <tr>
			  <td>实验名称：<?php echo ($data["testname"]); ?></td>
			  <td>课题负责人：<?php echo ($data["principal"]); ?></td>
            </tr>
	     <tr>
	    <td><a href="__APP__/User/check/id/<?php echo ($data["uid"]); ?>">用户名：<?php echo ($data["truename"]); ?></a></td>
		    <td><a href="__APP__/User/check/id/<?php echo ($data["uid"]); ?>">用户昵称：<?php echo ($data["username"]); ?></a></td>
            </tr>
            <tr>
		    <td colspan="2"><center>预计被试数：<?php echo ($data["total"]); ?></td>
	    </tr>	 
	     <tr>
			 <td colspan="2"><center>申请时间：<?php echo ($data["time"]); ?></td>
            </tr>
	    <tr>
		    <td colspan="2">实验描述：<?php echo ($data["testcontent"]); ?></td>
	    </tr>
	    <tr>
		  	  <td colspan="2" style="background-color:#219E69;font-color:white;text-align:center;"><a onClick="history.go(-1);"style="color:#eee;cursor:pointer;">返回</td>
            </tr>
		</table>
	</body>
</html>