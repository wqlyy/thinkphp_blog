<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台系统</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/bootstrap/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery-1.12.4.min.js"></script>
	<script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include(THEME_PATH."nav.php");?>
	<div class="container">
		<div class="page-header">
			<h1>添加管理员
				<small class="pull-right">
				<a class="btn btn-default" href="<?php echo U("Admin/User/index");?>">返回列表</a>
				</small>
			</h1>
		</div>
		 <form class="form-horizontal" action="<?php echo U('/Admin/User/save'); ?>?aid=<?php echo $user['aid']?>" method="post">
		  <div class="form-group">
		    <label for="username" class="col-sm-2 control-label">用户名</label>
		    <div class="col-sm-10">
		      <input type="text" name="username" class="form-control" id="username" placeholder="请输入用户名" value="{$user['auser']}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">密码</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码" value="{$user['apassword']}">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">添加</button>
		    </div>
		  </div>
		</form>
	</div>
</body>
</html>