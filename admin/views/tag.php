<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>标签管理</b>
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
    <div class="btn btn-default tag-box" id="tag-box-<?php echo $value['tid']; ?>">
        <input type="checkbox" name="tag[<?php echo $value['tid']; ?>]" class="ids em-hide" value="1" data-tagid="<?php echo $value['tid']; ?>">
        <a href="tag.php?action=mod_tag&tid=<?php echo $value['tid']; ?>" class="text-gray"><?php echo $value['tagname']; ?></a>&nbsp;&nbsp;&nbsp;
        <span class="tag-delete">&times;</span>
    </div>
<?php endforeach; ?>
</div>
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
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
    var token = $.cookie(tokenName);
    console.log(token);
    var data = eval('({tag:{'+tagid+':"1"},token:"'+token+'"})');
    console.log(data);
    $.ajax({
        method:'post',
        url:'tag.php?action=dell_all_tag',
        data:data,
        dataType:'json',
        success:function(r){
            if(r.success==1){
                $('#tag-box-'+tagid).remove();
            }
        }
    })
});
</script>