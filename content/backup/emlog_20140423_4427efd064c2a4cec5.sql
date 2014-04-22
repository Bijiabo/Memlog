#version:emlog 5.3.0
#date:2014-04-23 00:44
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO emlog_blog VALUES('1','欢迎使用emlog','1389456413','恭喜您成功安装了emlog，这是系统自动生成的演示文章。编辑或者删除它，然后开始您的创作吧！','','','1','5','blog','110','21','0','y','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('2','asdas','1389457645','asdasdas','','','1','-1','page','0','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('3','网址收录-Canvas教程','1392694228','https://developer.mozilla.org/zh-CN/docs/Canvas_tutorial','','','1','8','blog','24','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('4','我的2013','1392716955','大三一半多时光过去，又是不平凡的一年。\r\n\r\n###短暂的寒假\r\n\r\n过年的时候在家待的时间特别短，帮老妈升级了PC，顺便添置了打印机。然后各种教。\r\n\r\n撕掉了一本书。\r\n\r\n###城市亲历\r\n\r\n我记得过年放假回来是每年一次的“城市亲历”。传说这是美院的传统，不过我觉得现在也变了味道，形式为主吧。貌似有5个地方进行选择，这次很特别的有我家，而且算是我比较熟悉的地方。按照排名有惊无险的和小裕一起报了就。顺便看了一眼排名，在我眼中看来，这个真的是人打的分数排出来的么，呵呵。\r\n\r\n当时吐嘈最多的就是韦政给我们班普遍打分比较低，导致前20名我们班只有一个人，反正不是我。我记得当时他带课的时候我做的题目是关于易拉罐的设计，印象特别深刻，他比较注重成本和革命性吧，意思大概是这个太难，你做不了大的改变和革新，那就算了。当时心中万之草尼马奔腾，心想丫装B。后来过了很久，似乎也理解了一些。\r\n\r\n后来如愿去了淄博博山。带我们组的是一个叫赵江凌的女人，一开始感觉还不错，算是比较热心这种，我看过她的应聘简历，记得是留学俄罗斯学习过玻璃工艺，当时她应该是还没有正式进入美院，带完我们之后就顺理成章的进来了。后来发生了那么几件事儿，让我对她的印象和评价达到了负值。\r\n\r\n - 第一件事儿就是指导学生抄袭，尼玛这个我是绝对不能容忍的，特别是提供国外作品资料供学生作品抄袭的。\r\n - 其二大概是针对我的事情，据我估计应该是某个傻X和她说我是学校的刺头之类，加之我对自己做什么比较坚定，于是乎有了争议。当然我也不觉的她有审美，看过其作品，真的很一般。\r\n - 其三，大概是玻璃作品快制作完的时候，需要打磨。小裕做的“冰山”需要处理尖部，于是乎赵江凌开始拿小裕自己花钱做的东西开始切，做实验了，似乎也是没有把握的那种，切坏之后一句话也没说就默默走开了，顺便把从我这里借的手套仍在一堆污泥上。后来我花了两个多小时才帮小裕把先前造成的\"bug\"修复打磨好。\r\n - 价格真心坑，我无法想象集体砍价的结果比我一个学生去问厂长的价格还高。顺便缺乏判断力，明显有人少交钱，竟然让我分摊，去你丫的吧，呵呵。如今半年多过去，我先在都不知道当时做的一堆“垃圾“该如何处理。\r\n\r\n收获了一个教训，作业成本控制是个需要时刻提醒自己的事情。\r\n\r\n###第一次空间课程\r\n\r\n刚才翻看文件的时候才发现今年竟然连续上了两次李晓明的课程！这次课程还算比较有意思，设计两个空间，小组制。比较和我口味的是能够和晓辉和盼立一组，除了模型的活儿我一个人全包，不错。纠结于CPU渲染速度，刚才我看倒当时文件保存于早上3:29，当时不知度过了多少这样的夜晚，不过那段时间对于3D软件的学习真是神速，一周左右就建模渲染加动画，顺便还用python写了个针对建模问题的投影器小脚本，虽然最后没用上，但是挺酷的。后来演示效果不错，晓辉很辛苦的做了模型，至于盼立，我就不说什么了。课程结束的时候就是要放暑假了快，听说可能会有展览，于是课程结束之后我花了一些时间研究了一下关于canvas结合摄像头的一些东西，写了一个摄像头识别手指然后投影仪画线的脚本,当时想用投影仪测试，我还破天荒的周六跑到教室，结果传输线还坏了。不过后来这个传说中的展览就永远在传说中了。\r\n\r\n期间还导致了一个在我看了也没什么的误会，2014年1月9日艺术班开会的时候江帆居然还提起来了@@。李晓明是各种迟到旷课的，经常是我们到了教室等了一上午都不来的主，于是乎就有人给这事儿告到学校去了。被误认为是我干的无所谓，但是我绝对不会去给那个叫田伟的去说，我宁愿做817去大厂找头猪咆哮一番。\r\n\r\n###分班\r\n\r\n虽然有不靠谱的排名，不过还是第一志愿到了艺术班。其实本来也不想去的，只是觉得:\r\n\r\n - 空间方向一个李晓明，一个桑瑞，太不靠谱。\r\n - 产品方向 - 高阳的班传说会给老师干活。吴卓洋带的工作室不是我喜欢的方向，貌似还有个工作室是孙涤菲带的，我TM只知道他是做西装的。\r\n\r\n###假期\r\n\r\n放假之后没有回家，7月31号的时候第一次去TS见到了海虾。第一眼没有认出来刘宇，感觉和站长大会上的形象差距好大@@。我记得实习第一天早上去是周一吧，抱着枕头被子进去的，哈哈。一起修改了两周视频之后就开始倒腾3G版了，当时石飞也来了。后来我们俩就窝在那里一起折腾，于是就有了现在的第一版。比较粗糙，性能微渣的节奏。第一次测试的时候丽茹给列出来三十多个bug，当时我在地铁上，各种冒汗。再后来就淡定了，有一次一口气列出了100+bug。\r\n\r\n因为bug和功能问题各种延期，最后好歹是上了，其实有不少用户挺反感我们的第一个版本的。感觉我们自己做的时候陷进去了，不能跳出来审视一下，也许现在在做东西的时候还是经常如此。\r\n\r\n调试过程让我意识到也许使用touch事件是个错误。也许。\r\n\r\n在这期间参加了许多次活动，极客公园什么的，收获良多。\r\n\r\n###水滴\r\n\r\n某个周六早上去公司见到了牛牛，苏丹和妮子。和石飞一起搞起乐享微信留言的小东西。从此开始了蛋疼的“JS pk 乐享之旅”。随后的N个夜晚，午休时间，周末我就和乐享杠上了，在乐享的页面上做东西，简直是自虐的感觉，90%的修改都是通过乐享添加统计代码的地方引入JS然后各种AJAX调用之类解决。\r\n\r\n顺便吐嘈一下无节操承诺客户的事情，一个字：\"次奥\"。\r\n\r\n也就是在这个时候，微信一夜之间人气爆棚，极客公园甚至还搞了个微信I/O大会。现在回想起来略微过了些，更加看好轻应用。\r\n\r\n在水滴的时候比较大的收获是对于bs框架和canvas更熟悉了一些，比较喜欢自己做的那个刮刮卡效果（虽然后来应用的时候服务器意外悲剧了，and乐享原来那个无论逻辑还是效果上太不给力了）。其实没有在水滴学到什么东西，催的太紧，也没有多大发展，过得很纠结。也算是给自己一个教训，躲开静如这样的老板，扯淡的行业和不靠谱的前景。\r\n\r\n###9月\r\n\r\n开学之后需要来回奔波。精力感觉不如从前。\r\n\r\n我记得第一个课题是“身份”。总感觉不能融入大家，对于新分的班级也不怎么适应。这段时间我一直在看某些算法的东西，似乎讨论不到一起去。\r\n\r\n###10月\r\n\r\n因为租房合同问题被迫离开了大西二旗。\r\n\r\n学校这里还继续进行着可笑的课程。\r\n\r\n<div id=\"ruanti\"></div>\r\n\r\n###软体选修\r\n\r\n对于上一个课题的反感情绪延续到了下一个课题。周二早第一堂老师没来，我想，难道又一个“李晓明”？！周五去西二旗，于是旷了。\r\n\r\n第二周周二去了“家天地”。第一次见到带课老师（彭）。总的来说第二周收获不少，总结什么的我比较懒得写，于是草草发了一封邮件，不过心里稍微安心了一些，终于见到点真东西。\r\n\r\n第三周应该是第一次作业的交流。我只想说这是我TM上大学以来第一次感觉到教的学费学到东西。没有美院出身&体制内老师的那份扯蛋，能够准确的看清问题，思路清晰，理科生感觉。之后小组作业时对于结构细节的点评让我印象比较深刻。也使我第一次想要去车间为了作业去做点什么东西。\r\n\r\n还有一点，涉及了一下关于人体工程学的部分，对于我们这个专业实属难得。\r\n\r\n也是这个时候（离开TS后）才开始真正投入到课程中来。对于去沙发厂看到的结构框架，感觉略微粗暴。小组作业的时候有点小迷茫，不过最后终于熬夜搞定了原型。要是结构上有些混合材料的涉及就好了，感觉目前的课程还是在于木框架的了解上，希望对于西方现代软体家具的新材料能有更多了解吧。\r\n\r\n我都不知道该写点什么。只是希望能有几个真正的老师，如这样的课程。不知是不是进了体制内人就变了。\r\n\r\n###离开TS后\r\n\r\n也不能算是彻底离开。\r\n\r\n海虾推荐我看了下CanJS。我知道我该提升一下自己的水平了。10月末的时候翻译了下CanJS和Swiper的[文档](http://canjs.cn \"canjs中文网\")。顺便开始提升自己的前端相关水平。\r\n偶然间发现了英特尔的AF框架，性能各方面比较给力，译之，用之。开始业余时间折腾升级TS3G。\r\n\r\n待续...','<p style=\"white-space:normal;\">\r\n	大三一半多时光过去，又是不平凡的一年。\r\n</p>\r\n<h3 id=\"\" style=\"white-space:normal;\">\r\n	短暂的寒假\r\n</h3>\r\n<p style=\"white-space:normal;\">\r\n	过年的时候在家待的时间特别短，帮老妈升级了PC，顺便添置了打印机。然后各种教，还帮她值了一次夜班。后来我离开家里之后她还是没有动那台新电脑。夏天回家的时候，我一气之下把买的教材撕掉了。\r\n</p>','','1','-1','blog','29','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('5','测试','1392794366','dsfasfd\r\nasdfasdsf\r\nasdfsa\r\n\r\n##打法孙涤菲撒方法的撒发送的发##\r\n\r\n挥洒分阶段回家斯卡东方红\r\n回家凯撒电话费框架苏丹红发\r\n回家卡上房间快速的\r\n很简单卡号房间快递费\r\n回家肯定撒谎房间阿卡苏丹红发\r\n回家看电视翻看就阿斯顿回复\r\n回家快速地方哈即可地方\r\n回家阿斯顿开发哈就算快递费\r\n交互凯撒好地方即可撒旦回复即可发hsjdkfh回家快速大黄蜂即可苏丹红发\r\n回家肯定撒谎翻看较好的房间看\r\n回家卡上地方客户速度快解放后思考jdfhkjashfjkdhfjka回家卡死电话费即可苏丹红发送框架dhj\r\n## H2 ##','','','1','-1','blog','13','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('6','AppFramework中文文档 - 简介&入门','1392984983','*项目地址：http://app-framework-software.intel.com/index.php*\r\n\r\n*翻译：毕加波*\r\n\r\n###Welcome\r\n\r\n应用程序框架由三部分组成:\r\n\r\n - **App Framework** - 一个查询选择库\r\n - **UI** - 一个UI / UX库移动WebKit的浏览器\r\n - **Plugins** - 插件内置于应用程序框架的顶层\r\n\r\n**App Framework**是在移动设备上运行构建的轻量快速框架。他需要利用新的浏览器特性以及W3C CSS选择器支持。jsperf.net生成的性能测试表明它比其他的JavaScript库都更快。\r\n\r\n**App Framework UI**，也被称为AFUI，它是唯一一个使用相同方式对待Android\\*，iOS\\*，黑莓操作系统\\*和Win8\\*的移动框架。换句话说，AFUI不降低功能或性能来解决冲突或错误。举个栗子，大多数框架考虑的Android\\*的碎片化而忽略了该操作系统的具体版本，或者使用表现不佳的快捷方法。App Framework解决这些关键问题并提供一个纯净、响应式的HTML5的用户界面。\r\n\r\n**Plugins（插件）**是使用App Framework编写的用于扩充框架的单独的JavaScript库。插件提供超出基础应用范围的一些有用的功能和特性。App Framework UI使用了几个核心插件，比如af.scroller.js和af.css3animate.js。\r\n\r\n\r\n###关于AppFramework\r\n\r\n**App Framework**由英特尔赞助。\r\n\r\n**App Framework**是根据麻省理工学院的X11授权发布，与托管在GitHub。所有版权归英特尔所有（除非有特别说明）。\r\n\r\n\r\n###快速入门\r\n\r\n使用App Framework的适合，你可以只使用W3C有效选择器。可以去W3C围观全部列表。我们不支持jQuery已经创建的伪选择器。下面是一些如何使用App Framework帮助你快速开发的栗子。\r\n\r\n首先，在你的页面中引入App Framework.\r\n\r\n    <script src=\"//cdn.app-framework-software.intel.com/2.0/appframework.min.js\" type=\"text/javascript\"></script>\r\n\r\nApp Framework的工作原理是把元素添加到一个“桶”中，所有在“桶“里面的元素都有权限获取App Framework的Api函数以便于帮助你快速开发你的应用。\r\n\r\n使用App Framework，首先调用带有一个参数的$()函数。这个参数可以是以下列表中的一种。\r\n\r\n - 字符串 - 试一试一个元素的id \"#id\", 类名 \".foo\"， 组合 “#id .foo\"，或者一个HTML字符串去创建一个对象 “<div id=\"foo\"></div>\r\n - 元素 - 这将创建一个新的App Framework对象并添加项目到“桶”中。\r\n - 数组/对象 - 这将创建一个新的App Framework对象并添加项目到“桶”中。\r\n - 函数 - 当DOMContentLoaded被触发时执行此函数，或者稍后立即执行。\r\n\r\n你也可以添加一个“Context\"参数来搜索过滤它\\*。\r\n\r\n下面十一写查找元素的寄出例子：\r\n\r\n    $(\"#foo\"); //查找一个id=\"foo\"的元素;\r\n    $(\"div\"); //查找页面中所有的div元素;\r\n    $(\".foo\"); //查找页面重所有包含.foo的元素;\r\n    $(\"#foo span\"); //查找#foo内所有的span元素\r\n\r\n我们可以找到所有的li元素并给他们添加一个类.foo:\r\n    $(\"li\").addClass(\"foo\");\r\n\r\n这里我们通过id来找到元素#foo并隐藏它：\r\n    $(\"#foo\").hide();\r\n\r\n这里我们找到带有.removeme的所有元素并从DOM中移除它（它们）：\r\n    $(\".removeme\").remove();\r\n\r\n让我们来看看一些我们可以做的更NX的东西。下面，我们讲创建一个div元素，把它添加到页面重并注册一个点击事件(click)：\r\n\r\n    var div=$(\"<div id=\"\\\"myNewDiv\\\"\"\">This is some     content</div>\");\r\n    $(document.body).append(div);\r\n    div.bind(\"click\",function(){\r\n        alert(\"I was clicked\");\r\n    });\r\n\r\n\r\n\r\n###参与进来\r\n\r\n首先，在Github上建立分支。你可以从核心开始，打破事物，解决它们，并做出改进。当你觉得搞定了，请按下面的提交：\r\n\r\n - 概述\r\n - bug修正/添加特性\r\n - 测试用例\r\n - 是否对现有安装版本有影响','','','1','8','blog','29','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('7','','1392993724','','','','1','5','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('8','','1392994054','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('9','Hello,world:)','1392996045','测试个文章，喵～\r\n\r\n - 啦啦啦\r\n - 黑河','','','1','5','blog','4','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('10','test','1392996281','测试个文章，喵～<br />\r\n<br />\r\n - 啦啦啦<br />\r\n - 黑河','','','1','5','blog','2','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('11','MD语法测试','1393063769','不知道是不是如此一来就可以直接手机书写markdown语法了呢，嘿嘿','','','1','2','blog','6','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('12','文章测试一下吧','1393077247','不知可不可以**markdown** 手机用一定特别爽\r\n\r\n###啦啦啦～','','','1','2','blog','13','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('13','这样感觉还不错','1393078604','如果能够离线加载，封装起来就爽了，哈哈哈','','','1','2','blog','1','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('14','手机测试一下markdown语法','1393078804','#云改改感觉还算是不vu偶吧\r\n - 试试裂vi熬\r\n - 这样如何\r\n - 还是两只手比较舒服 \r\n - 哈哈，还是横过来屏幕比较爽@@\r\n -  列表','','','1','1','blog','3','0','0','n','n','n','y','y','','');
INSERT INTO emlog_blog VALUES('15','啥意思死','1393085173','的话多喝水回电话呵\r\n\r\n - 笑呵呵\r\n - 风好大回电话','','','1','-1','blog','2','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('16','草稿','1397629602','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('17','测试草稿123','1397629610','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('18','草稿测试','1397629624','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('19','新闻张','1397629632','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('20','','1397629639','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('21','测试文章001','1397629643','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('22','嘿嘿','1397629653','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('23','貌似还是不够数量','1397629679','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('24','文章草稿测试','1397629688','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('25','','1397661055','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');
INSERT INTO emlog_blog VALUES('26','','1398146645','','','','1','-1','blog','0','0','0','n','n','y','y','y','','');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO emlog_comment VALUES('1','1','0','1397560135','毕加波','测试评论缪奥','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('2','1','0','1397560142','毕加波','Hello world@@','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('3','1','0','1397560146','毕加波','啦啦啦～','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('4','1','0','1397627998','毕加波','测试评论','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('5','1','0','1397628005','毕加波','欢迎使用emlog','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('6','1','0','1397628033','毕加波','“销户”“关闭”“停止充值”，过去一个月，在一遍一遍“狼来了”的监管传闻中，比特币行业进入了最艰难的时刻：价格剧烈下跌，投机者哀鸿遍野，创业者担忧付出巨大努力的项目一夜之间化为乌有，投资者担忧手中比特币连废纸都没能剩下。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('7','1','0','1397628042','毕加波','从2010年创立计时，小米科技用不到四年的时间，成为中国第三大电商平台，秘密是什么？雷军曾有过多种解读，之一即是“比特世界与原子世界融合”。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('8','1','0','1397628053','毕加波','比特世界是新的计算技术与通讯技术构筑起来的信息世界，常被称为虚拟世界；原子世界是现实的物理世界。比特世界是过去40年生长出来的世界，给人类的生活、工作、娱乐带来巨大的变化。但虚拟世界过去大多独立于物理世界运行，随着比特世界的壮大，其与物理世界将趋于融合，碰撞也越来越剧烈。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('9','1','0','1397628069','毕加波','在“双11”之后，4月8日“米粉节”成为第二个购物狂欢节。小米科技提供的数据显示，24小时内售出小米手机超过130万台，共计产生订单200余万单。雷军当日接受21世纪经济报道记者采访时表示，这些订单将于一周之内全部发出。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('10','1','0','1397628082','毕加波','2013年，小米已经成为中国第三大电子商务公司：当年小米科技年销售约316亿元，全年销售手机1870万台。仅2013年12月份，小米实现销售约323万台。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('11','1','0','1397628112','毕加波','雷军四年前决定做小米科技时，电商渠道曾考虑过第三方电商，比如凡客，但最终还是决定自建电商渠道，如今它成为了整个小米的核心竞争力，这多少出乎雷军的意外。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('12','1','0','1397628122','毕加波','即使已经这样成功，小米电商还不是终极状态，只能算是测试版。小米手机每一次开放购买都会产生流量峰值，都是对小米电商系统一次压力测试，对小米电商和IT系统，包括仓、干、配在内的物流系统，都是一次巨大的考验。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('13','1','0','1397628156','毕加波','每一次压力测试，小米电商系统都会有一次升级与进化。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('14','1','0','1397628174','毕加波','此前，雷军在深圳IT峰会上透露，小米2014年销量将达到4000万台，以2000万台红米、2000万台小米计，手机产生营收将超过550亿元。除此外，小米还有其他产品的销售，其中包括小米电源、小米耳机、路由器、小米电视等产品。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('15','1','0','1397628181','毕加波','去年仅配件（包括小米T恤、耳机、米兔等）的销售额即为10.5亿元。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('16','1','0','1397628188','毕加波','来自小米科技内部的消息透露，4000万台只是保守的数据，小米科技内部目标是6000万台。仅今年3月份，小米销售了580万台小米手机。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('17','1','0','1397628195','毕加波','小米增量除了小米手机销量增长外，还有两个方面。一是区域市场的拓展，小米手机目前已经开始在港、台销售，接下来将拓展印度、巴西、俄罗斯等新兴市场。据第三方消息称，目前在俄罗斯市场已经有100万小米用户。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('18','1','0','1397629175','毕加波','米粉节当晚，雷军给小米中高层开会，表示“小米要做全球的小米”。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('19','1','0','1397629181','毕加波','二是品类的拓展，除了目前已经知道的电源、电视、耳机、路由等产品，小米会沿着硬件创新这条道路上继续前行。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('20','1','0','1397629188','毕加波','无论手机销量是6000万台，还是4000万台，小米都能坐稳国内电商第三把交椅。阿里集团仍然位居首位，京东商城排在第二位。跟在小米后面的是苏宁电商，再往后则是国美、凡客、当当等。','','http://localhost/M/','127.0.0.1','n');
INSERT INTO emlog_comment VALUES('21','1','0','1397629202','毕加波','对于小米来说，米粉节目的不仅是为了销货，其更大的意义是做压力测试：看看小米网、小米物流、小米供应链能承受多大的销量冲击，为接下来的扩产做准备。根据业内惯例，一个在高速成长期的电商，其今年的峰值大致可以作为明年的均值。按此估算，今年米粉节单日产生订单200万单，接下来一周将货送到用户手中，如果不出问题，则可做明年常态指标。','','http://localhost/M/','127.0.0.1','n');

DROP TABLE IF EXISTS emlog_options;
CREATE TABLE `emlog_options` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

INSERT INTO emlog_options VALUES('1','blogname','Moreii');
INSERT INTO emlog_options VALUES('2','bloginfo','more intelligent idea');
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
INSERT INTO emlog_options VALUES('13','index_lognum','6');
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
INSERT INTO emlog_options VALUES('26','comment_interval','15');
INSERT INTO emlog_options VALUES('27','isgravatar','y');
INSERT INTO emlog_options VALUES('28','isthumbnail','y');
INSERT INTO emlog_options VALUES('29','comment_paging','y');
INSERT INTO emlog_options VALUES('30','comment_pnum','10');
INSERT INTO emlog_options VALUES('31','comment_order','newer');
INSERT INTO emlog_options VALUES('32','login_code','n');
INSERT INTO emlog_options VALUES('33','reply_code','n');
INSERT INTO emlog_options VALUES('34','iscomment','y');
INSERT INTO emlog_options VALUES('35','ischkcomment','n');
INSERT INTO emlog_options VALUES('36','ischkreply','n');
INSERT INTO emlog_options VALUES('37','isurlrewrite','3');
INSERT INTO emlog_options VALUES('38','isalias','n');
INSERT INTO emlog_options VALUES('39','isalias_html','n');
INSERT INTO emlog_options VALUES('40','isgzipenable','n');
INSERT INTO emlog_options VALUES('41','isxmlrpcenable','n');
INSERT INTO emlog_options VALUES('42','ismobile','y');
INSERT INTO emlog_options VALUES('43','isexcerpt','n');
INSERT INTO emlog_options VALUES('44','excerpt_subnum','300');
INSERT INTO emlog_options VALUES('45','istwitter','y');
INSERT INTO emlog_options VALUES('46','istreply','n');
INSERT INTO emlog_options VALUES('47','topimg','content/uploadfile/201402/top-1392653623.jpg');
INSERT INTO emlog_options VALUES('48','custom_topimgs','a:1:{i:0;s:44:\"content/uploadfile/201402/top-1392653623.jpg\";}');
INSERT INTO emlog_options VALUES('49','timezone','8');
INSERT INTO emlog_options VALUES('50','active_plugins','a:2:{i:0;s:27:\"tpl_options/tpl_options.php\";i:1;s:21:\"kl_album/kl_album.php\";}');
INSERT INTO emlog_options VALUES('51','widget_title','a:13:{s:7:\"blogger\";s:12:\"个人资料\";s:8:\"calendar\";s:6:\"日历\";s:7:\"twitter\";s:12:\"最新微语\";s:3:\"tag\";s:6:\"标签\";s:4:\"sort\";s:6:\"分类\";s:7:\"archive\";s:6:\"存档\";s:7:\"newcomm\";s:12:\"最新评论\";s:6:\"newlog\";s:12:\"最新文章\";s:10:\"random_log\";s:12:\"随机文章\";s:6:\"hotlog\";s:12:\"热门文章\";s:4:\"link\";s:6:\"链接\";s:6:\"search\";s:6:\"搜索\";s:11:\"custom_text\";s:18:\"自定义组件 ()\";}');
INSERT INTO emlog_options VALUES('52','custom_widget','a:1:{s:11:\"custom_wg_1\";a:2:{s:5:\"title\";s:4:\"TEST\";s:7:\"content\";s:11:\"Hello world\";}}');
INSERT INTO emlog_options VALUES('53','widgets1','a:8:{i:0;s:8:\"calendar\";i:1;s:7:\"archive\";i:2;s:7:\"newcomm\";i:3;s:6:\"search\";i:4;s:4:\"link\";i:5;s:3:\"tag\";i:6;s:11:\"custom_wg_1\";i:7;s:4:\"sort\";}');
INSERT INTO emlog_options VALUES('54','widgets2','');
INSERT INTO emlog_options VALUES('55','widgets3','');
INSERT INTO emlog_options VALUES('56','widgets4','');
INSERT INTO emlog_options VALUES('57','att_maxsize','20480');
INSERT INTO emlog_options VALUES('58','att_type','rar,zip,gif,jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx');
INSERT INTO emlog_options VALUES('59','att_imgmaxw','420');
INSERT INTO emlog_options VALUES('60','att_imgmaxh','460');
INSERT INTO emlog_options VALUES('61','kl_album_config','a:0:{}');
INSERT INTO emlog_options VALUES('62','kl_album_info','a:0:{}');

DROP TABLE IF EXISTS emlog_navi;
CREATE TABLE `emlog_navi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naviname` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `newtab` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) NOT NULL DEFAULT '0',
  `isdefault` enum('n','y') NOT NULL DEFAULT 'n',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO emlog_navi VALUES('1','首页','','n','n','1','0','y','1','0');
INSERT INTO emlog_navi VALUES('2','微语','t','n','n','2','0','y','2','0');
INSERT INTO emlog_navi VALUES('3','登录','admin','n','n','3','0','y','3','0');
INSERT INTO emlog_navi VALUES('4','相册','?plugin=kl_album','n','n','2','0','y','2','0');
INSERT INTO emlog_navi VALUES('5','ces','','n','n','0','0','n','4','1');
INSERT INTO emlog_navi VALUES('6','az','','n','n','0','0','n','4','6');
INSERT INTO emlog_navi VALUES('7','asdsd','','n','n','0','0','n','4','7');
INSERT INTO emlog_navi VALUES('8','az','','n','n','0','0','n','4','6');
INSERT INTO emlog_navi VALUES('9','asdsd','','n','n','0','0','n','4','7');
INSERT INTO emlog_navi VALUES('10','emlog','','n','n','0','0','n','4','2');
INSERT INTO emlog_navi VALUES('11','blog','','n','n','0','0','n','4','3');
INSERT INTO emlog_navi VALUES('12','mail','','n','n','0','0','n','4','4');
INSERT INTO emlog_navi VALUES('13','emlog','','n','n','0','0','n','4','2');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO emlog_sort VALUES('1','ces','','0','0','','');
INSERT INTO emlog_sort VALUES('2','emlog','','0','0','','');
INSERT INTO emlog_sort VALUES('3','blog','','0','0','','');
INSERT INTO emlog_sort VALUES('4','mail','','0','0','','');
INSERT INTO emlog_sort VALUES('5','design','','0','0','hello','');
INSERT INTO emlog_sort VALUES('6','az','','0','1','','');
INSERT INTO emlog_sort VALUES('7','asdsd','','0','1','','');
INSERT INTO emlog_sort VALUES('8','html5','','0','0','','');

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO emlog_tag VALUES('16','123',',1,');
INSERT INTO emlog_tag VALUES('29','516',',1,');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO emlog_twitter VALUES('1','使用微语记录您身边的新鲜事','','1','1389456413','0');
INSERT INTO emlog_twitter VALUES('2','看一下喵','','1','1393061873','0');
INSERT INTO emlog_twitter VALUES('3','dfgsdgfdfg','','1','1393062493','0');
INSERT INTO emlog_twitter VALUES('9','我还是发个牢骚吧','','1','1393078547','0');
INSERT INTO emlog_twitter VALUES('20','风格哈','','1','1393085252','0');
INSERT INTO emlog_twitter VALUES('7','biu~','content/uploadfile/201402/thum-bbd11393063018.png','1','1393063018','0');
INSERT INTO emlog_twitter VALUES('10','asfadfsdafdsafsf','','1','1393084833','0');
INSERT INTO emlog_twitter VALUES('11','adsfsdfsdfsfdsfddcvvsdfsfadf','','1','1393084839','0');
INSERT INTO emlog_twitter VALUES('12','sdafsdafsdfsdfsadfasdfsdfsfdfsdjkhfjaskdfs\r\nsdfsdajkfhsjdkfhs\r\nsdhfjksdhfkjasfsdfsdfsadfsdfsd','','1','1393084848','0');
INSERT INTO emlog_twitter VALUES('13','asdasdasda','','1','1393084851','0');
INSERT INTO emlog_twitter VALUES('14','asdasdasdsaddsdfvddsfasdfsdf','','1','1393084857','0');
INSERT INTO emlog_twitter VALUES('15','dfadsfsdfsfsafasdf','','1','1393084899','0');
INSERT INTO emlog_twitter VALUES('16','sdfgdf','','1','1393084902','0');
INSERT INTO emlog_twitter VALUES('17','fdsgsdf','','1','1393084909','0');
INSERT INTO emlog_twitter VALUES('18','dsfdgdfgd','','1','1393084912','0');
INSERT INTO emlog_twitter VALUES('19','dfsgdvfdggfdg','','1','1393084917','0');
INSERT INTO emlog_twitter VALUES('21','分享图片','content/uploadfile/201402/thum-bbd11393085294.png','1','1393085294','0');
INSERT INTO emlog_twitter VALUES('22','分享图片','content/uploadfile/201402/thum-6c4e1393085356.jpg','1','1393085356','0');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO emlog_user VALUES('1','admin','$P$B6jTrVybJ3OwIlPyF9hhOLIk8uQtLu/','毕加波','admin','n','','','Hello,world');
INSERT INTO emlog_user VALUES('2','bijiabo','$P$BCwlSRAFobVr1HuxHRLNW05AK8P64c1','','writer','n','','','');

DROP TABLE IF EXISTS emlog_kl_album;
CREATE TABLE `emlog_kl_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` text,
  `album` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL DEFAULT '0',
  `w` smallint(5) NOT NULL DEFAULT '0',
  `h` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



#the end of backup