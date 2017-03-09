<?php $this->load->view("header");?>

	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	<link rel="stylesheet" href="/statics/css/person.css">
	</head>
	
	



	<body style="font-size: 12px;">
		<div id="container">
		<div class="wrap">	
		<div class="bus-login-wrap">
			<div class="top">
				<a class="change_msg" href="/user/edit/"></a>
				<a class="clear">
					<span class="headimg" style="background-image:url(<?php echo strstr($res['icon'],'http:') ? $res['icon'] : $this->api_url.$res['icon'];?>)"></span>
					<span class="name"><?php echo $res['nickname'] ? $res['nickname'] : $res['realname'];?></span>
				</a>
				<ul class="zhubo-sort clear">
					<a href="/user/favor">
						<li>
							<i class="fa fa-heart-o fa-fw"></i><span>Collection(<?php echo $res['favor_num'];?>)</span>
						</li>
					</a>
					<a href="/user/follow">
						<li>
							<i class="fa fa-users fa-fw"></i><span>Follow(<?php echo $res['guanzhu_num'];?>)</span>
						</li>
					</a>
					<a href="/user/message">
						<li>
							<i class="fa fa-comment-o fa-fw"></i><span>MSG(<?php echo $res['message_num'];?>)</span>
						</li>
					</a>
				</ul>
			</div>
			<div class="activity-list">
            	<?php if( $res['gr_type'] == 4 ):?>
				<a href="/user/joininfo">
					<div class="list-tit clear">
						<i></i>
						<span>我的活动</span>
						<span>查看我的活动<i></i></span>
					</div>
				</a>
				
				<ul class="clear">
					<!-- <a href="/user/joininfo/1">
						<li>
							<i></i>
							<span>参与的</span>
						</li>
					</a> -->
					<a href="/user/joininfo/2">
						<li style="width:33.3%">
							<i></i>
							<span>进行中</span>
						</li>
					</a>
					<a href="/user/joininfo/3">
						<li style="width:33.3%">
							<i></i>
							<span>待评价</span>
						</li>
					</a>
					<a href="/user/joininfo/4">
						<li style="width:33.3%">
							<i></i>
							<span>已完成</span>
						</li>
					</a>
				</ul>
               	<?php else:?>
				<a href="/user/mypost">
					<div class="list-tit clear">
						<i></i>
						<span>My activity</span>
						<span>View all activities<i></i></span>
					</div>
				</a>
				
				<ul class="clear">
					<a href="/user/mypost/1">
						<li>
							<i><?php echo $raise ? '<span>'.$raise.'</span>' : '';?></i>
							<span>Started</span>
						</li>
					</a>
					<a href="/user/mypost/2">
						<li>
							<i><?php echo $ongoing ? '<span>'.$ongoing.'</span>' : '';?></i>
							<span>processing</span>
						</li>
					</a>
					<a href="/user/mypost/3">
						<li>
							<i><?php echo $pending ? '<span>'.$pending.'</span>' : '';?></i>
							<span>Be evaluated</span>
						</li>
					</a>
					<a href="/user/mypost/4">
						<li>
							<i><?php echo $finish ? '<span>'.$finish.'</span>' : '';?></i>
							<span>completed</span>
						</li>
					</a>
				</ul>                
                <?php endif;?>
			</div>
			<div class="line"></div>
			<div class="sort-list zhubo-list">
				<ul>
<!-- 					<a href="javascript:void(0);"><li class="clear">
						<i class="usertype"></i>
						<span>账号类型</span>
						<span><?php if($res['gr_type'] == 1 ):?>网络主播<?php elseif($res['gr_type']==2):?>广告主<?php else:?>经纪人/经纪公司<?php endif;?></span>
					</li>
					</a> -->

<?php /*?>					<a href="/user/manage"><li class="clear">
						<i class="agent"></i>
						<span>经纪人/经纪公司</span>
						<span><?php echo $res['company_name'] ? $res['company_name'] : '无';?></span>
					</li></a><?php */?>

					<!-- <a href="/user/mobile">
					<li class="clear" style="border:none;">
						<i class="mobile"></i>
						<span>contact number</span>
						<span><?php echo hide_email($res['telephone']);?></span>
					</li></a> -->
				</ul>
			</div>
			
			<?php if( $res['gr_type'] == 1){?>
			<div class="line"></div>
			<div class="sort-list zhubo-list">
				<ul>
					<a href="/user/tags" class="picture clear"><li>
						<i class="tags"></i>
						<span>标签</span>
						<span></span>
					</li></a>
					<a href="/user/edit/#/pic" class="picture clear"><li>
						<i class="photos"></i>
						<span>相册</span>
						<span><?php echo $res['photo_num'];?>张</span>
					</li></a>
				</ul>
			</div>
			<?php };?>
			<div class="line"></div>
			<div class="exit-btn">
				<a   href="/user/invite?invite_id=<?php echo $res['id'];?>">invite my friends!</a>
			</div>
			<div class="line"></div>
			
			<div class="exit-btn">
				<a href="/user/logout">sign out</a>
			</div>
		</div>
		<!-- <div class="bottom_div"></div> -->
	</div>
	</div>

	<!-- 底部================================================== -->
	<?php $this->load->view('bottom');?>
	<script type="text/javascript">
		$(function(){
			$('#keyword,input[type="textarea"]').focus(function(){
				$('.bottom').hide();
			})
			$('#keyword,input[type="textarea"]').blur(function(){
				setTimeout(function(){
					$('.bottom').show();
				},200)
				
			})
		})
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
</script>
 

<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

</body></html>