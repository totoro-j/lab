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
            $("input[name='checkbox']").each(function(){this.checked=true;});
             
        }else{   
            $("input[name='checkbox']").each(function(){this.checked=false;});   
           
        }   
    }); 


});
</script>
</head>

<body>
    <h2 style="color:#219E69;margin:0 auto;margin-top:2px;font-weight:bold;">通知公告回收站</h2>
    <!--搜索框-->
    <table>
    <form name="search" method="post" action="">
        <tr>
        <td>
        <select class="user_search">
            <option value="choose">----请选择----</option>
            <option value="promulgator">发布者</option>
            <option value="time">发布时间</option>
        </select>
        </td>
        <td><input type="text" name="search_input" /></td>
        <td><input type="submit" value="搜索" class="search_button" /></td>
        </tr> 
    </form>
    </table>
    <!--详细表格-->
    <form name="notice_detail" method="post" action="">
    <table class="stastic_check" title="点击查看详情">
        <tr>
            <th></th>
            <th>公告</th>
            <th>发布者</th>
            <th>发布时间</th>
        </tr>

        <tr>
            <td><input type="checkbox"name="checkbox" ></td>
            <td style="width:300px;"><a href="#"></a></td>
            <td>王二小</td>
            <td>20130502</td>
        </tr>
    </table>
    <!--详细表格完-->
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

    </form>

</body>
</html>