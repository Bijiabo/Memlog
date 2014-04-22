<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=containertitle><b>导航管理</b>
<?php if(isset($_GET['active_taxis'])):?><div class="alert alert-success">排序更新成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">删除导航成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_edit'])):?><div class="alert alert-success">修改导航成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_add'])):?><div class="alert alert-success">添加导航成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_a'])):?><div class="alert alert-warning">导航名称和地址不能为空<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_b'])):?><div class="alert alert-warning">没有可排序的导航<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_c'])):?><div class="alert alert-warning">默认导航不能删除<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_d'])):?><div class="alert alert-warning">请选择要添加的分类<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_e'])):?><div class="alert alert-warning">请选择要添加的页面<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_f'])):?><div class="alert alert-warning">导航地址格式错误(需包含http等前缀)<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div class=line></div>
<form action="navbar.php?action=taxis" method="post">
  <table width="100%" id="adm_navi_list" class="table table-striped table-hover">
    <thead>
      <tr>
	  	<th width="50"><b>序号</b></th>
        <th width="230"><b>导航</b></th>
        <th width="60" class="tdcenter"><b>类型</b></th>
        <th width="60" class="tdcenter"><b>状态</b></th>
        <th width="50" class="tdcenter"><b>查看</b></th>
		<th width="360"><b>地址</b></th>
        <th width="100"></th>
      </tr>
    </thead>
    <tbody>
	<?php 
	if($navis):
	foreach($navis as $key=>$value):
        if ($value['pid'] != 0) {
            continue;
        }
        $value['type_name'] = '';
        switch ($value['type']) {
            case Navi_Model::navitype_home:
            case Navi_Model::navitype_t:
            case Navi_Model::navitype_admin:
                $value['type_name'] = '系统';
                break;
            case Navi_Model::navitype_sort:
                $value['type_name'] = '<font color="blue">分类</font>';
                break;
            case Navi_Model::navitype_page:
                $value['type_name'] = '<font color="#00A3A3">页面</font>';
                break;
            case Navi_Model::navitype_custom:
                $value['type_name'] = '<font color="#FF6633">自定</font>';
                break;
        }
        doAction('adm_navi_display');
    
	?>  
      <tr>
		<td><input class="form-control" name="navi[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>" maxlength="4" /></td>
		<td><a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>" title="编辑导航"><?php echo $value['naviname']; ?></a></td>
		<td class="tdcenter"><?php echo $value['type_name'];?></td>
		<td class="tdcenter">
		<?php if ($value['hide'] == 'n'): ?>
		<a href="navbar.php?action=hide&amp;id=<?php echo $value['id']; ?>" title="点击隐藏导航">显示</a>
		<?php else: ?>
		<a href="navbar.php?action=show&amp;id=<?php echo $value['id']; ?>" title="点击显示导航" style="color:red;">隐藏</a>
		<?php endif;?>
		</td>
		<td class="tdcenter">
	  	<a href="<?php echo $value['url']; ?>" target="_blank">
	  	<img src="./views/images/<?php echo $value['newtab'] == 'y' ? 'vlog.gif' : 'vlog2.gif';?>" align="absbottom" border="0" /></a>
	  	</td>
        <td><?php echo $value['url']; ?></td>
        <td>
        <a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>">编辑</a>
        <?php if($value['isdefault'] == 'n'):?>
        <a href="javascript: em_confirm(<?php echo $value['id']; ?>, 'navi', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
        <?php endif;?>
        </td>
      </tr>
    <?php
		if(!empty($value['childnavi'])):
		foreach ($value['childnavi'] as $val):
	?>
        <tr>
		<td><input class="num_input" name="navi[<?php echo $val['id']; ?>]" value="<?php echo $val['taxis']; ?>" maxlength="4" /></td>
		<td>---- <a href="navbar.php?action=mod&amp;navid=<?php echo $val['id']; ?>" title="编辑导航"><?php echo $val['naviname']; ?></a></td>
		<td class="tdcenter"><?php echo $value['type_name'];?></td>
		<td class="tdcenter">
		<?php if ($val['hide'] == 'n'): ?>
		<a href="navbar.php?action=hide&amp;id=<?php echo $val['id']; ?>" title="点击隐藏导航">显示</a>
		<?php else: ?>
		<a href="navbar.php?action=show&amp;id=<?php echo $val['id']; ?>" title="点击显示导航" style="color:red;">隐藏</a>
		<?php endif;?>
		</td>
		<td class="tdcenter">
	  	<a href="<?php echo $val['url']; ?>" target="_blank">
	  	<img src="./views/images/<?php echo $val['newtab'] == 'y' ? 'vlog.gif' : 'vlog2.gif';?>" align="absbottom" border="0" /></a>
	  	</td>
        <td><?php echo $val['url']; ?></td>
        <td>
        <a href="navbar.php?action=mod&amp;navid=<?php echo $val['id']; ?>">编辑</a>
        <?php if($val['isdefault'] == 'n'):?>
        <a href="javascript: em_confirm(<?php echo $val['id']; ?>, 'navi', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
        <?php endif;?>
        </td>
      </tr>
      <?php endforeach;endif; ?>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="4">还没有添加导航</td></tr>
	<?php endif;?>
    </tbody>
  </table>
  <div class="list_footer">
      <input type="submit" value="改变排序" class="btn btn-primary btn-sm" />
      <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-nav">添加自定义导航</a>
      <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-sort">添加分类到导航</a>
      <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-page">添加页面到导航</a>
  </div>
</form>

<!-- modal add-nav -->
<div class="modal fade" id="add-nav" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="navbar.php?action=add" method="post" name="navi" id="navi" role="form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加自定义导航</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="taxis">序号</label>
                    <input maxlength="4" name="taxis" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="naviname">导航名称</label>
                    <input maxlength="200" name="naviname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="url">地址(带http)</label>
                    <input maxlength="200" name="url" id="url" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="pid">父导航</label>
                    <select name="pid" id="pid" class="form-control">
                        <option value="0">无</option>
                        <?php
                        foreach($navis as $key=>$value):
                            if($value['type'] != Navi_Model::navitype_custom || $value['pid'] != 0) {
                                continue;
                            }
                            ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['naviname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"  value="y" name="newtab" class="form-control"/>在新窗口打开
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">添加</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal add-sort -->
<div class="modal fade" id="add-sort" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <form action="navbar.php?action=add_sort" method="post" name="sort" id="sort" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加分类到导航</h4>
                </div>
                <div class="modal-body">
                    <?php
                    if($sorts):
                        foreach($sorts as $key=>$value):
                            if ($value['pid'] != 0) {
                                continue;
                            }
                            ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" style="vertical-align:middle;" name="sort_ids[]" value="<?php echo $value['sid']; ?>" class="ids" />
                                    <?php echo $value['sortname']; ?>
                                </label>
                            </div>
                            <?php
                            $children = $value['children'];
                            foreach ($children as $key):
                                $value = $sorts[$key];
                                ?>
                                <div class="checkbox">
                                    <label>
                                    <span style="color: #D1D1D1;">|---  </span><input type="checkbox" name="sort_ids[]" value="<?php echo $value['sid']; ?>"/>
                                    <?php echo $value['sortname']; ?>
                                    </label>
                                </div>
                            <?php
                            endforeach;
                        endforeach;
                        ?>
                    <?php else:?>
                        <div class="checkbox">
                            <label>
                                还没有分类，<a href="sort.php">新建分类</a>
                            </label>
                        </div>
                    <?php endif;?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal add-page -->
<div class="modal fade" id="add-page" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="navbar.php?action=add_page" method="post" name="page" id="page" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加页面到导航</h4>
                </div>
                <div class="modal-body">
                    <?php
                    if($pages):
                        foreach($pages as $key=>$value):
                            ?>
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" style="vertical-align:middle;" name="pages[<?php echo $value['gid']; ?>]" value="<?php echo $value['title']; ?>" class="ids" />
                                <?php echo $value['title']; ?>
                                </label>
                            </div>
                        <?php endforeach;?>
                    <?php else:?>
                    <div class="checkbox">
                        <label>
                        还没页面，<a href="page.php">新建页面</a>
                        </label>
                    </div>
                    <?php endif;?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$("#navi_add_custom").css('display', $.cookie('em_navi_add_custom') ? $.cookie('em_navi_add_custom') : '');
$("#navi_add_sort").css('display', $.cookie('em_navi_add_sort') ? $.cookie('em_navi_add_sort') : '');
$("#navi_add_page").css('display', $.cookie('em_navi_add_page') ? $.cookie('em_navi_add_page') : '');
$(document).ready(function(){
	$("#adm_navi_list tbody tr:odd").addClass("tralt_b");
	$("#adm_navi_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")})
});
setTimeout(hideActived,2600);
$("#menu_navbar").addClass('sidebarsubmenu1');
</script>