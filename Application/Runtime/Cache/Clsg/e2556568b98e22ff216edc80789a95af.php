<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="/Public/img/clsg/logo.png"  type=”image/x-icon”>
	<title><?php echo ($plate["plate_name"]); ?></title>
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
		a{color: #a6937c;}
		.nav-top{display: flex;margin-top: 58px;height: 80%;overflow: hidden;font-size: 13px;font-family: '宋体';}
		.nav-top-left{display: flex;flex-direction: column;justify-content: center}
		.nav-top-right{display: flex;justify-content: flex-end;}
		.nav-top-left,.nav-top-right{min-width: 50%;display: flex;}
		.forum-title{font-size: 24px;color: #ffffff;font-family: '楷体';font-weight: bold;display: flex;padding-bottom: 15px;}
		.forum-title-text{padding-left: 5px;}
		.nav-top-right-paging{margin-top: 130px;}
		.paging{display: flex;align-items: center;font-size: 13px;color: #a6937c;}
		.paging>a{border: 1px solid #a6937c;padding: 4px 6px;margin-left: 2px;font-family: '黑体';}
		.paging>a:hover{color: #313131;background-color: #a6937c;}
		.index-page{color: #313131;background-color: #a6937c;}
		.max{height: 45px;line-height: 45px;width: 150px;font-size: 16px;}
		.news-div{color: #a6937c;font-size: 14px;background-color: #222222;margin-top: 15px;}
		.news-nav-title{padding: 0 10px;height: 60px;background: url('/Public/img/clsg/news-nav.png') no-repeat center;background-size: 100% 100%;}
		.news-nav-title>div{padding-top: 20px;}
		.news-nav-title>div>div:not(:last-child){border-right: 1.5px solid #7e6b5a}
		.news-nav{display: flex;}
		.news-nav>div:nth-child(1){flex-basis: 37%;}
		.news-nav>div:nth-child(2){flex-basis: 15%;}
		.news-nav>div:nth-child(3){flex-basis: 15%;}
		.news-nav>div:nth-child(4){flex-basis: 15%;}
		.news-nav>div:nth-child(5){flex-basis: 18%;}
		.news-nav>div{text-align: center;}
		.news{overflow: hidden;padding: 0 10px;}
		.news>li{height: 50px;border-bottom: 1px dashed #000000;font-size: 12px;overflow: hidden;}
		.news>li>div{height: 100%;border-bottom: 1px dashed #444444;box-sizing: border-box;display: flex;align-items: center;}
		.new-title{display: flex;align-items: center;}
		.grade-3{color: red;}
		.grade-2{color: yellow;}
		.new-title:hover{color: yellow;}
		.new-title img{width: 15px;}
		.news-footer{margin-top: 40px;height: 70px;padding: 0 50px;display: flex;justify-content: space-between;align-items: center;}
		.name-time{display: flex;flex-direction: column;}
		.reply{color: #59493f;font-size: 10px;}
		.card-form-div{width: 100%;padding: 0 20px;}
		.card-input-size{height: 27px;width: 350px;}
		.card-input-state{color: #a6937c;font-size: 12px;}
		.textarea-btn{margin-top: 30px;margin-bottom: 10px;}
		#cardFormTextarea{width: 100%;resize:none;height: 200px;font-size: 15px;}
	</style>

</head>
<body>
	<div class="max-div">
		<!--背景-->
		<div id="opaque-bg" class="pop">
			<!--弹框-->
			
	<div class="pop-frame " id="card">
		<a href="javascript:;" class="close"></a>
		<div class="pop-title">发表帖子</div>
		<div class="pop-frame-div">
			<div class="card-form-div">
				<form action="">
					<div class="form-row">
						<span class="form-row-name">主&ensp;&ensp;&ensp;题：</span>
						<input class="form-row-input card-input-size" maxlength="80" type="text">
						<span class="form-row-state card-input-state">还可以输入<span id="numberText">80</span>个字符</span>
					</div>
					<div class="form-row">
						<span class="form-row-name"></span>
						<div style="flex: 1;">
							<textarea class="form-row-input" name="" id="cardFormTextarea"></textarea>
						</div>
					</div>
				</form>
				<div class="form-row form-btn">
					<button type="button" class="btn textarea-btn">提&ensp;&ensp;交</button>
				</div>
			</div>
		</div>
	</div>

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
				
	<div class="nav-top half">
		<div class="nav-top-left">
			<div class="forum-title">
				<img src="/Public/img/clsg/zxft.png"/>
				<span class="forum-title-text"><?php echo ($plate["plate_name"]); ?></span>
			</div>
			<a href="javascript:;" data-action="card" class="btn max go">发新帖</a>
		</div>
		<div class="nav-top-right">
			<div class="nav-top-right-paging">
				<div class="paging">
					<a href="javascript:;">
						<img src="/Public/img/clsg/paging-left.png"/>
						<span>返回首页</span>
					</a>
					<a href="javascript:;" class="index-page">1</a>
					<a href="javascript:;">2</a>
					<a href="javascript:;">3</a>
					<a href="javascript:;">4</a>
					<a href="javascript:;">5</a>
					<a href="javascript:;">6</a>
					<a href="javascript:;">7</a>
					<a href="javascript:;">8</a>
					<a href="javascript:;">
						<span>下一页</span>
						<img src="/Public/img/clsg/paging-right.png"/>
					</a>
				</div>
			</div>
		</div>
	</div>

			</div>
			<div class="nav-bottom">
				<div class="half">
					<div class="nav-bottom-left">
	<div class="position"><span>您所在的位置：</span>
		<a href="/Clsg/Index/">《光荣三国志》官方论坛</a>
		<span>></span>
		<a href="/Clsg/Index/"><?php echo ($plate["region_name"]); ?></a>
		<span>></span>
		<a href="javascript:;"><?php echo ($plate["plate_name"]); ?></a>
	</div>
</div>
					<div class="nav-bottom-right">
						
	<a href="javascript:;" class="go" data-action="reg">注册</a>&nbsp;<strong>|</strong>&nbsp;<a href="javascript:;" class="go" data-action="login">登录</a>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!--body-->
		<div class="body">
			<div class="half">
				
	<div class="news-div">
		<div class="news-nav-title">
			<div class="news-nav">
				<div>标题</div>
				<div>作者</div>
				<div>回复</div>
				<div>查看</div>
				<div>最后发表</div>
			</div>
		</div>
		<ul class="news">
			<?php if(!empty($news)): if(is_array($news)): foreach($news as $key=>$new): ?><li>
						<div class="news-nav">
							<div>
								<a  href="/Clsg/Index/news?plateId=<?php echo ($plate["plate_id"]); ?>&newsId=<?php echo ($new["news_id"]); ?>" class="new-title">
									<img src="/Public/img/clsg/zxft.png"/>
									<div>
										<span class="grade-<?php echo ($new['news_grade']); ?>">【<?php echo ($new['news_grade'] == 3 ? '置顶' : ($new['news_grade'] == 2 ? '置顶' : '交流')); ?>】</span>
										<span><?php echo ($new["news_title"]); ?></span>
									</div>
								</a>
							</div>
							<div class="name-time"><span><?php echo ($new["plate_name"]); ?></span><span class="reply"><?php echo ($new["news_time"]); ?></span></div>
							<div><span><?php echo ((isset($new["news_reply_count"]) && ($new["news_reply_count"] !== ""))?($new["news_reply_count"]): "0"); ?></span></div>
							<div><span><?php echo ((isset($new["news_browse_count"]) && ($new["news_browse_count"] !== ""))?($new["news_browse_count"]): "0"); ?></span></div>
							<div class="name-time"><span><?php echo ((isset($new["lately_name"]) && ($new["lately_name"] !== ""))?($new["lately_name"]): "暂无"); ?></span><span class="reply"><?php echo ($new["lately_time"]); ?></span></div>
						</div>
					</li><?php endforeach; endif; ?>
				<?php else: ?>
				<li>
					<div class="news-nav">
						<span>快去发布帖子吧！</span>
					</div>
				</li><?php endif; ?>

		</ul>
		<div class="news-footer">
			<a href="javascript:;" data-action="card" class="btn max go">发新帖</a>
			<div class="paging">
				<a href="javascript:;">
					<img src="/Public/img/clsg/paging-left.png"/>
					<span>返回首页</span>
				</a>
				<a href="javascript:;" class="index-page">1</a>
				<a href="javascript:;">2</a>
				<a href="javascript:;">3</a>
				<a href="javascript:;">4</a>
				<a href="javascript:;">5</a>
				<a href="javascript:;">6</a>
				<a href="javascript:;">7</a>
				<a href="javascript:;">8</a>
				<a href="?plateId=<?php echo ($plateId); ?>&page=<?php echo ($page+1); ?>">
					<span>下一页</span>
					<img src="/Public/img/clsg/paging-right.png"/>
				</a>
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

<script>
	var conspicuous = null;
	clearInterval(conspicuous);
	var numberText = $("#numberText");
	$(".card-input-size").on("input propertychange",function(){
		numberText.text(80 - ($(this).val().length));
	});
	var grade3 = $(".grade-3");
	var indexGrade3 = 0;
	var color = ['red','yellow','blue'];
	conspicuous = setInterval(function () {
		grade3.css("color",color[indexGrade3]);
		indexGrade3++;
		indexGrade3 = indexGrade3 > 2 ? 0 : indexGrade3;
	},500);

</script>

</html>