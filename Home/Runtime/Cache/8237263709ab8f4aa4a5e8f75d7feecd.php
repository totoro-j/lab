<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head><meta charset="UTF-8">
<title>个人信息界面</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/ucenter_info.css" />
</head>
<body>
  <div id="infor">
        <div class="can_1">个人信息</div>
        <form>
        <table class="info_detail">
        <tr>
          <th>用户名：</th>
          <td><?php echo ($data["username"]); ?><a href="__URL__/info_pwd" style="color:#23a96f;padding-left:10px;">修改密码</a>
        </tr>
        <tr>
          <th>姓名：</th>
          <td><?php echo ($data["truename"]); ?></td>
        </tr>
        <tr>
          <th>性别：</th>
          <td><?php if($data["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
        </tr>
        <tr>
          <th>单位：</th>
          <td><?php echo ($data["unit"]); ?></td>
        </tr>
        <tr>
          <th>院系部门：</th>
          <td><?php echo ($data["department"]); ?></td>
        </tr>
        <tr>
          <th>身份：</th>
          <td><?php switch($data["job"]): case "1": ?>教师<?php break; case "2": ?>学生<?php break; default: ?>其它<?php endswitch;?></td>
        </tr>
        <tr>
          <th>学历：</th>
          <td><?php switch($data["degree"]): case "1": ?>硕士<?php break; case "2": ?>博士<?php break; default: ?>略<?php endswitch;?></td>
        </tr>
        <tr>
          <th>导师：</th>
          <td><?php if($data["job"] == 2): echo ($data["tutor"]); else: ?>略<?php endif; ?></td>
        </tr>
        <tr>
          <th>年级：</th>
          <td><?php if($data["job"] == 2): echo ($data["grade"]); else: ?>略<?php endif; ?></td>
        </tr>
        <tr>
          <th>课题组负责人：</th>
          <td><?php echo ($data["principal"]); ?></td>
        </tr>
        <tr>
          <th>联系电话：</th>
          <td><?php echo ($data["tel"]); ?></td>
        </tr>
        <tr>
          <th>邮箱：</th>
          <td><?php echo ($data["mail"]); ?></td>
        </tr>
	<tr>
          <th>权限：</th>
          <td><?php switch($data["role"]): case "1": ?>正式用户<?php break; case "2": ?>预约管理员<?php break; case "3": ?>首页管理员<?php break; default: ?>未知<?php endswitch;?></td>
        </tr>
        </table> 
        <a href="__URL__/info_edit" class="info_change">修改联系方式</a>
        </form>
        </div>
  
</body>
</html>