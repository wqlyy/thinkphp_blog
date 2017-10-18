<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台系统</title>
	<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.min.css">
	<script src="/Public/js/jquery-1.12.4.min.js"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/simditor/styles/simditor.css" />

	<script type="text/javascript" src="/Public/simditor/scripts/module.js"></script>
	<script type="text/javascript" src="/Public/simditor/scripts/hotkeys.js"></script>
	<script type="text/javascript" src="/Public/simditor/scripts/uploader.js"></script>
	<script type="text/javascript" src="/Public/simditor/scripts/simditor.js"></script>
</head>
<body>
	<?php include(THEME_PATH."nav.php");?>
	<div class="container">
		<div class="page-header">
			<h2>添加博客
				<small class="pull-right">
				<a class="btn btn-default" href="<?php echo U("Admin/Blog/index");?>">返回列表</a>
				</small>
			</h2>
		</div>
		 <form class="form-horizontal" action="<?php echo U('/Admin/Blog/save');?>?pid=<?php echo $blogs['pid'];?>" method="post">
		 	<input type="hidden" name="author" value="<?php echo ($user['auser']); ?>"/>
		  <div class="form-group">
		    <label for="title" class="col-sm-2 control-label">标题</label>
		    <div class="col-sm-10">
		      <input type="text" name="title" class="form-control" id="title" placeholder="请输入博客标题" value="<?php echo ($blogs[title]); ?>">
		    </div>
		  </div>
		 <div class="form-group">
		    <label for="content" class="col-sm-2 control-label">正文</label>
		    <div class="col-sm-10">
		     <textarea id="editor" style="height: 250px;" class="form-control" name="content"><?php echo ($blogs[content]); ?></textarea>
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
<script type="text/javascript">
	$(function(){
		var editor = new Simditor({
		  textarea: $('#editor'),
		  upload:{
		  	url:'<?php echo U("Admin/Blog/upload");?>',
		  	fileKey:"file1"
		  }
		  //optional options
		});
	})
</script>