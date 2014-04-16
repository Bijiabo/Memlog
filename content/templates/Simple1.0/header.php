<?php
/*
Template Name:
Description:名字：简约
Version:版本：simple1.0
Author:微语日记
Author Url:http://ma-am.cn
Sidebar Amount:0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/lrtk.css" />
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/pptBox.js"></script>

<!--[if IE 6]>
<script src="<?php echo TEMPLATE_URL; ?>iefix.js" type="text/javascript"></script>
<![endif]-->
<?php doAction('index_head'); ?>
<style>
body,.w-icon{background-color:#E6E6E6;}
.box{border-bottom-color:#FFFFFF;}
h1 a{color:#333;}
.m-nav a,.m-page a{color:#666;}
.cont{color:#666;}
.cont a:hover,.info a:hover{color:#903;}
.m-nav a:hover,.select,.m-page a:hover{color:#333;}
</style>
</head>
<body>
<div class="g-doc">
<!--head-->
<a name="head"></a>
<div class="g-hd">
	<div class="box m-tit">
    	<h2><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h2>
		<h3><?php echo $bloginfo; ?></h3>

    </div>
    <div class="box box-do m-about">
    	<div class="logo">
<?php
//widget：blogger
	global $CACHE;
	$user_cache = $CACHE->readCache('user');?>
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
    	</div>
    	<p><?php echo $user_cache[1]['des']; ?></p>
    </div>
    <div class="box menu">
        <div class="m-sch">
            <form action="<?php echo BLOG_URL; ?>index.php" method="get"><input id="search_content" class="sch" type="search" name="keyword" placeholder="Search" /></form>

        </div>
    	<div class="m-nav">
		<div>
		<?php blog_navi();?>
        </div>
    </div><hr size=1><br>
     <script>
     var box =new PPTBox();
     box.width = 660; //宽度
     box.height = 166;//高度
     box.autoplayer = 3;//自动播放间隔时间

     //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
     box.add({"url":"<?php echo TEMPLATE_URL; ?>images/img/tu1.jpg","href":"#","title":"四月，你好"})
     box.add({"url":"<?php echo TEMPLATE_URL; ?>images/img/tu2.jpg","href":"#","title":"又是一个毕业季！"})
     box.add({"url":"<?php echo TEMPLATE_URL; ?>images/img/tu3.jpg","href":"#","title":"做一个有态度的博客"})
     box.show();
    </script>
		<div id="news"><?php echo index_t(1); ?></div>
    </div>
</div>
<!--/head-->
