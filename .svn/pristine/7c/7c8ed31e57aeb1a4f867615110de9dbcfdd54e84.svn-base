<?php $this->load->view('header');?>
<link rel="stylesheet" href="/statics/css/cell.css"></head>

<body style="font-size: 12px;">
	<div id="container" style="height: 570px;">
		<div class="wrap">
			<div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">Modify contact phone</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>



			<div class="container">
				<div class="control">
					<a class="control_text first" href="#/realname">
						<div class="control_text_primary">
							<p style="font-size: 0.35rem;">My phone number</p>
						</div>
						<div class="control_text_ft" id="realnametxt"><?php echo hide_email($res['telephone']);?></div>
					</a>
				</div>
			</div>

			<p style="margin-top: 0.8rem;font-size: 0.35rem;color: #8b8b8c;text-align: center;">Do not support changing phone numbers, please be patient ...</p>
			
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
		
<div class="ux-popmenu" style="position: fixed; background-color: rgba(0, 0, 0, 0.498039);">
	<div class="content show" style="bottom: 0px; position: fixed;">
		<section class="card-combine"> 
			 <a href="/"><span>Home</span></a>
			 
			<a href="javascript:location.reload();"><span>Refresh</span></a>
			<a class="close" href="javascript:;"><span>cancel</span></a>
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
</script><div id="back_icon" style="display:none" ;=""></div>
 
 
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

<?php $this->load->view('footer');?>