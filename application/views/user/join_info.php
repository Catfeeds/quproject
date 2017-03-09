<?php $this->load->view("header");?>
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	<link rel="stylesheet" href="/statics/css/show.css">
	<link rel="stylesheet" href="/statics/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="/statics/css/comment.css">
	<script type="text/javascript" src="/statics/js/swiper.min.js"></script>
	
	</head>
	


<body style="font-size: 24px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">我的活动</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" href="/statics/css/mypro.css">
<link rel="stylesheet" href="/statics/css/show.css">
	
		<div class="wrap">
			<div class="mypro-wrap">
				<div class="top-pic">
					<!-- <img src="" alt="找活动 就上找主播"> -->
				</div>
				
				<ul class="tab-nav swiper-pagination clear">
					<li><a href="/user/joininfo/2">进行中</a></li>
					<li class="current"><a href="/user/joininfo/3">待评价</a></li>
					<li><a href="/user/joininfo/4">已完成</a></li>
				</ul>
				<div class="main-box swiper-container">
					<!--进行中-->
										<!--进行中-->
					
					<!--待评价-->
                    <?php if( $data  ):?>
					<div class="ready-list">
							<ul>
                            <?php foreach( $data as $value ):?>
                            	<?php $user = get_userinfo_by_uid($value['uid']);?>
									<li class="clear pid558" date-time="">
										<!--<a href="/Zhubo/manage/id/558.html">-->
										<div class="ready-info">
											<span class="il" style="background-image:url(<?php echo $value['image'];?>)" title="<?php echo $value['en_title'];?>"></span>
											<div class="ir">
												<h2><?php echo $value['en_title'];?></h2>
												<p>活动时间：<?php echo ymdhi($value['start_time']);?></p>
											</div>
										</div>
										<!--</a>-->
                                        <?php if( $value['if_comment'] == 1 ):?>
										<div class="ready-btn clear">
											<a class="evaluate-btn" objid="<?php echo $value['info_id'];?>" pid="<?php echo $user['id'];?>" data-nickname="<?php echo $user['nickname'];?>" data-image="<?php echo $user['icon'];?>">评价</a>
										</div>
                                        <?php endif;?>
									</li>
                             <?php endforeach;?>
                             </ul>
																					</div>					<!--待评价-->

					<!--已完成-->
										<!--已完成-->

				</div>
				<?php endif;?>
				<!--弹出框-->
				<div class="alert-box" style="display: none;"></div>
				<div class="box" style="display: none;">
					<i class="close-icon"></i>
					<img id="headimgurl" src="/Uploads/Headimgurl/2017-01-18/thumb_56e6824705305c24da910bcdc6dd1905.jpeg" alt="">
					<p id="realname">鱼鱼</p>
					<p id="signature">null</p>
					<span id="fraction" class="star">
						<i class="on" id="star1"></i>
						<i class="on" id="star2"></i>
						<i class="on" id="star3"></i>
						<i class="on" id="star4"></i>
						<i class="on" id="star5"></i>
					</span>
					<textarea id="text-box" name="" placeholder="请您对本次活动的评价！"></textarea>
					<a class="sub-btn">提交</a>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			//评论
			$(function(){
				var pid;
				var objid;
				$('.evaluate-btn').click(function(){
					objid = $(this).attr('objid');
					pid = $(this).attr('pid');
					$(this).parents('li').addClass('pid'+pid);
					$('.alert-box,.box').show();
					
					var api_url = $('#api_url').val()+'/api/add_comment';
					
					// $.post("/EvaluateAjax/getinfo.html",{objid:objid},function(res){
					// 	$('#status').attr(res.status);
					// 	$('#realname').text(res.realname);
					// 	$('#headimgurl').attr('src',res.headimgurl);
					// 	$('#signature').text(res.signature);
					// 	$('.alert-box,.box').show();
					// })
				})
				$('#fraction i').click(function(){
					var num = $(this).index();
					$(this).parents('#fraction').find('i').removeClass('on');
					for(var i=0;i<=num;i++){
						$(this).parents('#fraction').find('i').eq(i).addClass('on');
					}
				})
				
				$('.sub-btn').click(function(){
					if($('.ready-list li').hasClass('pid'+pid)){
						var comment = $('#text-box').val();
						$("#text-box").val('');
						if(comment.length<1){
							notice('评论不能为空！');return false;
						}
						var fraction = $('#fraction').children('i.on').length;
						var that = $(this);
						// $.post("/EvaluateAjax/zhuboComment.html",{ objid:objid,pid:pid,comment:comment,fraction:fraction },function(res){

							// if(res.status == 0){
								// notice(res.msg);
								$('.alert-box,.box').show();
							// }if(res.status == 1){
								// tusi(res.msg);
								// $('.alert-box,.box').hide();
								// $('.ready-list .pid'+pid).remove();
							// }

							$('.box').css('top','10%');
							
						// })
					}
				})

				
				
//				弹出框
				$('.close-icon,.alert-box').click(function(){
					$('.alert-box,.box').hide();
				})
				$('#text-box').focus(function(){
					$('.box').css('top','-20%');
				})
				
			})
		</script>
	
<div class="bottom_div"></div>
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


























<body style="background-color: rgb(239, 239, 244); font-size: 24px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">我报名的活动</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" href="/html/css/show.css">

<div class="wrap">
	<div class="collect-wrap">
		<div class="top-pic">
			<img src="/html/img/zhubotopad.jpg" alt="">
		</div>
		<h2 class="title"><span>我报名的项目</span></h2>
		<div class="main-box">
			<div class="activity-inner">
				<ul>
					<a href="activeDetail.html"><li class="clear">
						<div class="box_l" style="background-image:url(/html/img/thumb_4.jpg)"></div>
						<div class="box_r">
							<p class="title">手机APP直播官方招募</p>
							<p class="time">开始时间：01-28 18:00</p>
							<p class="time">举办城市：</p>
						</div>
													<div class="status_btn not">募集中</div>
											</li></a>				</ul>
				
							</div>
			<script>
			$(".activity-inner .getmore.on").click(function(){
				$(".activity-inner .getmore.on").hide();
				$(".activity-inner .getmore.off").show();
				var that = this;
				var page    = $(that).attr('data-page');
				$.post("/ZhuboAjax/getmoreactivity.html",{ page:page },function(data){
					if(data.status == 1){
						//获取成功
						var html = '';
						for(i=0;i<data.list.length;i++){
							html += '<a href="/p/'+data.list[i].guid+'"><li class="clear">';
							html += '	<div class="box_l" style="background-image:url('+data.list[i].cover+')"></div>';
							html += '	<div class="box_r">';
							html += '		<p class="title">'+data.list[i].proname+'</p>';
							html += '		<p class="time">开始时间&nbsp;:&nbsp;&nbsp;'+data.list[i].begintime+'</p>';
							html += '		<p class="time">举办城市&nbsp;:&nbsp;&nbsp;'+data.list[i].city+'</p>';
							html += '	</div>';
							html += data.list[i].status;
							html += '</li></a>';
						}
						$(that).attr('data-page',data.page);
						setTimeout(function(){
							$(".activity-inner ul").append(html);
							$(".activity-inner .getmore.on").show();
							$(".activity-inner .getmore.off").hide();	
						},500);
					}else{
						$(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
						setTimeout(function(){
							$(".activity-inner .getmore.on").html(data.msg);
							$(".activity-inner .getmore.on").show();
							$(".activity-inner .getmore.off").hide();	
						},500);
					}
					
				})
			})
			</script>
		</div>

	</div>
</div>
<div class="bottom_div"></div>
	<!-- 底部================================================== -->

<?php $this->load->view("bottom");?>
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
			 <a href="active.html"><span>返回首页</span></a>
			 
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
</script><div id="back_icon" style="display:none" ;=""></div>
 


<?php $this->load->view("footer");?>