<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>编辑评论</b>
</div>
<div class=line></div>
<form action="comment.php?action=doedit" method="post" role="form">
    <div class="form-group">
        <label for="name">评论人</label>
        <input type="text" value="<?php echo $poster; ?>" name="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="mail">电子邮件</label>
        <input type="email"  value="<?php echo $mail; ?>" name="mail" class="form-control" />
    </div>
    <div class="form-group">
        <label for="url">主页</label>
        <input type="text"  value="<?php echo $url; ?>" name="url" class="form-control" />
    </div>
    <div class="form-group">
        <label for="comment">评论内容</label>
        <textarea name="comment" rows="8" cols="60" class="form-control"><?php echo $comment; ?></textarea>
    </div>
	<input type="hidden" value="<?php echo $cid; ?>" name="cid" />
	<input type="submit" value="保存" class="btn btn-primary" />
	<input type="button" value="取消" class="btn btn-default" onclick="javascript: window.history.back();" /></li>
</form>
<script>
$("#menu_cm").addClass('sidebarsubmenu1');
</script>