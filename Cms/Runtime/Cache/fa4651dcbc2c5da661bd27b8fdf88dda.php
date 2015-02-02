<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻列表</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/ListFAN.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/hDialog.css" />
<script type="text/javascript" src="__PUBLIC__/Js/Index/jquery.hDialog.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>


</head>

<body>
 <h2 style="color:#219E69;margin:0 auto;font-weight:bold;text-align:left;font-size:24px;">综合新闻</h2>
    <div class="container">
       <h3>新闻列表</h3>
          
           <table class="article_list">
           
           <caption class="add_article"><a href="__URL__/ListNewsEdit/">上传文章</a></caption>
	  
	   <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["isshow"] == 1): ?><tr class="article_table"><th><a href="__URL__/ListNewsView/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></th><td><a href="__URL__/ListNewsIsshowCancel/id/<?php echo ($vo["id"]); ?>" class="opendiv3" id="setnews3">取消显示到首页</a></td><td><a href="__URL__/ListNewsDel/id/<?php echo ($vo["id"]); ?>)" class="delete"  onClick="return confirm('确认删除？')">删除</a></td></tr>                              	  
	   <?php else: ?>	  
	   <tr class="article_table"><th><a href="__URL__/ListNewsView/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></th><td><a href="__URL__/ListNewsIsshow/id/<?php echo ($vo["id"]); ?>" class="opendiv3" id="setnews3">显示到首页</a></td><td><a href="__URL__/ListNewsDel/id/<?php echo ($vo["id"]); ?>)" class="delete"  onClick="return confirm('确认删除？')">删除</a></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?> 
              
              <tr class="no_article"><th colspan="4" style="text-align:center;color:#ccc;fontsize:10px;display:none;">暂无文章</th></tr>
            
           </table>
	   <div class="news_show"><?php echo ($show); ?></div>
</body>
</html>