<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="g-mn">
<!--post-->

<div id="tw">
	<div id="bg">
    <?php 
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? 
                BLOG_URL . 'admin/views/images/avatar.jpg' : 
                BLOG_URL . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
    <li class="li">
    <div class="main_img"><img src="<?php echo $avatar; ?>" width="75px" height="75px" /></div>
    <div class="post1"><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $val['t'].$img;?><?php echo $val['date'];?><hr size=1></div><br>
    <div class="clear"></div>
    
	<div class="clear"></div>
   	<ul id="r_<?php echo $tid;?>" class="r"></ul>
    <?php if ($istreply == 'y'):?>
    <div class="huifu" id="rp_<?php echo $tid;?>">
	<textarea id="rtext_<?php echo $tid; ?>"></textarea>
    </div>
    </div>
    <?php endif;?>
    </li>
    <?php endforeach;?><br>
	<li id="page-navi"><?php echo $pageurl;?><span></span></li>
	</div>
<!--/content-->
<?php include View::getView('footer');?>