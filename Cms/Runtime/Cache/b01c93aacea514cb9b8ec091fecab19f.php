<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>项目回收站</title>

<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/stastic_view.css" />
<script type="text/javascript">
$(document).ready(function(){


  $("#all").click(function(){   
        if(this.checked){   
            $("input[name='recover[]']").each(function(){this.checked=true;});
             
        }else{   
            $("input[name='recover[]']").each(function(){this.checked=false;});   
           
        }   
    }); 


});
</script>
</head>

<body>
    <h2 style="color:#219E69;margin:0 auto;margin-top:2px;font-weight:bold;">论文回收站</h2>
    <!--搜索框-->
    <table>
    <form name="search" method="post" action="">
        <tr>
        <td>
        <select class="user_search">
            <option value="choose">----请选择----</option>
            <option value="title">标题</option>
            <option value="author">作者</option>
            <option value="time">上传时间</option>
            
        </select>
        </td>
        <td><input type="text" name="search_input" /></td>
        <td><input type="submit" value="搜索" class="search_button" /></td>
        </tr> 
    </form>
    </table>
    <!--详细表格-->
    <form name="myForm" method="post" action="__URL__/recover">
    <table class="stastic_check" title="点击查看详情">
        <tr>
            <th></th>
            <th>标题</th>
            <th>作者</th>
            <th>简介</th>
            <th>上传时间</th>
	    <th>删除时间</th>
            <th>详情</th>
        </tr>

        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>		
		<td><input type="checkbox" name="recover[]" value="<?php echo ($vo["id"]); ?>"></td>
            <td ><?php echo ($vo["title"]); ?></td>
            <td><?php echo ($vo["editor"]); ?></td>
            <td><?php echo ($vo["metacontent"]); ?></td>
            <td><?php echo ($vo["date"]); ?></td>
            <td><?php echo ($vo["deltime"]); ?></td>
            <td style="width:300px;"><a href="__URL__/recycle_detail/id/<?php echo ($vo["id"]); ?>">详情</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="article_show" style="margin-left:40px;"><?php echo ($show); ?></div>
    <!--详细表格完-->
    <!--执行选项-->
    <table style="margin-top:30px;">
    <tr>
      <td style="color:#219E69;"><input type="checkbox" id="all" style="margin-right:5px"/>全选</td>
      <td><input type="submit" value="恢复" class="search_button" id="rec" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-right:10px;"/></td>
      <td><input value="删除" class="search_button" id="delete" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-left:10px;"/></td>
      <td><a style="margin-left:10px; color:#219E69;"  href="__APP__/Recycle/index">返回</a></td>
     </tr>
    </table>
<!--执行选项完-->

    </form>

</body>
</html>