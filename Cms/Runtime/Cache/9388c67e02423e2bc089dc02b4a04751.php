<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/hDialog.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/ListNotice.css" />
<title>通知公告</title>


</head>

<body>
 <h2 style="color:#219E69;margin:0 auto;font-weight:bold;text-align:left;font-size:24px;">通知公告</h2>
<!--container begin-->
<div id="edit_focus1" class="container_wrapper" >
<!--each edit section begin-->
<!--section No.1 begin-->
  <h3 style="margin-left:50px;color:#000;">通知公告</h3> 

  <div id="edit_focus2"class="edit_section_pic_describ">
       <div class="edit_section_describ" style="background-color: #E9FAF1;padding-top:30px;padding-left:30px;padding-right:30px;">
 <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type='hidden' name='id' value="<?php echo ($vo["id"]); ?>"  />
 <p style="color:#1a1a1a;font-size:15px;"><?php echo ($vo["title"]); ?></p>
            <div ><a href="__URL__/ListNoticeDel/id/<?php echo ($vo["id"]); ?>" class="delete"  onclick="return confirm('确认后将删除')">删除</a></div>
	    <div type="text" class="describ" ><?php echo ($vo["content"]); ?><div style="font-size:11px;float:right;margin-top:20px;color:#666;"><?php echo ($vo["date"]); ?></div>   
    </div><?php endforeach; endif; else: echo "" ;endif; ?> 
    </div>
   <div class="notice_show" style="float:left;color:#666;"><?php echo ($show); ?></div>  
  

    

   <div id="edit_focus"class="edit_section_pic_describ" >
     <form method="post" action="__URL__/ListNoticeadd/">
     <div class="edit_section_describ">
	     <p style="color:#23a96f;">添加公告: </p></br>
	 <input type="text" class="describ2" placeholder="标题" style="margin-left:-50px;margin-top:20px;height:15px;width:800px;padding:8px 8px;"name="title"/>
      <textarea type="text" class="describ2" placeholder="公告内容..." name="myEditor"></textarea>        
     </div>
     <input type="submit" class="edit_section_describ_btn" value="提交文字"/>
     </form>
      
  </div>
  
  </div>

   


   

</body>
</html>