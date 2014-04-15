<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>标签管理</b>
<?php
if(isset($_GET['active_del'])){
    $r = array();
    $r['success'] = '1';
    $r['des'] = '删除标签成功';
    echo json_encode($r);
    exit;
}
if(isset($_GET['active_edit'])){
    $r = array();
    $r['success'] = '1';
    $r['des'] = '修改标签成功';
    echo json_encode($r);
    exit;
}
if(isset($_GET['error'])){
    $r = array();
    $r['success'] = '0';
    $r['des'] = '请选择要删除的标签';
    echo json_encode($r);
    exit;
}
?>
<?php /*if(isset($_GET['active_del'])):*/?><!--<span class="actived">删除标签成功</span><?php /*endif;*/?>
<?php /*if(isset($_GET['active_edit'])):*/?><span class="actived">修改标签成功</span><?php /*endif;*/?>
<?php /*if(isset($_GET['error_a'])):*/?><span class="error">请选择要删除的标签</span>--><?php /*endif;*/?>
</div>
<div class=line></div>
<form action="tag.php?action=dell_all_tag" method="post" name="form_tag" id="form_tag">
<div>
<div>
<?php 
if($tags):
foreach($tags as $key=>$value): ?>
    <div class="btn btn-default tag-box">
        <input type="checkbox" name="tag[<?php echo $value['tid']; ?>]" class="ids em-hide" value="1" data-tagid="<?php echo $value['tid']; ?>">
        <a href="tag.php?action=mod_tag&tid=<?php echo $value['tid']; ?>" class="text-gray"><?php echo $value['tagname']; ?></a>&nbsp;&nbsp;&nbsp;
        <span class="tag-delete">&times;</span>
    </div>
<?php endforeach; ?>
</div>
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
<li style="margin:20px 0px">
<a href="javascript:void(0);" id="select_all">全选</a> 选中项：
<a href="javascript:deltags();" class="care">删除</a>
</li>
<?php else:?>
<li style="margin:20px 30px">还没有标签，写文章的时候可以给文章打标签</li>
<?php endif;?>
</div>
</form>
<script>
$("#select_all").toggle(function () {$(".ids").attr("checked", "checked");},function () {$(".ids").removeAttr("checked");});
function deltags(){
	if (getChecked('ids') == false) {
		alert('请选择要删除的标签');
		return;
	}
	if(!confirm('你确定要删除所选标签吗？')){return;}
	$("#form_tag").submit();
}
setTimeout(hideActived,2600);
$("#menu_tag").addClass('sidebarsubmenu1');
$('.tag-delete').click(function(){
    var tagid = String($(this).siblings('.ids').data('tagid'));
    console.log(tagid);
    var data = eval('({tag:['+tagid+']})');
    console.log(data);
    $.ajax({
        method:'post',
        url:'tag.php?action=dell_all_tag',
        data:data,
        success:function(data){
            console.log(data);
        }
    })
});
</script>