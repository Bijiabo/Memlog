<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=containertitle><b>友情链接管理</b>
<?php if(isset($_GET['active_taxis'])):?><div class="alert alert-success">排序更新成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">删除成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_edit'])):?><div class="alert alert-success">修改成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_add'])):?><div class="alert alert-success">添加成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_a'])):?><div class="alert alert-warning">站点名称和地址不能为空<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_b'])):?><div class="alert alert-warning">没有可排序的链接<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div class=line></div>
<form action="link.php?action=link_taxis" method="post">
  <table width="100%" id="adm_link_list" class="table table-striped table-hover">
    <thead>
      <tr>
	  	<th width="50"><b>序号</b></th>
        <th width="230"><b>链接</b></th>
        <th width="80" class="tdcenter"><b>状态</b></th>
		<th width="80" class="tdcenter"><b>查看</b></th>
		<th width="400"><b>描述</b></th>
        <th width="100"></th>
      </tr>
    </thead>
    <tbody>
	<?php 
	if($links):
	foreach($links as $key=>$value):
	doAction('adm_link_display');
	?>  
      <tr>
		<td><input class="form-control" name="link[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>" maxlength="4" /></td>
		<td><a href="link.php?action=mod_link&amp;linkid=<?php echo $value['id']; ?>" title="修改链接"><?php echo $value['sitename']; ?></a></td>
		<td class="tdcenter">
		<?php if ($value['hide'] == 'n'): ?>
		<a href="link.php?action=hide&amp;linkid=<?php echo $value['id']; ?>" title="点击隐藏链接">显示</a>
		<?php else: ?>
		<a href="link.php?action=show&amp;linkid=<?php echo $value['id']; ?>" title="点击显示链接" style="color:red;">隐藏</a>
		<?php endif;?>
		</td>
		<td class="tdcenter">
	  	<a href="<?php echo $value['siteurl']; ?>" target="_blank" title="查看链接">
	  	<img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
	  	</td>
        <td><?php echo $value['description']; ?></td>
        <td>
        <a href="link.php?action=mod_link&amp;linkid=<?php echo $value['id']; ?>">编辑</a>
        <a href="javascript: em_confirm(<?php echo $value['id']; ?>, 'link', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
        </td>
      </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="6">还没有添加链接</td></tr>
	<?php endif;?>
    </tbody>
  </table>
  <div class="list_footer">
      <input type="submit" value="改变排序" class="btn btn-primary btn-sm" />
      <a href="javascript:();" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-link">添加链接 +</a>
  </div>
</form>
<div class="modal fade" id="add-link" tabindex="-1" role="dialog" aria-labelledby="link" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="link.php?action=addlink" method="post" name="link" id="link" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加链接</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="taxis">序号</label>
                        <input maxlength="4" class="form-control" name="taxis" />
                    </div>
                    <div class="form-group">
                        <label for="sitename">名称</label>
                        <input maxlength="200" class="form-control" name="sitename" />
                    </div>
                    <div class="form-group">
                        <label for="siteurl">地址</label>
                        <input maxlength="200" class="form-control" name="siteurl" />
                    </div>
                    <div class="form-group">
                        <label for="description">描述</label>
                        <textarea name="description" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">添加链接</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$("#link_new").css('display', $.cookie('em_link_new') ? $.cookie('em_link_new') : 'none');
$(document).ready(function(){
	$("#adm_link_list tbody tr:odd").addClass("tralt_b");
	$("#adm_link_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")})
});
setTimeout(hideActived,2600);
$("#menu_link").addClass('sidebarsubmenu1');
</script>