<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="/Public/img/clsg/logo.png"  type=”image/x-icon”>
	<title>官方论坛网站</title>
	<!--suppress CssUnknownTarget -->
	<style>
		body,html,ul,li{border: 0;margin: 0;padding: 0;}
		li{list-style: none;}
		a{text-decoration: none;}
		.position{color:#a6937c;font-size: 13px;font-family: '宋体';}
		.position>a:last-child{color: #fff100;}
		.max-div{min-width: 700px;position: relative;background: url('/Public/img/clsg/bg.png') no-repeat top;}
		.half{width: 60%;margin: auto;min-width: 700px;}
		.clear{clear: both}
		.header{position: relative;}
		.header .header-left{float: left;text-align: center;padding-top: 50px;}
		.header .header-left>a>img{margin: 15px 0;}
		.header .header-right{float: left;margin-top: 110px;}
		.nav-bg{background: url('/Public/img/clsg/nav.png') no-repeat bottom;height: 300px;overflow: hidden;}
		.nav-bottom{font-size: 14px;color: #7e6b5a;background: url('/Public/img/clsg/bottom-arrow.png') #131313 no-repeat top;}
		.nav-bottom .nav-bottom-left{line-height: 40px;height: 40px;float: left;}
		.nav-bottom .nav-bottom-right{line-height: 40px;height: 40px;float: right;}
		.nav-bottom .nav-bottom-right>a{color: #7e6b5a;}
		.body{background-color: #1b1b1b;padding-bottom: 50px;}
		.footer{height: 230px;background-color: #313131;text-align: center;}
		.footer>div{display: inline-block;color: #535353;font-size: 16px;margin-top: 80px;}
		.btn{background: url('/Public/img/clsg/btn.png') no-repeat center;background-size: 100% 100%;text-align: center;font-family: '楷体';color: #313131;font-weight: bold;}
		/*弹出框*/
		.pop{display: none;}
		.pop-frame{position: fixed;top: 20%;left: calc(50% - 300px);border: 8px solid #535353;width: 600px;background-color: #1b1b1b;z-index: 10;}
		.close{width: 35px;height: 35px;background: url('/Public/img/clsg/close.png') no-repeat #535353 6px 2px;background-size: 75% 75%;position: absolute;right: 0px;top:0px;}
		.pop-title{color: #484848;font-size: 22px;padding: 15px 15px;}
		.pop-frame-div{display: flex;}
		.pop-frame-left{flex-basis: 65%;padding: 0 15px;}
		.pop-frame-right{flex-basis: 35%;padding: 0 15px;display: flex;flex-direction: column;justify-content: center;}
		.pop-frame-right .message{color: #535353;font-size: 14px;margin-top: -80px;}
		.a-underline{text-decoration: underline;color: red;font-size: 14px;}
		.pop-frame-right .message a{color: #00ffff;}
		.form{width: 100%;border-right: 2px solid #535353;padding-bottom: 40px;}
		.form-row{display: flex;align-items: center;margin-bottom: 10px;}
		.form-row-name{color: #a6937c;flex-basis: 80px;font-size: 14px;}
		.form-row-input{background-color: #313131;border: 0;color: #a6937c;}
		.form-row-input-size{height: 28px;flex-basis: 170px;padding: 0 10px;}
		.form-row-state{color: red;padding-left: 10px;font-size: 14px;}
		.form-btn{display: flex;justify-content: center;margin-top: -25px;}
		.form-btn .btn{line-height: 50px;width: 170px;height: 50px;font-size: 18px;border: 0;cursor: pointer;margin-bottom: 20px;}
		#opaque-bg{position: absolute;top: 0;right: 0;left: 0;bottom: 0;background-color:rgba(0,0,0,0.5);}
	</style>
	
	<style>
		.body{background-color: #1b1b1b;}
		.nav-bottom{background-color: #1b1b1b;}
		.field{margin-top: 10px;margin-bottom: 40px;display: flex;justify-content: space-between;flex-wrap: wrap;}
		.field-nav{height: 65px;background: url('/Public/img/clsg/field.png') no-repeat;background-size: 100% 100%;line-height: 65px;color: #7e6b5a;font-size: 24px;font-family: '楷体';font-weight: bold;}
		.field-nav>.field-text{margin-left: 20px;float: left;}
		.field-nav>.field-img{margin-right: 20px;float: right;width: 40px;margin-top: 11px;height: 40px;background: url('/Public/img/clsg/field-reduce.png') no-repeat center;background-size: 100% 100%}
		.plate{background-color: #222222;height: 120px;display: flex;align-items:center;}
		.gfgg-plate{width: 49.4%;}
		.zhtl-plate{width: 32.5%;}
		.plate-img{width: 100px;height: 80px;text-align: center;}
		.plate-msg{display: flex;flex-direction: column;color: #7e6b5a;font-size: 12px;font-family: '宋体' ;line-height: 22px;}
		.plate-msg-title{font-size: 16px;color: #a6937c;font-weight: bold;}
		.nav-top{display: flex;justify-content: center;margin-top: 58px;height: 80%;overflow: hidden;color: #a6937c;font-size: 13px;font-family: '宋体';}
		.nav-top-left{background: url('/Public/img/clsg/left-woman.png') no-repeat 0 40px;justify-content: flex-end;}
		.nav-top-right{background: url('/Public/img/clsg/right-woman.png') no-repeat right -0px;}
		.nav-top-left,.nav-top-right{min-width: 500px;display: flex;background-size: 250px;width: 40%;}
		.nav-top-left>.message,.nav-top-right>.message{display: flex;flex-direction: column;justify-content: center;line-height: 25px;padding: 0 30px;}
		.nav-top .message-title{color: #e0e0e0;font-size: 22px;font-family: '楷体';font-weight: bold;display: flex;padding-bottom: 5px;}
		a{color: #a6937c;}
		.message>a:hover{color: red;}
	</style>

</head>
<body>
	<div class="max-div">
		<!--背景-->
		<div id="opaque-bg" class="pop">
			<!--弹框-->
			
			<!--注册-->
			<div class="pop-frame pop" id="reg">
				<a href="javascript:;" class="close"></a>
				<div class="pop-title">账号注册</div>
				<div class="pop-frame-div">
					<div class="pop-frame-left">
						<form action="" class="form">
							<div class="form-row">
								<span class="form-row-name">用&ensp;户&ensp;名：</span>
								<input class="form-row-input form-row-input-size" type="text">
								<span class="form-row-state">*</span>
							</div>
							<div class="form-row">
								<span class="form-row-name">昵&ensp;&ensp;&ensp;&ensp;称：</span>
								<input class="form-row-input form-row-input-size" type="text">
								<span class="form-row-state">*</span>
							</div>
							<div class="form-row">
								<span class="form-row-name">密&ensp;&ensp;&ensp;&ensp;码：</span>
								<input class="form-row-input form-row-input-size" type="password">
								<span class="form-row-state">*</span>
							</div>
							<div class="form-row">
								<span class="form-row-name">确认密码：</span>
								<input class="form-row-input form-row-input-size" type="password">
								<span class="form-row-state">*</span>
							</div>
							<div class="form-row">
								<span class="form-row-name">Email：</span>
								<input class="form-row-input form-row-input-size" type="text">
								<span class="form-row-state">*</span>
							</div>
						</form>
						<div class="form-row form-btn">
							<button type="button" class="btn">提&ensp;&ensp;交</button>
						</div>
					</div>
					<div class="pop-frame-right">
						<div class="message">已有账号，<a href="javascript:;" class="a-underline go" data-action="login">现在登录</a></div>
					</div>
				</div>
			</div>
			<!--登录-->
			<div class="pop-frame " id="login">
				<a href="javascript:;" class="close"></a>
				<div class="pop-title">账号登录</div>
				<div class="pop-frame-div">
					<div class="pop-frame-left">
						<form action="" class="form">
							<div class="form-row">
								<span class="form-row-name">用&ensp;户&ensp;名：</span>
								<input class="form-row-input form-row-input-size" type="text">
								<span class="form-row-state"></span>
							</div>
							<div class="form-row">
								<span class="form-row-name">密&ensp;&ensp;&ensp;&ensp;码：</span>
								<input class="form-row-input form-row-input-size" type="password">
								<span class="form-row-state"></span>
							</div>
							<div class="form-row">
								<span class="form-row-name"></span>
								<a href="javascript:;" class="a-underline go" data-action="retrieve">忘记密码？</a>
							</div>
						</form>
						<div class="form-row form-btn">
							<button type="button" class="btn">登&ensp;&ensp;录</button>
						</div>
					</div>
					<div class="pop-frame-right">
						<div class="message">没有账号，<a href="javascript:;" class="a-underline go" data-action="reg">马上注册</a></div>
					</div>
				</div>
			</div>
			<!--找回-->
			<div class="pop-frame " id="retrieve">
				<a href="javascript:;" class="close"></a>
				<div class="pop-title">找回密码</div>
				<div class="pop-frame-div">
					<div class="pop-frame-left">
						<form action="" class="form">
							<div class="form-row">
								<span class="form-row-name">用&ensp;户&ensp;名：</span>
								<input class="form-row-input form-row-input-size" type="text">
								<span class="form-row-state"></span>
							</div>
							<div class="form-row">
								<span class="form-row-name">Email：</span>
								<input class="form-row-input form-row-input-size" type="text">
								<span class="form-row-state"></span>
							</div>
						</form>
						<div class="form-row form-btn">
							<button type="button" class="btn">提&ensp;&ensp;交</button>
						</div>
					</div>
					<div class="pop-frame-right">
						<div class="message">没有账号，<a href="javascript:;" class="a-underline go"  data-action="reg">马上注册</a><br><a href="javascript:;" class="go"  data-action="login" style="color: #00ff00;" class="a-underline">返回登录</a></div>
					</div>
				</div>
			</div>
		</div>

		<!--头部-->
		<div class="header">
			<div class="half">
				<div class="header-left">
					<img src="/Public/img/clsg/logo.png"/><br>
					<a href="">
						<img src="/Public/img/clsg/gfwz.png"/>
					</a><br>
					<a href="">
						<img src="/Public/img/clsg/wx.png"/>
					</a>
				</div>
				<div class="header-right">
					<img src="/Public/img/clsg/text.png"/>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!--nav-->
		<div class="nav">
			<div class="nav-bg">
				
	<div class="nav-top">
		<div class="nav-top-left">
			<div class="message">
				<span class="message-title"><img src="/Public/img/clsg/rmtj.png"/>热门推荐</span>
				<a href="">·小蒙的炉石笔记21：冒险模式新卡浅析</a>
				<a href="">·纳克萨玛斯的呼唤&nbsp;ChinaJoy初探</a>
				<a href="">·玩家分享：新手玩家成长秘籍！</a>
				<a href="">·《炉石传说》编年史热门卡组回顾</a>
				<a href="">·九大职业橙卡的分析以及排名</a>
			</div>
		</div>
		<div class="nav-top-right">
			<div class="message">
				<span class="message-title"><img src="/Public/img/clsg/zxft.png"/>最新发帖</span>
				<a href="">·小蒙的炉石笔记21：冒险模式新卡浅析</a>
				<a href="">·纳克萨玛斯的呼唤&nbsp;ChinaJoy初探</a>
				<a href="">·玩家分享：新手玩家成长秘籍！</a>
				<a href="">·《炉石传说》编年史热门卡组回顾</a>
				<a href="">·九大职业橙卡的分析以及排名</a>
			</div>
		</div>
	</div>

			</div>
			<div class="nav-bottom">
				<div class="half">
					<div class="nav-bottom-left">
	<div class="position"><span>您所在的位置：</span>
		<a href="/Clsg/Index/">《光荣三国志》官方论坛</a>
	</div>
</div>
					<div class="nav-bottom-right">
						
	<a href="javascript:;" class="go" data-action="reg">注册</a>&nbsp;<strong>|</strong>&nbsp;<a href="javascript:;" class="go"  data-action="login">登录</a>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!--body-->
		<div class="body">
			<div class="half">
				
	<div class="field-nav">
		<div class="field-text">
			<span>官方公告区</span>
		</div>
		<div class="field-img"></div>
		<div class="clear"></div>
	</div>

	<div class="field">
		<div class="plate gfgg-plate">
			<a href="/Clsg/Index/forum/?plateId=1">
				<div class="plate-img">
					<img src="/Public/img/clsg/xwgg.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">新闻公告</span>
				<span>发布最新的游戏新闻和公告</span>
			</div>
		</div>
		<div class="plate gfgg-plate">
			<a href="/Clsg/Index/forum/?plateId=2">
				<div class="plate-img">
					<img src="/Public/img/clsg/gfhd.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">官方活动</span>
				<span>参加活动获取丰厚奖励</span>
			</div>
		</div>
	</div>

	<div class="field-nav">
		<div class="field-text">
			<span>综合讨论区</span>
		</div>
		<div class="field-img"></div>
		<div class="clear"></div>
	</div>
	<div class="field">
		<div class="zhtl-plate plate">
			<a href="javascript:;">
				<div class="plate-img">
					<img src="/Public/img/clsg/qxzl.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">群雄逐鹿</span>
				<span>探讨游戏、玩法分享，与伙伴一起征战三国</span>
			</div>
		</div>
		<div class="zhtl-plate plate">
			<a href="javascript:;">
				<div class="plate-img">
					<img src="/Public/img/clsg/qmzj.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">青梅煮酒</span>
				<span>探讨和对比武将属性、羁绊、技能展示自己最强武将</span>
			</div>
		</div>
		<div class="zhtl-plate plate">
			<a href="javascript:;">
				<div class="plate-img">
					<img src="/Public/img/clsg/fthj.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">方天画戟</span>
				<span>装备专区，展示自己的神装炫耀自己的实力</span>
			</div>
		</div>
	</div>

	<div class="field-nav">
		<div class="field-text">
			<span>客户服务区</span>
		</div>
		<div class="field-img"></div>
		<div class="clear"></div>
	</div>
	<div class="field">
		<div class="zhtl-plate plate">
			<a href="javascript:;">
				<div class="plate-img">
					<img src="/Public/img/clsg/khfw.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">客户服务</span>
				<span>在线工作人员为玩家解答游戏问题</span>
			</div>
		</div>
		<div class="zhtl-plate plate">
			<a href="javascript:;">
				<div class="plate-img">
					<img src="/Public/img/clsg/bugtj.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">BUG和建议提交</span>
				<span>反馈在游戏中遇到的BUG，并且鼓励玩家多提出游戏建议</span>
			</div>
		</div>
		<div class="zhtl-plate plate">
			<a href="javascript:;">
				<div class="plate-img">
					<img src="/Public/img/clsg/jszc.png"/>
				</div>
			</a>
			<div  class="plate-msg">
				<span class="plate-msg-title">技术支持</span>
				<span>解决玩家在下载、安装等过程中遇到的问题</span>
			</div>
		</div>
	</div>


			</div>
		</div>

		<!--footer-->
		<div class="footer">
			<div>
				<img src="/Public/img/clsg/textLogo.png"/><br>
				<span>© Copyright 2014 - digisky. All Right Reserved.</span>
			</div>

		</div>
	</div>

</body>
<script src="/Public/js/jquery-1.11.1.min.js"></script>
<script>
	var pop = $(".pop");
	$(".go").click(function () {
		pop.show();
		pop.find(".pop-frame").hide();
		var action = $(this).data("action");
		$("#"+action).slideDown(500);
	});
	
	$(".close").click(function () {
		$(this).parents(".pop").slideUp(200);
	});
</script>

</html>