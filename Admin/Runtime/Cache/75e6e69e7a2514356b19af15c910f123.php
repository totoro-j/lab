<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head><meta charset="utf-8"><title>论文列表</title><link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/ListFAN.css" /><script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script></head><body><div class="container"><h3>论文列表</h3><table class="article_list"><caption class="add_article"><a href="__URL__/ListArticleEdit/">上传文章</a></caption><tr class="article_table"><th><a><center>文章标题</center></a></th><td><a>操作</a></td></tr><tr class="no_article"><th colspan="4" style="text-align:center;color:#ccc;fontsize:10px;display:none;">暂无文章</th></tr><?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="article_table"><th><a href="__URL__/ListArticleView/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></th><td><a href="__URL__/ListArticledel/id/<?php echo ($vo["id"]); ?>" class="delete"  onClick="return confirm('确认删除？')">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table></div></body></html>