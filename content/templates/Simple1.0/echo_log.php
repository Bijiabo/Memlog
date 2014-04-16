<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="g-mn">
<!--post-->
	<div class="posts">
    	<div class="postbg"></div>
        <div class="m-post box article">

            <div class="info">
                <a href="<?php echo $value['log_url']; ?>"><?php echo gmdate('Y-n-j', $date); ?></a><a href="<?php echo $value['log_url']; ?>">评论(<?php echo $comnum; ?>)</a><?php editflg($logid,$author); ?>
            </div>
            <div class="cont ">
                <div class="text">
                    <h2><a href="<?php echo $value['log_url']; ?>"><?php topflg($top); ?><?php echo $log_title; ?></a></h2>
                    <p><?php echo $log_content; ?></p>
                </div>
            </div>
            <div class="info info-1">
                <div class="tags"><?php blog_tag($logid); ?></div>
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
<?php
 include View::getView('footer');
?>