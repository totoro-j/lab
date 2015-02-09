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
    <!--搜索框-->
    <table>
    <form name="search" method="post" action="">
        <tr>
        <td>
        <select class="user_search">
            <option value="choose">----请选择----</option>
            <option value="author">上传者</option>
            <option value="time">上传时间</option>    
        </select>
        </td>
        <td><input type="text" name="search_input" /></td>
        <td><input type="submit" value="搜索" class="search_button" /></td>
        </tr> 
    </form>
     </table>
    <!--搜索框结束-->
    
    <!--图片开始-->
    <div class="detail" style="margin-top:20px;">
    <input type="checkbox" name="checkbox" /><span style="padding-left:10px;">上传时间:</span>
    <h3>图片简介</h3>
    <p>这是图片简介啦啦啦</p>
    <img style="width:800px;padding-top:20px;" src="__PUBLIC__/Images/1.jpg"/>
    </div>
    <!--执行选项-->
    <table style="margin-top:30px;">
    <tr>
      <td style="color:#219E69;"><input type="checkbox" id="all" style="margin-right:5px"/>全选</td>
      <td><input type="submit" value="恢复" class="search_button" id="recover" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-right:10px;"/></td>
      <td><input type="submit" value="删除" class="search_button" id="delete" style="width:200px;height:20px;-moz-box-shadow:2px 2px 3px #909090;-webkit-box-shadow:2px 2px 3px #909090;box-shadow:2px 2px 3px #909090;margin-left:10px;"/></td>
      <td><a style="margin-left:10px; color:#219E69;"  href="__APP__/Recycle/index">返回</a></td>
     </tr>
    </table>
<!--执行选项完-->
</body>
</html>