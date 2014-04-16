<?php 
/**
 * 首页文章列表部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<!--content-->
<div class="g-mn">

<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>

        <div class="m-post box article">
            <div class="info">
                <a href="<?php echo $value['log_url']; ?>">
            </div>
            <div class="cont "><?php topflg($value['top']); ?>
                <div class="text">
                  <h2><?php blog_sort($value['logid']); ?>&nbsp;&nbsp; · &nbsp;&nbsp;<a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
                    <p><?php echo $value['log_description']; ?></p>
                </div>
            </div>
            <div class="info info-1">
                <div class="tags">发布于：&nbsp<?php echo gmdate('Y-n-j', $value['date']); ?>&nbsp;&nbsp;&nbsp;</a><a href="<?php echo $value['log_url']; ?>">评论(<?php echo $value['comnum']; ?>)</a>Tag：&nbsp;<?php blog_tag($value['logid']); ?><a href="<?php echo $value['log_url']; ?>">阅读全文<span class="reply"><?php echo $log_content; ?></div>
            </div>
			<div style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
        </div>
<?php 
endforeach;
else:
?>
        <div class="m-post box article">
			<a href="javascript:;" class="w-icon w-icon-1">&nbsp;</a>
			<a href="javascript:;" class="w-icon2">&nbsp;</a>
            <div class="info"></div>
            <div class="cont ">
                <div class="text">
                    <h2>未找到</h2>
                    <p>抱歉，没有符合您查询条件的结果。</p>
                </div>
            </div>
        </div>
<?php endif;?>
    </div>
<!--/post-->
<div id="bg">
<li id="page-navi"><?php echo $page_url;?></li>

</div>
<!--/content-->
<?php include View::getView('footer');?>