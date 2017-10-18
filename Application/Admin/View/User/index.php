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
			<h1>管理员管理
				<small class="pull-right">
				<a class="btn btn-default" href="<?php echo U("Admin/User/add");?>">添加管理员</a>
				</small>
			</h1>
		</div>
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>用户名</th>
	          <th>管理</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php foreach($data as $user):?>
	        <tr>
	          <th scope="row">{$user['aid']}</th>
	          <td>{$user['auser']}</td>
	          <td>
	          	<a href="<?php echo U("Admin/User/add");?>?aid={$user['aid']}">修改</a>
	          	<a href="<?php echo U("Admin/User/delete");?>?aid={$user['aid']}">删除</a>
	          </td>
	        </tr>
	    <?php endforeach;?>
	      </tbody>
	    </table>
	     <nav class="pull-right" aria-label="Page navigation">
		    <?php echo $show;?>		  
		</nav>
	</div>
</body>
</html>