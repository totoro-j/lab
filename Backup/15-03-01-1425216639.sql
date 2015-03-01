-------------------------------------
------------www.esoxue.com-----------
---------2015-03-01 21:30:39---------
-------------------------------------
--
-- 数据表结构: `lab_article`
--

DROP TABLE IF EXISTS `lab_article`;
create table `lab_article` (
`id` int(11) not null  primary key auto_increment ,
`parentid` int(11) not null default 2   ,
`isshow` tinyint(4) not null default 0   ,
`title` varchar(60) not null    ,
`editor` varchar(30) not null    ,
`date` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP ,
`content` text not null    ,
`metacontent` varchar(60) not null    ,
`metaimg` varchar(60) not null    
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_article_del`
--

DROP TABLE IF EXISTS `lab_article_del`;
create table `lab_article_del` (
`id` int(11) not null  primary key  ,
`parentid` int(11) not null default 2   ,
`isshow` tinyint(4) not null default 0   ,
`title` varchar(60) not null    ,
`editor` varchar(30) not null    ,
`date` datetime not null    ,
`content` text not null    ,
`metacontent` varchar(60) not null    ,
`metaimg` varchar(60) not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_banner`
--

DROP TABLE IF EXISTS `lab_banner`;
create table `lab_banner` (
`id` int(11) not null  primary key auto_increment ,
`imgurl` varchar(60) not null    ,
`metacontent` varchar(60) not null    ,
`date` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_banner_del`
--

DROP TABLE IF EXISTS `lab_banner_del`;
create table `lab_banner_del` (
`id` int(11) not null  primary key  ,
`imgurl` varchar(60) not null    ,
`metacontent` varchar(60) not null    ,
`date` datetime not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_event`
--

DROP TABLE IF EXISTS `lab_event`;
create table `lab_event` (
`id` int(11) not null  primary key auto_increment ,
`testname` varchar(60) not null    ,
`testcontent` text not null    ,
`total` int(11) not null    ,
`state` tinyint(4) not null default 0   ,
`time` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP ,
`uid` int(11) not null    
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_event_del`
--

DROP TABLE IF EXISTS `lab_event_del`;
create table `lab_event_del` (
`id` int(11) not null  primary key  ,
`testname` varchar(60) not null    ,
`testcontent` text not null    ,
`total` int(11) not null    ,
`state` tinyint(4) not null default 0   ,
`time` datetime not null    ,
`uid` int(11) not null    ,
`delinfo` text not null    ,
`delstate` tinyint(4) not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_notice`
--

DROP TABLE IF EXISTS `lab_notice`;
create table `lab_notice` (
`id` int(11) not null  primary key auto_increment ,
`content` text not null    ,
`time` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP ,
`uid` int(11) not null    
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_notice_del`
--

DROP TABLE IF EXISTS `lab_notice_del`;
create table `lab_notice_del` (
`id` int(11) not null  primary key  ,
`content` text not null    ,
`time` datetime not null    ,
`uid` int(11) not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_orders`
--

DROP TABLE IF EXISTS `lab_orders`;
create table `lab_orders` (
`id` int(11) not null  primary key auto_increment ,
`starttime` datetime not null    ,
`finaltime` datetime not null    ,
`hours` tinyint(4) not null    ,
`ordertime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP ,
`edit` tinyint(4) not null default 0   ,
`info` varchar(30) not null    ,
`eid` int(11) not null    ,
`uid` int(11) not null    
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_orders_del`
--

DROP TABLE IF EXISTS `lab_orders_del`;
create table `lab_orders_del` (
`id` int(11) not null  primary key  ,
`starttime` datetime not null    ,
`finaltime` datetime not null    ,
`hours` tinyint(4) not null    ,
`ordertime` datetime not null    ,
`edit` tinyint(4) not null default 0   ,
`info` varchar(30) not null    ,
`eid` int(11) not null    ,
`uid` int(11) not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_temp`
--

DROP TABLE IF EXISTS `lab_temp`;
create table `lab_temp` (
`id` int(11) not null  primary key auto_increment ,
`new_event` smallint(6) not null default 0   ,
`new_user` smallint(6) not null default 0   ,
`new_order` smallint(6) not null default 0   
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_user`
--

DROP TABLE IF EXISTS `lab_user`;
create table `lab_user` (
`id` int(11) not null  primary key auto_increment ,
`username` varchar(30) not null    ,
`truename` varchar(30) not null    ,
`password` char(32) not null    ,
`sex` tinyint(4) not null default 1   ,
`unit` varchar(32) not null    ,
`department` varchar(32) not null    ,
`job` tinyint(4) not null default 2   ,
`principal` varchar(30) not null    ,
`tel` char(11) not null default 0   ,
`mail` varchar(32) not null    ,
`degree` tinyint(4) null    ,
`tutor` varchar(30) not null    ,
`grade` varchar(30) not null    ,
`time` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP ,
`role` tinyint(4) not null default 0   
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_user_del`
--

DROP TABLE IF EXISTS `lab_user_del`;
create table `lab_user_del` (
`id` int(11) not null  primary key  ,
`username` varchar(30) not null    ,
`truename` varchar(30) not null    ,
`password` char(32) not null    ,
`sex` tinyint(4) not null default 1   ,
`unit` varchar(32) not null    ,
`department` varchar(32) not null    ,
`job` tinyint(4) not null default 2   ,
`principal` varchar(30) not null    ,
`tel` char(11) not null default 0   ,
`mail` varchar(32) not null    ,
`degree` tinyint(4) null    ,
`tutor` varchar(30) not null    ,
`grade` varchar(30) not null    ,
`time` datetime not null    ,
`role` tinyint(4) not null default 0   ,
`delinfo` text not null    ,
`delstate` tinyint(4) not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_zip`
--

DROP TABLE IF EXISTS `lab_zip`;
create table `lab_zip` (
`id` int(11) not null  primary key auto_increment ,
`filename` varchar(60) not null    ,
`fileurl` varchar(60) not null    ,
`size` float(8,2) not null    ,
`date` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP ,
`uid` int(11) not null    
)engine=innodb charset=utf8;

--
-- 数据表结构: `lab_zip_del`
--

DROP TABLE IF EXISTS `lab_zip_del`;
create table `lab_zip_del` (
`id` int(11) not null  primary key  ,
`filename` varchar(60) not null    ,
`fileurl` varchar(60) not null    ,
`size` float(8,2) not null    ,
`date` datetime not null    ,
`uid` int(11) not null    ,
`deltime` timestamp not null default CURRENT_TIMESTAMP  on update CURRENT_TIMESTAMP 
)engine=innodb charset=utf8;

--
-- 数据表中的数据: `lab_article`
--

INSERT INTO `lab_article` VALUES ('5','1','1','f5rtg','bty5h4t6yg','2015-01-05 18:51:00','<p>bvt5hnu6jy57j</p>
','这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字这十五个字','54a93b5468a0f.jpg');

INSERT INTO `lab_article` VALUES ('2','1','1','d纳尼','达到','2015-01-05 12:22:59','<p>dadada阿顶顶顶顶</p>
','eqweqweqw','54aa11a365417.jpg');

INSERT INTO `lab_article` VALUES ('50','3','1','关于12月24日MRI停电通知','电子科技大学核磁共振中心','2015-01-06 17:23:07','由于热带季风影响，来自西伯利亚的持续低气压导致了电子科技大学的供电异常，为检修其电路，MRI特此停电，放假一天。','null','null');

INSERT INTO `lab_article` VALUES ('21','3','1','sd卡拉面大理石','电子科技大学核磁共振中心','2015-01-05 17:28:13','的喇嘛声卡','null','null');

INSERT INTO `lab_article` VALUES ('22','3','1','的快乐是大明','电子科技大学核磁共振中心','2015-01-05 17:28:18','的礼物可马上下','null','null');

INSERT INTO `lab_article` VALUES ('23','3','1','看了吗西安市','电子科技大学核磁共振中心','2015-01-05 17:28:21','我的就我看来是','null','null');

INSERT INTO `lab_article` VALUES ('53','4','0','hhhhhhhhh','ssss','2015-02-10 20:43:40','<p>betshbgthbtgdhtrfh</p>
','grtrgr','null');

INSERT INTO `lab_article` VALUES ('55','4','0','erfer4t5','cvrgtr','2015-02-10 20:44:20','<p>fergtrhtxhzxtdrhg zdagzda</p>
','sqwdswdwe','null');

INSERT INTO `lab_article` VALUES ('48','2','1','你好，2ua','我是作者','2015-01-05 21:43:43','<p>傅诗婷</p>

<p>本人姓名：傅诗婷</p>

<p>出生日期：1996年3月6日</p>

<p>爱好：小说，音乐，舞蹈，美食，夏洛克</p>

<p>特长：拉丁舞（学的不久，会一点基础）</p>

<p>曾担任职位：学校办公室成员，副班长，学习委员</p>

<p>目标：努力学习的同时全方位发展自身，主要侧重于提高沟通，组织，社交等必要能力。</p>

<p><br />
<img alt=\"\" src=\"/ckfinder/userfiles/images/image003.jpg\" style=\"height:640px; width:480px\" /></p>
','我是简介','54aa950f9b364.jpg');

INSERT INTO `lab_article` VALUES ('47','2','0','2015高考第一波消息','我是作者','2015-01-05 21:37:38','<p><strong>北大、清华<a href=\"http://weibo.com/u/1747929235?zw=edu\" target=\"_blank\">[微博]</a>、人大、复旦、浙大等重点大学陆续公布招生简章</strong></p>

<p>　　元旦刚过，关于2015年高考<a href=\"http://weibo.com/u/1642629063?zw=edu\" target=\"_blank\">[微博]</a>的第一波消息就来了。北京大学<a href=\"http://weibo.com/u/1757771873?zw=edu\" target=\"_blank\">[微博]</a>、清华大学<a href=\"http://weibo.com/u/1676317545?zw=edu\" target=\"_blank\">[微博]</a>、中国人民大学<a href=\"http://weibo.com/u/2120714163?zw=edu\" target=\"_blank\">[微博]</a>、复旦大学<a href=\"http://weibo.com/u/1729332983?zw=edu\" target=\"_blank\">[微博]</a>、同济大学<a href=\"http://weibo.com/u/1865154537?zw=edu\" target=\"_blank\">[微博]</a>、上海交大和浙江大学<a href=\"http://weibo.com/u/1851755225?zw=edu\" target=\"_blank\">[微博]</a>等重点大学，陆续公布了保送生和艺术特长生的招生简章。记者发现，和往年相比，今年高校保送生门槛高了。</p>

<p>　　各高校公布的保送生招生简章，大都仅针对外语类保送生，对象为符合教育部规定的具有保送生资格的全国16所外国语中学的优秀应届高中毕业生，以中学推荐的方式报名。&ldquo;今年中学生学科奥赛获奖生不再有保送资格(国家集训队员除外)，所以现在基本就剩下语言类保送生了。&rdquo;一位高校招生负责人告诉记者。</p>

<p>　　上海交通大学<a href=\"http://weibo.com/u/1739746697?zw=edu\" target=\"_blank\">[微博]</a>的保送生简章提到了奥赛获奖生，但是增设了不少前置条件：&ldquo;参加全国中学生(数学、物理、化学、生物、信息学)奥林匹克竞赛决赛获一等奖，并获得教育部规定的保送资格者，在决赛现场经我校面试合格后，可被我校直接预录取为2015年保送生。&rdquo;</p>

<p>　　不只是奥赛获奖生，哪怕外语类保送生的门槛也悄悄高了一截。</p>

<p>　　中国人民大学计划招收22名保送生，其中英语专业计划招18人，日语法语专业计划各招2人。</p>

<p>　　北京大学共有朝鲜语、希伯来语、德语等8个小语种专业招收保送生，招生人数不超过48人。</p>

<p>　　同济大学计划招收保送生，英语专业14名，日语专业8名，德语专业8名&hellip;&hellip;招生计划总共这么点，每所高校还不忘加一句：&ldquo;实际招生人数将根据生源情况灵活调整，择优录取，宁缺毋滥。&rdquo;</p>

<p>　　清华大学未公布招生计划数，笔试科目由去年的1门&ldquo;阅读与表达&rdquo;增加至语文、数学和英语3门。此外，中国人民大学、同济大学等多所高校的外语类保送生，也同样要参加语数外三项笔试科目。</p>

<p>　　浙江大学的外语类保送生，则要接受学科特长、创新潜质和综合素质的考察。</p>

<p>　　复旦大学今年将专设外语类保送生体验营，选拔&ldquo;具有显著的外语学科特长，并对中国文化有深刻理解和领悟的学生&rdquo;，体验营期间将进行笔试和面试，不但要考外语基础、英文写作，还要考中文写作。</p>

<p>　　一方面笔试难度增加了，另一方面，这些保送生的专业选择范围也缩小了。</p>

<p>　　今年清华大学保送生只能选择英语(世界文学与文化实验班)、英语和日语三个专业。而去年，清华保送生除语言类专业外，还可选择经济与金融、法学、新闻学等非语言类专业。北大也在招生简章中明确指出，考生可根据自己的专业兴趣初步填报五个专业志愿，但外语类专业保送生入学后不能转系转专业。</p>

<p>　　本报记者 沈蒙和</p>

<p>　　更多信息请访问：<a href=\"http://edu.sina.com.cn/gaokao/\" target=\"_blank\">新浪高考频道</a>&nbsp;<a href=\"http://edu.sina.com.cn/college/\" target=\"_blank\">报考院校信息库</a>&nbsp;<a href=\"http://zhiyuan.edu.sina.com.cn/?p=zhiyuan&amp;s=query&amp;a=report\" target=\"_blank\">查询被高校录取可能性</a></p>

<p>　　特别说明：由于各方面情况的不断调整与变化，新浪网所提供的所有考试信息仅供参考，敬请考生以权威部门公布的正式信息为准。</p>
','北大、清华[微博]、人大、复旦、浙大等重点大学陆续公布招生简章各高校公布的保送生招生简章，大都仅针对外语类保送生，对象为','54aa91e9d2845.jpg');

INSERT INTO `lab_article` VALUES ('38','3','1','42342','电子科技大学核磁共振中心','2015-01-05 19:59:36','null','null','null');

INSERT INTO `lab_article` VALUES ('39','3','1','324324','电子科技大学核磁共振中心','2015-01-05 19:59:39','3242342','null','null');

INSERT INTO `lab_article` VALUES ('40','3','1','4324','电子科技大学核磁共振中心','2015-01-05 19:59:43','2342342','null','null');

INSERT INTO `lab_article` VALUES ('51','2','1','生命科学文化节','生命学院','2015-01-06 17:29:13','<p>生命，这个世界上最精彩的存在；</p>

<p>生命学科，让生活更美好的学科；</p>

<p>生命学院，用生命赞美生命。</p>

<p>从2011年坚持到2014年，</p>

<p>从生命科学宣传月，发展到生命科学文化节</p>

<p>四年时光，见证了生命科学的魅力，也见证了生命人的成长。</p>

<p>随着学院的不断发展，生命人希望和所有成电人，共同分享这份美好。</p>

<p>&nbsp;</p>

<p><strong>应运而生，科学知识开启生命之旅</strong></p>

<p>顺应学科拓展战略，遵循时代背景，应运而生，以前沿生命学科，启动科学知识宣传。</p>

<p>科学讲座、知识竞赛、科普宣传，三个板块，内容丰富，层次合理。</p>

<p><strong>生命科学讲座</strong>，分为生命论坛和大师讲坛。每周生命论坛，seminar研讨，我们共同进步；大师讲坛，中国科学院院士李朝义教授解密脑与意识之间的奥秘；古巴科学院院士Pedro A. Valdes-Sosa将我们带入最前沿的生物医学工程前沿研究，学术精英的分享，让我们充分领略大师的魅力。</p>

<p><strong>生命科学知识竞赛</strong>，生命现象基础知识竞答，看谁&ldquo;一站到底&rdquo;；</p>

<p><strong>生命科普知识宣传</strong>，&ldquo;生命的探索&rdquo;系列科普展，揭秘神奇的生命世界；健康贴士，从身边点滴做起，保证健康，脉动生命；诺奖回顾、趣味实验，解密生活小常识，在实际操作中感受生命的魅力；脑机接口，结合成电大多数学科，奏响大脑和机器的琴瑟和鸣。</p>

<p>四年的科普知识宣传，引导学子了解生命，探索生命。</p>

<p>&nbsp;</p>

<p><strong>不辱使命，生命&middot;信息科创体系铺开</strong></p>

<p>小学院，大力量，不辱使命，建立完善的生命&middot;信息科创体系。</p>

<p><strong>建立生命&middot;信息竞赛体系。</strong>在鼓励学生参加学校的传统竞赛项目的基础上，一直在探索学院特色的竞赛内容。先后尝试过脑机接口大赛、医疗器械设计大赛、四川省&ldquo;生命之星&rdquo;科技邀请赛、全国生物医学电子创新设计大赛、国际基因工程机器大赛（iGEM），建立起校级、省级、国家级、世界级多层次科技竞赛平台，综合电子科技大学各类学科和专业。</p>

<p><strong>搭建各类科创平台。</strong>我们倡导&ldquo;创新&middot;共享&rdquo;，引入为学生提供多学科交叉的创新实践平台，建立恩普创新营、迈瑞俱乐部、联影俱乐部，携手成电，校企联合，从大一开始培养科技人才，助力梦想起航。神经信息教育部重点实验室、磁共振成像研究中心、111创新引智基地，更是为学生的科创启蒙和未来发展奠定了坚实的基础。</p>

<p>学生参与各类科技竞赛获奖国际级40余人次、国家级30余人次、省级30余人次、校级150余人次。2013年我校首次组队参加国际基因工程机器大赛（iGEM），软件队进入世界总决赛并获得金牌，实验队获得亚洲区银牌；2014年征战MIT，软件队再次斩获世界总决赛金牌、实验队也取得了世界总决赛银牌的历史性突破，为生命和信息学科的发展增添了亮丽的一笔。</p>

<p>&nbsp;</p>

<p><strong>登高望远，国际舞台折射溢彩流光</strong></p>

<p><strong>Beyond border</strong><strong>英语社</strong><strong>，营造国际化氛围。</strong>英语社每周与学院外籍千人Keith教授交流，和外国留学生联谊，举办主题活动等，营造大家学习英语、使用英语、勇于突破&ldquo;自我限制&rdquo;、乐于与他人交往的氛围。</p>

<p>&nbsp;<strong>&ldquo;请进来</strong><strong>，送出去</strong><strong>&rdquo;，积极开展国际交流营</strong><strong>。</strong>先后开展了美国卡尔顿大学交流营、美国巴克乃尔大学交流营、新加坡义安理工大学交流营等；鼓励学生参与各类出国计划，每年均开展川港大学生科技文化交流、美国新墨西哥州立大学交换生等项目。</p>

<p><strong>举办</strong><strong>高水平学术会议</strong><strong>，向国际标准看齐</strong>。Brain Connectivity Workshop 、&ldquo;第二届海峡两岸脑功能与脑成像研讨会&rdquo;、&ldquo;国际视觉科学会议&rdquo;、&ldquo;2013年生物医学工程联合学术年会&rdquo;等重大会议，各国专家的到来，极大地提升了学院的国际化氛围，也带来了国际化的新视野。</p>

<p>&nbsp;</p>

<p>通过不懈努力，近四年学生参与托福、雅思、GRE等考试人数逐年递增，共140人次参加考试；出境交流达69人次，出国深造24人。2013年学院单独与英国格拉斯哥大学生物医学工程系签订本科生交换生项目；2013年学院首次实现了留学生招收的突破，2014年学院留学生达到13人之多。</p>

<p>&nbsp;</p>

<p><strong>展翅飞翔，多方合作勇担生命责任</strong></p>

<p>科学不应该停留于基础研究，我们不应该止步于象牙之塔。多方合作，走出成电，面向社会，飞往香港，勇担生命科学的责任，让生命之光温暖更多的人。</p>

<p>2014年6月，申报教育部万人计划，在四川省科协和学校国际处支持下，和香港大学电工学院一起，师生60余人赴赴汶川映秀镇七一中学，为他们重建电脑室，带去新的教学理念和方法，更带去香港大学和电子科大对灾区师生的爱心。2015年6月，我们将继续这个项目，坚持奉献，传承爱心，让成电人和港大人的社会责任烙印在灾区的青山上，让成电人和港大人的友谊流淌在映秀的绿水中。</p>

<p>2015年4月，在教育部支持下，我们将和香港大学医学院合作，开展&ldquo;四川省珍稀动物基因保护项目&rdquo;，利用我们生命学科和医学学科的优势，争取提出熊猫、金丝猴等珍稀动物的保护方案，让专业造福自然。</p>

<p>&nbsp;</p>

<p><strong>未来展望</strong></p>

<p><strong>加强与学校各部门的交流合作。</strong>一路走来，感谢教务处、感谢宣传部、感谢研究生院、感谢国际合作交流处等等部门，正是你们的支持，让我们一路坚持；正是你们的帮助，调动了如此多的力量和人气，让我们活动越办越好，让成电文化中的生命文化，走得更远。在今后的工作中，我们一定积极和学校各个部门联系，虚心接受大家的指导。</p>

<p><strong>邀请全校各学院的深度参与。</strong>生命学院的发展离不开学校的支持，生命学科的发展也是和各学院的发展紧密联系的。iGEM取得的成功有信软学院、通信学院学生的力量；培养生命科学和信息科学相互交融的复合型科技人才，实现我们的人才培养目标，也需要我们今后的工作与各兄弟学院密切合作，深度参与，共荣共享。<img alt=\"\" src=\"/ckfinder/userfiles/images/54a395ca49e3b.jpg\" style=\"height:720px; width:960px\" /></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>应运而生，不辱使命，登高望远，展翅飞翔。从小到大，从弱到强，正如王志强书记的题词一样，我们不懈努力，我们不断思考，我们拓展深化，以坚实的行动筑就生命科学的未来，以一颗赤诚的心服务成电和社会。</p>

<p>&nbsp;</p>
','生命科学文化节，用生命赞美生命','54abaae9e2a48.jpg');

INSERT INTO `lab_article` VALUES ('42','3','1','dsfsd','电子科技大学核磁共振中心','2015-01-05 19:59:53','发生的方法','null','null');

INSERT INTO `lab_article` VALUES ('52','3','1','测试项目','电子科技大学核磁共振中心','2015-02-01 23:25:38','好的，这里是测试。','null','null');

INSERT INTO `lab_article` VALUES ('44','3','1','fsdfs','电子科技大学核磁共振中心','2015-01-05 20:00:04',' 水电费水电费','null','null');

INSERT INTO `lab_article` VALUES ('54','4','0','vgrsehbtrshtr','dwedwd','2015-02-10 20:43:53','<p>cegthgyhyjuj</p>
','xsccdcdc','null');

INSERT INTO `lab_article` VALUES ('46','3','1','非师范生','电子科技大学核磁共振中心','2015-01-05 20:00:16',' 发生的范德萨发生的','null','null');

--
-- 数据表中的数据: `lab_article_del`
--

INSERT INTO `lab_article_del` VALUES ('30','1','0','text-align:left;','text-align:left;','2015-01-05 19:03:47','<p>text-align:left;</p>
','text-align:left;','null','2015-02-10 23:31:06');

INSERT INTO `lab_article_del` VALUES ('65','1','0','俄方而反而反','额热热','2015-02-11 19:39:52','<p>的人的人</p>
','发热','null','2015-02-11 19:44:43');

--
-- 数据表中的数据: `lab_banner`
--

INSERT INTO `lab_banner` VALUES ('18','54aa8b5384fd8.jpg','【爸爸爸爸吧】','2015-01-05 21:02:11');

--
-- 数据表中的数据: `lab_banner_del`
--

INSERT INTO `lab_banner_del` VALUES ('19','54aba74a59f89.jpg','null','2015-01-06 17:13:46','2015-03-01 14:15:17');

--
-- 数据表中的数据: `lab_event`
--

INSERT INTO `lab_event` VALUES ('18','xas','sxax','0','3','2015-02-23 18:34:45','25');

INSERT INTO `lab_event` VALUES ('8','test2','test3','80','0','2015-01-05 21:46:37','27');

INSERT INTO `lab_event` VALUES ('7','test3','tes3','50','1','2014-12-22 10:41:01','26');

INSERT INTO `lab_event` VALUES ('6','test','test','30','1','2014-12-21 10:10:30','26');

INSERT INTO `lab_event` VALUES ('5','appointment_check','appointment_check','60','0','2015-02-12 13:06:44','24');

INSERT INTO `lab_event` VALUES ('10','sd','asd','0','0','2015-02-12 20:15:11','25');

INSERT INTO `lab_event` VALUES ('20','dawed','fewf','0','2','2015-02-12 13:09:11','25');

INSERT INTO `lab_event` VALUES ('21','one','one','0','0','2015-02-12 20:22:29','25');

INSERT INTO `lab_event` VALUES ('22','rwr','高规格','0','0','2015-02-12 13:09:59','25');

INSERT INTO `lab_event` VALUES ('23','风格认同感','分为台风','0','0','2015-02-12 13:06:44','25');

INSERT INTO `lab_event` VALUES ('24','dew','的武士刀','0','0','2015-02-12 13:09:59','25');

INSERT INTO `lab_event` VALUES ('25','管理员设为不可预约1','无','0','0','2015-02-12 13:09:59','25');

INSERT INTO `lab_event` VALUES ('26','管理员设为不可预约2','无','0','1','2015-02-12 13:09:59','25');

INSERT INTO `lab_event` VALUES ('27','管理员设为不可预约3','无','0','1','2015-02-12 13:09:59','25');

INSERT INTO `lab_event` VALUES ('28','管理员设为不可预约4','无','0','1','2015-02-12 13:09:59','25');

INSERT INTO `lab_event` VALUES ('29','管理员设为不可预约5','无','1','1','2015-02-12 19:20:50','25');

INSERT INTO `lab_event` VALUES ('33','233','23333333333333333333333333','0','1','2015-02-12 14:41:48','25');

INSERT INTO `lab_event` VALUES ('30','管理员设为不可预约6','无','0','1','2015-02-06 21:37:31','25');

INSERT INTO `lab_event` VALUES ('31','233','2333333','0','1','2015-02-12 13:29:45','32');

INSERT INTO `lab_event` VALUES ('32','管理员设为不可预约7','无','0','3','2015-02-06 21:37:31','25');

INSERT INTO `lab_event` VALUES ('34','大脑','出色的方式','0','0','2015-01-06 17:51:07','34');

INSERT INTO `lab_event` VALUES ('35','管理员设为不可预约8','无','0','1','2015-02-06 21:37:31','25');

INSERT INTO `lab_event` VALUES ('36','管理员设为不可预约9','无','0','1','2015-02-06 21:37:31','25');

INSERT INTO `lab_event` VALUES ('37','额我突然','发热体','30','0','2015-02-28 11:16:45','25');

INSERT INTO `lab_event` VALUES ('39','ewrt','errtet','0','0','2015-03-01 13:30:16','25');

INSERT INTO `lab_event` VALUES ('41','吼吼吼','额我突然我','12','0','2015-03-01 13:33:26','25');

INSERT INTO `lab_event` VALUES ('43','EFW','DWEQE','30','0','2015-03-01 13:36:09','25');

INSERT INTO `lab_event` VALUES ('44','DWE','QWQW','20','0','2015-03-01 13:36:41','25');

INSERT INTO `lab_event` VALUES ('45','1851','48949848949','20','0','2015-03-01 13:41:35','25');

INSERT INTO `lab_event` VALUES ('46','494','2+65186','20','0','2015-03-01 13:46:55','25');

INSERT INTO `lab_event` VALUES ('47','称为是','为成为成为成','2','2','2015-03-01 13:53:13','25');

INSERT INTO `lab_event` VALUES ('48','锋范的测试','爱看书看才能看','2','1','2015-03-01 14:02:19','76');

INSERT INTO `lab_event` VALUES ('51','askl','csadvsdvs','3','1','2015-03-01 14:50:53','77');

INSERT INTO `lab_event` VALUES ('52','grgt','creg','32','0','2015-03-01 14:55:22','77');

INSERT INTO `lab_event` VALUES ('54','uhihio','uitiutiok','20','2','2015-03-01 15:47:41','25');

--
-- 数据表中的数据: `lab_event_del`
--

INSERT INTO `lab_event_del` VALUES ('0','null','null','0','0','0000-00-00 00:00:00','0','fwer','1','2015-03-01 16:54:34');

INSERT INTO `lab_event_del` VALUES ('54','uhihio','uitiutiok','20','0','2015-03-01 15:47:41','25','fwetr','1','2015-03-01 16:54:43');

INSERT INTO `lab_event_del` VALUES ('18','xas','sxax','0','1','2015-02-23 18:34:45','25','null','2','2015-03-01 15:10:14');

INSERT INTO `lab_event_del` VALUES ('20','dawed','fewf','0','0','2015-02-12 13:09:11','25','而','1','2015-02-12 13:28:09');

INSERT INTO `lab_event_del` VALUES ('47','称为是','为成为成为成','2','0','2015-03-01 13:53:13','25','fewrq','1','2015-03-01 16:58:11');

--
-- 数据表中的数据: `lab_notice`
--

INSERT INTO `lab_notice` VALUES ('34','vrefre4tfge','2015-02-11 22:49:05','25');

INSERT INTO `lab_notice` VALUES ('30','Test!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!','2015-01-05 19:39:24','25');

INSERT INTO `lab_notice` VALUES ('29','姿势就是力量','2014-12-21 09:44:16','25');

INSERT INTO `lab_notice` VALUES ('32','here is a man.','2015-02-01 23:23:40','25');

--
-- 数据表中的数据: `lab_notice_del`
--

INSERT INTO `lab_notice_del` VALUES ('28','你大爷','2014-12-18 10:03:01','25','2015-03-01 15:06:25');

--
-- 数据表中的数据: `lab_orders`
--

INSERT INTO `lab_orders` VALUES ('3','2015-02-11 21:00:00','2015-02-11 22:00:00','1','2015-02-10 17:03:56','0','null','33','25');

INSERT INTO `lab_orders` VALUES ('2','2015-02-06 12:00:00','2015-02-06 21:00:00','9','2015-02-06 21:06:20','0','null','33','25');

INSERT INTO `lab_orders` VALUES ('4','2015-02-13 17:00:00','2015-02-13 19:00:00','2','2015-02-22 15:32:27','0','null','30','25');

INSERT INTO `lab_orders` VALUES ('7','2015-02-13 21:00:00','2015-02-13 22:00:00','1','2015-02-12 17:11:00','0','null','33','25');

INSERT INTO `lab_orders` VALUES ('8','2015-03-01 01:00:00','2015-03-01 04:00:00','0','2015-03-01 15:05:37','1','null','48','76');

INSERT INTO `lab_orders` VALUES ('9','2015-03-01 06:30:00','2015-03-01 07:00:00','0','2015-03-01 14:51:55','0','null','49','77');

INSERT INTO `lab_orders` VALUES ('10','2015-03-01 08:30:00','2015-03-01 09:00:00','0','2015-03-01 15:03:54','0','机器维修','0','25');

--
-- 数据表中的数据: `lab_temp`
--

INSERT INTO `lab_temp` VALUES ('96','1','0','0');

INSERT INTO `lab_temp` VALUES ('95','1','0','0');

INSERT INTO `lab_temp` VALUES ('94','1','0','0');

INSERT INTO `lab_temp` VALUES ('93','1','0','0');

INSERT INTO `lab_temp` VALUES ('92','1','0','0');

INSERT INTO `lab_temp` VALUES ('91','1','0','0');

INSERT INTO `lab_temp` VALUES ('90','1','0','0');

INSERT INTO `lab_temp` VALUES ('89','1','0','0');

INSERT INTO `lab_temp` VALUES ('88','1','0','0');

INSERT INTO `lab_temp` VALUES ('87','1','0','0');

INSERT INTO `lab_temp` VALUES ('86','1','0','0');

INSERT INTO `lab_temp` VALUES ('85','1','0','0');

INSERT INTO `lab_temp` VALUES ('84','1','0','0');

INSERT INTO `lab_temp` VALUES ('83','1','0','0');

INSERT INTO `lab_temp` VALUES ('82','1','0','0');

--
-- 数据表中的数据: `lab_user`
--

INSERT INTO `lab_user` VALUES ('32','2ua','梁维安','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','null','null','2','null','12345678900','250448196@qq.com','1','null','null','2015-02-12 18:31:46','5');

INSERT INTO `lab_user` VALUES ('33','qq250448196','你好','e99a18c428cb38d5f260853678922e03','1','电子科大','电工','1','老黄','12345678901','250448196@qq.com','null','null','null','2015-03-01 20:54:26','2');

INSERT INTO `lab_user` VALUES ('34','ff','ff','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','木盒','木盒','1','尽快擦拭就','12345678900','250448196@qq.com','null','null','null','2015-02-12 19:58:27','1');

INSERT INTO `lab_user` VALUES ('27','grew','fwer','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','null','null','1','null','18200268774','null','null','null','null','2015-02-12 19:58:27','1');

INSERT INTO `lab_user` VALUES ('28','test','test','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','null','null','1','null','18200268773','null','null','null','null','2015-02-12 21:31:16','2');

INSERT INTO `lab_user` VALUES ('45','abc123','abc123','e99a18c428cb38d5f260853678922e03','1','abc123','abc123','1','abc123','12345678901','250448196@qq.com','null','null','null','2015-02-12 22:27:49','0');

INSERT INTO `lab_user` VALUES ('30','test2','test2','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','null','null','1','null','12345678900','test2@test2.com','null','null','null','2015-03-01 16:42:16','1');

INSERT INTO `lab_user` VALUES ('25','250448196@qq.com','王菊','e99a18c428cb38d5f260853678922e03','1','null','null','1','a','18200268772','25044816@qq.com','null','null','null','2015-03-01 17:27:37','2');

INSERT INTO `lab_user` VALUES ('35','weiwei','安徽省','e99a18c428cb38d5f260853678922e03','1','商务','俄方','1','如果','18200268774','25@dwe.com','null','null','null','2015-02-12 19:39:05','5');

INSERT INTO `lab_user` VALUES ('36','aaaa','QAQ','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','eer','qwqw','1','wrefrfv','18200268773','2@q.com','null','null','null','2015-03-01 17:22:08','1');

INSERT INTO `lab_user` VALUES ('37','vvvvv','QAQQ','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','abc12','add','2','xswdcx','18200268773','a@bc.com','1','cde','rtt','2015-02-12 21:36:50','5');

INSERT INTO `lab_user` VALUES ('38','aaaaa','3we3','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','dw','AAA','1','ER','18200268773','250448196@Q.COM','null','null','null','2015-02-12 21:55:48','1');

INSERT INTO `lab_user` VALUES ('39','SWS','AS','36d04a9d74392c727b1a9bf97a7bcbac','1','AAAA','AAA','2','A3','18200268773','A@CC.COM','1','AA1','A2','2015-02-06 14:45:36','5');

INSERT INTO `lab_user` VALUES ('40','sss','qqq','0b4e7a0e5fe84ad35fb5f95b9ceeac79','1','fff','ggg','1','jjj','12345678900','25@dwe.com','null','null','null','2015-02-12 19:39:05','5');

INSERT INTO `lab_user` VALUES ('41','aaas','ssss','0b4e7a0e5fe84ad35fb5f95b9ceeac79','1','aaa','adsd','1','frfrf','12345678900','25044@qq.com','null','null','null','2015-02-12 19:39:05','5');

INSERT INTO `lab_user` VALUES ('47','abc1234','abc1234','a141c47927929bc2d1fb6d336a256df4','1','abc1234','abc1234','1','abc1234','12345678901','abc1234','null','null','null','2015-02-12 22:41:13','0');

INSERT INTO `lab_user` VALUES ('49','create','create','76ea0bebb3c22822b4f0dd9c9fd021c5','1','create','create','1','create','18200268774','create','null','null','null','2015-02-12 22:44:49','0');

INSERT INTO `lab_user` VALUES ('51','create0','create0','44cfab9ba68b506cb7d185ff68f46ebe','1','create0','create0','1','create0','12132143142','create0','null','null','null','2015-02-12 22:46:13','0');

INSERT INTO `lab_user` VALUES ('53','2013090202013','2013090202013','28d4f1b9334654646cb89d2c2b95cf37','0','2013090202013','2013090202013','1','2013090202013','18200268774','2013090202013','null','null','null','2015-02-12 22:48:56','0');

INSERT INTO `lab_user` VALUES ('55','wangju','wangju','34926e8142f68ccb456a56481a753af6','0','wangju','wangju','1','wangju','12345678900','wangju','null','null','null','2015-02-12 22:51:34','0');

INSERT INTO `lab_user` VALUES ('60','cccsssa','cccsssa','ff843d2b0b9b22e523fa94bed24020fa','1','cccsssa','cccsssa','1','cccsssa','12345678901','cbc@abc.com','null','null','null','2015-02-12 23:12:17','0');

INSERT INTO `lab_user` VALUES ('57','wangjus','wangjus','f283f5241bab226f51a9dd8585a805b8','0','wangjus','wangjus','1','wangjus','18200268772','wangjus','null','null','null','2015-02-12 22:53:33','0');

INSERT INTO `lab_user` VALUES ('58','qq250448','qq250448','fbb9d7d1480d6273d492fd2c6fd5f11c','0','qq250448','qq250448','1','qq250448','18200268773','qq250448','null','null','null','2015-02-12 22:54:16','0');

INSERT INTO `lab_user` VALUES ('65','wangjuq','wangjuq','d41d8cd98f00b204e9800998ecf8427e','0','wangjuq','wangjuq','1','wangjuq','12345678901','wangjuq','null','null','null','2015-02-12 23:25:42','0');

INSERT INTO `lab_user` VALUES ('66','wangjuc','wangjuc','420cdfd29f9e7d9d3396279af37d8d76','0','wangjuc','wangjuc','1','wangjuc','12345678900','wangjuc','null','null','null','2015-02-12 23:28:50','4');

INSERT INTO `lab_user` VALUES ('68','20130902020','20130902020','c3694f7d8ca1f85aac4bcb6a351d8505','1','20130902020','20130902020','1','20130902020','12345678901','20130902020','null','null','null','2015-02-12 23:40:11','0');

INSERT INTO `lab_user` VALUES ('73','redirects','redirects','2d8413ae32cda5259e93d4f3666f1235','0','redirects','redirects','1','redirects','18200268774','redirects','null','null','null','2015-03-01 17:16:13','4');

INSERT INTO `lab_user` VALUES ('70','201309020201','201309020201','e52e911c584e0edd04de1adfa0c76693','0','201309020201','201309020201','1','201309020201','12132143142','201309020201','null','null','null','2015-02-12 23:43:17','0');

INSERT INTO `lab_user` VALUES ('72','redirect','redirect','f17ca2c829680ada2fec9fc87bc5f606','0','redirect','redirect','1','redirect','12345678901','redirect','null','null','null','2015-02-12 23:47:19','4');

INSERT INTO `lab_user` VALUES ('75','onload','onload','93f832f4134cb1971480d196f3acf7e6','0','onload','onload','1','onload','12345678901','onload','null','null','null','2015-03-01 17:15:20','0');

INSERT INTO `lab_user` VALUES ('76','ff2','冯凡','e10adc3949ba59abbe56e057f20f883e','1','木盒','abc123','1','cccsssa','18200268774','cbc@abc.com','null','null','null','2015-03-01 14:01:35','1');

INSERT INTO `lab_user` VALUES ('77','ff3','冯凡','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','木盒','生命','1','大','12345678911','123@qq.com','null','null','null','2015-03-01 17:39:40','1');

--
-- 数据表中的数据: `lab_user_del`
--

INSERT INTO `lab_user_del` VALUES ('39','SWS','AS','36d04a9d74392c727b1a9bf97a7bcbac','1','AAAA','AAA','2','A3','18200268773','A@CC.COM','1','AA1','A2','2015-02-06 14:45:36','1','发热','2','2015-02-12 20:02:04');

INSERT INTO `lab_user_del` VALUES ('37','vvvvv','QAQQ','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','abc12','add','2','xswdcx','18200268773','a@bc.com','1','cde','rtt','2015-02-12 21:36:50','1','的','2','2015-02-12 22:01:09');

INSERT INTO `lab_user_del` VALUES ('66','wangjuc','wangjuc','420cdfd29f9e7d9d3396279af37d8d76','0','wangjuc','wangjuc','1','wangjuc','12345678900','wangjuc','null','null','null','2015-02-12 23:28:50','0','dw3rw3e','1','2015-03-01 17:05:10');

INSERT INTO `lab_user_del` VALUES ('74','insert','insert','e0df5f3dfd2650ae5be9993434e2b2c0','0','insert','insert','1','insert','12345678900','insert','null','null','null','2015-02-12 23:49:18','0','萨克成年了','3','2015-03-01 15:18:22');

INSERT INTO `lab_user_del` VALUES ('41','aaas','ssss','0b4e7a0e5fe84ad35fb5f95b9ceeac79','1','aaa','adsd','1','frfrf','12345678900','25044@qq.com','null','null','null','2015-02-12 19:39:05','1','dwerqw','2','2015-03-01 16:40:06');

INSERT INTO `lab_user_del` VALUES ('40','sss','qqq','0b4e7a0e5fe84ad35fb5f95b9ceeac79','1','fff','ggg','1','jjj','12345678900','25@dwe.com','null','null','null','2015-02-12 19:39:05','1','fewrwqr','2','2015-03-01 16:41:45');

INSERT INTO `lab_user_del` VALUES ('32','2ua','梁维安','20575ebc2b40c6eb6f3f51fd9f0ae5fa','1','null','null','2','null','12345678900','250448196@qq.com','1','null','null','2015-02-12 18:31:46','1','3WR32EQ','2','2015-03-01 17:13:06');

INSERT INTO `lab_user_del` VALUES ('73','redirects','redirects','2d8413ae32cda5259e93d4f3666f1235','0','redirects','redirects','1','redirects','18200268774','redirects','null','null','null','2015-03-01 17:16:13','0','FW4R','1','2015-03-01 17:16:23');

INSERT INTO `lab_user_del` VALUES ('72','redirect','redirect','f17ca2c829680ada2fec9fc87bc5f606','0','redirect','redirect','1','redirect','12345678901','redirect','null','null','null','2015-02-12 23:47:19','0','FEWRQ','1','2015-03-01 17:16:28');

INSERT INTO `lab_user_del` VALUES ('35','weiwei','安徽省','e99a18c428cb38d5f260853678922e03','1','商务','俄方','1','如果','18200268774','25@dwe.com','null','null','null','2015-02-12 19:39:05','1','WETREW','2','2015-03-01 17:17:10');

--
-- 数据表中的数据: `lab_zip`
--

INSERT INTO `lab_zip` VALUES ('3','sd.txt','54dc31d791971.txt','0.22','2015-02-12 12:53:43','25');

INSERT INTO `lab_zip` VALUES ('5','git.txt','54dc977125a5e.txt','0.61','2015-02-12 20:07:13','25');

INSERT INTO `lab_zip` VALUES ('4','git.txt','54dc32330a557.txt','0.61','2015-02-12 12:55:15','25');

INSERT INTO `lab_zip` VALUES ('6','git0.txt','54f128889a2e2.txt','0.61','2015-02-28 10:31:36','25');

INSERT INTO `lab_zip` VALUES ('7','g0.txt','54f285b6727c2.txt','0.61','2015-03-01 11:21:26','25');

