<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=containertitle>
    <b>数据管理</b>
    <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#backup">备份</a>
    <a class="btn btn-default pull-right" data-toggle="modal" data-target="#import">导入数据</a>
    <a href="data.php?action=Cache" class="btn btn-default pull-right tip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="缓存可以加快站点的加载速度。<br/>通常系统会自动更新缓存，无需手动。<br/>有些特殊情况，比如缓存文件被修改、手动修改过数据库、页面出现异常等才需要手动更新。">更新缓存</a>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">备份文件删除成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_backup'])):?><div class="alert alert-success">数据备份成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_import'])):?><div class="alert alert-success">备份导入成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_a'])):?><div class="alert alert-warning">请选择要删除的备份文件<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_b'])):?><div class="alert alert-warning">备份文件名错误(应由英文字母、数字、下划线组成)<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_c'])):?><div class="alert alert-warning">服务器空间不支持zip，无法导入zip备份<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_d'])):?><div class="alert alert-warning">上传备份失败<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_e'])):?><div class="alert alert-warning">错误的备份文件<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_f'])):?><div class="alert alert-warning">服务器空间不支持zip，无法导出zip备份<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_mc'])):?><div class="alert alert-success">缓存更新成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div class=line></div>
<form  method="post" action="data.php?action=dell_all_bak" name="form_bak" id="form_bak">
<table width="100%" id="adm_bakdata_list" class="table table-striped table-hover">
  <thead>
    <tr>
        <th width="21">
            <input type="checkbox" style="margin-bottom: 3px;" id="checkbox_select_all">
        </th>
      <th width="672"><b>备份文件</b></th>
      <th width="226"><b>备份时间</b></th>
      <th width="149"><b>文件大小</b></th>
      <th width="87"></th>
    </tr>
  </head>
  <tbody>
	<?php
		if($bakfiles):
		foreach($bakfiles  as $value):
		$modtime = smartDate(filemtime($value),'Y-m-d H:i:s');
		$size =  changeFileSize(filesize($value));
		$bakname = substr(strrchr($value,'/'),1);
	?>
    <tr>
      <td width="22"><input type="checkbox" value="<?php echo $value; ?>" name="bak[]" class="ids" /></td>
      <td width="661"><a href="../content/backup/<?php echo $bakname; ?>"><?php echo $bakname; ?></a></td>
      <td><?php echo $modtime; ?></td>
      <td><?php echo $size; ?></td>
      <td><a href="javascript: em_confirm('<?php echo $value; ?>', 'backup', '<?php echo LoginAuth::genToken(); ?>');">导入</a></td>
    </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="5">还没有备份</td></tr>
	<?php endif;?>
	</tbody>
</table>
<div class="list_footer">
    选中项：
    <a href="javascript:bakact('del');" class="btn btn-default btn-sm">删除</a>
</div>
</form>
<!-- modal backup -->
<div class="modal fade" id="backup" tabindex="-1" role="dialog" aria-labelledby="data" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="data.php?action=bakstart" method="post" name="link" id="link" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">备份数据库</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="table_box[]">备份的数据库表</label>
                        <select multiple="multiple" size="12" name="table_box[]" class="form-control">
                            <?php foreach($tables  as $value): ?>
                                <option value="<?php echo DB_PREFIX; ?><?php echo $value; ?>" selected="selected"><?php echo DB_PREFIX; ?><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bakplace">备份地点</label>
                        <select name="bakplace" id="bakplace" class="form-control">
                            <option value="local" selected="selected">本地（自己电脑）</option>
                            <option value="server">服务器空间</option>
                        </select>
                    </div>
                    <div id="local_bakzip" class="checkbox">
                        <label for="zipbak">
                            <input type="checkbox" value="y" name="zipbak" id="zipbak">
                            压缩成zip包
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="bakfname">备份文件名 (.sql)</label>
                        <input maxlength="200" size="35" value="<?php echo $defname; ?>" name="bakfname" class="form-control"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary" id="dobackup">备份</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal import -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="data" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="data.php?action=import" method="post" name="link" id="link" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">导入本地备份</h4>
                </div>
                <div class="modal-body">
                    <p class="des">仅可导入相同版本emlog导出的数据库备份文件，且数据库表前缀需保持一致。</p>
                    <p>当前数据库表前缀：<?php echo DB_PREFIX; ?></p>
                    <p>&nbsp;</p>
                    <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
                    <input type="file" name="sqlfile" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">导入</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
setTimeout(hideActived,2600);
$(document).ready(function(){
    $("#checkbox_select_all").click(function () {$(".ids").click();});
	$("#adm_bakdata_list tbody tr:odd").addClass("tralt_b");
	$("#adm_bakdata_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
	$("#bakplace").change(function(){$("#server_bakfname").toggle();$("#local_bakzip").toggle();});
    $(document).on('click','#dobackup',function(){
       $('#backup').modal('hide');
    });
    $('.tip').tooltip({html:true});
});
function bakact(act){
	if (getChecked('ids') == false) {
		alert('请选择要操作的备份文件');
		return;
	}
	if(act == 'del' && !confirm('你确定要删除所选备份文件吗？')){return;}
	$("#operate").val(act);
	$("#form_bak").submit();
}
$("#menu_data").addClass('sidebarsubmenu1');
</script>