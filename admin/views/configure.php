<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script>setTimeout(hideActived,2600);</script>
<div class="containertitle">
    <b>网站设置</b>
<!--<a class="navi3" href="./configure.php">基本设置</a>
<a class="navi4" href="./seo.php">SEO设置</a>
<a class="navi4" href="./style.php">后台风格</a>
<a class="navi4" href="./blogger.php">个人设置</a>-->
<?php if(isset($_GET['activated'])):?><div class="alert alert-success">设置保存成功<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><?php endif;?>
</div>
<div id="configurebox">
    <ul class="nav nav-tabs">
        <li><a href="#configure" data-toggle="tab">基本设置</a></li>
        <li><a href="#seo" data-toggle="tab">SEO设置</a></li>
        <li><a href="#style" data-toggle="tab">后台风格</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="configure" style="padding-top: 50px;">
            <form action="configure.php?action=mod_config" method="post" name="input" id="input" role="form" class="form-horizontal">
                <div class="form-group">
                    <label for="blogname" class="col-sm-2 control-label">站点标题</label>
                    <div class="col-sm-10">
                        <input maxlength="200" class="form-control" value="<?php echo $blogname; ?>" name="blogname" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="bloginfo" class="col-sm-2 control-label">站点副标题</label>
                    <div class="col-sm-10">
                        <input maxlength="200" class="form-control" value="<?php echo $bloginfo; ?>" name="bloginfo" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="blogurl" class="col-sm-2 control-label">站点地址</label>
                    <div class="col-sm-10">
                        <input maxlength="200" class="form-control" value="<?php echo $blogurl; ?>" name="blogurl" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="index_lognum" class="col-sm-2 control-label">每页显示文章数</label>
                    <div class="col-sm-10">
                        <input maxlength="5" size="4" class="form-control" value="<?php echo $index_lognum; ?>" name="index_lognum" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="timezone" class="col-sm-2 control-label tip"  data-toggle="tooltip" data-placement="right" title="" data-original-title="本地时间：<?php echo gmdate('Y-m-d H:i:s', time() + $timezone * 3600); ?>">所在时区</label>
                    <div class="col-sm-10">
                        <select name="timezone" class="btn btn-default btn-block">
                            <?php
                            $tzlist = array('-12'=>'(标准时-12) 日界线西',
                                '-11'=>'(标准时-11) 中途岛、萨摩亚群岛',
                                '-10'=>'(标准时-10) 夏威夷',
                                '-9'=>'(标准时-9) 阿拉斯加',
                                '-8'=>'(标准时-8) 太平洋时间(美国和加拿大)',
                                '-7'=>'(标准时-7) 山地时间(美国和加拿大)',
                                '-6'=>'(标准时-6) 中部时间(美国和加拿大)、墨西哥城',
                                '-5'=>'(标准时-5) 东部时间(美国和加拿大)、波哥大',
                                '-4'=>'(标准时-4) 大西洋时间(加拿大)、加拉加斯',
                                '-3.5'=>'(标准时-3:30) 纽芬兰',
                                '-3'=>'(标准时-3) 巴西、布宜诺斯艾利斯、乔治敦',
                                '-2'=>'(标准时-2) 中大西洋',
                                '-1'=>'(标准时-1) 亚速尔群岛、佛得角群岛',
                                '0'=>'(标准时) 西欧时间、伦敦、卡萨布兰卡',
                                '1'=>'(标准时+1) 中欧时间、安哥拉、利比亚',
                                '2'=>'(标准时+2) 东欧时间、开罗，雅典',
                                '3'=>'(标准时+3) 巴格达、科威特、莫斯科',
                                '3.5'=>'(标准时+3:30) 德黑兰',
                                '4'=>'(标准时+4) 阿布扎比、马斯喀特、巴库',
                                '4.5'=>'(标准时+4:30) 喀布尔',
                                '5'=>'(标准时+5) 叶卡捷琳堡、伊斯兰堡、卡拉奇',
                                '5.5'=>'(标准时+5:30) 孟买、加尔各答、新德里',
                                '6'=>'(标准时+6) 阿拉木图、 达卡、新亚伯利亚',
                                '7'=>'(标准时+7) 曼谷、河内、雅加达',
                                '8'=>'(标准时+8) 北京、重庆、香港、新加坡',
                                '9'=>'(标准时+9) 东京、汉城、大阪、雅库茨克',
                                '9.5'=>'(标准时+9:30) 阿德莱德、达尔文',
                                '10'=>'(标准时+10) 悉尼、关岛',
                                '11'=>'(标准时+11) 马加丹、索罗门群岛',
                                '12'=>'(标准时+12) 奥克兰、惠灵顿、堪察加半岛',
                            );
                            foreach($tzlist as $key=>$value):
                                $ex = $key==$timezone?"selected=\"selected\"":'';
                                ?>
                                <option value="<?php echo $key; ?>" <?php echo $ex; ?>><?php echo $value; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="functionswitch" class="col-sm-2 control-label">功能开关</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label for="login_code">
                                <input type="checkbox" value="y" name="login_code" id="login_code" <?php echo $conf_login_code; ?> />登录验证码
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="isgzipenable">
                                <input type="checkbox" value="y" name="isgzipenable" id="isgzipenable" <?php echo $conf_isgzipenable; ?> />Gzip压缩
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="isxmlrpcenable">
                                <input type="checkbox" value="y" name="isxmlrpcenable" id="isxmlrpcenable" <?php echo $conf_isxmlrpcenable; ?> />离线写作（支持用Windows Live Writer等工具写文章）
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="ismobile">
                                <input type="checkbox" value="y" name="ismobile" id="ismobile" <?php echo $conf_ismobile; ?> />手机访问版，地址：<span id="m"><a title="用手机访问你的站点"><?php echo BLOG_URL.'m'; ?></a></span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="isexcerpt">
                                <input type="checkbox" value="y" name="isexcerpt" id="isexcerpt" <?php echo $conf_isexcerpt; ?> />自动摘要，截取文章的前
                                <input type="text" name="excerpt_subnum" maxlength="3" value="<?php echo Option::get('excerpt_subnum'); ?>" class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;"/>个字作为摘要
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="twitter" class="col-sm-2 control-label">微语</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label for="istwitter">
                                <input type="checkbox" value="y" name="istwitter" id="istwitter" <?php echo $conf_istwitter; ?> />开启微语，
                                每页显示<input type="text" name="index_twnum" maxlength="3" value="<?php echo Option::get('index_twnum'); ?>" class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;"/>条微语
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="istreply">
                                <input type="checkbox" value="y" name="istreply" id="istreply" <?php echo $conf_istreply; ?> />开启微语回复
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="reply_code">
                                <input type="checkbox" value="y" name="reply_code" id="reply_code" <?php echo $conf_reply_code; ?> />回复验证码
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="ischkreply">
                                <input type="checkbox" value="y" name="ischkreply" id="ischkreply" <?php echo $conf_ischkreply; ?> />回复审核
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rss_output_num" class="col-sm-2 control-label">RSS</label>
                    <div class="col-sm-10" style="margin-top: 6px;">
                        输出<input maxlength="5" size="4" value="<?php echo $rss_output_num; ?>" class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;" name="rss_output_num" />篇文章（0为关闭），且输出
                        <select name="rss_output_fulltext" class="btn btn-default btn-sm" style="margin: -4px 4px 0 0;">
                            <option value="y" <?php echo $ex1; ?>>全文</option>
                            <option value="n" <?php echo $ex2; ?>>摘要</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="col-sm-2 control-label">评论</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label for="iscomment">
                                <input type="checkbox" value="y" name="iscomment" id="iscomment" <?php echo $conf_iscomment; ?> />开启评论，发表评论间隔<input maxlength="5" size="2" value="<?php echo $comment_interval; ?>" name=comment_interval class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;"/>秒
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="ischkcomment">
                                <input type="checkbox" value="y" name="ischkcomment" id="ischkcomment" <?php echo $conf_ischkcomment; ?> />评论审核
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="comment_code">
                                <input type="checkbox" value="y" name="comment_code" id="comment_code" <?php echo $conf_comment_code; ?> />评论验证码
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="isgravatar">
                                <input type="checkbox" value="y" name="isgravatar" id="isgravatar" <?php echo $conf_isgravatar; ?> />评论人头像
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="comment_needchinese">
                                <input type="checkbox" value="y" name="comment_needchinese" id="comment_needchinese" <?php echo $conf_comment_needchinese; ?> />评论内容必须包含中文
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="comment_paging">
                                <input type="checkbox" value="y" name="comment_paging" id="comment_paging" <?php echo $conf_comment_paging; ?> />评论分页，
                                每页显示<input maxlength="5" size="4" value="<?php echo $comment_pnum; ?>" name="comment_pnum" class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;"/>条评论，
                                <select name="comment_order" class="btn btn-default btn-sm" style="margin: -4px 4px 0 0;"><option value="newer" <?php echo $ex3; ?>>较新的</option><option value="older" <?php echo $ex4; ?>>较旧的</option></select>排在前面
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="att" class="col-sm-2 control-label">附件</label>
                    <div class="col-sm-10" style="margin-top: 6px;">
                        附件上传最大限制 <input maxlength="10" size="8" value="<?php echo $att_maxsize; ?>" name="att_maxsize" class="form-control input-sm" style="clear: none;
width: 80px;display: inline;margin: -10px 4px 0 4px;"/>KB（上传文件还受到服务器空间PHP配置最大上传 <?php echo ini_get('upload_max_filesize'); ?> 限制）
                        <br /><br />
                        允许上传的附件类型 <input maxlength="200" value="<?php echo $att_type; ?>" name="att_type" class="form-control input-sm" style="clear: none;
width: 300px;display: inline;margin: -10px 4px 0 4px;"/>（多个用半角逗号分隔）
                        <br /><br />
                        <div class="checkbox">
                            <label for="isthumbnail">
                                <input type="checkbox" value="y" name="isthumbnail" id="isthumbnail" <?php echo $conf_isthumbnail; ?> />
                                上传图片生成缩略图，最大尺寸：
                                <input maxlength="5" size="4" value="<?php echo $att_imgmaxw; ?>" name="att_imgmaxw" class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;"/>x
                                <input maxlength="5" size="4" value="<?php echo $att_imgmaxh; ?>" name="att_imgmaxh" class="form-control input-sm" style="clear: none;
width: 50px;display: inline;margin: -10px 4px 0 4px;"/>（单位：像素）
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="icp" class="col-sm-2 control-label">ICP备案号</label>
                    <div class="col-sm-10">
                        <input maxlength="200" class="form-control" value="<?php echo $icp; ?>" name="icp" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="footer_info" class="col-sm-2 control-label">首页底部信息</label>
                    <div class="col-sm-10">
                        <textarea name="footer_info" cols="" rows="6" class="form-control" ><?php echo $footer_info; ?></textarea>
                        <span class="help-block">支持html，可用于添加流量统计代码</span>
                    </div>
                </div>
                <div class="form-group">
                    <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="保存设置" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="seo">...</div>
        <div class="tab-pane fade" id="style">...</div>
    </div>
</div>
<script>
    $(function () {
        $('#configurebox .nav a:first').tab('show');
        $('#configurebox .nav a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
        $('.tip').tooltip({html:true});
    });
</script>
