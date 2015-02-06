<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head><meta charset="UTF-8">
<title>机时预约界面</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/style.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/animate.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/animate.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/common.css" />
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/index.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js//tableRowCheckboxToggle.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.hDialog.js"></script>
<link rel="shortcut icon" href="__PUBLIC__/Images/logo.ico"/>
<!--拖动选择-->
<script language="JavaScript">
var curObj= null;
var isTrue =false;
function setSelectedBgColor()//设置选定行的背景色
{
	
	
	if(window.event.srcElement.tagName){
		isTrue =true;
 		if(window.event.srcElement.tagName=='TD'){ 
		//如果选中的是单元格
 		       curObj=window.event.srcElement.parentElement.firstChild;
		//获取其父级节点-表格行
 		       curObj.firstChild.checked=true;
		//设置背景色
  		 }
	}
	
	if(window.event.target.tagName){
		isTrue =true;
 		if(window.event.target.tagName=='TD'){ 
		//如果选中的是单元格
		       curObj=window.event.target.parentElement.firstChild;
		//获取其父级节点-表格行
  		      curObj.firstChild.checked=true;
		//设置背景色
 		  }
		  
	
		  
		  
}
	
	
}
</script>


<script type="text/javascript">
    function clearContent(myText){
		if(myText.style.color!="black"){
		myText.value='';
		myText.style.color="black";
		}
	}
</script>

<script type="text/javascript">
    function validateTel(){
		var myTel=document.getElementById("myTel");
		var val=myTel.value;
		if(val.length==0){
			myTel.value='请输入实验名称';
			myTel.style.color="#999";
		}
	}
</script>
<script type="text/javascript">
    function validateTel_s(){
		var myTel=document.getElementById("starttime");
		var val=myTel.value;
		if(val.length==0){
			myTel.value='开始时间';
			myTel.style.color="#999";
		}
	}
</script>
<script type="text/javascript">
    function validateTel_o(){
		var myTel=document.getElementById("overtime");
		var val=myTel.value;
		if(val.length==0){
			myTel.value='结束时间';
			myTel.style.color="#999";
		}
	}
</script>
<!--时间表隐藏-->

<!--页首时间段隐藏显示-->
 <script>setInterval("time.innerHTML=new Date().toLocaleString()+\'   星期\'+\'日一二三四五六\'.charAt(new Date().getDay());",1000);</script>
</head>

 <div id="header">
   		<div id="logo"><a href="__URL__/Index">核磁共振实验室预约系统</a><div id="time"></div></div>
        <div id="user">
   			<ul>
   				<li><em style='padding-left:15px;' class="t_user_ico1"></em>欢迎你，用户 <?php echo (session('username')); ?></li>
   				<li><a href="__APP__/Login/doLogout">退出登陆</a></li>
                <li><a href="__URL__/modify/id/<?php echo (session('id')); ?>">修改信息</a></li>
                <li><a href="__ROOT__/admin.php/Index">后台管理</a></li>
   				<li><a href="__ROOT__/index.php/Index">返回主页</a></li>
   			</ul>
   		</div>
   </div>
		<div id="nc">
   		<div id="noteboarder">
   			<!--公告栏-->
   			<div class="can">
		<div class="can_1">公告栏</div>
		<div class="canin">
			<article class="canin_1"></article>
			<h3 style='border:none;' class="canin_2"><?php echo ($time); ?><br>发布人：<?php echo ($editor); ?></h3>
            <p ><?php echo ($content); ?></p>
    </div>
	</div>
   		</div>
        
        <!--个人信息界面开始-->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Home/show.css" />
        <div id="infor">
        <div class="can_1">个人信息</div>
        	<table border='1' width="500" align='center' class="show_check">
			<?php if(is_array($dat)): $i = 0; $__LIST__ = $dat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
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
           
	    <td colspan="4" class="correct" style="font-size:1.1em;text-align:right;"><a href="__URL__/modify/id/<?php echo ($vo["id"]); ?>"><b>修改</b></a></td><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
        </div>
        </div>
 
   		<div id="clender">
   			 <div class="clearfix dome3_box">
             
             
             
             
        <!--日历 begin-->
	<div class="data_box" id="data_box">
    
    <!--！！！！！！！！这里是要向后台获取的一些数据       -->
    <input style="display:none" value="<?php echo ($time_disable_1); ?>" id="to_get_time_disable_1" />  <!--这个不可选时间是老师设定的 -->
    <input style="display:none" value="<?php echo ($time_disable_2); ?>" id="to_get_time_disable_2" />  <!--这个不可选时间是已经被预约的时间 -->
    <input style="display:none" value="<?php echo ($time_disable_3); ?>" id="to_get_time_disable_3" />  <!--这个不可选时间是自己已经预约了的时间 -->
    <input style="display:none" value="<?php echo ($time_users); ?>" id="to_get_time_users" />        <!--对应时间的用户和联系方式 -->
    <input style="display:none" value="<?php echo ($time_diabledReason); ?>" id="to_get_time_diabledReason" />    <!--老师设定的不可选时间对应的理由-->
    <input style="display:none" value="<?php echo ($ExperimentName); ?>" id="to_get_ExperimentName" />    <!--可以选择的实验-->
    
        <div class="can_1">机时预约</div>
  
       
    		<form name="reserveDate" action="__URL__/index" method="get" id="reserveDateForm" >
			<input type="text"  class="showDate" name="date" value="<?php echo ($time_date); ?>" />
	    	
            
    
            
            <!--这里把原来的Submit按钮去掉了，在上面加上了ajax进行尝试   	<input type="submit" style=""  id="toSubmitSelectedDate" value="查看所选日期可预约时间"/>   
            <div id="toSubmitSelectedDate" value="">查看所选日期可预约时间</div>   -->
    </form>
   	   <div style="width:300px;float:left;margin-left:50px;margin-top:4px">
        <span style="width:10px;height:22px;background:#fae0d7;display:block;float:left"></span><span style="float:left;line-height:22px;padding-left:5px;">已被预约</span>
        <span style="width:10px;height:22px;background:#dad9d9;display:block;float:left;margin-left:20px;"></span><span style="float:left;line-height:22px;padding-left:5px;">无效时间</span>
        <span style="width:10px;height:22px;background:#52cc94;display:block;float:left;margin-left:20px;"></span><span style="float:left;line-height:22px;padding-left:5px;">您的预约</span>
       </div>
        <form id="myForm">
        <input type="text"   name="toSubmitDate"  style="display:none" />
 			<p style="margin-left:-150px;">实验名称：</p><select name="expt_name" id="expt_name"></select>
            <p id="startTime">起始时间：</p>
            <select id="mySelectStartTime" name="startTime" style="size="5"">
			    <option value ="00:00:00">00:00</option>
 			    <option value ="00:30:00">00:30</option>
                <option value ="01:00:00">01:00</option>
                <option value ="01:30:00">01:30</option>
                <option value ="02:00:00">02:00</option>
 			    <option value ="02:30:00">02:30</option>
                <option value ="03:00:00">03:00</option>
                <option value ="03:30:00">03:30</option>
                <option value ="04:00:00">04:00</option>
 			    <option value ="04:30:00">04:30</option>
                <option value ="05:00:00">05:00</option>
                <option value ="05:30:00">05:30</option>
                <option value ="06:00:00">06:00</option>
 			    <option value ="06:30:00">06:30</option>
                <option value ="07:00:00">07:00</option>
                <option value ="07:30:00">07:30</option>
                <option value ="08:00:00">08:00</option>
                <option value ="08:30:00">08:30</option>
                <option value ="09:00:00">09:00</option>
                <option value ="09:30:00">09:30</option>
                <option value ="10:00:00">10:00</option>
 			    <option value ="10:30:00">10:30</option>
                <option value ="11:00:00">11:00</option>
                <option value ="11:30:00">11:30</option>
                <option value ="12:00:00">12:00</option>
                <option value ="12:30:00">12:30</option>
                <option value ="13:00:00">13:00</option>
 			    <option value ="13:30:00">13:30</option>
                <option value ="14:00:00">14:00</option>
                <option value ="14:30:00">14:30</option>
		<option value ="15:00:00">15:00</option>
 			    <option value ="15:30:00">15:30</option>
                <option value ="16:00:00">16:00</option>
                <option value ="16:30:00">16:30</option>
                <option value ="17:00:00">17:00</option>
 			    <option value ="17:30:00">17:30</option>
                <option value ="18:00:00">18:00</option>
                <option value ="18:30:00">18:30</option>
                <option value ="19:00:00">19:00</option>
                <option value ="19:30:00">19:30</option>
                <option value ="20:00:00">20:00</option>
                <option value ="20:30:00">20:30</option>
                <option value ="21:00:00">21:00</option>
 			    <option value ="21:30:00">21:30</option>
                <option value ="22:00:00">22:00</option>
                <option value ="22:30:00">22:30</option>
                <option value ="23:00:00">23:00</option>
                <option value ="23:30:00">23:30</option>

			</select>    
           
            
             <p id="startTime">结束时间：</p>
            <select id="mySelectEndTime" name="endTime">
				<option value ="00:00:00">00:00</option>
 			    <option value ="00:30:00">00:30</option>
                <option value ="01:00:00">01:00</option>
                <option value ="01:30:00">01:30</option>
                <option value ="02:00:00">02:00</option>
 			    <option value ="02:30:00">02:30</option>
                <option value ="03:00:00">03:00</option>
                <option value ="03:30:00">03:30</option>
                <option value ="04:00:00">04:00</option>
 			    <option value ="04:30:00">04:30</option>
                <option value ="05:00:00">05:00</option>
                <option value ="05:30:00">05:30</option>
                <option value ="06:00:00">06:00</option>
 			    <option value ="06:30:00">06:30</option>
                <option value ="07:00:00">07:00</option>
                <option value ="07:30:00">07:30</option>
                <option value ="08:00:00">08:00</option>
                <option value ="08:30:00">08:30</option>
                <option value ="09:00:00">09:00</option>
                <option value ="09:30:00">09:30</option>
                <option value ="10:00:00">10:00</option>
 			    <option value ="10:30:00">10:30</option>
                <option value ="11:00:00">11:00</option>
                <option value ="11:30:00">11:30</option>
                <option value ="12:00:00">12:00</option>
                <option value ="12:30:00">12:30</option>
                <option value ="13:00:00">13:00</option>
 			    <option value ="13:30:00">13:30</option>
                <option value ="14:00:00">14:00</option>
                <option value ="14:30:00">14:30</option>
                <option value ="15:00:00">15:00</option>
 			    <option value ="15:30:00">15:30</option>
                <option value ="16:00:00">16:00</option>
                <option value ="16:30:00">16:30</option>
                <option value ="17:00:00">17:00</option>
 			    <option value ="17:30:00">17:30</option>
                <option value ="18:00:00">18:00</option>
                <option value ="18:30:00">18:30</option>
                <option value ="19:00:00">19:00</option>
                <option value ="19:30:00">19:30</option>
                <option value ="20:00:00">20:00</option>
                <option value ="20:30:00">20:30</option>
                <option value ="21:00:00">21:00</option>
 			    <option value ="21:30:00">21:30</option>
                <option value ="22:00:00">22:00</option>
                <option value ="22:30:00">22:30</option>
                <option value ="23:00:00">23:00</option>
                <option value ="23:30:00">23:30</option>

			</select>    
            
            
            <!--提交日期函数-->
            <script type="text/javascript">
            
            function toConfirmTime(obj){
				var button=obj;
				
				
				var selectIndex = document.getElementById("expt_name").selectedIndex;//获得是第几个被选中了
			
			    var selectText = document.getElementById("expt_name").options[selectIndex].text; //获得被选中的项目的文本

				var selectStartTime1=$('select[name="startTime"]').val().split(":")[0];   
				var selectStartTime2=$('select[name="startTime"]').val().split(":")[1];
				var selectEndTime1=$('select[name="endTime"]').val().split(":")[0];
   				var selectEndTime2=$('select[name="endTime"]').val().split(":")[1];	
				//获取选择的时间			
				var lastingTime=(selectEndTime1-selectStartTime1)+(selectEndTime2-selectStartTime2)/60;   
		
				var $reserveDate=$('input[name="date"]').val();  //获取选择的日期
				$('input[name="toSubmitDate"]').val=$reserveDate;
				var selectStartTime=$('select[name="startTime"]').val();
				var selectEndTime=$('select[name="endTime"]').val();
				var result=confirm('请确认您的预约信息！'+String.fromCharCode(10)+String.fromCharCode(10)+'实验名称：'+selectText+String.fromCharCode(10)+'实验日期：'+$reserveDate+selectText+String.fromCharCode(10)+'实验起始时间：'+selectStartTime1+'：'+selectStartTime2+String.fromCharCode(10)+'实验结束时间：'+selectEndTime1+'：'+selectEndTime2+String.fromCharCode(10)+'实验时间总计：'+lastingTime);
				
				if(result==true){
					var obj=document.getElementById("myForm");
					obj.submit();
				}
				
				
				}
			
			
            
            </script>
            
            
            <div id="toSubmitSelectedDate" onClick="toConfirmTime(this)">确认</div>
           
               
            
            
       </form>
        
        
            <div class="sel_date dn">
                <div class="clearfix">
                    <span class="prev_y fl">&lt;&lt;</span><span class="prev_m fl">&lt;</span>
                    <span class="next_y fr">&gt;&gt;</span><span class="next_m fr">&gt;</span>
                    <div class="show_mn">
                        <input type="text" class="showDate2 year" value="选择年份" />
                        <span class="ml5 mr5">年</span>
                        <input type="text" class="showDate2 month" value="选择月份" />
                        <span class="ml5">月</span>
                    </div>              
                </div>
                <table class="data_table" style="position:relative;left:-53px;">
                    <thead>
                        <tr >
                            <td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td>1</td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!--日历 end-->
   		</div>
        
        
        
        
        
        <!--表格-->
   <div id="form">
      <!--表格-->
        <div id="tab1">
   			
		<h2 id="selectedDate"><?php echo ($time_date2); ?></h2>
            
			<div class="table" id="tab1_1">
            <div class="table_title" style="margin-left:55px;"><a><00:00~07:00></a></div>
             <table>
                <tr class="odd_row"><td id="00:30" class="time_period">00:00~00:30</td></tr>
                <tr class="even_row"><td id="00:30" class="time_period">00:30~01:00</td></tr>
                <tr class="odd_row"><td id="01:00" class="time_period">01:00~01:30</td></tr>
                <tr class="even_row"><td id="01:30" class="time_period">01:30~02:00</td></tr>
                <tr class="odd_row"><td id="02:00" class="time_period">02:00~02:30</td></tr>
                <tr class="even_row"><td id="02:30" class="time_period">02:30~03:00</td></tr>
                <tr class="odd_row"><td id="03:00" class="time_period">03:00~03:30</td></tr>
                <tr class="even_row"><td id="03:30" class="time_period">03:30~04:00</td></tr>
                <tr class="odd_row"><td id="04:00" class="time_period">04:00~04:30</td></tr>
                <tr class="even_row"><td id="04:30" class="time_period">04:30~05:00</td></tr>
                <tr class="odd_row"><td id="05:00" class="time_period">05:00~05:30</td></tr>
                <tr class="even_row"><td id="05:30" class="time_period">05:30~06:00</td></tr>
                <tr class="odd_row"><td id="06:00" class="time_period">06:00~06:30</td></tr>
                <tr class="even_row"><td id="06:30" class="time_period">06:30~07:00</td></tr>
                <tr class="odd_row_c"><td id="07:00" class="time_period">07:00~07:30</td></tr>
                <tr class="even_row_c"><td id="07:30" class="time_period">07:30~08:00</td></tr>
               
             </table>
            </div>
           
            <div class="table" id="tab1_2">
             <div class="table_title" style="margin-left:10px;"><a style="margin-top:-24px;margin-left:340px;"><07:00~22:00></a></div>
            <table>
   				 <tr class="odd_row"><td id="08:00" class="time_period">08:00~08:30</td></tr>
                <tr class="even_row"><td id="08:30" class="time_period">08:30~09:00</td></tr>
                <tr class="odd_row"><td id="09:00" class="time_period">09:00~09:30</td></tr>
                <tr class="even_row"><td id="09:30" class="time_period">09:30~10:00</td></tr>
                <tr class="odd_row"><td id="10:00" class="time_period">10:00~10:30</td></tr>
                <tr class="even_row"><td id="10:30" class="time_period">10:30~11:00</td></tr>
                <tr class="odd_row"><td id="11:00" class="time_period">11:00~11:30</td></tr>
                <tr class="even_row"><td id="11:30" class="time_period">11:30~12:00</td></tr>
                <tr class="odd_row"><td id="12:00" class="time_period">12:00~12:30</td></tr>
                <tr class="even_row"><td id="12:30" class="time_period">12:30~13:00</td></tr>
                <tr class="odd_row"><td id="13:00" class="time_period">13:00~13:30</td></tr>
                <tr class="even_row"><td id="13:30" class="time_period">13:30~14:00</td></tr>
                <tr class="odd_row"><td id="14:00" class="time_period">14:00~14:30</td></tr>
                <tr class="even_row"><td id="14:30" class="time_period">14:30~15:00</td></tr>
                <tr class="odd_row_b"><td id="15:00" class="time_period">15:00~15:30</td></tr>
                <tr class="even_row_b"><td id="15:30" class="time_period">15:30~16:00</td></tr>
       
       
              </table>
              </div>
             
            <div class="table" id="tab1_3"  for="modeCheckBox">
             <div class="table_title" style="margin-left:-35px;"><a style="margin-top:-24px;margin-left:680px;"><22:00~24:00></a></div>
               <table>
                <tr class="odd_row_b"><td id="16:00" class="time_period">16:00~16:30</td></tr>
                <tr class="even_row_i"><td id="16:30" class="time_period">16:30~17:00</td></tr>
                <tr class="odd_row_i"><td id="17:00" class="time_period">17:00~17:30</td></tr>
                <tr class="even_row_i"><td id="17:30" class="time_period">17:30~18:00</td></tr>
                <tr class="odd_row_s"><td id="18:00" class="time_period">18:00~18:30</td></tr>
                <tr class="even_row_s"><td id="18:30" class="time_period">18:30~19:00</td></tr>
                <tr class="odd_row"><td id="19:00" class="time_period">19:00~19:30</td></tr>
                <tr class="even_row"><td id="19:30" class="time_period">19:30~20:00</td></tr>
                <tr class="odd_row"><td id="20:00" class="time_period">20:00~20:30</td></tr>
                <tr class="even_row"><td id="20:30" class="time_period">20:30~21:00</td></tr>
                <tr class="odd_row"><td id="21:00" class="time_period">21:00~21:30</td></tr>
                <tr class="even_row"><td id="21:30" class="time_period">21:30~22:00</td></tr>
                <tr class="odd_row"><td id="22:00" class="time_period">22:00~22:30</td></tr>
                <tr class="even_row"><td id="22:30" class="time_period">22:30~23:00</td></tr>
                <tr class="odd_row"><td id="23:00" class="time_period">23:00~23:30</td></tr>
                <tr class="even_row"><td id="23:30" class="time_period">23:30~24:00</td></tr>
   			</table>
            </div>
   		</div>
  
  
       
   </div>
        <!--表格结束-->
        </div>
        
        
        <!--实验申请开始-->
       
 
 
 <div id="history">
        <div class="can_1">实验申请</div>
         <div class="demo">
			<a class="demo3" style="width:130px;cursor:pointer">实验项目申请</a>
			
			</div>
       
    </div>
 
 
 
 
 
 
 
 
 
 
 
 
 <!-- demo end -->
		<!-- 注意：请将要放入弹框的内容放在比如id="HBox"的容器中，然后将box的值换成该ID即可，比如：$(element).hDialog({'box':'#HBox'}); -->
		<div id="HBox" style="margin-top:-20px;">
		   <form action="__URL__/submit" method="get" id="reserveForm">
				<h3>实验项目申请</h3>
                <ul class="list">
					<li>
						<strong><font color="#ff0000">*</font>实验名称: </strong>
						<div class="fl"><textarea type="text" name="expt_name" value="" class="ipt expt_name" ></textarea></div>
					</li>
					<li>
						<strong><font color="#ff0000">*</font>实验内容</strong>
						<div class="fl"><textarea type="text" name="expt_detail" value="" class="ipt expt_detail" ></textarea></div>
					</li>
                    <li>
						<strong><font color="#ff0000">*</font>预计被试数</strong>
						<div class="fl"><input  type="text" name="expt_times" value="" class="ipt expt_times" /></div>
					</li>
			
				</ul> 
            
                 
                    <div class="buttons">
                    <div style="padding-left:100px;"><input type="submit" value="确认提交" class="submitBtn" /></div>
                    <div style="padding-left:100px;"><input type="submit" value="返回修改时间" class="resetBtn" /></div>
			
                    </div>
            </form>
		</div><!-- HBox end -->	




<!--这里开始是弹窗-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.hDialog.js"></script>
<script>
/*	$(function(){
			
			//这里是开始创建可选的实验名称
			time_ExperimentName=time_ExperimentName.split(":");
			N=time_ExperimentName.length;
			var obj=document.getElementById("expt_name");
			obj.options.length=0;  //初始化可选实验名称长度为0
			for(i=0;i<N;i++){
				obj.options.add(new Option(time_ExperimentName[i],i));
			}
			
		})
	*/	
</script>



<script type="text/javascript">

		
	
		
		//点击"提交"按钮之后触发函数
	
		
		function timeValid(){
			var selectStartTime1=$('select[name="startTime"]').val().split(":")[0]*2;   
			var selectStartTime2=$('select[name="startTime"]').val().split(":")[1]/30;
			var selectEndTime1=$('select[name="endTime"]').val().split(":")[0]*2;
			var selectEndTime2=$('select[name="endTime"]').val().split(":")[1]/30;
			var selectStartTime=selectStartTime1+selectStartTime2;    //获取用户选择的"起始时间"
			var selectEndTime=selectEndTime1+selectEndTime2;		  //获取用户选择的"结束时间"
		
			  
			var N=time_disable.length/6;
			var i=0;
			for(i=0;i<N;i++){                            //这里也是获取当天的无效时间段
				var start1=time_disable[6*i]/1*2;    
				var start2=time_disable[6*i+1]/30;   
				var end1=time_disable[6*i+3]/1*2;     
				var end2=time_disable[6*i+4]/39;   
				if((selectStartTime>=(start1+start2) && selectStartTime<=(end1+end2)) || (selectEndTime>=(start1+start2) && selectEndTime<=(end1+end2))){return false;} //若用户选择的时间段在无效时间段之内，则返回false
			}
		}
		
</script>
<script>

	
				
	//！！！！！！！！！！！！！！！！！！！！！时间框颜色函数以及创建可选实验名称	
	function SetupDateTable(){
		
	//先进行初始化
	var obj1=document.getElementsByClassName("time_period");
	var obj2=document.getElementsByTagName("option");   
	for(j=(start1+start2);j<(end1+end2);j++){    
		obj1[j].setAttribute('title'," "); 	  
		obj1[j].setAttribute('onclick',"javascript:function(){};"); 	
		obj1[j].style.cursor="default";			
		obj1[j].style.backgroundColor='#ffffff';
		obj2[j].removeAttribute('disabled');      
		obj2[j+48].removeAttribute('disabled');  	
	}
	
	//开始对 对应方框进行填色
	var time_disable_1=document.getElementById("to_get_time_disable_1").value;
	var time_disable_2=document.getElementById("to_get_time_disable_2").value;
	var time_disable_3=document.getElementById("to_get_time_disable_3").value;
	var time_users=document.getElementById("to_get_time_users").value;
	var time_disabledReason=document.getElementById("to_get_time_disabledReason").value;
	var time_ExperimentName=document.getElementById("to_get_time_ExperimentName").value;
	if(time_disable_1==0)
	{
		
		//若日期过期（即今天以前）
		var obj=document.getElementsByClassName("time_period");
		var obj2=document.getElementsByTagName("option");   
		for(i=0;i<obj.length;i++)
		obj[i].style.backgroundColor='#e4dfde';
		obj2[j].disabled="disabled";      //无效时间对应的option时间段不可选
		obj2[j+48].disabled="disabled";		
	}else if(time_disable_1!=1){
		
		//这里是对老师设置的不可选时间进行标注
		time_disable_1=time_disable_1.split(":");  //获取用户选择日期对应的不可选时间段，并进行切割
		time_disabledReason=time_disabledReason.split(":");
		var N=time_disable_1.length/6;
					
		for(i=0;i<N;i++){
			var start1=time_disable_1[6*i]/1*2;   
			var start2=time_disable_1[6*i+1]/30;   
			var end1=time_disable_1[6*i+3]/1*2;     
			var end2=time_disable_1[6*i+4]/30;   
			var obj1=document.getElementsByClassName("time_period");
			var obj2=document.getElementsByTagName("option");   
			for(j=(start1+start2);j<(end1+end2);j++){    //从"起始时间"开始把框弄灰，直到"结束时间"
				obj1[j].setAttribute('title',"不可选原因"+time_disabledReason[i]); 	  //鼠标放上去会显示理由
				obj1[j].setAttribute('onclick',"javascript:alert('不可选原因：'+time_disabledReason[i]);"); 	  //点击也会显示理由（通过"alert()"）
				obj1[j].style.cursor="hand";			
				obj1[j].style.backgroundColor='#e4dfde';
				obj2[j].disabled="disabled";      //无效时间对应的option时间段不可选
				obj2[j+48].disabled="disabled";					
			}
		 }   	
		 
		 //这里是其他人已预约时间
		time_disable_2=time_disable_2.split(":");  //获取用户选择日期对应的不可选时间段，并进行切割
		time_users=time_users.split(":");
		var N=time_disable_2.length/6;
					
		for(i=0;i<N;i++){
			var start1=time_disable_2[6*i]/1*2;   
			var start2=time_disable_2[6*i+1]/30;   
			var end1=time_disable_2[6*i+3]/1*2;     
			var end2=time_disable_2[6*i+4]/30;   
			var obj1=document.getElementsByClassName("time_period");
			var obj2=document.getElementsByTagName("option");   
			for(j=(start1+start2);j<(end1+end2);j++){   
				obj1[j].setAttribute('title',"姓名:"+time_users[2*i]+"  电话:"+time_users[2*i+1]); 	  //鼠标放上去会显示理由
				obj1[j].setAttribute('onclick',"javascript:alert('姓名：'+time_users[2*i]+'\\n电话：'+time_users[2*i+1]);"); 	  //点击也会显示理由（通过"alert()"）
				obj1[j].style.cursor="hand";	
				obj1[j].style.backgroundColor='#ffd3c3';
				obj2[j].disabled="disabled";      //无效时间对应的option时间段不可选
				obj2[j+48].disabled="disabled";					
			}
		 }   	
		 
		 //这里是已经被自己所预约的时间
		time_disable_3=time_disable_3.split(":");  //获取用户选择日期对应的不可选时间段，并进行切割
		var N=time_disable_3.length/6;
					
		for(i=0;i<N;i++){
			var start1=time_disable_3[6*i]/1*2;   
			var start2=time_disable_3[6*i+1]/30;   
			var end1=time_disable_3[6*i+3]/1*2;     
			var end2=time_disable_3[6*i+4]/30;   
			var obj1=document.getElementsByClassName("time_period");
			var obj2=document.getElementsByTagName("option");   
			for(j=(start1+start2);j<(end1+end2);j++){   
				obj1[j].setAttribute('title',"您已预约此时间段");
				obj1[j].setAttribute('onclick',"javascript:alert('您已预约此时间段');");
				obj1[j].style.backgroundColor='#52cc94';     //浅绿色
				obj2[j].disabled="disabled";       //无效时间对应的option时间段不可选
				obj2[j+48].disabled="disabled";					
			}
		 }   	
		 
	}
	

	
}
</script>

<script>
$(function(){
	var $el = $('.dialog');
	$el.hDialog();

	
	//改变宽和高
	$('.demo3').hDialog({width:550,height: 600});
	
	
	
	
	//让弹框实时显示选择的日期与时间
	$('#HBox').click(function(){
	
		var selectStartTime1=$('select[name="startTime"]').val().split(":")[0];   
		var selectStartTime2=$('select[name="startTime"]').val().split(":")[1];
		var selectEndTime1=$('select[name="endTime"]').val().split(":")[0];
   		var selectEndTime2=$('select[name="endTime"]').val().split(":")[1];	
		//获取选择的时间			
		var lastingTime=(selectEndTime1-selectStartTime1)+(selectEndTime2-selectStartTime2)/60;   
		
		var $reserveDate=$('input[name="date"]').val();  //获取选择的日期
		
		var selectStartTime=$('select[name="startTime"]').val();
		var selectEndTime=$('select[name="endTime"]').val();
		$('textarea[name="reserveDate"]').val($reserveDate);
		$('#submmit_selectedStartTime').val(selectStartTime);
		$('#submmit_selectedEndTime').val(selectEndTime);


		
		
		 
		$('#reserveDate').text($reserveDate);               //显示预约日期            
		$('#reserveTime').text(selectStartTime1+":"+selectStartTime2+"至"+selectEndTime1+":"+selectEndTime2);    //显示预约时间段
		
		$('#lastingTime').text(lastingTime);     //显示预约时间总长
		
		})

	

	
	//提交并验证表单
	$('.submitBtn').click(function() {
		
		
		
		var $expt_name = $('.expt_name').val();
		var $expt_detail = $('.expt_detail').val(); 
		var $expt_charge = $('.expt_charge').val();
		var $expt_times = $('.expt_times').val();
		var $dateFortimeDisable=$('input[name="date"]').val();
		var $startTime=$('select[name="startTime"]').val();
		var $endTime=$('select[name="startTime"]').val();
		var $lastingTime = $('#lastingTime').val();
				

		
		if($lastingTime<=0 || !timeValid()){
			$.tooltip('时间选择错误，请返回重新选择...');
		}else if($expt_detail == ''){
			$.tooltip('实验描述还没填呢...'); $expt_detail.focus();
		}else if($expt_charge == ''){
			$.tooltip('实验负责人还没填呢...'); $expt_charge.focus();
		}else if($expt_times == ''){
			$.tooltip('预计被试数还没填呢...'); $expt_times.focus();
		}else if($expt_name == ''){
			$.tooltip('实验名称还没填写呢...'); $expt_name.focus();
		}else{

			//这里传时间段
		

			
			
			$("#reserveForm").submit();
					
			
			$.tooltip('提交成功，2秒后自动关闭',2000,true);
			setTimeout(function(){ 
				$el.hDialog('close',{box:'#HBox'}); 
			},2000);
		}
	});
	
	$('.resetBtn').click(function() {
		
		$el.hDialog('close',{box:'#HBox'}); 
		
		})
	
	
})
</script>
 
 
 
 	

   <div id="footer"><p><small>©  2014  MUHESTUDIO.net    All Rights Reserved.<br/>木盒设计工作室    版权所有</small></div>
</html>