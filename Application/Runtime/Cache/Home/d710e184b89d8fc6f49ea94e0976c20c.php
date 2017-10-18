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
	<div class="container">
		<div class="jumbotron">
		  <h1><?php echo ($cfg['title']['value']); ?></h1>
		  <p><?php echo ($cfg['description']['value']); ?></p>
		</div>
		<ol class="breadcrumb">
		  <li><a href="/">首页</a></li>
		  <li class="active"><?php echo ($blog['title']); ?></li>
		</ol>
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">作者简介</h3>
				  </div>
				  <div class="panel-body">
				    Panel content
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">统计信息</h3>
				  </div>
				  <div class="panel-body">
				    Panel content
				  </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">
				    	<?php echo ($blog['title']); ?>
				    	<span class="pull-right">更新时间 : <?php echo date('Y-m-d H:i:s',$blog['uptime'])?></span>
				    </h3>
				  </div>
				  <div class="panel-body">
				   <?php echo strip_tags($blog['content']);?>
				  </div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>