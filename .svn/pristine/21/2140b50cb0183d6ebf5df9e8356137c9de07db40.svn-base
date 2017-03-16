
<?php $this->load->view("header");?>
	<link rel="stylesheet" href="/statics/css/show.css">
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	</head>
	
	



<body style="font-size: 24px;">
<div class="wrap">
	<div class="buscenter-wrap">
		<div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title"><?php echo $userinfo['nickname'];?>的个人中心-趣果仁</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>

<input type="hidden" id="user_id" value="<?php echo $_SESSION['uid'];?>"/>
		<div class="top">
			<div class="pic">
				<span style="background-image:url(<?php echo $userinfo['icon'];?>)"></span>
			</div>
			<p class="name"><?php echo $userinfo['nickname'];?></p>
			<div class="attent_btn attachment">
            <?php if( $if_follow ):?>
            <a class="attent off fa confirm" target-form="objid" return-msg="&nbsp;关注&nbsp;" change-msg="Has been concerned" url=""><span>已关注</span></a>
            <?php else:?>
            <a class="attent ajax-post on fa" target-form="objid" return-msg="已关注" change-msg="&nbsp;关&nbsp;&nbsp;注&nbsp;" data-id=<?php echo $userinfo['id'];?> url="/api/add_guanzhu"><span>&nbsp;关&nbsp;&nbsp;注&nbsp;</span></a>
            <?php endif;?>
            <a class="chat" href="/main/message/<?php echo $userinfo['id'];?>">&nbsp;私信TA&nbsp;</a></div>
            
		</div>
		<ul class="tab-nav tab-nav-b clear">
        	<?php if( $userinfo['gr_type'] == 1 ):?>
			<li <?php if( $type == 1 ):?>class="current"<?php endif;?> onclick='javascript:location.href="/main/show_student/<?php echo $id;?>/1";'>发起的活动</li>
            <?php endif;?>
			<li <?php if( $type == 2 ):?>class="current"<?php endif;?> onclick='javascript:location.href="/main/show_student/<?php echo $id;?>/2";'>参加的活动</li>
			<li <?php if( $type == 3 ):?>class="current"<?php endif;?> onclick='javascript:location.href="/main/show_student/<?php echo $id;?>/3";'>评价</li>
		</ul>
		<div class="swiper-container">
			<?php if( $userinfo['gr_type'] == 1 && $type == 1):?>
                <?php if( $data ):?>  
                <!-- 全部活动 -->
                <div class="activity-inner content" style="display:block;">                          
				<ul>
					<?php foreach( $data as $key => $value ):?>                	
                            <a href="/main/detail/<?php echo $value['id'];?>">
                            <li class="clear">
                                <div class="box_l" style="background-image:url(<?php echo $value['image'];?>)"></div>
                                <div class="box_r">
                                    <p class="title"><?php echo $value['title'];?></p>
                                    <p class="time">开始时间:&nbsp;:&nbsp;&nbsp;<?php echo ymdhi($value['start_time']);?></p>
                                    <p class="time">举办城市:&nbsp;:&nbsp;&nbsp;<?php echo $value['city'];?></p>
                                </div>
                                <!-- <div class="status_btn not"><?php echo get_info_status($value['status']);?></div> -->
                            </li>
                            </a>					
                    <?php endforeach;?>
                 </ul>
                </div>
				<?php else:?>
                    <div class="content">
                        <h2 class="blank_tip"><i></i>暂无发起的活动</h2>
                    </div>                
                <?php endif;?>                
                <!-- 全部活动结束 -->                 
			<?php elseif( $type == 2 ):?>
            	<?php if( $data ):?>
                <div class="activity-inner content" style="display:block;">                          
				<ul>
					<?php foreach( $data as $key => $value ):?>                	
                            <a href="/main/info_detail/<?php echo $value['info_id'];?>">
                            <li class="clear">
                                <div class="box_l" style="background-image:url(<?php echo $value['image'];?>)"></div>
                                <div class="box_r">
                                    <p class="title"><?php echo $value['title'];?></p>
                                    <p class="time">开始时间&nbsp;:&nbsp;&nbsp;<?php echo $value['start_time'];?></p>
                                    <p class="time">举办城市&nbsp;:&nbsp;&nbsp;<?php echo $value['city'];?></p>
                                </div>
                            </li>
                            </a>					
                    <?php endforeach;?>
                 </ul>
                </div>            
                <?php else:?>
                    <div class="content">
                        <h2 class="blank_tip"><i></i>暂无参加活动</h2>
                    </div>                  
                <?php endif;?>
            <?php else:?>
			<!-- 全部评价 -->
            	<?php if($data):?>
			<div class="comment-inner">
									<!-- <h2 class="blank_tip"><i></i>暂无评价</h2> -->			
				
				<ul>
                <?php foreach( $data as $value ):?>
                	<?php $user = get_userinfo_by_uid($value['uid']);?>
                    <li class="clear">
                        <h2>
                            <a href="/main/student_detail/<?php echo $value['uid'];?>" data-time="">
                                <span style="background-image:url(<?php echo $user['icon'];?>)"></span>
                                <span><?php echo $user['nickname'];?></span>
                            </a>
                            <span class="time"><?php echo ymdhis($value['ctime']);?></span>
                        </h2>
                        <div class="comment_inner">
                            <h3><span class="boss-star star clear">
                            <?php for( $i=1;$i<=$value['star_num']; $i++ ):?>
                            <i class="on"></i>
                            <?php endfor;?>
                            </span></h3>
                            <p><?php echo htmlspecialchars_decode($value['content']);?> </p>
                        </div>
                        <div class="comment_bottom">
                            <p><?php  if($value['info_uid']==$value['uid']){echo "发起";}else{echo "参与";}?>活动：<?php echo $value['title'];?></p>
                            <p>活动时间：<?php echo ymd($value['start_time']);?></p>
                        </div>
                    </li>
				<?php endforeach;?>

				</ul>
			
			</div>
            <?php else:?>
                    <div class="content">
                        <h2 class="blank_tip"><i></i>暂无评价</h2>
                    </div>                
            <?php endif;?>
			<!-- 全部评价结束 -->
			<?php endif;?>
			<script>
/*			$('.tab-nav li').click(function(){
				var num = $(this).index();
				$('.tab-nav-c li').eq(num).addClass('current').siblings().removeClass('current');
				$('.tab-nav-b li').eq(num).addClass('current').siblings().removeClass('current');
				$(this).addClass('current').siblings().removeClass('current');
				
				$('.content').hide();
				$('.content').eq($(this).index()).show();
			})*/

			// 滑动顶部不悬浮
			$(window).scroll(function(){
				var nav_t = $('.tab-nav').offset().top;
				var body_t = $(window).scrollTop();
				var header_h = $('.header').height();
				var top_h = $('.top').height();
				if(body_t>nav_t-header_h){
					$('.tab-nav-b').css('visibility','hidden');
					$('.tab-nav-c').show();
				}
				if(body_t<nav_t-header_h){
					$('.tab-nav-b').css('visibility','visible');
					$('.tab-nav-c').hide();
				}
			})

					$('.attent').on('touchend',function(){
					
						if ( $(this).hasClass('confirm') ) {
							if(!confirm('Are you sure you want to cancel your attention?')){
								return false;
							}
						}

						var that = $(this);
						var api_url = $('#api_url').val()+'/api/add_guanzhu';
						var zbid = that.attr('data-id');//$('#user_id').val();
						var user_id = $('#user_id').val();
						that.addClass('disabled').attr('autocomplete','off').prop('disabled',true);
						
						if( user_id == '' )
							window.location.href = '/user/login';
							
						//取消关注
						 $.post(api_url, { action:"add_guanzhu",uid:user_id,zhubo_id:zbid}, function(data){
							 data = eval('(' + data + ')'); 
						 	if(data.status==-1){
						 		window.location.href = '/user/login';
						 	}else{
						 		if(data.status==1){
									//操作成功
									if(that.hasClass("off")) {
										that.attr('class','attent on fa');
										that.find('span').html(that.attr('change-msg'));
										//$(".attent.on").show();
										//that.hide();
									}else if(that.hasClass("on")){
										that.attr('class','attent off fa confirm');
										that.find('span').html(that.attr('return-msg'));										
										//$(".attent.off").show();
										//that.hide();
									}
									tusi(data.msg);
								 }else{
									notice(data.msg);
								 }

								//按钮点击后,1.5S内不能重复点击
								setTimeout(function(){
									$(that).removeClass('disabled').attr('autocomplete','on').prop('disabled',false);
								},1500);
							 }
						})
						
					 })
			</script>
			
		</div>
		
	</div>
</div>
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
 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>


<?php $this->load->view("footer");?>