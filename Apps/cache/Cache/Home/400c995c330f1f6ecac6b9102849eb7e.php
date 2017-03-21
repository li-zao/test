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
				 <!-- <button class="btn" type="button">按钮</button> -->
				 <!-- <a href="<?php echo U('index/uploadFile');?>" class="btn btn-primary " role="button">上传文件</a> -->
			</div>
		</div>
		<br>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>编号</th>
							<th>名称</th>
							<th>数量</th>
							<th>状态</th>
							<th>次数</th>
							<th>链接</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($data["id"]); ?></td>
									<td><?php echo ($data["name"]); ?></td>
									<td><?php echo ($data["num"]); ?></td>
									<td><?php echo ($data["status"]); ?></td>
									<td><?php echo ($data["download"]); ?></td>
									<td>
										<?php if($data['status'] == '完成'): ?><a href="http://172.18.19.141/batch_download.php?name=<?php echo ($data["name"]); ?>&id=<?php echo ($data["id"]); ?>">下载</a><?php endif; ?>
									</td>
									<td><?php echo ($data["remark"]); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
				</table>
				<?php if(!empty($show)): ?><div class="panel panel-default" style="margin:0 20px">
				        <div class="panel-body">
				            <div class="btn-group" style="float:right;">
				                <div style=" float:right;"><?php echo ($show); ?></div>
				            </div>
				        </div>
				    </div><?php endif; ?>
			</div>
		</div>
		</div>
	</body>
</html>