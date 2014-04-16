<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle>
    <b>回复评论</b>
</div>
<div class=line></div>
<form action="comment.php?action=doreply" method="post" role="form">
    <div class="form-group">
        <label for="name">评论人</label>
        <input class="form-control" name="name" type="text" value="<?php echo $poster; ?>" disabled/>
    </div>
    <div class="form-group">
        <label for="time">时间</label>
        <input class="form-control" name="time" type="text" value="<?php echo $date; ?>" disabled/>
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <input class="form-control" name="content" type="text" value="<?php echo $comment; ?>" disabled/>
    </div>
    <div class="form-group">
        <label for="reply">回复</label>
        <textarea name="reply" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="hidden" value="<?php echo $commentId; ?>" name="cid" />
        <input type="hidden" value="<?php echo $gid; ?>" name="gid" />
        <input type="hidden" value="<?php echo $hide; ?>" name="hide" />
        <input type="submit" value="回复" class="btn btn-primary" />
        <?php if ($hide == 'y'): ?>
            <input type="submit" value="回复并审核" name="pub_it" class="btn btn-primary" />
        <?php endif; ?>
        <input type="button" value="取消" class="btn btn-default" onclick="javascript: window.history.back();"/>
    </div>
</form>
<script>
$("#menu_cm").addClass('sidebarsubmenu1');
</script>