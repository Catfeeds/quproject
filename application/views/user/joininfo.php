





<?php $this->load->view("header");?>
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	<link rel="stylesheet" href="/statics/css/show.css">
	<link rel="stylesheet" href="/statics/css/swiper.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="/statics/css/comment.css"> -->
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
					<li  <?php if( $type == 2 ):?>class="current"<?php endif;?>><a href="/user/joininfo/2">进行中</a></li>
					<li  <?php if( $type == 3 ):?>class="current"<?php endif;?>><a href="/user/joininfo/3">待评价</a></li>
					<li  <?php if( $type == 4 ):?>class="current"<?php endif;?>><a href="/user/joininfo/4">已完成</a></li>
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
									 <!-- <?php var_dump($user);?>  -->
										<a href="/main/info_detail/<?php echo $value['info_id'];?>">
										<div class="ready-info">
											<span class="il" style="background-image:url(<?php echo $value['image'];?>)" title="<?php echo $value['en_title'];?>"></span>
											<div class="ir">
												<h2><?php echo $value['en_title']?$value['en_title']:$value['title'];?></h2>
												<p>活动时间：<?php echo $value['start_time'];?></p>
											</div>
										</div>
										</a>
                                        <?php if( $type== 3 ):?>
										<div class="ready-btn clear">
										<!--  <?php var_dump($value);?>
										 <?php var_dump($user);?> -->
											<a class="evaluate-btn" infoid="<?php echo $value['info_id'];?>" objid="<?php echo $_SESSION['uid'];?>" pid="<?php echo $value['info_uid'];?>" pname="<?php echo $value['info_username'];?>" picon="<?php echo $value['info_usericon'];?>"" data-nickname="<?php echo $user['nickname'];?>" data-image="<?php echo $user['icon'];?>">评价</a>
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
					<img id="headimgurl" src="<?php echo $user['icon'];?>" alt="">
					<p id="realname"><?php echo $user['nickname'];?></p>
					<!-- <p id="signature">null</p> -->
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
				var info_id;
				$('.evaluate-btn').click(function(){
					objid = $(this).attr('objid');
					pid = $(this).attr('pid');
					info_id=$(this).attr('infoid')

					$('#headimgurl').attr('src',$(this).attr('picon'))
					$('#realname').html($(this).attr('pname'))
					console.log(pid)
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
						var api_url = $('#api_url').val()+'/api/add_comment';
						$.post(api_url,{uid:objid,zhubo_id:pid,content:comment,star_num:fraction,info_id:info_id },function(res){
								// console.log(res)
							if(res!= 1){
								notice('评价提交失败，请重试');
								$('.alert-box,.box').show();
							}
							if(res== 1){
								tusi('评价提交成功！');
								$('.alert-box,.box').hide();
								$('.ready-list .pid'+pid).remove();
							}

							$('.box').css('top','10%');
							
						})
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


<?php $this->load->view("footer");?>