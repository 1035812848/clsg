drop database if exists ClsgForum; 
create database ClsgForum;
use ClsgForum;
#登录
create table Login(
	id int primary key auto_increment,
	user_id int,
	account varchar(20) not null,
	password varchar(20) not null
);

#用户信息表
create table User(
	user_id int primary key auto_increment,
	user_name varchar(10),
	user_Email varchar(25),
	user_grade int default 1 #权限 1普通 2管理员 3最高
);

#区域
create table Region(
	region_id int primary key auto_increment,
	region_name varchar(20)
);

#板块
create table Plate(
	plate_id int primary key auto_increment,
	plate_name varchar(20)
);

#区域与板块关系表
create table RP(
	rP_id int primary key auto_increment,
	region_id int,
	plate_id int
);

#新闻
create table News(
	news_id int primary key auto_increment,
	user_id int,#用户ID
	news_title varchar(80),
	news_reply_count int,#评论人数
	news_browse_count int,#浏览人数
	news_time timestamp default CURRENT_TIMESTAMP,	#发布新闻时间
	news_grade tinyint default 1 #等级,3红色置顶 2黄色置顶 1普通
);

#板块与新闻关系表
create table PN(
	pN_id int primary key auto_increment,
	plate_id int,
	news_id int
);

#新闻浏览人数
create table NewsBrowse(
	newsBrowse_id int primary key auto_increment,
	news_id int,#新闻ID
	user_id int,  #游客ID
	newsBrowse_time timestamp default CURRENT_TIMESTAMP	#浏览时间
);

#评论 发布新闻相当于评论	用户能对用户 以及 新闻评论
create table Comment(
	comment_id int primary key auto_increment,
	news_id int, #新闻ID
	p_id int default 0, #回复人回复评论
	c_id int default 0, #楼ID
	user_id int, #回复人ID
	comment_time timestamp default CURRENT_TIMESTAMP	#回复时间
);

#评论内容
create table CommentInfo(
	commentInfo_id int primary key auto_increment,
	comment_id int,	#评论ID
	commentInfo_text TEXT  #内容
);










insert into Login(user_id,account,password) values(1,'admin','admin');
insert into Login(user_id,account,password) values(2,'zs','zs');
insert into Login(user_id,account,password) values(3,'lisi','lisi');
insert into Login(user_id,account,password) values(4,'wangwu','wangwu');
insert into Login(user_id,account,password) values(5,'maliu','maliu');
insert into Login(user_id,account,password) values(6,'maqi','maqi');
insert into User(user_name,user_grade) values('系统管理员',3);
insert into User(user_name) values('张三');
insert into User(user_name) values('李四');
insert into User(user_name) values('王五');
insert into User(user_name) values('马六');
insert into User(user_name) values('麻七');
insert into Region(region_name) values('官方公告区');
insert into Region(region_name) values('综合讨论区');
insert into Region(region_name) values('客户服务区');
insert into Plate(plate_name) values('新闻公告');
insert into Plate(plate_name) values('官方活动');
insert into Plate(plate_name) values('群雄逐鹿');
insert into Plate(plate_name) values('青梅煮酒');
insert into Plate(plate_name) values('方天画戟');
insert into Plate(plate_name) values('客户服务');
insert into Plate(plate_name) values('BUG和建议提交');
insert into Plate(plate_name) values('技术支持');
insert into RP(region_id,plate_id) values(1,1);
insert into RP(region_id,plate_id) values(1,2);
insert into RP(region_id,plate_id) values(2,3);
insert into RP(region_id,plate_id) values(2,4);
insert into RP(region_id,plate_id) values(2,5);
insert into RP(region_id,plate_id) values(3,6);
insert into RP(region_id,plate_id) values(3,7);
insert into RP(region_id,plate_id) values(3,8);
insert into News(user_id,news_title,news_grade) values(1,"关于礼包消费金额的神卡活动 New",3);
insert into News(user_id,news_title,news_grade) values(1,"关于此次维护...",1);
insert into News(user_id,news_title,news_grade) values(1,"关于更新出现的BUG问题",3);
insert into News(user_id,news_title,news_grade) values(2,"听说游戏出现了BUG",2);
insert into News(user_id,news_title,news_grade) values(1,"关于修复了iPad 客户端频繁断线问题及一些游戏错错误",3);
#insert into NewsInfo(news_id,newsInfo_text) values(1,'每逢游戏更新，为确保游戏的稳定性，我们都建议所有玩家将游戏升级为最新版本。');
insert into PN(plate_id,news_id) values(1,1);
insert into PN(plate_id,news_id) values(1,2);
insert into PN(plate_id,news_id) values(1,3);
insert into PN(plate_id,news_id) values(2,4);
insert into PN(plate_id,news_id) values(1,5);
insert into PN(plate_id,news_id) values(1,6);
insert into NewsBrowse(news_id,user_id) values(1,1);
insert into NewsBrowse(news_id,user_id) values(2,1);
insert into NewsBrowse(news_id,user_id) values(3,1);
insert into NewsBrowse(news_id,user_id) values(2,2);
insert into NewsBrowse(news_id,user_id) values(1,1);
insert into NewsBrowse(news_id,user_id) values(2,1);
insert into NewsBrowse(news_id,user_id) values(2,1);
insert into NewsBrowse(news_id,user_id) values(1,1);
insert into NewsBrowse(news_id,user_id) values(3,1);
insert into NewsBrowse(news_id,user_id) values(1,2);
insert into NewsBrowse(news_id,user_id) values(1,1);
insert into Comment(news_id,user_id) values(1,1);
insert into Comment(news_id,user_id) values(1,2);
insert into Comment(news_id,user_id) values(2,1);
insert into Comment(news_id,user_id) values(3,2);
insert into Comment(news_id,user_id) values(1,1);
insert into CommentInfo(comment_id,commentInfo_text) values(1,'有事咨询客服');
insert into CommentInfo(comment_id,commentInfo_text) values(2,'张三到此一游');
insert into CommentInfo(comment_id,commentInfo_text) values(4,'张三到此一游');
insert into CommentInfo(comment_id,commentInfo_text) values(3,'游戏中遇到问题，请联系在线客服');

