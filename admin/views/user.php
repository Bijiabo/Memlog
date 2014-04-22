<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle><b>用户管理</b><span id="msg_2">有<?php echo $usernum; ?>位用户</span><a class="btn btn-primary pull-right" href="javascript:();"  data-toggle="modal" data-target="#add-user">添加用户 +</a>
<?php if(isset($_GET['active_del'])):?><div class="alert alert-success">删除成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_update'])):?><div class="alert alert-success">修改用户资料成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['active_add'])):?><div class="alert alert-success">添加用户成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_login'])):?><div class="alert alert-warning">用户名不能为空<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_exist'])):?><div class="alert alert-warning">该用户名已存在<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_pwd_len'])):?><div class="alert alert-warning">密码长度不得小于6位<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_pwd2'])):?><div class="alert alert-warning">两次输入密码不一致<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_del_a'])):?><div class="alert alert-warning">不能删除创始人<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
<?php if(isset($_GET['error_del_b'])):?><div class="alert alert-warning">不能修改创始人信息<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div class=line></div>
<form action="comment.php?action=admin_all_coms" method="post" name="form" id="form">
  <table width="100%" id="adm_comment_list" class="table table-striped table-hover">
  	<thead>
      <tr>
        <th width="60"></th>
        <th width="220"><b>用户</b></th>
        <th width="250"><b>描述</b></th>
        <th width="240"><b>电子邮件</b></th>
		<th width="30" class="tdcenter"><b>文章</b></th>
      </tr>
    </thead>
    <tbody>
	<?php
	if($users):
	foreach($users as $key => $val):
		$avatar = empty($user_cache[$val['uid']]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[$val['uid']]['avatar'];
	?>
     <tr>
        <td style="padding:6px 3px 3px 3px; text-align:center;"><img src="<?php echo $avatar; ?>" height="40" width="40" /></td>
		<td>
		<?php echo empty($val['name']) ? $val['login'] : $val['name']; ?><br />
		<?php echo $val['role'] == ROLE_ADMIN ? $val['uid'] == 1 ? '创始人':'管理员' : '作者'; ?>
        <?php if ($val['role'] == ROLE_WRITER && $val['ischeck'] == 'y') echo '(文章需审核)';?>
		<span style="display:none; margin-left:8px;">
		<?php if (UID != $val['uid']): ?>
		<a href="user.php?action=edit&uid=<?php echo $val['uid']?>">编辑</a> 
		<a href="javascript: em_confirm(<?php echo $val['uid']; ?>, 'user', '<?php echo LoginAuth::genToken(); ?>');" class="care">删除</a>
		<?php else:?>
		<a href="blogger.php">编辑</a>
		<?php endif;?>
		</span>
		</td>
		<td><?php echo $val['description']; ?></td>
		<td><?php echo $val['email']; ?></td>
		<td class="tdcenter"><a href="./admin_log.php?uid=<?php echo $val['uid'];?>"><?php echo $sta_cache[$val['uid']]['lognum']; ?></a></td>
     </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="6">还没有添加作者</td></tr>
	<?php endif;?>
	</tbody>
  </table>
</form>
<div class="list_footer"></div>
<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="user.php?action=new" method="post" name="link" id="link" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加用户</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role">用户组</label>
                        <select name="role" id="role" class="form-control">
                            <option value="writer">作者（投稿人）</option>
                            <option value="admin">管理员</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="login">用户名</label>
                        <input class="form-control" name="login" />
                    </div>
                    <div class="form-group">
                        <label for="password">密码 (大于6位)</label>
                        <input class="form-control" name="password" type="password"/>
                    </div>
                    <div class="form-group">
                        <label for="password2">密码 (大于6位)</label>
                        <input class="form-control" name="password2" type="password"/>
                    </div>
                    <div class="form-group">
                        <label for="ischeck">审核</label>
                        <select name="ischeck" class="form-control">
                            <option value="n">文章不需要审核</option>
                            <option value="y">文章需要审核</option>
                        </select>
                    </div>
                    <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">添加用户</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="page">
    <ul class="pagination">
        <?php echo $pageurl; ?>
    </ul>
</div>
<script>
$("#user_new").css('display', $.cookie('em_user_new') ? $.cookie('em_user_new') : 'none');
$(document).ready(function(){
	$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
	$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover");$(this).find("span").show();})
		.mouseout(function(){$(this).removeClass("trover");$(this).find("span").hide();})
    $("#role").change(function(){$("#ischeck").toggle()})
});
setTimeout(hideActived,2600);
$("#menu_user").addClass('sidebarsubmenu1');
</script>