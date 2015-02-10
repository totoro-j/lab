<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>项目回收站</title>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/stastic_view.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/recycle_detail.css" />
<script type="text/javascript">
$(document).ready(function(){


  $("#all").click(function(){   
        if(this.checked){   
            $("input[name='checkbox']").each(function(){this.checked=true;});
             
        }else{   
            $("input[name='checkbox']").each(function(){this.checked=false;});   
           
        }   
    }); 


});
</script>
</head>

<body>
    <h2 style="color:#219E69;margin:0 auto;margin-top:2px;font-weight:bold;">滚动图片回收站</h2>

    <!--图片开始-->
    <div class="detail" style="margin-top:20px;">
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="checkbox" /><span style="padding-left:10px;">上传时间:<?php echo ($vo["date"]); ?></span>
    <h3>图片简介</h3>
    <p><?php echo ($vo["metacontent"]); ?></p>
    <img style="width:800px;padding-top:20px;" src="__PUBLIC__/Images/<?php echo ($vo["imgurl"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="banner_show" style="margin-left:20px;color:#666;"><?php echo ($show); ?></div>
    <!--执行选项-->
    <table style="margin-top:30px;">
    <tr>
      <td style="color:#219E69;"><input type="checkbox" id="all" style="margin-right:5px"/>全选</td>
      <td><input type="submit" value="删除所选" class="search_button" id="delete" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-right:10px;"/></td>
      <td><a style="margin-left:10px; color:#219E69;"  href="__APP__/Recycle/index">返回</a></td>
     </tr>
    </table>
<!--执行选项完-->
</body>
</html>