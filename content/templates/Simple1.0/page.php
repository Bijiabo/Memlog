<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="g-mn">
<!--post-->
	<div class="posts">
    	<div class="postbg"></div>
        <div class="m-post box article">

            <div class="info">
            <?php editflg($logid,$author); ?>
            </div>
            <div class="cont ">
                <div class="text">
                    <h2><a href="javascript:;"><?php echo $log_title; ?></a></h2>
                    <p><?php echo $log_content; ?></p>
                </div>
            </div>
            <div class="info info-1">
            </div>
        </div>

    </div>
    <div class="box m-page box-do">
        <div class="w-icon w-icon-2"></div>
        <div class="w-icon w-icon-3"></div>
    </div>
    <div class="box">
        <div class="comment">
            <div class="nctitle">评论</div>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
        </div>
    </div>
</div>
<!--/post-->
<div id="bg">
<li id="page-navi"><?php echo $page_url;?></li>
</div>
<?php
 include View::getView('footer');
?>