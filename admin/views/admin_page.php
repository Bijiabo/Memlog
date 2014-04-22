<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>页面管理</b><span id="msg_2">有<?php echo $pageNum; ?>个页面 <a href="page.php?action=new" class="btn btn-default pull-right">新建页面</a></span>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">删除页面成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_hide_n'])):?><div class="alert alert-success">发布页面成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_hide_y'])):?><div class="alert alert-success">禁用页面成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_pubpage'])):?><div class="alert alert-success">页面保存成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div class=line></div>
<form action="page.php?action=operate_page" method="post" name="form_page" id="form_page">
  <table width="100%" id="adm_comment_list" class="table table-striped table-hover">
  	<thead>
      <tr>
        <th width="21">
            <input type="checkbox" style="margin-bottom: 3px;" id="checkbox_select_all">
        </th>
        <th width="441"><b>标题</b></th>
        <th width="140"><b>模板</b></th>
        <th width="50" class="tdcenter"><b>评论</b></th>
        <th width="140"><b>时间</b></th>
      </tr>
    </thead>
    <tbody>
	<?php
	if($pages):
	foreach($pages as $key => $value):
	if (empty($navibar[$value['gid']]['url']))
	{
		$navibar[$value['gid']]['url'] = Url::log($value['gid']);
	}
	$isHide = $value['hide'] == 'y' ? 
	'<font color="red"> - 草稿</font>' : 
	'<a href="'.$navibar[$value['gid']]['url'].'" target="_blank" title="查看页面"><img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>';
	?>
     <tr>
     	<td width="21"><input type="checkbox" name="page[]" value="<?php echo $value['gid']; ?>" class="ids" /></td>
        <td width="440">
        <a href="page.php?action=mod&id=<?php echo $value['gid']?>"><?php echo $value['title']; ?></a> 
   		<?php echo $isHide; ?>    
		<?php if($value['attnum'] > 0): ?><img src="./views/images/att.gif" align="top" title="附件：<?php echo $value['attnum']; ?>" /><?php endif; ?>
        </td>
        <td><?php echo $value['template']; ?></td>
        <td class="tdcenter"><a href="comment.php?gid=<?php echo $value['gid']; ?>"><?php echo $value['comnum']; ?></a></td>
        <td><?php echo $value['date']; ?></td>
     </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="5">还没有页面</td></tr>
	<?php endif;?>
	</tbody>
  </table>
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
  <input name="operate" id="operate" value="" type="hidden" />
</form>
<div class="list_footer">
    选中项：
    <a href="javascript:pageact('del');" class="btn btn-default btn-sm">删除</a>
    <a href="javascript:pageact('hide');" class="btn btn-default btn-sm">转为草稿</a>
    <a href="javascript:pageact('pub');" class="btn btn-default btn-sm">发布</a>
</div>
<div class="page">
    <ul class="pagination">
        <?php echo $pageurl; ?>
    </ul>
</div>
<script>
$(document).ready(function(){
	$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
	$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
//	$("#select_all").toggle(function () {$(".ids").attr("checked", "checked");},function () {$(".ids").removeAttr("checked");});
    $("#checkbox_select_all").click(function () {$(".ids").click();});
});
setTimeout(hideActived,2600);
function pageact(act){
	if (getChecked('ids') == false) {
		alert('请选择要操作的页面');
		return;}
	if(act == 'del' && !confirm('你确定要删除所选页面吗？')){return;}
	$("#operate").val(act);
	$("#form_page").submit();
}
$("#menu_page").addClass('sidebarsubmenu1');
</script>