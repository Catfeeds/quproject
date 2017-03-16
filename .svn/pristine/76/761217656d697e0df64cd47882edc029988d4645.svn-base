<?php $this->load->view("header");?>
	<link rel="stylesheet" href="/statics/css/usercenter.css">
	<link rel="stylesheet" type="text/css" href="/statics/css/idangerous.swiper.css">
	<script src="/statics/js/swiper.min.js"></script></head>
	<link rel="stylesheet" type="text/css" href="/statics/css/swiper.min.css">

<body>
<div id="container">
		<div class="wrap" style="background-color: #efeff4;">
			<div class="zhubu-show">
				<a class="top_backhome_icon" href="/"></a>
				<div class="top">
                	<input type="hidden" id="user_id" value="<?php echo $_SESSION['uid'];?>"/>
                    <input type="hidden" id="zbid" value="<?php echo $id;?>"/>
					<div class="top-bg clear">
                    	<?php if( $res['photo'] ):?>                        
                        	<?php foreach( $res['photo'] as $key => $value ):?>
							 <span style="background-image:url(<?php echo strstr($value['pic'],'http') ? $value['pic'] : $this->api_url.$value['pic'];?>)"></span>
                         	<?php endforeach;?>
                        <?php endif;?>				
                    </div>
					<div class="person-infor">
						<div class="person-pic" style="background-image:url(<?php echo strstr($res['icon'],'http') ? $res['icon'] : $this->api_url.$res['icon'];?>)"></div>
						<h2><?php echo $res['nickname'];?><i class="icon <?php if( $res['sex'] == 1):?>sex1<?php else:?>sex0<?php endif;?>"></i></h2>
						<h3>积分:<?php echo $res['integral'];?></h3>
						<p><?php echo $res['signature'];?></p>
						
						<div class="praise-btn">
							<!-- <span class="fa fa-thumbs-up praise-icon"></span> -->
							<a id="praise" change-num="true" class="praise uncurrent" url=""><?php echo $support;?></a>
						</div>
						<script>
						$(".praise").on('touchend',function(){
							var that = $(this);
							var api_url = $('#api_url').val()+'/api/add_support';
							var zbid = $('#objid').val();
							var id = $('#user_id').val();
							
							 $.post(api_url,{ action:"add_support",uid:id,zhubo_id:zbid }).success(function(data)
							 {
								 data = eval('(' + data + ')'); 
							 	if(data.status==-1){
							 		window.location.href = '/user/login';
							 	}else{
							 		if(data.status==1)
									{
							 			//操作成功
							 			$(that).text(data.count);
							 			var html = "";
							 			html+='<span class="fa fa-thumbs-up praise-icon"></span>';
							 			$('.praise-btn').append(html);

							 			setTimeout(function(){
							 				that.removeClass('disabled');
							 			},0);
							 		}else{
							 			notice(data.msg);
							 		}
									

							 		//按钮点击后,1.5S内不能重复点击
							 		setTimeout(function(){
							 				$(that).removeClass('disabled').attr('autocomplete','on').prop('disabled',false);
							 			},1500);
							 	}
							 });
						});
						</script>

					</div>
				</div>
				
				<div class="control">
				    <a href="<?php echo $res['base_url'];?>">
					<div class="control_text first">
						<div class="control_text_primary">基本信息</div>
					</div>

					
						<div class="control_textarea">
						<p><span>进入微店查看</span></p<>
						</div>
					<?php /**<div class="control_textarea">
						<p><span>年龄</span><span><?php echo get_how_old($res['birthday']);?>&nbsp;&nbsp;&nbsp;</span></p>
						<p><span>所属平台</span><span><?php if( $res['platform'] > 0 ):?><?php echo get_platform($res['platform']);?>（room number：<?php echo $res['room'];?>）<?php else:?><?php echo get_platform(0);?><?php endif;?></span></p>
						<p><span>平台粉丝</span><span><?php echo $res['fans_num'];?></span></p>
						<p><span>常驻城市</span><span><?php echo $res['city'];?></span></p>
						<p><span>参与活动</span><span><?php echo $join ? $join : 0;?>次</span></p>
						<!--<p><span>个性签名</span><span>嗨，我是牛泽萌~</span></p>-->
					</div>
					<?php **/?>
					</a>
				</div>
				<div class="control">
						<div class="control_text first">
							<div class="control_text_primary">直播间信息</div>
						</div>
						<div class="col-box2">
							<a target="_blank" href="" class="col-left"><img src="<?php echo strstr($res['icon'],'http') ? $res['icon'] : $this->api_url.$res['icon'];?>" alt=""></a>
							<div class="col-auto2">
								<h2><?php echo $res['nickname'];?>的直播间</h2>
								<!-- <p>微博：曹思yourself</p> -->
								<p>
									<a target="_blank" href="<?php echo $res['show_url'];?>">进入TA的直播间</a>
									<!--										<span class="off">暂无直播&nbsp;&nbsp;<a target="_blank" href="http://www.huajiao.com/user/33892448">查看回放</a></span>-->
								</p>
							</div>
						</div>
				</div>

				<div class="control tip" style="left: -548px;">
					<div class="control_text first">
						<div class="control_text_primary">标签</div>
					</div>
					<div class="tip_icon">
                    	<?php $tags = json_decode($res['tags'],true);?>
                        <?php foreach( $tags as $key => $value ):?>
                        	<i class="icon<?php echo $key+1;?>"><?php echo get_tags($value);?></i>			
                        <?php endforeach;?>
                    </div>
				</div>
				<div class="control">
					<a href="/main/show_student/<?php echo $res['id'];?>"><div class="control_text first">
						<div class="control_text_primary" style="bordrer:none;">
						<!-- 查看评价(<?php echo $comment ? $comment : 0;?>) -->
						查看TA的活动和评价
						<i class="text_i"></i></div>
					</div></a>
				</div>

				

				<div class="btn-clear"></div>
				<div class="zhubo-show-btn clear">
					
					<a class="chat" href="javascript:history.go(-1)"><i class="fa fa-chevron-left" style="padding-right:0.1rem;"></i>返回</a>
					<?php if( $if_follow == 1 ):?>
					<a class="attent off fa confirm" target-form="objid" return-msg="&nbsp;关注&nbsp;" change-msg="已关注" url=""><span>已关注</span></a>
                    <?php else:?>
					<a class="attent on fa" target-form="objid" return-msg="已关注" change-msg="&nbsp;已关注&nbsp;" url=""><span>&nbsp;关注&nbsp;</span></a>
                   	<?php endif;?>
					
					<a class="chat" href="/main/message/<?php echo $res['id'];?>"><i class="fa fa-comments-o" style="padding-right:0.1rem;"></i>私信</a>
				</div>

				<script>
					$('.attent').on('touchend',function(){
					
						if ( $(this).hasClass('confirm') ) {
							if(!confirm('确定取消关注？')){
								return false;
							}
						}

						var that = $(this);
						var api_url = $('#api_url').val()+'/api/add_guanzhu';
						var user_id = $('#user_id').val();
						var zbid = $('#zbid').val();
						that.addClass('disabled').attr('autocomplete','off').prop('disabled',true);
			
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
			<!--相册-->
			<div class="picture-wrap" style="z-index: -1;">
				<div class="main-pic swiper-container swiper-container-horizontal" id="picture">
					<ul class="swiper-wrapper clear" style="width: 1644px; left: 0px; top: 285px; transition-duration: 0ms; transform: translate3d(-548px, 0px, 0px);">
                    	<?php foreach( $res['photo'] as $key => $value ):?>
						<li class="swiper-slide swiper-slide-prev" id="<?php echo $key;?>" style="width: 548px;">
							<img class="swiper-lazy swiper-lazy-loaded" alt="" src="<?php echo strstr($value['pic'],'http') ? $value['[pic'] : $this->api_url.$value['pic'];?>">							
							<p class="tip" style="left: 0px; width: 548px;">点击关闭相册<span><?php echo ($key+1).'/'.count($res['photo']);?></span></p>							
						</li>
                        <?php endforeach;?>						
						
					</ul>
				</div>
				
			</div>

			<input type="hidden" class="objid" id="objid" value="<?php echo $id;?>">
		</div>
		</div>
		




<script type="text/javascript">
	
	
	var num = $('#picture ul li').length,
		elelength = $('.wrap').width(),
		hei = $(window).height(),
		liWidth = elelength,
		index = 0,
		picHeight;
	$('.tip').each(function(){
		var tip_num = $(this).parents('li').index();
		$(this).css('left',tip_num*elelength);
	})
	
		
	
	$('#picture ul li,#picture ul li p').width(elelength);
	$('#picture ul').width(elelength*num);
	

	mySwiper = new Swiper('.swiper-container',{
		preloadImages: false,
        lazyLoading: true,
    });
	
	//图片居中
	$('#picture ul').css({"left":-(Math.abs(elelength-$('#picture ul li img').width())/2)});
	$('#picture ul').css({"top":(Math.abs(hei)/2)});
	
	$('.swiper-lazy-preloader').height(hei*0.5);
	
	$('.top-bg span').click(function(){
		$('.picture-wrap').css('z-index','999');
		// mySwiper.slideTo($(this).index());
	})
	
	
	//点击图片弹出和隐藏文字
	$('#picture ul li img').click(function(){
		$('.picture-wrap').css('z-index','-1');
	})
	
	//点赞按钮样式
//	clearCookie('likeNum'+$('#objid').val()+"1054");
	var likeNum = getCookie('likeNum'+$('#objid').val()+"1054");
	
	if(likeNum > 0){
		//显示白色的按钮
		$('.praise').addClass('current');
		$('.praise').removeClass('uncurrent');
	}else{
		//显示灰色的按钮
		$('.praise').addClass('uncurrent');
		$('.praise').removeClass('current');
	}
	
	
	$('.praise').on('touchend',function(){
		var likeNum = getCookie('likeNum');
//		console.log('likenum: ' + likeNum);
		if(likeNum >= 10){
//			alert('今天不能点赞了');
		}else{
			likeNum += 1;
			setCookie('likeNum'+$('#objid').val()+"1054", likeNum, 3600 * 24);
			
			if(likeNum  == 1){
				//设置按钮白色
				$(this).addClass('current');
				$(this).removeClass('uncurrent');
			}
		}
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
</script>
 


<?php $this->load->view("footer");?>