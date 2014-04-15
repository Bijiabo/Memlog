<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script charset="utf-8" src="./editor/kindeditor.js"></script>
<script charset="utf-8" src="./editor/lang/zh_CN.js"></script>
<div class="containertitle"><b>写文章</b><span id="msg_2"></span></div>
<div id="msg"></div>
<form action="save_log.php?action=add" method="post" enctype="multipart/form-data" id="addlog" name="addlog" role="form">
<div id="post">
<div>
<!--    <label for="title" id="title_label">输入文章标题</label>-->
    <input type="text" maxlength="200" name="title" id="title" class="form-control" placeholder="输入文章标题"/>
</div>
<div id="post_bar">
	<div>
	    <span onclick="displayToggle('FrameUpload', 0);autosave(1);" class="show_advset btn btn-default">上传插入</span>
	    <?php doAction('adm_writelog_head'); ?>
	    <span id="asmsg"></span>
	    <input type="hidden" name="as_logid" id="as_logid" value="-1">
    </div>
    <div id="FrameUpload" style="display: none;">
        <iframe width="100%" height="330" frameborder="0" src="attachment.php?action=selectFile"></iframe>
    </div>
</div>
<div>
    <textarea id="content" name="content" style="width:100%; height:460px;"></textarea>
</div>
    <div style="margin:10px 0px 5px 0px;" role="form">
        <div class="form-group" style="height: 30px;margin: 20px 0;">
            <div class="col-md-10" style="padding: 0;">
                <input name="tag" id="tag" maxlength="200" class="form-control" placeholder="文章标签，逗号或空格分隔，过多的标签会影响系统运行效率"/>
            </div>
            <div class="col-md-2" style="padding-right: 0;">
                <a href="javascript:displayToggle('tagbox', 0);" class="btn btn-default btn-block">已有标签+</a>
            </div>
        </div>
        <div id="tagbox">
            <?php
            if ($tags) {
                foreach ($tags as $val){
                    echo " <a href=\"javascript: insertTag('{$val['tagname']}','tag');\" class=\"btn btn-default btn-sm\">{$val['tagname']}</a> ";
                }
            } else {
//                echo '还没有设置过标签！';
            }
            ?>
        </div>
        <!--    <label for="tag" id="tag_label"></label>-->
        <div class="orm-group" style="clear: both;height: 30px;">
            <div class="col-md-3" style="padding: 0;">
                <select name="sort" id="sort" class="form-control">
                    <option value="-1">选择分类...</option>
                    <?php
                    foreach($sorts as $key=>$value):
                        if ($value['pid'] != 0) {
                            continue;
                        }
                        ?>
                        <option value="<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></option>
                        <?php
                        $children = $value['children'];
                        foreach ($children as $key):
                            $value = $sorts[$key];
                            ?>
                            <option value="<?php echo $value['sid']; ?>">&nbsp; &nbsp; &nbsp; <?php echo $value['sortname']; ?></option>
                        <?php
                        endforeach;
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <input maxlength="200" name="postdate" id="postdate" value="<?php echo $postDate; ?>" class="form-control"/>
            </div>
            <div class="col-md-2" style="padding: 0;">
                <div class="btn btn-default" onclick="displayToggle('advset', 1);">高级选项</div>
            </div>
        </div>
    <input name="date" id="date" type="hidden" value="" >
</div>
<div id="advset">
    <hr/>
    <div class="containertitle" style="margin-top: 40px;">文章摘要</div>
    <div><textarea id="excerpt" name="excerpt" style="width:100%; height:260px;"></textarea></div>
    <input name="alias" id="alias" class="form-control" placeholder="文章链接别名：(用于自定义文章链接。需要启用文章链接别名)" style="margin: 20px 0;"/>
    <div style="margin-top:3px;">
        <input type="text" value="" name="password" id="password" class="form-control" placeholder="文章访问密码" style="margin: 20px 0;"/>
        <div id="post_options" style="clear: both;margin: 20px 0;">
            <div class="checkbox">
                <label for="top">
                    <input type="checkbox" value="y" name="top" id="top" />
                    首页置顶
                </label>
            </div>
            <div class="checkbox">
                <label for="top">
                <input type="checkbox" value="y" name="sortop" id="sortop" />
                    分类置顶
                </label>
            </div>
            <div class="checkbox">
                <label for="sortop">
                    允许评论
                    <input type="checkbox" value="y" name="allow_remark" id="allow_remark" checked="checked" />
                </label>
            </div>
        </div>
    </div>
</div>
<div id="post_button" style="margin: 20px 0;">
    <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
    <input type="hidden" name="ishide" id="ishide" value="">
    <input type="submit" value="发布文章" onclick="return checkform();" class="btn btn-primary" />
    <input type="hidden" name="author" id="author" value=<?php echo UID; ?> />
    <input type="button" name="savedf" id="savedf" value="保存草稿" onclick="autosave(2);" class="btn btn-default" />
</div>
</div>
</form>
<div class=line></div>
<script>
loadEditor('content');
loadEditor('excerpt');
$("#menu_wt").addClass('sidebarsubmenu1');
$("#advset").css('display', $.cookie('em_advset') ? $.cookie('em_advset') : '');
$("#alias").keyup(function(){checkalias();});
$("#title").focus(function(){$("#title_label").hide();});
$("#title").blur(function(){if($("#title").val() == '') {$("#title_label").show();}});
$("#tag").focus(function(){$("#tag_label").hide();});
$("#tag").blur(function(){if($("#tag").val() == '') {$("#tag_label").show();}});
setTimeout("autosave(0)",60000);
</script>