<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta name="author" content="emlog" />
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
    <title>管理中心 - <?php echo Option::get('blogname'); ?></title>
    <link rel="stylesheet" href="./views/css/bootstrap.min.css">
    <link rel="stylesheet" href="./views/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="./views/css/todc-bootstrap.min.css"/>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="./views/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./views/css/main.css"/>
<!--    <link href="./views/style/--><?php //echo Option::get('admin_style');?><!--/style.css" type=text/css rel=stylesheet>-->
<!--    <link href="./views/css/css-main.css" type=text/css rel=stylesheet>-->
    <script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js"></script>
    <script src="./views/js/jquery.cookie.js"></script>
<!--    <script src="./../include/lib/js/jquery/plugin-interface.js"></script>-->
    <script type="text/javascript" src="./views/js/common.js"></script>
    <?php doAction('adm_head');?>
</head>
<body>
<div id="mainpage">
    <nav id="headerbar" class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header" style="padding: 6px 0;">
                <button id="headerbar-menubutton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <!--<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>-->
                    <span class="fa fa-bars fa-2x"></span>
                </button>
                <a class="navbar-brand" href="./">
                    <?php
                    $blog_name = Option::get('blogname');
                    echo empty($blog_name) ? '我的站点' : subString($blog_name, 0, 24);
                    ?>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="margin: 6px 0;">
                    <li><a href="./">管理首页</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">内容 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="menu_log"><a href="write_log.php">写文章</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="admin_log.php?pid=draft">
                                    草稿箱
                                    <span class="text-orange pull-right">
                                    <?php
                                    if (ROLE == ROLE_ADMIN){
                                        echo $sta_cache['draftnum'] == 0 ? '' : '('.$sta_cache['draftnum'].')';
                                    }else{
                                        echo $sta_cache[UID]['draftnum'] == 0 ? '' : '('.$sta_cache[UID]['draftnum'].')';
                                    }
                                    ?>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <?php
                                $checknum = $sta_cache['checknum'];
                                if (ROLE == ROLE_ADMIN && $checknum > 0):
                                    $n = $checknum > 999 ? '...' : $checknum;
                                    ?>
                                    <span class="text-orange pull-right">
                                        <div class="notice_number"><a href="./admin_log.php?checked=n" title="<?php echo $checknum; ?>篇文章待审"><?php echo $n; ?></a></div>
                                    </span>
                                <?php endif; ?>
                                <a href="admin_log.php">文章管理</a>
                            </li>
                            <?php if (ROLE == ROLE_ADMIN):?>
                                <li id="menu_tw"><a href="twitter.php">微语</a></li>
                                <li class="divider"></li>
                                <li><a href="tag.php">标签</a></li>
                                <li><a href="sort.php">分类</a></li>
                            <?php endif;?>
                        </ul>
                    </li>

                    <li id="menu_cm"><a href="comment.php">评论</a> </li>
                    <?php
                    $hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
                    if ($hidecmnum > 0):
                        $n = $hidecmnum > 999 ? '...' : $hidecmnum;
                        ?>
                        <div class="notice_number"><a href="./comment.php?hide=y" title="<?php echo $hidecmnum; ?>条评论待审"><?php echo $n; ?></a></div>
                    <?php endif; ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">设置 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php if (ROLE == ROLE_ADMIN):?>
                                <li id="menu_widget"><a href="widgets.php" >侧边栏</a></li>
                                <li id="menu_navbar"><a href="navbar.php" >导航</a></li>
                                <li id="menu_page"><a href="page.php" >页面</a></li>
                                <li class="divider"></li>
                                <li id="menu_link"><a href="link.php">链接</a></li>
                                <li id="menu_user"><a href="user.php" >用户</a></li>
                                <li id="menu_data"><a href="data.php">数据</a></li>
                                <li class="divider"></li>
                                <li id="menu_plug"><a href="plugin.php">插件</a></li>
                                <li id="menu_tpl"><a href="template.php">模板</a></li>
                                <li id="menu_store"><a href="store.php">应用</a></li>
                                <?php if (!empty($emHooks['adm_sidebar_ext'])): ?>
                                    <li class="sidebarsubmenu" id="menu_ext"><a class="menu_ext_minus">扩展功能</a></li>
                                <?php endif;?>
                                <li class="divider"></li>
                            <?php endif;?>
                            <li><a href="./blogger.php" title="<?php echo subString($user_cache[UID]['name'], 0, 12) ?>">个人设置</a></li>
                            <?php if (ROLE == ROLE_ADMIN):?>
                                <li><a href="configure.php">网站设置</a></li>
                            <?php endif;?>
                        </ul>
                    </li>
                    <?php if (ROLE == ROLE_ADMIN):?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">拓展 <b class="caret"></b></a>
                            <ul class="dropdown-menu" id="extend_mg">
                                <?php doAction('adm_sidebar_ext'); ?>
                            </ul>
                        </li>
                    <?php endif;?>
                </ul>
                <ul class="nav navbar-nav pull-right" style="margin: 6px 0;">
                    <li>
                        <a href="../" target="_blank" title="在新窗口浏站点">
                            <?php
                            $blog_name = Option::get('blogname');
                            echo empty($blog_name) ? '查看我的站点' : subString($blog_name, 0, 24);
                            ?>
                        </a>
                    </li>
                    <li><a href="./?action=logout">退出</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <script>
        if(/^[\t\n\r ]*$/g.test($('#extend_mg').html())){
            $('#extend_mg').append('<li><a href="#">暂无</a></li>');
        }
    </script>
<div id="main" class="container">
<div id="container" class="container">
<?php doAction('adm_main_top'); ?>
<script>
<!--边栏折叠-->
$("#extend_mg").css('display', $.cookie('em_extend_mg') ? $.cookie('em_extend_mg') : '');
if ($.cookie('em_extend_ext')) {
	$("#menu_ext a").removeClass().addClass($.cookie('em_extend_ext'));
}
$("#menu_ext").toggle(
	  function () {
		displayToggle('extend_mg', 1)
		exClass = $(this).find("a").attr("class") == "menu_ext_plus" ? "menu_ext_minus" : "menu_ext_plus";
		$(this).find("a").removeClass().addClass(exClass);
		$.cookie('em_extend_ext', exClass, {expires:365});
	  },
	  function () {
		displayToggle('extend_mg', 1)
		exClass = $(this).find("a").attr("class") == "menu_ext_plus" ? "menu_ext_minus" : "menu_ext_plus";
		$(this).find("a").removeClass().addClass(exClass);
		$.cookie('em_extend_ext', exClass, {expires:365});
	  }
);
var tokenName = '<?php $token_cookie_name = 'EM_TOKENCOOKIE_' . md5(substr(AUTH_KEY, 16, 32) . UID);echo $token_cookie_name;?>';
var token = '<?php echo LoginAuth::genToken(); ?>';
</script>