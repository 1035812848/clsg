<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="/Public/img/clsg/logo.png"  type=”image/x-icon”>
	<title>模板</title>
	<!--suppress CssUnknownTarget -->
	<style>
		body,html{border: 0;margin: 0;padding: 0;}
		a{text-decoration: none;}
		.max-div{min-width: 700px;position: relative;background: url('/Public/img/clsg/bg.png') no-repeat center 0;}
		.half{width: 50%;margin: auto;position: relative;min-width: 700px;}
		.clear{clear: both}
		.header{position: relative;}
		.header .header-left{float: left;text-align: center;padding-top: 50px;}
		.header .header-left>a>img{margin: 15px 0;}
		.header .header-right{float: left;margin-top: 110px;}
		.nav-top{background: url('/Public/img/clsg/nav.png') no-repeat bottom;height: 300px;}
		.nav-bottom{font-size: 14px;color: #7e6b5a;background: url('/Public/img/clsg/bottom-arrow.png') #131313 no-repeat top;}
		.nav-bottom .nav-bottom-left{line-height: 40px;height: 40px;float: left;}
		.nav-bottom .nav-bottom-right{line-height: 40px;height: 40px;float: right;}
		.nav-bottom .nav-bottom-right>a{color: #7e6b5a;}


		.body{background-color: #1b1b1b;padding-bottom: 100px;}

		.field{height: 65px;background: url('/Public/img/clsg/field.png') no-repeat;background-size: 100% 100%;line-height: 65px;color: #7e6b5a;font-size: 24px;font-family: '楷体';font-weight: bold;}
		.field>.field-text{margin-left: 20px;float: left;}
		.field>.field-img{margin-right: 20px;float: right;width: 40px;margin-top: 11px;height: 40px;background: url('/Public/img/clsg/field-reduce.png') no-repeat;background-size: 100% 100%}

		.footer{height: 210px;background: url('/Public/img/clsg/footer.png') no-repeat bottom;text-align: center;}
		.footer>div{display: inline-block;color: #535353;font-size: 16px;margin-top: 80px;}
	</style>
</head>
<body>
	<div class="max-div">
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
			<div class="nav-top"></div>
			<div class="nav-bottom">
				<div class="half">
					<div class="nav-bottom-left">您所在的位置：<span style="color: #fff100">《三国》</span></div>
					<div class="nav-bottom-right"><a href="">注册</a>&nbsp;<strong>|</strong>&nbsp;<a href="">登录</a></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<!--body-->
		<div class="body ">


			<div class="half">
				<div class="field">
					<div class="field-text">
						<span>论坛专区</span>
					</div>
					<div class="field-img">
						<!--<img src="/Public/img/clsg/field-reduce.png"/>-->
					</div>
					<div class="clear"></div>
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
</html>