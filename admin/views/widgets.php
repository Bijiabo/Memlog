<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<!--<script type="text/javascript" src="../include/lib/js/jquery/plugin-interface.js"></script>-->
<script>setTimeout(hideActived,2600);</script>
<div class=containertitle>
    <b>侧边栏组件管理</b>
<?php if(isset($_GET['activated'])):?><div class="alert alert-success">设置保存成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?></div>
<div class=line></div>
<div class="widgetpage">
<div id="adm_widget_list" class="col-md-4">
	<form action="widgets.php?action=setwg&wg=blogger" method="post" role="form" class="form-inline">
        <div class="panel panel-default" id="blogger">
            <div class="panel-heading">
                <span class="widget-act-edit widget-title">个人资料</span>
                <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
                <span class="widget-act-add fa fa-plus pull-right"></span>
                <span class="widget-act-del fa fa-minus pull-right"></span>
            </div>
            <div class="panel-body form-group widget-control">
                <input type="text" name="title" value="<?php echo $customWgTitle['blogger']; ?>" class="form-control"/>
                <input type="submit" name="" value="更改标题" class="btn btn-primary" />
            </div>
        </div>
	</form>
	<form action="widgets.php?action=setwg&wg=calendar" method="post" class="form-inline">
	<div class="panel panel-default" id="calendar">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">日历</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body form-group widget-control">
            <input type="text" name="title" value="<?php echo $customWgTitle['calendar']; ?>" class="form-control"/>
            <input type="submit" name="" value="更改标题" class="btn btn-primary" />
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=twitter" method="post" class="form-horizontal">
	<div class="panel panel-default" id="twitter">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">最新微语</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body widget-control">
            <div class="form-group margin0">
                <label for="title">标题</label>
                <input type="text" name="title" value="<?php echo $customWgTitle['twitter']; ?>" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="index_newtwnum">首页显示最新微语数</label>
                <input maxlength="5" size="10" value="<?php echo Option::get('index_newtwnum'); ?>" name="index_newtwnum" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <input type="submit" name="" value="更改" class="btn btn-primary"/>
            </div>
        </div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=tag" method="post" class="form-inline">
	<div class="panel panel-default" id="tag">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">标签</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body form-group widget-control">
			<input type="text" name="title" value="<?php echo $customWgTitle['tag']; ?>" class="form-control"/>
            <input type="submit" name="" value="更改标题" class="btn btn-primary" />
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=sort" method="post" class="form-inline">
	<div class="panel panel-default" id="sort">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">分类</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body form-group widget-control">
			<input type="text" name="title" value="<?php echo $customWgTitle['sort']; ?>" class="form-control"/>
            <input type="submit" name="" value="更改标题" class="btn btn-primary" />
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=archive" method="post"  class="form-inline">
	<div class="panel panel-default" id="archive">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">存档</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body form-group widget-control">
			<input type="text" name="title" value="<?php echo $customWgTitle['archive']; ?>" class="form-control"/>
            <input type="submit" name="" value="更改标题" class="btn btn-primary" />
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=newcomm" method="post" class="form-horizontal">
	<div class="panel panel-default" id="newcomm">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">最新评论</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body widget-control">
            <div class="form-group margin0">
                <label for="title">标题</label>
                <input type="text" name="title" value="<?php echo $customWgTitle['newcomm']; ?>" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="index_comnum">首页最新评论数</label>
                <input maxlength="5" size="10" value="<?php echo Option::get('index_comnum'); ?>" name="index_comnum" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="comment_subnum">新近评论截取字节数</label>
                <input maxlength="5" size="10" value="<?php echo Option::get('comment_subnum'); ?>" name="comment_subnum" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <input type="submit" name="" value="更改" class="btn btn-primary" />
            </div>
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=newlog" method="post" class="form-horizontal">
	<div class="panel panel-default" id="newlog">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">最新文章</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body widget-control">
            <div class="form-group margin0">
                <label for="title">标题</label>
                <input type="text" name="title" value="<?php echo $customWgTitle['newlog']; ?>" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="index_newlog">首页显示最新文章数</label>
                <input maxlength="5" size="10" value="<?php echo Option::get('index_newlognum'); ?>" name="index_newlog" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <input type="submit" name="" value="更改" class="btn btn-primary" />
            </div>
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=hotlog" method="post" class="form-horizontal">
	<div class="panel panel-default" id="hotlog">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">热门文章</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body widget-control">
            <div class="form-group margin0">
                <label for="title">标题</label>
                <input type="text" name="title" value="<?php echo $customWgTitle['hotlog']; ?>" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="index_hotlognum">首页显示热门文章数</label>
                <input maxlength="5" size="10" value="<?php echo Option::get('index_hotlognum'); ?>" name="index_hotlognum" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <input type="submit" name="" value="更改" class="btn btn-primary" />
            </div>
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=random_log" method="post" class="form-horizontal">
	<div class="panel panel-default" id="random_log">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">随机文章</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body widget-control">
            <div class="form-group margin0">
                <label for="title">标题</label>
                <input type="text" name="title" value="<?php echo $customWgTitle['random_log']; ?>" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="index_randlognum">首页显示随机文章数</label>
                <input maxlength="5" size="10" value="<?php echo Option::get('index_randlognum'); ?>" name="index_randlognum" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <input type="submit" name="" value="更改" class="btn btn-primary" />
            </div>
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=link" method="post" class="form-inline">
	<div class="panel panel-default" id="link">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">链接</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body form-group widget-control">
			<input type="text" name="title" value="<?php echo $customWgTitle['link']; ?>" class="form-control"/>
            <input type="submit" name="" value="更改标题" class="btn btn-primary" />
		</div>
	</div>
	</form>
	<form action="widgets.php?action=setwg&wg=search" method="post" class="form-inline">
	<div class="panel panel-default" id="search">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title">搜索</span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
		</div>
		<div class="panel-body form-group widget-control">
            <input type="text" name="title" value="<?php echo $customWgTitle['search']; ?>" class="form-control"/>
            <input type="submit" name="" value="更改标题" class="btn btn-primary" />
		</div>
	</div>
	</form>
	<?php
	foreach ($custom_widget as $key=>$val):
	preg_match("/^custom_wg_(\d+)/", $key, $matches);
	$custom_wg_title = empty($val['title']) ? '未命名组件('.$matches[1].')' : $val['title'];
	?>
	<form action="widgets.php?action=setwg&wg=custom_text" method="post" class="form-horizontal">
	<div class="panel panel-default" id="<?php echo $key; ?>">
		<div class="panel-heading">
			<span class="widget-act-edit widget-title"><?php echo $custom_wg_title; ?></span>
            <span class="widget-act-edit widget-act-edit-btn fa fa-pencil"></span>
            <span class="widget-act-add fa fa-plus pull-right"></span>
            <span class="widget-act-del fa fa-minus pull-right"></span>
            <span class="pull-right">
                <a href="widgets.php?action=setwg&wg=custom_text&rmwg=<?php echo $key; ?>" class="fa fa-trash-o ani widget-delete"></a>
            </span>
		</div>
		<div class="panel-body widget-control">
            <div class="form-group margin0">
                <label for="title">标题</label>
                <input type="text" name="title" value="<?php echo $val['title']; ?>" class="form-control"/>
            </div>
            <div class="form-group margin0">
                <label for="index_randlognum">内容</label>
                <textarea name="content" rows="8" class="form-control"><?php echo $val['content']; ?></textarea>
            </div>
            <div class="form-group margin0">
                <input type="submit" name="" value="更改" class="btn btn-primary" />
            </div>
		</div>
	</div>
	</form>
	<?php endforeach;?>

	<div class="wg_line2"><a href="javascript:();" class="btn btn-primary" data-toggle="modal" data-target="#newWidget">自定义一个新的组件 +</a></div>
        <div class="modal fade" id="newWidget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="widgets.php?action=setwg&wg=custom_text" method="post" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">自定义新组件</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new_title">组件名</label>
                            <input type="text" class="form-control" name="new_title" value="" />
                        </div>
                        <div class="form-group">
                            <label for="new_content">内容<i>支持html</i></label>
                            <textarea name="new_content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">添加组件</button>
                    </div>
                    </form>
                </div><!-- content -->
            </div><!-- dialog -->
        </div><!-- modal -->
</div>
<form action="widgets.php?action=compages" method="post">
<div id="adm_widget_box" class="col-md-6">
<?php if($tpl_sidenum > 1):?>
<p>
<select id="wg_select">
<?php for ($i=1; $i<=$tpl_sidenum; $i++):
if($i == $wgNum):
?>
<option value="<?php echo $i;?>" selected>侧边栏<?php echo $i;?></option>
<?php else:?>
<option value="<?php echo $i;?>">侧边栏<?php echo $i;?></option>
<?php endif;endfor;?>
</select>
</p>
<?php endif;?>
<ul id="adm_widget_box_ul">
<?php 
	foreach ($widgets as $widget):
	$flg = strpos($widget, 'custom_wg_') === 0 ? true : false;//是否为自定义组件
	$title = ($flg && isset($custom_widget[$widget]['title'])) ? $custom_widget[$widget]['title'] : '';	//获取自定义组件标题
	if($flg && empty($title)){
		preg_match("/^custom_wg_(\d+)/", $widget, $matches);
		$title = '未命名组件('.$matches[1].')';
	}	
	?>
	<li class="sortableitem panel panel-default" id="em_<?php echo $widget; ?>">
        <div class="panel-heading">
            <?php
            if ($flg){
                echo $title;
            }else{
                echo $widgetTitle[$widget];
            }?>
        </div>
        <input type="hidden" name="widgets[]" value="<?php echo $widget; ?>" />
	</li>
<?php endforeach;?>
</ul>
<input type="hidden" name="wgnum" id="wgnum" value="<?php echo $wgNum; ?>" />
<div style="margin:20px 40px;">
    <input type="submit" value="保存组件排序" class="btn btn-primary" />
</div>
<div style="margin:10px 40px;"><a href="javascript: em_confirm(0, 'reset_widget', '<?php echo LoginAuth::genToken(); ?>');">恢复组件设置到初始安装状态</a></div>
</div>
</form>
</div>
<script src="./views/js/jquery-ui-1.10.4.custom.min.js"></script>
<script>
$(function() {
	$("#custom_text_new").css('display', $.cookie('em_custom_text_new') ? $.cookie('em_custom_text_new') : 'none');
	var widgets = $(".sortableitem").map(function(){return $(this).attr("id");});
	$.each(widgets,function(i,widget_id){
		var widget_id = widget_id.substring(3);
		$("#"+widget_id+" .widget-act-add").hide();
		$("#"+widget_id+" .widget-act-del").show();
	});
	//show edit form
	$("#adm_widget_list .widget-title").click(
		function(){$(this).parent().next(".widget-control").slideToggle('fast');}
	);
	//add widget
	$("#adm_widget_list .widget-act-add").click(function(){
		var wgnum = $("#wgnum").val();
		var title = $(this).prevAll(".widget-title").html();
		var widget_id = $(this).parent().parent().attr("id");
		var widget_element = '<li class="sortableitem panel panel-default" id="em_'+widget_id+'"><div class="panel-heading">'+title+'</div><input type="hidden" name="widgets[]" value="'+widget_id+'" /></li>';
		$("#adm_widget_box ul").append(widget_element);
		$(this).hide();
		$(this).next(".widget-act-del").show();
	});
	//remove widget
	$("#adm_widget_list .widget-act-del").click(function(){
		var widget_id = $(this).parent().parent().attr("id");
		$("#adm_widget_box ul #em_" + widget_id).remove();
		$(this).hide();
		$(this).prev(".widget-act-add").show();
	});
    /*new func*/
    $(document).on('click','.widget-act-edit',function(){
        $(this).parent().siblings('.panel-body').toggleClass('widget-control-show');
    });
    /*
    * move
    * */
    $( "#adm_widget_box_ul" ).sortable({
        placeholder: "adm_widget_box_ul-highlight"
    });
    $( "#adm_widget_box_ul" ).disableSelection();
 });
</script>