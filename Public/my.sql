drop database if exists ClsgForum; 
create database ClsgForum;
use ClsgForum;
#��¼
create table Login(
	id int primary key auto_increment,
	user_id int,
	account varchar(20) not null,
	password varchar(20) not null
);

#�û���Ϣ��
create table User(
	user_id int primary key auto_increment,
	user_name varchar(10),
	user_Email varchar(25),
	user_grade int default 1 #Ȩ�� 1��ͨ 2����Ա 3���
);

#����
create table Region(
	region_id int primary key auto_increment,
	region_name varchar(20)
);

#���
create table Plate(
	plate_id int primary key auto_increment,
	plate_name varchar(20)
);

#���������ϵ��
create table RP(
	rP_id int primary key auto_increment,
	region_id int,
	plate_id int
);

#����
create table News(
	news_id int primary key auto_increment,
	user_id int,#�û�ID
	news_title varchar(80),
	news_reply_count int,#��������
	news_browse_count int,#�������
	news_time timestamp default CURRENT_TIMESTAMP,	#��������ʱ��
	news_grade tinyint default 1 #�ȼ�,3��ɫ�ö� 2��ɫ�ö� 1��ͨ
);

#��������Ź�ϵ��
create table PN(
	pN_id int primary key auto_increment,
	plate_id int,
	news_id int
);

#�����������
create table NewsBrowse(
	newsBrowse_id int primary key auto_increment,
	news_id int,#����ID
	user_id int,  #�ο�ID
	newsBrowse_time timestamp default CURRENT_TIMESTAMP	#���ʱ��
);

#���� ���������൱������	�û��ܶ��û� �Լ� ��������
create table Comment(
	comment_id int primary key auto_increment,
	news_id int, #����ID
	p_id int default 0, #�ظ��˻ظ�����
	c_id int default 0, #¥ID
	user_id int, #�ظ���ID
	comment_time timestamp default CURRENT_TIMESTAMP	#�ظ�ʱ��
);

#��������
create table CommentInfo(
	commentInfo_id int primary key auto_increment,
	comment_id int,	#����ID
	commentInfo_text TEXT  #����
);










insert into Login(user_id,account,password) values(1,'admin','admin');
insert into Login(user_id,account,password) values(2,'zs','zs');
insert into Login(user_id,account,password) values(3,'lisi','lisi');
insert into Login(user_id,account,password) values(4,'wangwu','wangwu');
insert into Login(user_id,account,password) values(5,'maliu','maliu');
insert into Login(user_id,account,password) values(6,'maqi','maqi');
insert into User(user_name,user_grade) values('ϵͳ����Ա',3);
insert into User(user_name) values('����');
insert into User(user_name) values('����');
insert into User(user_name) values('����');
insert into User(user_name) values('����');
insert into User(user_name) values('����');
insert into Region(region_name) values('�ٷ�������');
insert into Region(region_name) values('�ۺ�������');
insert into Region(region_name) values('�ͻ�������');
insert into Plate(plate_name) values('���Ź���');
insert into Plate(plate_name) values('�ٷ��');
insert into Plate(plate_name) values('Ⱥ����¹');
insert into Plate(plate_name) values('��÷���');
insert into Plate(plate_name) values('���컭�');
insert into Plate(plate_name) values('�ͻ�����');
insert into Plate(plate_name) values('BUG�ͽ����ύ');
insert into Plate(plate_name) values('����֧��');
insert into RP(region_id,plate_id) values(1,1);
insert into RP(region_id,plate_id) values(1,2);
insert into RP(region_id,plate_id) values(2,3);
insert into RP(region_id,plate_id) values(2,4);
insert into RP(region_id,plate_id) values(2,5);
insert into RP(region_id,plate_id) values(3,6);
insert into RP(region_id,plate_id) values(3,7);
insert into RP(region_id,plate_id) values(3,8);
insert into News(user_id,news_title,news_grade) values(1,"����������ѽ����񿨻 New",3);
insert into News(user_id,news_title,news_grade) values(1,"���ڴ˴�ά��...",1);
insert into News(user_id,news_title,news_grade) values(1,"���ڸ��³��ֵ�BUG����",3);
insert into News(user_id,news_title,news_grade) values(2,"��˵��Ϸ������BUG",2);
insert into News(user_id,news_title,news_grade) values(1,"�����޸���iPad �ͻ���Ƶ���������⼰һЩ��Ϸ�����",3);
#insert into NewsInfo(news_id,newsInfo_text) values(1,'ÿ����Ϸ���£�Ϊȷ����Ϸ���ȶ��ԣ����Ƕ�����������ҽ���Ϸ����Ϊ���°汾��');
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
insert into CommentInfo(comment_id,commentInfo_text) values(1,'������ѯ�ͷ�');
insert into CommentInfo(comment_id,commentInfo_text) values(2,'��������һ��');
insert into CommentInfo(comment_id,commentInfo_text) values(4,'��������һ��');
insert into CommentInfo(comment_id,commentInfo_text) values(3,'��Ϸ���������⣬����ϵ���߿ͷ�');

