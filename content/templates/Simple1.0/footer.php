<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<hr size=1>
<div id="bg">
<center>
<div class="s"><span title="Copyright">&copy;</span>2013-2014&nbsp<a href="http://www.ma-am.cn">MA-AM.CN</a> All Rights Reserved.<br>
<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>
<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?></div>
<?php doAction('index_footer'); ?>
</div>
</center>
<!--/content-->
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>images/jquery-1.6.2.min.js'></script>
<script type='text/javascript' src='<?php echo TEMPLATE_URL; ?>images/jian.js'></script>
<script>prettyPrint();</script>
<style>
#wrap{position:relative; margin:0 auto; padding:5px 0 0; width:740px;}
/*==========backtop==========*/
.back-top{position:fixed; _position:absolute; margin-left:745px; bottom:100px; _bottom: "auto"; width:24px; height:73px; background:url(<?php echo TEMPLATE_URL; ?>images/besttop.png) no-repeat; cursor:pointer; display:none;}
.m-0{margin:0;}
.txt-weight{font-weight:bold;}
</style>
<div id="wrap"></div>
<script src="<?php echo TEMPLATE_URL; ?>js/jquery.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/news.js"></script>
</body></br>
</html>