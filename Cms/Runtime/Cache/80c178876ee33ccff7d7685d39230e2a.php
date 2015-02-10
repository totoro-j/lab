<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>论文列表</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/ListFAN.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/hDialog.css" />
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
</head>

<body>
 <h2 style="color:#219E69;margin:0 auto;font-weight:bold;text-align:left;font-size:24px;">论文列表</h2>
    <div class="container">
       <h3 style="color:#000;">论文列表</h3>
          
           <table class="article_list">
           
           <caption class="add_article"><a href="__URL__/ListArticleEdit/">上传文章</a></caption>
           
	  
	  
	  
	   <tr class="article_table"><th><a><center style="color:#1a1a1a;font-size:18px;">文章标题</center></a></th><td><a>操作</a></td></tr>
              <tr class="no_article"><th colspan="4" style="text-align:center;color:#ccc;fontsize:10px;display:none;">暂无文章</th></tr>
           <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="article_table"><th><a href="__URL__/ListArticleView/id/<?php echo ($vo["id"]); ?>" style="color:#1a1a1a;font-size:15px;"><?php echo ($vo["title"]); ?></a></th><td><a href="__URL__/ListArticledel/id/<?php echo ($vo["id"]); ?>" class="delete"  onClick="return confirm('确认删除？')">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="article_show"style="margin-left:40px;color:#666;"><?php echo ($show); ?></div>
    </div>
</body>
</html>