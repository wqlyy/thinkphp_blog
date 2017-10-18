<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台系统</title>
	<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.min.css">
	<script src="/Public/js/jquery-1.12.4.min.js"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include(THEME_PATH."nav.php");?>
	<div class="container">
		<div class="page-header">
			<h1>博客管理
				<small class="pull-right">
				<a class="btn btn-default" href="<?php echo U("Admin/Blog/add");?>">添加博客</a>
				</small>
			</h1>
		</div>
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>ID</th>
	          <th>标题</th>
	          <th>作者</th>
           	  <th>添加时间</th>
	          <th>更新时间</th>
	          <th>管理</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php foreach($blogs as $blog):?>
	        <tr>
	          <th scope="row"><?php echo ($blog['pid']); ?></th>
	          <td><?php echo ($blog['title']); ?></td>
	          <td><?php echo ($blog['author']); ?></td>
	          <td><?php echo date("Y-m-d H:i:s",$blog['intime']);?></td>
	          <td><?php echo date("Y-m-d H:i:s",$blog['uptime']);?></td>
	          <td>
	          	<a href="<?php echo U("Admin/Blog/add");?>?pid=<?php echo ($blog['pid']); ?>">修改</a>
	          	<a href="<?php echo U("Admin/Blog/delete");?>?pid=<?php echo ($blog['pid']); ?>">删除</a>
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