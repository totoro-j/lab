<?php
	//1.确定应用名称 App
	define('APP_NAME','Index');
	//2.确定应用路径
	define('APP_PATH','./Index/');
	//3.开启调试模式
	define('APP_DEBUG',true);
	//4.应用核心文件
	require './ThinkPHP/ThinkPHP.php';
	define('BUILD_DIR_SECURE',true);
	define('DIR_SECURE_FILENAME', 'index.html,index.htm');
	define('DIR_SECURE_CONTENT', '您访问了错误页面!');
?>
