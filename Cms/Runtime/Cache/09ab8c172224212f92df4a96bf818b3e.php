<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
    #img{height:22px; border:#000 2px solid}
    #button{height:30px; width:100px;}
</style>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/ListBanner.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/hDialog.css" />



<title>bannner</title>


</head>

<body>

 <h2 style="color:#219E69;margin:0 auto;font-weight:bold;text-align:left;font-size:24px;">滚动图片</h2>
<!--container begin-->
<div id="edit1" class="container_wrapper">
<!--each edit section begin-->
<!--section No.1 begin-->
<!--显示已上传图片-->

  <h3 style="margin-left:20px;color:#000;">Banner栏</h3>
     <table style="margin:0 auto;">
     <tr><td>
	<h2 style="color:#0f0f0f;">已上传图片</h2>
	 <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="edit3" class="edit_section_pic_describ" style="background:#E9FAF1;margin-top:10px;padding-bottom:10px;">
     
     
    
     
    
   
    <div class="edit_section_pic">
	    <h2>图片简介：</h2> <p><?php echo ($vo["metacontent"]); ?></p>
	     </br>
       </br>
	    <?php if(!empty($data)): ?><img src="__PUBLIC__/Images/<?php echo ($vo["imgurl"]); ?>" /><?php endif; ?>
	    </br>

 
       </div>
	     </br>
       <div ><a href="__URL__/ListBannerDel/id/<?php echo ($vo["id"]); ?>)" class="delete"  onClick="return confirm('确认删除？')">删除</a>	
	      
       </div>
     
       <div  style="width:200px;height:21px;display:block;margin-left:500px;font-size:11px;color:#666;"><?php echo ($vo["date"]); ?></div>
    
       
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </td>
      </tr>

      
       </table>
       <div class="banner_show" style="margin-left:20px;color:#666;"><?php echo ($show); ?></div>
  
  <!--上传图片-->
  <div id="edit2" class="edit_section_pic_describ">
     <h2 style="font-size:23px;font-weight:bold;float:left;color:#0f0f0f;">上传新图片</h2>
   </br>
     
        <div style="font-size:12px;color:#999;" >上传允许文件类型：gif png jpg 图像文件。建议分辨率1080*360</div></br>
  <div style="background:#E9FAF1;padding-left:50px;padding-right:120px;padding-top:30px;padding-bottom:50px;">
    <form action="__URL__/ListBannerupload" method="post" enctype="multipart/form-data">
    <input type="text" name="metacontent" placeholder="banner文字描述" maxlength="40" style="margin-bottom:20px;"/>
    <input type="file" name="imgurl" style="border:none;" id="metaimg"/>
    <input type="submit" value="上传" style="float:right;" id="button"> 
     </form> 
 </div>
 </div>
</div>

</body>
</html>