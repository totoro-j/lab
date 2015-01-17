<?php if (!defined('THINK_PATH')) exit();?>	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/show.css" />
	<table border='1' width="500" align='center' class="show_check">
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
             <th colspan="4">个人信息</th>
           </tr>  
            <tr>
			  <td>用户名：<?php echo ($vo["username"]); ?></td>
			  <td>姓名：<?php echo ($vo["truename"]); ?></td>
            </tr>  
            <tr>
			  <td>性别：<?php if($vo["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
			  <td>单位：<?php echo ($vo["unit"]); ?></td>
            </tr>  
            <tr>

			  <td>学院(部门)：<?php echo ($vo["department"]); ?></td>
			  <td>身份：<?php switch($vo["job"]): case "1": ?>教师<?php break; case "2": ?>学生<?php break; default: ?>其它<?php endswitch;?></td>
            </tr>  
            <tr>
			  <td>学历：<?php if($vo["degree"] == 2): ?>博士<?php else: ?>硕士<?php endif; ?></td>
			  <td>年级：<?php echo ($vo["grade"]); ?></td>
            </tr>  
            <tr>
			  <td>导师：<?php echo ($vo["tutor"]); ?></td>
			  <td>课题负责人：<?php echo ($vo["principal"]); ?></td>
           </tr>  
            <tr>
			  <td>联系电话：<?php echo ($vo["tel"]); ?></td>
			  <td>邮箱：<?php echo ($vo["mail"]); ?></td>
            </tr>
           
	    <td colspan="4" class="correct" style="font-size:1.2em"><a href="__URL__/modify/id/<?php echo ($vo["id"]); ?>"><b>修改</b></a></td><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>