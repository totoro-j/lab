<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="电子科技大学，核磁共振，研究中心">
<meta name="/x.copyright" content="作者：木盒设计工作室 版权归电子科技大学校艺术团木盒设计工作室所有">
<meta name="description" content="电子科技大学核磁共振研究中心">
<title>电子科技大学核磁共振研究中心</title>
<link rel="shortcut icon" href="__PUBLIC__/Images/20141203072011410_easyicon_net_128.ico"/>
<link rel="stylesheet" href="__PUBLIC__/Css/Index/base.css"/>

<!--navigation-->

<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Index/jquery.nicenav.js"></script>

<script type="text/javascript">
      $(function(){  
		$(".supnav").mouseover(function(){
			$(this).children("ul").delay(200).slideDown(100);
			
			
			})
		  
		  	
		$(".supnav").mouseleave(function(){
			$(this).children("ul").stop(true,true).slideUp(200);
			
			
			})
				
	
		
		  })

</script>
<!--navigation-->

</head>

<body>
<div id="header">
  <header>
    <!--页首开始-->
    <div id="topline">
    </div>
    <!--导航开始-->
    <div class="topWrap">
    <figure id="logo">
    <img class="logo" src="__PUBLIC__/Images/校徽.jpg" alt="校徽"/>
    </figure>
      <div id="headline">
        <h2>电子科技大学</h2>
        <h1>核磁共振研究中心</h1>
      </div>
    </div>
  <div class="navheader">
	
    <!--导航栏-->
    <div class="menu">
		<ul id="nav">
			<li class="supnav"><a class="cur" href="__URL__/index" style="background:#23a96f;color:#fff;">首页</a></li>
			<li class="supnav"><a href="__URL__/brief">科研团队</a></li>
			<li class="supnav"><a href="__URL__/listpaper">重要论文</a></li>
			<li class="supnav"><a href="#">开放基金</a></li>
			<li class="supnav"><a href="#">Lab年报</a>
               <ul class="subnav">
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                </ul>
      
            </li>
			<li class="supnav"><a href="#">成果展示</a>
          	    <ul class="subnav">
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                </ul>
      
            </li>
			<li class="supnav"><a href="#">关于实验室</a>
            	<ul class="subnav">
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                   <li><a href="#">二级菜单</a></li>
                </ul>
            </li>
		</ul>
		<div id="navLibg"></div>
	</div>
	
	<script type="text/javascript">
	$.nicenav(300);
	</script>
	
    <!--导航栏ends-->
    
</div>


</div>
 
  <!--导航结束-->
  </header>
  </div>
  <!--页首结束-->

<!--banner-->
<script type="text/javascript" src="__PUBLIC__/Js/Index/jquery.slideBox.js"></script>
<script>
jQuery(function($){
	$('#demo1').slideBox();
	});
</script>
<!--end banner-->
  <!--主体部分开始-->
  <div class="content">
  <!--图片展示开始-->
  <div id="demo1" class="slideBox">
  <ul class="items">
 <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#" title="<?php echo ($vo["metacontent"]); ?>"><img src="__PUBLIC__/Images/<?php echo ($vo["imgurl"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>    
  </ul>
</div>
  
  <!--图片展示结束-->
  <!--内容部分开始-->
  <div class="mainWrap">
  <!--焦点关注-->
          <div class="focus">
                <h2 class="focusSubtitle">
                <a href="__URL__/list1" target="_blank">焦点关注</a>
                </h2>
                <ul class="fouceList">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                             <div class="fdate">
                             <span><?php echo ($vo["time"]); ?></span>
			     <?php echo ($vo["date"]); ?>
                             </div>
                             <div class="focusctn">
                                  <h3>
					  <a href="__URL__/n/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a>
                                  </h3>
				  <p class="focusSummary"><?php echo ($vo["content"]); ?></p>
                             </div>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                 
             </ul>
             <span><a href="__URL__/list1" target="_blank">更多></a></span>
          </div> 
    <!--焦点关注结束-->
    <!--综合新闻开始-->
      <div class="news">
                  <h2 class="newsSubtitle"><a href="__URL__/list2" target="_blank">综合新闻</a></h2>
                  <ul class="newsList">
			  <?php if(is_array($cnew)): $i = 0; $__LIST__ = $cnew;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="li1_1">
		  <h3><a href="__URL__/n/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></h3>
		  <a href="__URL__/n/id/<?php echo ($vo["id"]); ?>" target="_blank"><img src="__PUBLIC__/Images/m_<?php echo ($vo["metaimg"]); ?>" id="img_2"  height="100"/></a>
		  <div class="newsSummary"><?php echo ($vo["content"]); ?>
                    </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>                   
                    </ul>
                    <span><a href="__URL__/list2" target="_blank">更多></a></span>                
          </div>
                             

    <!--综合新闻结束-->

       </div>
    <!--内容部分结束-->
    <!--通知公告开始-->
    <div class="inform">
    <div class="informWrap">
    <h2 class="informSubtitle"><a href="__URL__/list3" target="_blank">通知公告</a></h2>
    <ul class="ul_1">
	    <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="informSummary"><a href="__URL__/n/id/<?php echo ($vo["id"]); ?>" target="_blank">【<?php echo ($vo["date"]); ?>】<?php echo ($vo["content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    
    <ul class="ul_2">
	    <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="informSummary"><a href="__URL__/n/id/<?php echo ($vo["id"]); ?>" target="_blank">【<?php echo ($vo["date"]); ?>】<?php echo ($vo["content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    
   <span><a href="__URL__/list3" target="_blank" >更多></a></span>
    </div>
     
    </div>
    <!--通知公告结束-->
</div>
<!--主体部分结束-->
<!--页脚开始-->
   
  <footer>
  
  <!--友情链接1-->
  <div id="footerWrap">
  <div class="link">
  <h3>友情链接</h3>
    <ul>
      <li><a href="#">电子科大官网</a></li>
      <li><a href="#">生命学院官网</a></li>
      <li><a href="#">百度百科词条</a></li>
    </ul>
  </div>
  <div class="link">
  <h3>功能模块</h3>
    <ul>
      <li><a href="__ROOT__/default.php/Index/index">预约系统</a></li>
      <li><a href="__ROOT__/admin.php/Index/index">后台管理</a></li>
      <li><a href="#">联系站长</a></li>
    </ul>
  </div>
  <div class="link">
  <h3>关于实验室</h3>
    <ul>
      <li><a href="#">FAQ</a></li>
      <li><a href="#">手机版</a></li>
      <li><a href="#">投诉建议</a></li>
    </ul>
  </div>
  </div>
  <p><small>©  2014  MUHESTUDIO.net    All Rights Reserved.<br/>木盒设计工作室    版权所有</small>
  </p>
  </footer>
</body>
</html>