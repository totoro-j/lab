<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/modify.css" />
       
		<title>Modify</title>

	
		<script>
		function submit1(){
			var phoneNum=document.all.tel.value;
			var reg=/^1\d{10}$/;
			var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/;
			var mail=document.all.mail.value;
			if(phoneNum.length==0){
				alert("电话不能为空！");
				return false;
			}else if(!reg.test(phoneNum))
			{
				alert("请输入11位有效手机号码！");
				return false;
			}else if(mail.length==0){
				alert("邮箱不能为空！");
				return false;
			}else if(!re.test(mail)){
				alert("请输入正的确邮箱！");
				return false;
			}else if(document.all.password.value.length==0){
				alert("密码不能为空！");
				return false;
			}else if(document.all.password.value.length<6){
				alert("密码长度小于6位，请重新填写！");
				return false;
			}else if(document.all.password.value!=document.all.repassword.value  ){
				alert("两次密码不一致！");
				return false;
			}

		
		}	
		</script>
	</head>
	<body>
      <table  border='1' width="500" align='center' class="show_check">
		<form action="__URL__/update" method='post' id="myForm">
			<input type='hidden' name='id' value="<?php echo ($data["id"]); ?>"/>
            <tr><th colspan="2">个人信息</th></tr>
            <tr>
            <td>
			用户名：<?php echo ($data["username"]); ?><br/>
            </td>
            <td>
			真实姓名：<?php echo ($data["truename"]); ?><br/>
            </td>
            </tr>
            <tr>
            <td>
			性别：   <?php if($data["sex"] == 1): ?>男
				<?php else: ?>
				女<?php endif; ?>
                </td>
                <td>
			单位：<?php echo ($data["unit"]); ?><br/>
			</td>
            </tr>
            <tr>
            <td>
            学院（部门）：<?php echo ($data["department"]); ?><br/></td>
            <td>
			身份：   <?php if($data["job"] == 1): ?>教师<?php endif; ?>
				<?php if($data["job"] == 2): ?>学生<?php endif; ?>
				<?php if($data["job"] == 0): ?>其他<?php endif; ?>
               </td>
               </tr>
               <tr><td>
                        联系电话:<input type="text" name='tel' value="<?php echo ($data["tel"]); ?>"/></td>
                        <td>
			邮箱:<input type="text" name='mail' value="<?php echo ($data["mail"]); ?>"/></td>
                <tr>
                <tr><td colspan="2">
			密码：<input type="password" name='password' value="<?php echo ($data["password"]); ?>"/>
			请再次输入密码：<input type="password" name='repassword' value="<?php echo ($data["password"]); ?>"/>
			<input  class="button" type="submit" value="提交修改" onClick="return submit1();"/>
		</form>
        </td>
        </tr>
        </table>
	</body>
</html>