<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.min.css">
	<script src="/Public/js/jquery-1.12.4.min.js"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="margin-top: 200px;">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">管理员登录</h3>
				  </div>
				  <div class="panel-body">
				    <form class="form-horizontal" action="<?php echo U('/Admin/Login/index?do=check'); ?>" method="post">
						  <div class="form-group">
						    <label for="username" class="col-sm-2 control-label">用户名</label>
						    <div class="col-sm-10">
						      <input type="text" name="username" class="form-control" id="username" placeholder="请输入用户名">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="password" class="col-sm-2 control-label">密码</label>
						    <div class="col-sm-10">
						      <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default">登录</button>
						    </div>
						  </div>
						</form>
				  </div>
				  <div class="panel-footer text-right">版权</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>