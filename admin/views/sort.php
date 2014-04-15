<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<script>setTimeout(hideActived,2600);</script>
<div class=containertitle><b>分类管理</b>
<?php if(isset($_GET['active_taxis'])):?><div class="alert alert-success">排序更新成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">删除分类成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_edit'])):?><div class="alert alert-success">修改分类成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_add'])):?><div class="alert alert-success">添加分类成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_a'])):?><div class="alert alert-warning">分类名称不能为空<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_b'])):?><div class="alert alert-warning">没有可排序的分类<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_c'])):?><div class="alert alert-warning">别名格式错误<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_d'])):?><div class="alert alert-warning">别名不能重复<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_e'])):?><div class="alert alert-warning">别名不得包含系统保留关键字<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div class=line></div>
<form  method="post" action="sort.php?action=taxis">
	<table width="100%" id="adm_sort_list" class="table">
		<thead>
			<tr>
			<th width="55"><b>序号</b></th>
			<th width="160"><b>名称</b></th>
            <th width="180"><b>描述</b></th>
			<th width="130"><b>别名</b></th>
            <th width="100"><b>模板</b></th>
			<th width="40" class="tdcenter"><b>查看</b></th>
			<th width="40" class="tdcenter"><b>文章</b></th>
			<th width="60"></th>
		</tr>
		</thead>
		<tbody>
<?php 
if($sorts):
foreach($sorts as $key=>$value):
	if ($value['pid'] != 0) {
		continue;
	}
?>
	<tr>
		<td>
			<input type="hidden" value="<?php echo $value['sid'];?>" class="sort_id" />
			<input maxlength="4" class="form-control" name="sort[<?php echo $value['sid']; ?>]" value="<?php echo $value['taxis']; ?>" />
		</td>
		<td class="sortname">
            <a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></a>
        </td>
		<td><?php echo $value['description']; ?></td>
        <td class="alias"><?php echo $value['alias']; ?></td>
        <td class="alias"><?php echo $value['template']; ?></td>
		<td class="tdcenter">
			<a href="<?php echo Url::sort($value['sid']); ?>" target="_blank"><img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
		</td>
		<td class="tdcenter"><a href="./admin_log.php?sid=<?php echo $value['sid']; ?>"><?php echo $value['lognum']; ?></a></td>
		<td>
			<a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>">编辑</a>
			<a href="javascript: em_confirm(<?php echo $value['sid']; ?>, 'sort', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
		</td>
	</tr>
	<?php
		$children = $value['children'];
		foreach ($children as $key):
		$value = $sorts[$key];
	?>
	<tr>
		<td>
			<input type="hidden" value="<?php echo $value['sid'];?>" class="sort_id" />
			<input maxlength="4" class="form-control" name="sort[<?php echo $value['sid']; ?>]" value="<?php echo $value['taxis']; ?>" />
		</td>
		<td class="sortname">---- <a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></a></td>
		<td><?php echo $value['description']; ?></td>
        <td class="alias"><?php echo $value['alias']; ?></td>
        <td class="alias"><?php echo $value['template']; ?></td>
		<td class="tdcenter">
			<a href="<?php echo Url::sort($value['sid']); ?>" target="_blank"><img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
		</td>
		<td class="tdcenter"><a href="./admin_log.php?sid=<?php echo $value['sid']; ?>"><?php echo $value['lognum']; ?></a></td>
		<td>
			<a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>">编辑</a>
			<a href="javascript: em_confirm(<?php echo $value['sid']; ?>, 'sort', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
		</td>
	</tr>
	<?php endforeach; ?>
<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="8">还没有添加分类</td></tr>
<?php endif;?>  
</tbody>
</table>
<div style="padding-left: 8px;">
    <input type="submit" value="改变排序" class="btn btn-primary btn-sm" />
    <a href="#" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#sort_new">添加分类</a>
</div>
</form>
<div class="modal fade" id="sort_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="sort.php?action=add" method="post" role="form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="sort_newLabel">添加分类</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="taxis">序号</label>
                        <input maxlength="4" name="taxis" class="form-control"  />
                    </div>
                    <div class="form-group">
                        <label for="sortname">名称</label>
                        <input maxlength="200" style="width:243px;" class="form-control" name="sortname" id="sortname" />
                    </div>
                    <div class="form-group">
                        <label for="alias">别名 (用于URL的友好显示)</label>
                        <input maxlength="200" class="form-control" name="alias" id="alias" />
                    </div>
                    <div class="form-group">
                        <label for="pid">父分类</label>
                        <select name="pid" id="pid" class="form-control">
                            <option value="0">无</option>
                            <?php
                            foreach($sorts as $key=>$value):
                                if($value['pid'] != 0) {
                                    continue;
                                }
                                ?>
                                <option value="<?php echo $key; ?>"><?php echo $value['sortname']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="template">模板 (用于自定义分类页面模板，对应模板目录下.php文件，默认为log_list.php)</label>
                        <input maxlength="200" class="form-control" name="template" id="template" value="log_list" />
                    </div>
                    <div class="form-group">
                        <label for="description">分类描述</label>
                        <textarea name="description" type="text" class="form-control"></textarea>
                        <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary" id="addsort">添加分类</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
//$("#sort_new").css('display', $.cookie('em_sort_new') ? $.cookie('em_sort_new') : 'none');
$("#alias").keyup(function(){checksortalias();});
function issortalias(a){
	var reg1=/^[\w-]*$/;
	var reg2=/^[\d]+$/;
	if(!reg1.test(a)) {
		return 1;
	}else if(reg2.test(a)){
		return 2;
	}else if(a=='post' || a=='record' || a=='sort' || a=='tag' || a=='author' || a=='page'){
		return 3;
	} else {
		return 0;
	}
}
function checksortalias(){
	var a = $.trim($("#alias").val());
	if (1 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error">别名错误，应由字母、数字、下划线、短横线组成</span>');
	}else if (2 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error">别名错误，不能为纯数字</span>');
	}else if (3 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error">别名错误，与系统链接冲突</span>');
	}else {
		$("#alias_msg_hook").html('');
		$("#msg").html('');
		$("#addsort").attr("disabled", false);
	}
}
$(document).ready(function(){
	$("#adm_sort_list tbody tr:odd").addClass("tralt_b");
	$("#adm_sort_list tbody tr")
	.mouseover(function(){$(this).addClass("trover")})
	.mouseout(function(){$(this).removeClass("trover")});
	$("#menu_sort").addClass('sidebarsubmenu1');
});
</script>