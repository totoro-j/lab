<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/show.css" />
		<title>Index</title>
	</head>
	<h2 style="color:#219E69;margin:0 auto;"> 详细个人信息</h2>
	<table border='1' width="500" align='center' class="show_check">
		<input type='hidden' name='id' value="<?php echo ($data["id"]); ?>"/>
           <tr>
             <th colspan="4">个人信息</th>
           </tr>  
            <tr>
			  <td>用户名：<?php echo ($data["username"]); ?></td>
			  <td>姓名：<?php echo ($data["truename"]); ?></td>
            </tr>  
            <tr>
			  <td>性别：<?php if($data["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
			  <td>单位：<?php echo ($data["unit"]); ?></td>
            </tr>  
            <tr>

			  <td>学院(部门)：<?php echo ($data["department"]); ?></td>
			  <td>身份：<?php switch($data["job"]): case "1": ?>教师<?php break; case "2": ?>学生<?php break; default: ?>其它<?php endswitch;?></td>
            </tr>  
            <tr>
			  <td>学历：<?php switch($data["degree"]): case "1": ?>硕士<?php break; case "2": ?>博士<?php break; default: ?>略<?php endswitch;?></td>
			  <td>年级：<?php if($data["job"] == 2): echo ($data["grade"]); else: ?>略<?php endif; ?></td>
            </tr>  
            <tr>
			  <td>导师：<?php if($data["job"] == 2): echo ($data["tutor"]); else: ?>略<?php endif; ?></td>
			  <td>课题负责人：<?php echo ($data["principal"]); ?></td>
           </tr>  
            <tr>
			  <td>联系电话：<?php echo ($data["tel"]); ?></td>
			  <td>邮箱：<?php echo ($data["mail"]); ?></td>
            </tr>
	    <tr>
		    <td></td>	  <td style="font-size:1.3em;text-align:right"><a onClick="history.go(-1);" style="cursor:pointer;"><b>返回</b></td>
            </tr>
                    
          
		</table>
</html>