<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/ListFAN.css" />
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Admin/hDialog.css" />
<script type="text/javascript" src="__PUBLIC__/Js/jquery.hDialog.js"></script>


</head>

<body>

<div style="width:569px;height:600px;margin:0 auto;margin-top:20px;border:1px solid #ccc;border-radius:5px; box-shadow:1px 1px 5px #ccc;">
	<h3>显示信息</h3>
      <form action="__URL__/ListFocusIsshowupload" method="post" name='myForm' enctype="multipart/form-data">
	      <input type='hidden' name='id' value="<?php echo ($data2["id"]); ?>"/>
       <td><input type="file" name="metaimg" id="metaimg"/></td>
       
							
       <td><input type="submit" value="上传" id="button" style="width:80px;padding:6px 4px; margin-left:20px;background:#15a76e;color:#eee;border:none;padding: 4px 10px;border-radius:3px;"/></td>
    </form>
     <div align="center" style="margin-top:50px;">建议上传图片尺寸300p*100px</div>
    <?php if(!empty($data2)): ?><img onerror="this.src='__PUBLIC__/Images/bg.png'" src="__PUBLIC__/Images/m_<?php echo ($data2["metaimg"]); ?>"/><?php endif; ?>    
</div>		
</body>
</html>