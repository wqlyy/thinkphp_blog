<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($cfg['title']['value']); ?></title>
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
		  <li class="active"><a href="/">首页</a></li>
		  <!-- <li><a href="#">Library</a></li>
		  <li class="active">Data</li> -->
		</ol>
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">作者简介</h3>
				  </div>
				  <div class="panel-body">
				    <a href="<?php echo U('/Admin/Login')?>">后台管理</a>
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
				<?php foreach ($blogs as $blog):?>
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <!-- <h3 class="panel-title"> -->
					    	<a href="<?php echo U('/Home/Index/read');?>?pid=<?php echo ($blog['pid']); ?>"><?php echo ($blog['title']); ?></a>
					    	<div class="pull-right">
					    		<span>发布时间：<?php echo date('Y-m-d H:i:s',$blog['intime'])?></span>
					    	</div>
					    <!-- </h3> -->
					  </div>
					  <div class="panel-body"><?php echo mb_substr(strip_tags($blog['content']), 0,50);?>...</div>
					</div>
				<?php endforeach;?>
				<nav class="pull-right" aria-label="Page navigation">
					<?php echo $show;?>
				</nav>
				
			</div>
		</div>
	</div>
</body>
</html>