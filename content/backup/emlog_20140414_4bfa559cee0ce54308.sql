#version:emlog 5.3.0
#date:2014-04-14 00:26
#tableprefix:emlog_
DROP TABLE IF EXISTS emlog_attachment;
CREATE TABLE `emlog_attachment` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogid` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) NOT NULL DEFAULT '0',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `addtime` bigint(20) NOT NULL DEFAULT '0',
  `width` int(10) NOT NULL DEFAULT '0',
  `height` int(10) NOT NULL DEFAULT '0',
  `mimetype` varchar(40) NOT NULL DEFAULT '',
  `thumfor` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `blogid` (`blogid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO emlog_attachment VALUES('1','18','m_3f25532be23e00000119dcb00183.jpg','176956','../content/uploadfile/201404/8e1f1397351930.jpg','1397351930','600','926','image/jpeg','0');
INSERT INTO emlog_attachment VALUES('2','18','m_3f25532be23e00000119dcb00183.jpg','22914','../content/uploadfile/201404/thum-8e1f1397351930.jpg','1397351930','299','460','image/jpeg','1');

DROP TABLE IF EXISTS emlog_blog;
CREATE TABLE `emlog_blog` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `date` bigint(20) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` longtext NOT NULL,
  `alias` varchar(200) NOT NULL DEFAULT '',
  `author` int(10) NOT NULL DEFAULT '1',
  `sortid` int(10) NOT NULL DEFAULT '-1',
  `type` varchar(20) NOT NULL DEFAULT 'blog',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `comnum` int(10) unsigned NOT NULL DEFAULT '0',
  `attnum` int(10) unsigned NOT NULL DEFAULT '0',
  `top` enum('n','y') NOT NULL DEFAULT 'n',
  `sortop` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `checked` enum('n','y') NOT NULL DEFAULT 'y',
  `allow_remark` enum('n','y') NOT NULL DEFAULT 'y',
  `password` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`gid`),
  KEY `date` (`date`),
  KEY `author` (`author`),
  KEY `sortid` (`sortid`),
  KEY `type` (`type`),
  KEY `views` (`views`),
  KEY `comnum` (`comnum`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

INSERT INTO emlog_blog VALUES('1','欢迎使用emlog','1397313288','恭喜您成功安装了emlog，这是系统自动生成的演示文章。编辑或者删除它，然后开始您的创作吧！','','','1','-1','blog','0','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('2','','1397350995','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('3','','1397351028','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('4','','1397351075','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('5','','1397351131','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('6','','1397351199','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('7','','1397351254','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('8','','1397351446','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('9','','1397351475','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('10','','1397351497','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('11','','1397351523','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('12','','1397351579','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('13','','1397351710','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('14','','1397351721','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('15','','1397351786','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('16','','1397351815','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('17','','1397351881','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('18','','1397351922','','','','1','-1','blog','0','0','1','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('19','','1397351968','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('20','','1397352039','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('21','','1397352054','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('22','','1397352112','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('23','','1397352124','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('24','','1397352226','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('25','','1397352236','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('26','','1397352412','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('27','','1397352458','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('28','','1397353715','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('29','','1397382968','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('30','','1397395182','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('31','','1397395226','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('32','','1397395252','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('33','','1397395261','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('34','','1397395283','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');

DROP TABLE IF EXISTS emlog_comment;
CREATE TABLE `emlog_comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `poster` varchar(20) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `mail` varchar(60) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`cid`),
  KEY `gid` (`gid`),
  KEY `date` (`date`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS emlog_options;
CREATE TABLE `emlog_options` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

INSERT INTO emlog_options VALUES('1','blogname','点滴记忆');
INSERT INTO emlog_options VALUES('2','bloginfo','使用emlog搭建的站点');
INSERT INTO emlog_options VALUES('3','site_title','');
INSERT INTO emlog_options VALUES('4','site_description','');
INSERT INTO emlog_options VALUES('5','site_key','emlog');
INSERT INTO emlog_options VALUES('6','log_title_style','0');
INSERT INTO emlog_options VALUES('7','blogurl','http://localhost/M/');
INSERT INTO emlog_options VALUES('8','icp','');
INSERT INTO emlog_options VALUES('9','footer_info','');
INSERT INTO emlog_options VALUES('10','admin_perpage_num','15');
INSERT INTO emlog_options VALUES('11','rss_output_num','10');
INSERT INTO emlog_options VALUES('12','rss_output_fulltext','y');
INSERT INTO emlog_options VALUES('13','index_lognum','10');
INSERT INTO emlog_options VALUES('14','index_comnum','10');
INSERT INTO emlog_options VALUES('15','index_twnum','10');
INSERT INTO emlog_options VALUES('16','index_newtwnum','5');
INSERT INTO emlog_options VALUES('17','index_newlognum','5');
INSERT INTO emlog_options VALUES('18','index_randlognum','5');
INSERT INTO emlog_options VALUES('19','index_hotlognum','5');
INSERT INTO emlog_options VALUES('20','comment_subnum','20');
INSERT INTO emlog_options VALUES('21','nonce_templet','default');
INSERT INTO emlog_options VALUES('22','admin_style','default');
INSERT INTO emlog_options VALUES('23','tpl_sidenum','1');
INSERT INTO emlog_options VALUES('24','comment_code','n');
INSERT INTO emlog_options VALUES('25','comment_needchinese','y');
INSERT INTO emlog_options VALUES('26','comment_interval','60');
INSERT INTO emlog_options VALUES('27','isgravatar','y');
INSERT INTO emlog_options VALUES('28','isthumbnail','y');
INSERT INTO emlog_options VALUES('29','att_maxsize','20480');
INSERT INTO emlog_options VALUES('30','att_type','rar,zip,gif,jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx');
INSERT INTO emlog_options VALUES('31','att_imgmaxw','420');
INSERT INTO emlog_options VALUES('32','att_imgmaxh','460');
INSERT INTO emlog_options VALUES('33','comment_paging','y');
INSERT INTO emlog_options VALUES('34','comment_pnum','10');
INSERT INTO emlog_options VALUES('35','comment_order','newer');
INSERT INTO emlog_options VALUES('36','login_code','n');
INSERT INTO emlog_options VALUES('37','reply_code','n');
INSERT INTO emlog_options VALUES('38','iscomment','y');
INSERT INTO emlog_options VALUES('39','ischkcomment','y');
INSERT INTO emlog_options VALUES('40','ischkreply','n');
INSERT INTO emlog_options VALUES('41','isurlrewrite','0');
INSERT INTO emlog_options VALUES('42','isalias','n');
INSERT INTO emlog_options VALUES('43','isalias_html','n');
INSERT INTO emlog_options VALUES('44','isgzipenable','n');
INSERT INTO emlog_options VALUES('45','isxmlrpcenable','n');
INSERT INTO emlog_options VALUES('46','ismobile','n');
INSERT INTO emlog_options VALUES('47','isexcerpt','n');
INSERT INTO emlog_options VALUES('48','excerpt_subnum','300');
INSERT INTO emlog_options VALUES('49','istwitter','y');
INSERT INTO emlog_options VALUES('50','istreply','n');
INSERT INTO emlog_options VALUES('51','topimg','content/templates/default/images/top/default.jpg');
INSERT INTO emlog_options VALUES('52','custom_topimgs','a:0:{}');
INSERT INTO emlog_options VALUES('53','timezone','8');
INSERT INTO emlog_options VALUES('54','active_plugins','a:0:{}');
INSERT INTO emlog_options VALUES('55','widget_title','a:13:{s:7:\"blogger\";s:12:\"个人资料\";s:8:\"calendar\";s:6:\"日历\";s:7:\"twitter\";s:12:\"最新微语\";s:3:\"tag\";s:6:\"标签\";s:4:\"sort\";s:6:\"分类\";s:7:\"archive\";s:6:\"存档\";s:7:\"newcomm\";s:12:\"最新评论\";s:6:\"newlog\";s:12:\"最新文章\";s:10:\"random_log\";s:12:\"随机文章\";s:6:\"hotlog\";s:12:\"热门文章\";s:4:\"link\";s:6:\"链接\";s:6:\"search\";s:6:\"搜索\";s:11:\"custom_text\";s:15:\"自定义组件\";}');
INSERT INTO emlog_options VALUES('56','custom_widget','a:0:{}');
INSERT INTO emlog_options VALUES('57','widgets1','a:5:{i:0;s:8:\"calendar\";i:1;s:7:\"archive\";i:2;s:7:\"newcomm\";i:3;s:4:\"link\";i:4;s:6:\"search\";}');
INSERT INTO emlog_options VALUES('58','widgets2','');
INSERT INTO emlog_options VALUES('59','widgets3','');
INSERT INTO emlog_options VALUES('60','widgets4','');

DROP TABLE IF EXISTS emlog_navi;
CREATE TABLE `emlog_navi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naviname` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `newtab` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `isdefault` enum('n','y') NOT NULL DEFAULT 'n',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO emlog_navi VALUES('1','首页','','n','n','1','0','y','1','0');
INSERT INTO emlog_navi VALUES('2','微语','t','n','n','2','0','y','2','0');
INSERT INTO emlog_navi VALUES('3','登录','admin','n','n','3','0','y','3','0');

DROP TABLE IF EXISTS emlog_reply;
CREATE TABLE `emlog_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `ip` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `gid` (`tid`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS emlog_sort;
CREATE TABLE `emlog_sort` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortname` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(200) NOT NULL DEFAULT '',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `template` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS emlog_link;
CREATE TABLE `emlog_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `siteurl` varchar(75) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO emlog_link VALUES('1','emlog','http://www.emlog.net','emlog官方主页','n','0');

DROP TABLE IF EXISTS emlog_tag;
CREATE TABLE `emlog_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(60) NOT NULL DEFAULT '',
  `gid` text NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `tagname` (`tagname`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO emlog_tag VALUES('1','测试',',1,');
INSERT INTO emlog_tag VALUES('2','emlog',',1,');
INSERT INTO emlog_tag VALUES('3','hello',',1,');
INSERT INTO emlog_tag VALUES('4','first',',1,');
INSERT INTO emlog_tag VALUES('5','欢迎',',1,');
INSERT INTO emlog_tag VALUES('6','使用',',1,');
INSERT INTO emlog_tag VALUES('7','编辑',',1,');

DROP TABLE IF EXISTS emlog_twitter;
CREATE TABLE `emlog_twitter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `author` int(10) NOT NULL DEFAULT '1',
  `date` bigint(20) NOT NULL,
  `replynum` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `author` (`author`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO emlog_twitter VALUES('1','使用微语记录您身边的新鲜事','','1','1397313288','0');
INSERT INTO emlog_twitter VALUES('2','测试仪下位于','','1','1397350521','0');

DROP TABLE IF EXISTS emlog_user;
CREATE TABLE `emlog_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `role` varchar(60) NOT NULL DEFAULT '',
  `ischeck` enum('n','y') NOT NULL DEFAULT 'n',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO emlog_user VALUES('1','Bijiabo','$P$BNk5uxj8IkoL79.YbjAiw7jSkN2f6i.','','admin','n','','','');


#the end of backup