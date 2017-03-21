<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<title></title>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo C('CssBaseUrl');?>bootstrap-theme.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo C('CssBaseUrl');?>bootstrap-theme.css.map"> -->
<link rel="stylesheet" type="text/css" href="<?php echo C('CssBaseUrl');?>bootstrap-theme.min.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo C('CssBaseUrl');?>bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo C('CssBaseUrl');?>bootstrap.css.map"> -->
<link rel="stylesheet" type="text/css" href="<?php echo C('CssBaseUrl');?>bootstrap.min.css">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
	<div class="container-fluid">
		<div class="row-fluid">
	<div class="span12">
	<nav class="navbar" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('index/index');?>">DHB</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo U('index/index');?>">队列</a></li>
            <li><a href="<?php echo U('index/uploadFile');?>">上传</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
	</div>
</div>
		<div class="row-fluid">
			<div class="span12">
				<form action="<?php echo U('index/upload');?>" enctype="multipart/form-data" method="post" >
					<!-- <input type="text" name="name" /> -->
					<br>
					<input type="file" name="photo" />
					<br>
					<input type="submit" value="提交" class="btn btn-info">
					<br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>