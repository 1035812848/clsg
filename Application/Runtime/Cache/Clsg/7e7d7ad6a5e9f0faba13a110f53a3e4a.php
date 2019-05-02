<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="/Public/img/clsg/logo.png"  type=”image/x-icon”>
	<title><?php echo ($news["news_title"]); ?></title>
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
		.grade-3{color: red;}
		.grade-2{color: yellow;}
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
		.reply-div{margin-top: 15px;}
		.reply{display: flex;min-height: 450px;}
		.reply-left{min-width: 200px;flex-basis: 20%;background-color: #2d2d2d;border-bottom: 6px solid #484848;}
		.reply-right{flex: 1;background-color: #222222;border-bottom: 6px solid #323232;display: flex;flex-direction: column;}
		.user-info{width: 120px;margin: 30px auto;}
		.portrait-box{width: 120px;height: 120px;background: url('/Public/img/clsg/portrait-box.png') no-repeat center;background-size: 100% 100%;display: flex;justify-content: center;align-items: center;}
		.portrait-img{width: 98px;height: 98px;}
		.user-name{color: #959595;font-size: 14px;justify-content: center;display: flex;margin-top: 10px;}
		.user-face{color: #7e6b5a;font-size: 12px;justify-content: center;display: flex;margin-top: 5px;}
		.blank-div{width: 95%;margin: 0 auto;display: flex;flex-direction: column;}
		.reply-header-div{border-bottom: 1px dashed #070707;line-height: 30px;height: 30px;}
		.reply-header{font-size: 12px;color: #7e6b5a;border-bottom: 1px dashed #3d3d3d;display: flex;justify-content: space-between;padding: 0 20px;box-sizing: border-box;height: 100%;}
		.reply-body{padding: 30px 20px;display: flex;flex-direction: column;flex: 1;}
		.reply-body-text{flex: 1;color: #7e6b5a;line-height: 20px;font-size: 13px;}
		.reply-body-foot{flex-basis: 20px;color: #7e6b5a;font-size: 13px;}
		.reply-footer{display: flex;height: 40px;}
		.reply-footer-left{background-color: #484848;min-width: 200px;flex-basis: 20%;}
		.reply-footer-right{background-color: #323232;flex: 1;}
		.reply-footer-paging{justify-content: flex-end;margin-top: 5px;}
		.reply-form-div{width: 100%;padding: 0 20px;}
		.textarea-btn{margin-top: 30px;margin-bottom: 10px;}
		#replyFormTextarea{width: 100%;resize:none;height: 200px;font-size: 15px;}
	</style>

</head>
<body>
	<div class="max-div">
		<!--背景-->
		<div id="opaque-bg" class="pop">
			<!--弹框-->
			
	<div class="pop-frame " id="reply">
		<a href="javascript:;" class="close"></a>
		<div class="pop-title">回&ensp;&ensp;复<span id="uname"></span></div>
		<div class="pop-frame-div">
			<div class="reply-form-div">
				<div class="form-row">
					<div style="flex: 1;">
						<textarea class="form-row-input" name="" id="replyFormTextarea"></textarea>
					</div>
				</div>
				<div class="form-row form-btn">
					<button type="button" class="btn textarea-btn" data-pid="0" data-nid="0" data-cid="0">提&ensp;&ensp;交</button>
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
				<span class="forum-title-text"><?php echo ($news["news_title"]); ?></span>
			</div>
			<a href="javascript:;" data-action="reply" class="btn max go" onclick='hf("<?php echo ($news["news_id"]); ?>",0)'>回复</a>
		</div>
		<div class="nav-top-right">
			<div class="nav-top-right-paging">
				<!--<div class="paging">
					<a href="javascript:;" class="prev-page" data-plateid="<?php echo ($plate["plate_id"]); ?>" data-newsid="<?php echo ($news["news_id"]); ?>">
						<img src="/Public/img/clsg/paging-left.png"/>
						<span>返回列表</span>
					</a>
					<?php $__FOR_START_660__=0;$__FOR_END_660__=$pageCount;for($i=$__FOR_START_660__;$i < $__FOR_END_660__;$i+=1){ ?><a href="javascript:;" class="<?php echo ($i == 0 ? 'Index-page' : ''); ?> pages"><?php echo ($i+1); ?></a><?php } ?>
					<a href="javascript:;" class="next-page" data-newsid="<?php echo ($news["news_id"]); ?>" data-pagesize="<?php echo ($pageSize); ?>" data-pagemax="<?php echo ($pageMax); ?>" data-pagecount="<?php echo ($pageCount); ?>">
						<span>下一页</span>
						<img src="/Public/img/clsg/paging-right.png"/>
					</a>

				</div>-->
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
		<a href="/Clsg/Index/" title="<?php echo ($plate["region_id"]); ?>"><?php echo ($plate["region_name"]); ?></a>
		<span>></span>
		<a href="/Clsg/Index/forum?plateId=<?php echo ($plate["plate_id"]); ?>" title="<?php echo ($plate["plate_id"]); ?>"><?php echo ($plate["plate_name"]); ?></a>
		<span>></span>
		<a href="javascript:;">
			<span class="grade-<?php echo ($news['news_grade']); ?>">【<?php echo ($news['news_grade'] == 3 ? '置顶' : ($news['news_grade'] == 2 ? '置顶' : '交流')); ?>】</span>
			<?php echo ($news["news_title"]); ?>
		</a>
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
				
	<div class="reply-div">

		<?php if(is_array($comments)): foreach($comments as $key=>$comment): if($comment["p_id"] == 0 ): ?><div class="reply">
					<div class="reply-left">
						<div class="user-info">
							<a href="javascript:;" title="<?php echo ($comment["user_id"]); ?>" class="portrait-box">
								<img class="portrait-img" src="/Public/img/clsg/official-portrait.jpg"/>
							</a>
							<span class="user-name release-name"><?php echo ($comment['user_name']); ?></span>
							<span class="user-face" title="<?php echo ($comment['user_grade']); ?>">[<?php echo ($comment['user_grade'] == 3 ? "系统管理员" : ($comment['user_grade'] == 2 ? '管理员' : '普通用户')); ?>]</span>
						</div>
					</div>
					<div class="reply-right">
						<div class="blank-div">
							<div class="reply-header-div">
								<div class="reply-header">
									<span>发表于&ensp;<span class="release-time"><?php echo ($comment['comment_time']); ?></span></span>
									<span class="floor"><?php echo ($key+1); ?>楼</span>
								</div>
							</div>
						</div>
						<div class="blank-div" style=";flex: 1;">
							<div class="reply-body">
								<div class="reply-body-text"><?php echo ($comment["cit"]); ?></div>
								<span class="reply-body-foot">本主题由&ensp;<span class="release-name"><?php echo ($comment['user_name']); ?></span>&ensp;于&ensp;<span class="release-time"><?php echo ($comment['comment_time']); ?></span>&ensp;<a href="javascript:;" class="del-reply go"  data-action="reply" onclick='hf("<?php echo ($news["news_id"]); ?>","<?php echo ($comment["comment_id"]); ?>","<?php echo ($comment["comment_id"]); ?>","<?php echo ($comment["user_name"]); ?>")' title="<?php echo ($comment["comment_id"]); ?>">回复</a> </span>
								<?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$com): $mod = ($i % 2 );++$i; if(is_array($comments)): $k = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($k % 2 );++$k; if($com["c_id"] == $comment["comment_id"] ): if($co["comment_id"] == $com["p_id"] ): ?><span class="reply-body-foot" style="padding-top: 5px;"><?php echo ($com["user_name"]); ?>&ensp;回复 ' <span class="release-name" style="color: #1affd0;"><?php echo ($co['user_name']); ?></span> '：&ensp;<?php echo ($com["cit"]); ?>&ensp;<span class="release-time" style="font-size: 10px;color: #214413">发表于&ensp;<?php echo ($com['comment_time']); ?></span>&ensp;<a href="javascript:;" class="del-reply go showhide" style="display: none;padding-left: 20px;" data-action="reply" onclick='hf("<?php echo ($news["news_id"]); ?>","<?php echo ($com["comment_id"]); ?>","<?php echo ($comment["comment_id"]); ?>","<?php echo ($com["user_name"]); ?>")'>回复</a> </span><?php endif; endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
					</div>
				</div><?php endif; endforeach; endif; ?>

		<?php if(empty($comments)): ?><div class="reply">
				<div class="reply-left">
					<div class="user-info"></div>
				</div>
				<div class="reply-right">
					<div class="blank-div">
						<div class="reply-header-div">
							<div class="reply-header"></div>
						</div>
					</div>
					<div class="blank-div" style=";flex: 1;">
						<div class="reply-body">
							<div class="reply-body-head">还没有评论哦！快去占沙发！</div>
							<span class="reply-body-foot"></span>
						</div>
					</div>
				</div>
			</div><?php endif; ?>


	</div>
	<!--分页-->
	<div class="reply-footer">
		<div class="reply-footer-left"></div>
		<div class="reply-footer-right">
			<div class="blank-div">
				<div class="paging reply-footer-paging">
					<a href="javascript:;" class="prev-page" data-plateid="<?php echo ($plate["plate_id"]); ?>" data-newsid="<?php echo ($news["news_id"]); ?>">
						<img src="/Public/img/clsg/paging-left.png"/>
						<span>返回列表</span>
					</a>
					<?php $__FOR_START_23211__=0;$__FOR_END_23211__=$pageCount;for($i=$__FOR_START_23211__;$i < $__FOR_END_23211__;$i+=1){ ?><a href="javascript:;" class="<?php echo ($i == 0 ? 'index-page' : ''); ?> pages"><?php echo ($i+1); ?></a><?php } ?>
					<a href="javascript:;" class="next-page" data-newsid="<?php echo ($news["news_id"]); ?>" data-pagesize="<?php echo ($pageSize); ?>" data-pagemax="<?php echo ($pageMax); ?>" data-pagecount="<?php echo ($pageCount); ?>">
						<span>下一页</span>
						<img src="/Public/img/clsg/paging-right.png"/>
					</a>
				</div>
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
		var conspicuous 	= null;
		clearInterval(conspicuous);									//关闭置顶效果
		var grade3 			= $(".grade-3");
		var indexGrade3 	= 0;
		var color 			= ['red','yellow','blue'];
		var replyDiv 		= $(".reply-div");						//回复大DIV
		var copy 			= $(".reply").eq(0).clone(true);       	//克隆的回复模板
		var nextPage 		= $(".next-page");
		var prevPage 		= $(".prev-page");
		var reply = $("#reply"); //回复框
		var tbtn = $(".textarea-btn");  //提交评论
		var replyFormTextarea = $("#replyFormTextarea");  //评论内容

		/*回复评论*/
		function hf(nid,pid,cid,uname){
			replyFormTextarea.val('');
			reply.find("#uname").html(uname != null ? ("&ensp;&ensp;@"+uname) : '').css("font-size","16px");
			tbtn.data("pid",pid);
			tbtn.data("cid",cid);
			tbtn.data("nid",nid);
		}

		/*显示恢复*/
		$(".reply-body-foot").hover(function () {
			$(this).find(".showhide").show();
		},function () {
			$(this).find(".showhide").hide();
		});

		/*提交评论*/
		tbtn.click(function () {
			$.post("/Clsg/Ajax/addComment",{news_id:tbtn.data("nid"),p_id:tbtn.data("pid"),c_id:tbtn.data("cid"),commentInfo_text:replyFormTextarea.val()},function (resp) {
				if (resp.status) {
					location = location;
				} else {
					alert("服务器连接失败！");
				}
			});
		});

		/*置顶效果*/
		conspicuous = setInterval(function () {
			grade3.css("color",color[indexGrade3]);
			indexGrade3++;
			indexGrade3 = indexGrade3 > 2 ? 0 : indexGrade3;
		},500);

		/*下一页效果*/
		nextPage.click(function () {
			var text =  $(this).children("span").text();
			text == "返回首页" ? location = "/Clsg/Index/news?news="+prevPage.data("plateid") : null;
			var index = nextPage.prevAll(".index-page");
			if (index.text() <= nextPage.data("pagemax")-1) {
				if (index.index() +1 == nextPage.index()) {
					pageChange(true,true,false);
				} else {
					pageChange(true,false,true);
				}
			}
		});

		/*上一页效果*/
		prevPage.click(function () {
			var text =  $(this).children("span").text();
			text == "返回列表" ? location = "/Clsg/Index/forum?plateId="+prevPage.data("plateid") : null;
			var index = prevPage.nextAll(".index-page");
			if (index.text() > 1) {
				var arr = [];
				if (index.index() -1 == prevPage.index()) {
					pageChange(false,true,false);
				} else {
					pageChange(false,false,true);
				}
			}
		});
		
		/*点击第几页刷新*/
		$(".pages").click(function () {
			var index = $(this);
			$.ajax({
				url: "/Clsg/Ajax/comment",
				data: 'page=' + $(this).text() + "&newsid=" + nextPage.data("newsid") + "&pagesize=" + nextPage.data("pagesize"),
				type: 'post',
				dataType: 'json',
				success: function (resp) {
					prevPage.nextAll(".index-page").removeClass("index-page");
					index.addClass("index-page");
					//prevPage.children("span").text(Index.text() == 1 ? "返回列表" : "上一页");
					reply(resp);
				},
				error: function () {

				}
			});
		});

		/*切换效果*/
		/*bool true 上一页 loop true 循环 pn true 上页*/
		function switchText(bool,loop,pn) {
			var index = prevPage.nextAll(".index-page");
			if (pn) {
				bool ? index.next().addClass("index-page") : index.prev().addClass("index-page");
				index.removeClass("index-page");
			}
			var pages = $(".pages");
			if (loop) {
				for (var i=0;i<pages.length;i++) {
					pages.eq(i).text(parseInt(pages.eq(i).text()) + (bool ? + 1 : -1));
				}
			}

		}


		/*翻页ajax*/
		function pageChange(bool,loop,pn) {
			$.ajax({
				url:"/Clsg/Ajax/comment",
				data:'page='+(parseInt($(".index-page").text()) + (bool ? +1 : -1)) +"&newsid="+nextPage.data("newsid")+"&pagesize="+nextPage.data("pagesize"),
				type:'post',
				dataType:'json',
				success:function (resp) {
					switchText(bool,loop,pn);	//翻页效果
					reply(resp);
				},
				error:function () {
					alert("连接服务器失败！");
				}
			});
		}

		/*回复板块替换*/
		function reply(resp) {
			index = prevPage.nextAll(".index-page");
			prevPage.children("span").text(	index.text() > 1 ? "上一页" : "返回列表");
			nextPage.children("span").text(	nextPage.data("pagemax") != index.text() ? "下一页" : "返回首页");
			var reply 		= 		copy;
			$(".reply").remove();
			var page  		= 		$(".index-page").text();
			var pageSize	= 		nextPage.data("pagesize");
			nextPage.attr("data-pagecount",resp['count']);
			for (var i=0;i<resp['cs'].length;i++) {
				reply.find(".portrait-box"		).attr("title",resp['cs'][i].user_id);
				reply.find(".release-name"		).text(resp['cs'][i].user_name);
				reply.find(".user-face"	  		).text("["+(resp['cs'][i].user_grade == 3 ? '系统管理员' : (resp.cs[0].user_grade == 2 ? '管理员' : '普通用户'))+"]");
				reply.find(".release-time"		).text(resp['cs'][i].comment_time);
				reply.find(".floor"		  		).text((((page - 1) * pageSize) + (i + 1)) + "楼");
				reply.find(".reply-body-text"	).text(resp['cs'][i].cit);
				reply.find(".del-reply"			).attr("title",resp['cs'][i].comment_id);
				copy = reply.clone(true);
				copy.appendTo(replyDiv);
			}
		}
	</script>

</html>