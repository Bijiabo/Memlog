<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="containertitle">
    <b>个人设置</b>
<?php if (ROLE == ROLE_ADMIN):?>
<!--<a class="navi1" href="./configure.php">基本设置</a>
<a class="navi4" href="./seo.php">SEO设置</a>
<a class="navi4" href="./style.php">后台风格</a>
<a class="navi2" href="./blogger.php">个人设置</a>-->
<?php else:?>
<!--<a class="navi3" href="./blogger.php">个人设置</a>-->
<?php endif;?>
<?php if(isset($_GET['active_edit'])):?><div class="alert alert-success">个人资料修改成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">头像删除成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_a'])):?><div class="alert alert-warning">昵称不能太长<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_b'])):?><div class="alert alert-warning">电子邮件格式错误<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_c'])):?><div class="alert alert-warning">密码长度不得小于6位<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_d'])):?><div class="alert alert-warning">两次输入的密码不一致<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_e'])):?><div class="alert alert-warning">该登录名已存在<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_f'])):?><div class="alert alert-warning">该昵称已存在<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<form action="blogger.php?action=update" method="post" name="blooger" id="blooger" enctype="multipart/form-data" role="form" class="form-horizontal">
<div class="item_edit">
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $icon; ?><input type="hidden" name="photo" value="<?php echo $photo; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="photo" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-10">
            <a class="btn btn-default" id="choose-photofile">选择图片文件</a>
            <?php echo $delphoto;?>
            <input name="photo" type="file" class="form-control" style="display: none;" id="input-photo"/>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">昵称</label>
        <div class="col-sm-10">
            <input maxlength="50" class="form-control" value="<?php echo $nickname; ?>" name="name" />
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-10">
            <input name="email" class="form-control" value="<?php echo $email; ?>" maxlength="200" />
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-2 control-label">个人描述</label>
        <div class="col-sm-10">
            <textarea name="description" class="form-control" type="text" maxlength="500"><?php echo $description; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">登陆名</label>
        <div class="col-sm-10">
            <input maxlength="200" class="form-control" value="<?php echo $username; ?>" name="username" />
        </div>
    </div>
    <div class="form-group">
        <label for="newpass" class="col-sm-2 control-label">新密码</label>
        <div class="col-sm-10">
            <input type="password" maxlength="200" class="form-control" value="" name="newpass" placeholder="不小于6位，不修改请留空"/>
        </div>
    </div>
    <div class="form-group">
        <label for="repeatpass" class="col-sm-2 control-label">重复新密码</label>
        <div class="col-sm-10">
            <input type="password" maxlength="200" class="form-control" value="" name="repeatpass" />
        </div>
    </div>
    <div class="form-group">
        <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" value="保存资料" class="btn btn-primary" />
        </div>
    </div>
</div>
</form>
<script>
    $(function(){
        $(document).on('click','#choose-photofile',function(){
            $('#input-photo').click();
        });
        $(document).on('change','#input-photo',function(){
            var val = $(this).val();
            if(val == ''){
                $('#choose-photofile').text('选择图片文件').removeClass('btn-success').addClass('btn-default');
            }else{
                $('#choose-photofile').text(val).addClass('btn-success').removeClass('btn-default');
            }
        });
    });
$("#chpwd").css('display', $.cookie('em_chpwd') ? $.cookie('em_chpwd') : 'none');
setTimeout(hideActived,2600);
</script>