
<?php $this->load->view("header");?>

<form action="" method="POST" enctype="multipart/form-data">
<?php

foreach ($form as $key => $value) {

	echo array_form($key,$value,'','','',$postinfo);
		# code...
}

?>
<link rel="stylesheet" type="text/css" href="/statics/css/chosetype.css">
	<style id="prevent_over_scroll_style">.prevent_over_scroll_container{overflow-y: scroll; -webkit-overflow-scrolling: touch;} html, body {width: 100%; height: 100;}</style>

	</head>
	
	



	<body style="font-size: 24px;">
		<div id="container" class="prevent_over_scroll_container" style="height: 667px;">
		<div class="wrap">
			<div class="sort-public-wrap">
				<div class="top-img-box">
					<h2 class="top-img"><i class="fa fa-check-square-o"></i>Please select the type of activity</h2>
				</div>
				<div class="container">
					<ul class="clear">
						<li class="box1">
							<a class="clear" href="/main/postinfo/1">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Fashion&Beauty</p>
									<!-- <p>淘宝 京东 微商 微购</p> -->
								</div>
							</a>
							
						</li>
						<li class="box2">
							<a class="clear" href="/main/postinfo/2">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Social</p>
									<!-- <p>吃货 探店 点评 推荐</p> -->
								</div>
							</a>
						</li>
						<li class="box3">
							<a class="clear" href="/main/postinfo/3">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Career&Business</p>
									<!-- <p>徒步 自驾 户外探险</p> -->
								</div>
							</a>
						</li>
						<li class="box4">
							<a class="clear" href="/main/postinfo/4">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Book Clubs </p>
									<!-- <p>影视 游戏 明星 爱豆</p> -->
								</div>
							</a>
						</li>
						<li class="box5">
							<a class="clear" href="/main/postinfo/5">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Lanugage&Culture</p>
									<!-- <p>体验使用 产品促销</p> -->
								</div>
							</a>
						</li>
						<li class="box6">
							<a class="clear" href="/main/postinfo/6">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Music</p>
									<!-- <p>体育 赛事 健身 训练</p> -->
								</div>
							</a>
						</li>
						<li class="box7">
							<a class="clear" href="/main/postinfo/7">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Film</p>
									<!-- <p>社会援助 爱心慈善</p> -->
								</div>
							</a>
						</li>
						<li class="box8">
							<a class="clear" href="/main/postinfo/8">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Sci-Fi& Games</p>
									<!-- <p>美容 美发 服饰 潮流</p> -->
								</div>
							</a>
						</li>
						<li class="box9">
							<a class="clear" href="/main/postinfo/0">
								<div class="box-r">
								</div>
								<div class="box-l">
									<p>Sports&fitness</p>
									<!-- <p>适用所有商户类型</p> -->
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		</div>

	<script type="text/javascript">
		var win_h = $(window).height();
		$('#container').height(win_h);
	 	var list = ['container'];
	 	var preventOverScroll = new window.PreventOverScroll({
	     	list: list
	 	});

	</script>

	<!-- 底部================================================== -->
	<?php $this->load->view('bottom');?>
	<script type="text/javascript">
		// $(function(){
		// 	$('#keyword,input[type="textarea"]').focus(function(){
		// 		$('.bottom').hide();
		// 	})
		// 	$('#keyword,input[type="textarea"]').blur(function(){
		// 		setTimeout(function(){
		// 			$('.bottom').show();
		// 		},200)
				
		// 	})
		// })
	</script>	
<div class="ux-popmenu" style="position: fixed; background-color: rgba(0, 0, 0, 0.498039);">
	<div class="content show" style="bottom: 0px; position: fixed;">
		<section class="card-combine"> 
			<a href="/"><span>返回首页</span></a>
		<!-- 	<a href="/Other/attention.html"><span>关注公众号</span></a> -->
			<a href="javascript:location.reload();"><span>刷新</span></a>
			<a class="close" href="javascript:;"><span>取消</span></a>
		</section>
	</div>
</div>

<script>

$(".menu i.fa-bars").on('touchend',function(){
	$('.ux-popmenu').fadeToggle();
	$('.ux-popmenu .content').slideDown();
})
$(".ux-popmenu .close").click(function(){
	$('.ux-popmenu').fadeToggle();
	$('.ux-popmenu .content').slideUp();
})
</script>
		
			

<script type="text/javascript">


	/*阻止用户双击使屏幕上滑*/
	var agent = navigator.userAgent.toLowerCase();        //检测是否是ios
	var iLastTouch = null;                                //缓存上一次tap的时间
	if (agent.indexOf('iphone') >= 0 || agent.indexOf('ipad') >= 0)
	{
	    document.body.addEventListener('touchend', function(event)
	    {
	        var iNow = new Date()
	            .getTime();
	        iLastTouch = iLastTouch || iNow + 1 /** 第一次时将iLastTouch设为当前时间+1 */ ;
	        var delta = iNow - iLastTouch;
	        if (delta < 500 && delta > 0)
	        {
	            event.preventDefault();
	            return false;
	        }
	        iLastTouch = iNow;
	    }, false);
	}
</script>

 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

<style type="text/css">
	.sort-public-wrap .container ul li {   
    margin-bottom: 1.2rem;
}

</style>

<?php $this->load->view("footer");?>