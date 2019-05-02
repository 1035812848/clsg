<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<style>
		.error-div{
			font-size: 9px;
			color: red;
		}
	</style>
</head>
<body>
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4>登录</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-horizontal">
					<div class="form-group">
						<div class="col-lg-2 text-right visible-lg" style="padding: 0;">
							<label class="control-label">账号：</label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</span>
								<input type="text" required class="form-control" placeholder="账号/手机号" name="account">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-2 text-right visible-lg" style="padding: 0;">
							<label class="control-label">密码：</label>
						</div>
						<div class="col-lg-9">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</span>
								<input type="password" required class="form-control" placeholder="密码" name="password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-9">
							<button class="btn btn-info btn-block" type="button">登录</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="/Public/js/jquery-1.11.1.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/jquery.validate.min.js"></script>
<script src="/Public/js/messages_zh.js"></script>
<script src="/Public/js/my.js"></script>
<script>
	var form = $("form");
	form.myValidate();	//调用my登录验证， my.js
	form.find("button").click(function () {
		if (!form.valid()){
			return;
		}
		$.post('',form.serialize(),function (resp) {
			if (resp.state) {
				//location = "www.baidu.com";
			} else {
				$('input[name='+resp.field+']').showFieldError(resp.message);
				//alert(resp.message)
				//$.alert(resp.message)
			}
		});
	});


</script>
</html>