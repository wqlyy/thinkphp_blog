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
			<h1>系统设置</h1>
		</div>
		 <form class="form-horizontal" action="<?php echo U('/Admin/Setting/save'); ?>" method="post">
		  <?php foreach ($setting as $key => $value): ?>
		  <div class="form-group">
		    <label for="{$key}" class="col-sm-2 control-label">{$value['desc']}:</label>
		    <div class="col-sm-10">
		      <input type="text" name="{$key}" class="form-control" id="{$key}" placeholder="" value="{$value['value']}">
		    </div>
		  </div>
		 <?php endforeach; ?>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">修改</button>
		    </div>
		  </div>
		</form>
	</div>
</body>
</html>