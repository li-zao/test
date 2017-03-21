<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1" />
	<title>查词小工具</title>
	<meta name="description" content="电话邦服务号介绍" />
	<meta name="keywords"  content="电话邦,服务号,认证号码" />
	<!-- <link rel="stylesheet" type="text/css" href="css/base.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?php echo C('cssBaseUrl');?>base.css?t=<?php echo C('timestamp');?>"/>

</head>
<body>

	<!--  导航  -->
	<div class="nav">
		<div class="wrap_nav">
			<div class="logo_box">
				<img src="<?php echo C('imgBaseUrl');?>logo.png"/>
				<span><img src="<?php echo C('imgBaseUrl');?>tittle.png"/></span>
			</div>
		</div>
	</div>
	<!--  导航  -->
	<div class="_frist">
		<div class="wrap_1">
			<div  class="tittle_1">
				<img src="<?php echo C('imgBaseUrl');?>tittle_1.png"/>
			</div>
			
			<div id="wrap_body_2">
				<div class="sousuo">
					<div class="sousuo_1">
						<?php if(isset($key)): ?><input  class="wrap_body_2_input" type="text" value="<?php echo ($key); ?>" placeholder="请输入您想查看的显示名称"/>
						<?php else: ?>
							<input  class="wrap_body_2_input" type="text" placeholder="请输入您想查看的显示名称"/><?php endif; ?>
					</div>
					<div class="sousuo_2 search" >查询</div>
					<!-- <button class="sousuo_2" type="submit"> 查询</button>  -->
				</div>
			</div>
				<ul>
					<li class="result" >
						<img  src="<?php echo C('imgBaseUrl');?>result.png" />
					</li>
				
					<li class="name_style clearfix" style="background: url(<?php echo C('imgBaseUrl');?>name_result.png);">
						<ul >
							<li>
								<?php if(isset($data)): echo ($data["register_type"]); ?>
									</li>
									<li>
									<?php echo ($data["name_type"]); endif; ?>
							</li>
						</ul>
					</li>
				</ul>
				
				<?php if($key): ?><div class="ul_bot">
						<p>查询结果仅用于区别显示名称属性，审核结果的最终解释权归电话邦所有</p>
					</div><?php endif; ?>

			<!-- <?php if(isset($error)): ?><ul>
					<li class="result" >
						<p><?php echo ($error); ?></p>
					</li>
				</ul><?php endif; ?> -->
		</div>
	</div>
	<div class="_second">
		<div class="wrap_2">
			<div class="tittle_2">
				<img src="<?php echo C('imgBaseUrl');?>tittle_2.png"/>
			</div>
			<ul>
				<li>
					<img class="radius" src="<?php echo C('imgBaseUrl');?>radius-lianjia.png"/>
					<p>链家</p>
					<img class="img_" src="<?php echo C('imgBaseUrl');?>img_lianjia.png" />
				</li>
				<li>
					<img class="radius" src="<?php echo C('imgBaseUrl');?>radius-jiebao.png"/>
					<p>捷豹</p>
					<img class="img_" src="<?php echo C('imgBaseUrl');?>img-jiebao.png" />
				</li>
				<li>
					<img class="radius" src="<?php echo C('imgBaseUrl');?>radius-zhaoshang.png"/>
					<p>招商银行</p>
					<img class="img_" src="<?php echo C('imgBaseUrl');?>img-zhaoshang.png" />
				</li>
				<li>
					<img class="radius" src="<?php echo C('imgBaseUrl');?>radius-baihe.png"/>
					<p>百合网</p>
					<img class="img_" src="<?php echo C('imgBaseUrl');?>img-baihe.png" />
				</li>
			</ul>
		</div>
	</div>
	<div class="_third">
		<div class="wrap_3">
			<div class="tittle_3">
				<img src="<?php echo C('imgBaseUrl');?>tittle_3.png"/>
			</div>
			<ul>
				<li>
					<a href="http://www.dianhua.cn/detail/c4aebf2a0eb8dcb842b473176ea6a33f" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>cctv-securities.jpg" />
						<p>CCTV证券资讯频道</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/44bc0f3041fd2244b4183cb93f9831f9" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>media.jpg" />
						<p>梦菲达影音传媒</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/d62062845e7e6b455359e7c08b8db4cf" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>food.jpg" />
						<p>绝味鸭脖</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/25061ba0dca771aa140890c4b868f3cf" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>housekeeping.jpg" />
						<p>郑州市如意家政</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/95fed1879695efbdceda32a403290e6d" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>baidu-money.png" />
						<p>百度有钱花</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/d0b8013e1fd2f3f38f6b15d59f703520" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>hospital.jpg" />
						<p>北京军海医院</p>
					</a>
				</li>			
				<li>
					<a href='http://www.dianhua.cn/detail/577cefcb54a837daa48bfff7fe34ca23' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>bank.jpg" />
						<p>渤海银行信用卡</p>
					</a>
				</li>				
				<li>
					<a href="http://www.dianhua.cn/detail/ff9442e0d37e82dd3b9fe91baecde4ad" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>factory.jpg" />
						<p>藁城区喜随缘宫灯厂</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/030c838a53b9dc32777d55b1d33f6691" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>midea.jpg" />
						<p>美的净水</p>
					</a>
				</li>
				<li>
					<a href='http://www.dianhua.cn/detail/708c7badb30c84f3a7cf62cc47702098' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>sports.jpg" />
						<p>尼勒克赛琪体育</p>
					</a>
				</li>
				<li>
					<a href='http://www.dianhua.cn/detail/9f08138d0eb9e4607bfaa397c256e153' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>pet.jpg" />
						<p>派多格宠物</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/5ac82f3e9c33556c0c2e705bdc5a0a70" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>building-materials.jpg" />
						<p>青岛宫廷御匠建材科技</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/ee8e164922a8300282fd37348e02654f" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>trade.jpg" />
						<p>瑞安市盼盼鞋行贸易</p>
					</a>
				</li>				
				<li>
					<a href='http://www.dianhua.cn/detail/5365c912f9221bbaac75e60ba634eb11' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>glass-factory.jpg" />
						<p>枣强县斯玻特玻璃钢</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/27d92cab07926ef45392dc4b38b90d26" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>equipment.jpg" />
						<p>深圳市鹏旭电控设备</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/6ccf464cb77f6e757012df2e7606c4e7" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>brake-machine.jpg" />
						<p>深圳市浩月智能闸机</p>
					</a>
				</li>
			</ul>


<!--

<li>
					<a href="http://www.dianhua.cn/detail/c4aebf2a0eb8dcb842b473176ea6a33f" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>cctv-securities.jpg" />
						<p>CCTV证券资讯频道</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/44bc0f3041fd2244b4183cb93f9831f9" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>media.jpg" />
						<p>梦菲达影音传媒</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/d62062845e7e6b455359e7c08b8db4cf" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>food.jpg" />
						<p>绝味鸭脖</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/25061ba0dca771aa140890c4b868f3cf" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>housekeeping.jpg" />
						<p>郑州市如意家政</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/95fed1879695efbdceda32a403290e6d" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>baidu-money.png" />
						<p>百度有钱花</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/d0b8013e1fd2f3f38f6b15d59f703520" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>hospital.jpg" />
						<p>北京军海医院</p>
					</a>
				</li>			
				<li>
					<a href='http://www.dianhua.cn/detail/577cefcb54a837daa48bfff7fe34ca23' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>bank.jpg" />
						<p>渤海银行信用卡</p>
					</a>
				</li>				
				<li>
					<a href="http://www.dianhua.cn/detail/ff9442e0d37e82dd3b9fe91baecde4ad" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>factory.jpg" />
						<p>藁城区喜随缘宫灯厂</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/030c838a53b9dc32777d55b1d33f6691" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>midea.jpg" />
						<p>美的净水</p>
					</a>
				</li>
				<li>
					<a href='http://www.dianhua.cn/detail/708c7badb30c84f3a7cf62cc47702098' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>sports.jpg" />
						<p>尼勒克赛琪体育</p>
					</a>
				</li>
				<li>
					<a href='http://www.dianhua.cn/detail/9f08138d0eb9e4607bfaa397c256e153' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>pet.jpg" />
						<p>派多格宠物</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/5ac82f3e9c33556c0c2e705bdc5a0a70" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>building-materials.jpg" />
						<p>青岛宫廷御匠建材科技</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/ee8e164922a8300282fd37348e02654f" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>trade.jpg" />
						<p>瑞安市盼盼鞋行贸易</p>
					</a>
				</li>				
				<li>
					<a href='http://www.dianhua.cn/detail/5365c912f9221bbaac75e60ba634eb11' target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>glass-factory.jpg" />
						<p>枣强县斯玻特玻璃钢有限公司</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/27d92cab07926ef45392dc4b38b90d26" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>equipment.jpg" />
						<p>深圳市鹏旭电控设备有限公司</p>
					</a>
				</li>
				<li>
					<a href="http://www.dianhua.cn/detail/6ccf464cb77f6e757012df2e7606c4e7" target="_blank">
						<img src="<?php echo C('imgBaseUrl');?>brake-machine.jpg" />
						<p>深圳市浩月智能闸机有限公司</p>
					</a>
				</li>
-->


		</div>
	</div>
	<div class="_four">
		<div class="wrap_4">
			<div class="tittle_4">
				<img src="<?php echo C('imgBaseUrl');?>tittle_4.png"/>
			</div>
			<ul>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_1.png" />
					<p>青岛亚微德网络科技有限公司</p>
				</li>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_2.png" />
					<p>陕西有云电子科技有限公司</p>
				</li>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_3.png" />
					<p>沈阳云海普信信息技术有限公司</p>
				</li>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_4.png" />
					<p>深圳市号邦信息发展有限公司</p>
				</li>
				
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_5.png" />
					<p>新疆华维天科知识产权代理有限责任公司</p>
				</li>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_6.png" />
					<p>仲圣（大连）科技有限公司</p>
				</li>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_7.png" />
					<p>内蒙古云鼎基业知识产权服务有限公司</p>
				</li>
				<li>
					<img src="<?php echo C('imgBaseUrl');?>icon_8.png" />
					<p>成都盘石互动科技有限公司</p>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<div class="wrap">
			<h6>电话邦客服热线：4000618800&nbsp;&nbsp;&nbsp;</h6>
			<p>&copy; 2014<a href="" target="_blank">电话邦</a> All Rights Reserved <a href="http://www.miitbeian.gov.cn/" target="_blank">京ICP备12010092号</a> 京公网安备11010502027450号</p>
			<p>电话信誉生态圈构建者，致力为手机用户提供最安全便捷的移动入口</p>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo C('jsBaseUrl');?>jquery-1.11.0.js?t=<?php echo C('timestamp');?>"></script>
<script type="text/javascript" src="<?php echo C('jsBaseUrl');?>jquery.json.js?t=<?php echo C('timestamp');?>"></script>
<script type="text/javascript">
	$(function()
	{
		$('body')
		.on('click', '.search', function()
		{
			var key = $('.wrap_body_2_input').val();
			if (!isNull(key)) {
				window.location.href = '/Index/chaci?key='+key;
			}
			else
			{
				// alert('查询关键词空.');
				window.location.href = '/Index/chaci/';
			}
        });
        $('.wrap_body_2_input').keydown(function(event) {
	        if(event.keyCode==13){
	            var key = $('.wrap_body_2_input').val();
				if (!isNull(key)) {
					window.location.href = '/Index/chaci?key='+key;
				}
				else
				{
					// alert('查询关键词空.');
					window.location.href = '/Index/chaci/';
				}
	        }
    	});

	});
	function isNull( str )
	{
		if ( str == "" ) return true;
		var regu = "^[ ]+$";
		var re = new RegExp(regu);
		return re.test(str);
	}
</script>
</html>