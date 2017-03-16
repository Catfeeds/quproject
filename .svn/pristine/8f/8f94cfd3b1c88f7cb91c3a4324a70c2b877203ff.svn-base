<?php $this->load->view('header');?>
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	<link rel="stylesheet" href="/statics/css/show.css">
	<link rel="stylesheet" href="/statics/css/swiper.min.css">
	<script type="text/javascript" src="/statics/js/swiper.min.js"></script>

	</head>
	
	





	<body style="font-size: 24px;">
		<div class="wrap">
			<div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">所有评价</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


			<div class="comment-wrap">
				
				<div class="ul_box" style="width: 100%;position: fixed !important;top:1rem;z-index:2;">
                <input type="hidden" id="good" value="<?php echo $good ? $good : 0 ;?>"/>
                <input type="hidden" id="mid" value="<?php echo $mid ? $mid : 0 ;?>"/>
                <input type="hidden" id="bad" value="<?php echo $bad ? $bad : 0 ;?>"/>
                <input type="hidden" id="total" value="<?php echo $total ? $total : 0 ;?>"/>
                <input type="hidden" id="zbid" value="<?php echo $id;?>"/>
                <input type="hidden" id="page" value="2"/>
					<ul class="title clear swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><li class="swiper-pagination-bullet swiper-pagination-bullet-active" data-page="1" data-type="0">所有<br>(<?php echo $total ? $total : 0;?>)</li><li class="swiper-pagination-bullet" data-page="1" data-type="1">好评<br>(<?php echo $good ? $good : 0;?>)</li><li class="swiper-pagination-bullet" data-page="1" data-type="2">中评<br>(<?php echo $mid ? $mid : 0;?>)</li><li class="swiper-pagination-bullet" data-page="1" data-type="3">差评<br>(<?php echo $bad ? $bad : 0;?>)</li></ul>
				</div>
				

				<div class="swiper-container swiper-container-horizontal swiper-container-autoheight">
					<div class="swiper-wrapper" style="height: auto;">
						<!-- 全部评价 -->
						<div class="comment-inner swiper-slide swiper-slide-active" style="">	
                        	<?php if( $all ):?>
							<ul class="ul0">
                            	<?php foreach( $all as $value ):?>
                                	<?php $user = get_userinfo_by_uid($value['uid']);?>
									<li class="clear" data-time="<?php echo $value['ctime'];?>">
										<h2>
											<a href="/main/student_detail/<?php echo $value['uid'];?>" data-time="">
												<span style="background-image:url(<?php echo strstr($user['icon'],'http') ? $user['icon'] : $this->api_url.$user['icon'];?>)"></span>
												<span><?php echo $user['nickname'];?> </span>
											</a>
											<span class="time"><?php echo ymd($value['ctime']);?></span>
										</h2>
										<div class="comment_inner">
											<h3><span class="boss-star star clear">
                                            	<?php for( $i=1; $i<=$value['star_num']; $i++ ):?>
                                            		<i class="on">
                                            	<?php endfor;?>
                                            </h3>
											<p><?php echo $value['content'];?></p>
										</div>
										<div class="comment_bottom">
											<p>participate:<?php echo $value['en_title'] ? $value['en_title'] : $value['title'];?></p>
											<p>Starting time:<?php echo ymdhi($value['start_time']);?></p>
										</div>
										
									</li>	
                                  <?php endforeach;?>
                            </ul>
							<?php else:?>
                            <h2 class="blank_tip"><i></i>暂无评论</h2>	
                            <?php endif;?>														
						</div>
						<!-- 好评 -->
						<div class="comment-inner swiper-slide swiper-slide-next" style=" ">
                        	<?php if( $all_good ):?>
							<ul class="ul0">
                            	<?php foreach( $all_good as $value ):?>
                                	<?php $user = get_userinfo_by_uid($value['uid']);?>
									<li class="clear" data-time="<?php echo $value['ctime'];?>">
										<h2>
											<a href="/main/student_detail/<?php echo $value['uid'];?>" data-time="">
												<span style="background-image:url(<?php echo strstr($user['icon'],'http') ? $user['icon'] : $this->api_url.$user['icon'];?>)"></span>
												<span><?php echo $user['nickname'];?> </span>
											</a>
											<span class="time"><?php echo ymd($value['ctime']);?></span>
										</h2>
										<div class="comment_inner">
											<h3><span class="boss-star star clear">
                                            	<?php for( $i=1; $i<=$value['star_num']; $i++ ):?>
                                            		<i class="on">
                                            	<?php endfor;?>
                                            </h3>
											<p><?php echo $value['content'];?></p>
										</div>
										<div class="comment_bottom">
											<p>participate:<?php echo $value['en_title'] ? $value['en_title'] : $value['title'];?></p>
											<p>Starting time:<?php echo ymdhi($value['start_time']);?></p>
										</div>
										
									</li>	
                                  <?php endforeach;?>
                            </ul>
							<?php else:?>
                            <h2 class="blank_tip"><i></i>暂无评论</h2>	
                            <?php endif;?>
								
														
						</div>
						<!-- 中评 -->
						<div class="comment-inner swiper-slide" style=" ">
                        	<?php if( $all_mid ):?>
							<ul class="ul0">
                            	<?php foreach( $all_mid as $value ):?>
                                	<?php $user = get_userinfo_by_uid($value['uid']);?>
									<li class="clear" data-time="<?php echo $value['ctime'];?>">
										<h2>
											<a href="/main/student_detail/<?php echo $value['uid'];?>" data-time="">
												<span style="background-image:url(<?php echo strstr($user['icon'],'http') ? $user['icon'] : $this->api_url.$user['icon'];?>)"></span>
												<span><?php echo $user['nickname'];?> </span>
											</a>
											<span class="time"><?php echo ymd($value['ctime']);?></span>
										</h2>
										<div class="comment_inner">
											<h3><span class="boss-star star clear">
                                            	<?php for( $i=1; $i<=$value['star_num']; $i++ ):?>
                                            		<i class="on">
                                            	<?php endfor;?>
                                            </h3>
											<p><?php echo $value['content'];?></p>
										</div>
										<div class="comment_bottom">
											<p>participate:<?php echo $value['en_title'] ? $value['en_title'] : $value['title'];?></p>
											<p>Starting time:<?php echo ymdhi($value['start_time']);?></p>
										</div>
										
									</li>	
                                  <?php endforeach;?>
                            </ul>
							<?php else:?>
                            <h2 class="blank_tip"><i></i>暂无评论</h2>	
                            <?php endif;?>							
						</div>
						<!-- 差评 -->
						<div class="comment-inner swiper-slide" style="">
                        	<?php if( $all_bad ):?>
							<ul class="ul0">
                            	<?php foreach( $all_bad as $value ):?>
                                	<?php $user = get_userinfo_by_uid($value['uid']);?>
									<li class="clear" data-time="<?php echo $value['ctime'];?>">
										<h2>
											<a href="/main/student_detail/<?php echo $value['uid'];?>" data-time="">
												<span style="background-image:url(<?php echo strstr($user['icon'],'http') ? $user['icon'] : $this->api_url.$user['icon'];?>)"></span>
												<span><?php echo $user['nickname'];?> </span>
											</a>
											<span class="time"><?php echo ymd($value['ctime']);?></span>
										</h2>
										<div class="comment_inner">
											<h3><span class="boss-star star clear">
                                            	<?php for( $i=1; $i<=$value['star_num']; $i++ ):?>
                                            		<i class="on">
                                            	<?php endfor;?>
                                            </h3>
											<p><?php echo $value['content'];?></p>
										</div>
										<div class="comment_bottom">
											<p>participate:<?php echo $value['en_title'] ? $value['en_title'] : $value['title'];?></p>
											<p>Starting time:<?php echo ymdhi($value['start_time']);?></p>
										</div>
										
									</li>	
                                  <?php endforeach;?>
                            </ul>
							<?php else:?>
                            <h2 class="blank_tip"><i></i>暂无评论</h2>	
                            <?php endif;?>						
						</div>
					</div>
				</div>
				<div class="btn-clear"></div>
			</div>
		</div>
		<script type="text/javascript">
			var w_h = $(window).height();
	
			var list_h = $('.swiper-pagination').height();
			var clear_h = $('.btn-clear').height();
			var slide_h = w_h-list_h-clear_h;
			$('.swiper-slide').css('min-height',slide_h);
		

			var mySwiper = new Swiper('.swiper-container',{
				autoHeight: true,
				pagination: '.swiper-pagination',
				paginationClickable: true,
				paginationBulletRender: function (index, className) {
					switch (index) {
					  case 0: name='全部<br />('+$('#total').val()+')';datatype=0;break;
					  case 1: name='好评<br />('+$('#good').val()+')';datatype=1;break;
					  case 2: name='中评<br />('+$('#mid').val()+')';datatype=2;break;
					  case 3: name='差评<br />('+$('#bad').val()+')';datatype=3;break;
					  default: name='';
					}
				    return '<li class="' + className + '" data-page=1 data-type="'+ datatype +'">' + name + '</li>';
				},
				onSlideChangeStart: function(swiper){
			        var li_h = $('.swiper-slide-active ul li').height();
					var li_length = $('.swiper-slide-active ul li').length;
					li_length = li_length+1;
					var ul_h = $('.swiper-pagination').height();
					li_h = li_h+ul_h*0.06;
					var wrapper_h = li_h*li_length;
	     			$('.swiper-wrapper').css('height',wrapper_h+ul_h)
	     			if(li_length<5){
	     				$('.swiper-wrapper').css('height',slide_h);
	     			}
			    }

			});

			$('.swiper-wrapper').css('height','auto');
		</script>
		<script type="text/javascript">
			$(window).scroll(function(){
			　　var scrollTop = $(this).scrollTop();
			　　var scrollHeight = $(document).height();
			　　var windowHeight = $(this).height();
			　　if(scrollTop + windowHeight >= scrollHeight){
					//var page  = $('.swiper-pagination-bullet-active').attr('data-page');
					var page = $('#page').val();
					var oldpage = getCookie('page'); 
					if(oldpage == page) return false;
					else{
						setCookie('page',page,3);
						getResource(page);
					}
				}
			});


			function getResource(page){ 
				var page  = parseInt(page);
				var type  = $(".swiper-pagination-bullet-active").attr('data-type');
				var html='';
				var api_url = $('#api_url').val()+'/api/get_user_comment';
				var id = $('#id').val();
				var zbid = $('#zbid').val();
				
				$.ajax({
					 type: "POST",
					 url: api_url,
					 data: { page:page,type:type,objid:"298" },
					 dataType: "json",
					 success: function(data){
						
						if(data.status == 1){
							for(var i=0;i<data.data.length;i++){
								html+=' <li class="clear" data-time="'+ data.data[i].create_time +'">';
								html+='  <h2>';
								html+='	 <a href="/main/student_detail/'+ data.list[i].uid +'">';
								html+='   <span style="background-image:url('+ data.data[i].icon +')"></span>';		
								html+='	  <span>'+data.data[i].nickname +'</span></a>';
								html+='   <span class="time">'+data.data[i].ctime+'</span>';
								html+='  </h2>';
								html+='  <div class="comment_inner">';
								html+='   <h3><span class="boss-star star clear">'+data.data[i].star_num+'</span></h3>';
								html+='   <p>'+ data.data[i].content+'</p>';
								html+='  </div>';
								html+='  <div class="comment_bottom">';
								html+='   <p>participate:'+data.list[i].en_title+'</p>';
								html+='   <p>Starting time:'+data.list[i].start_time+'</p>';
								html+='  </div>';
								html+=' </li>';
							}

							$(".swiper-pagination-bullet-active").attr('data-page',data.page);
						
							var li_h = $('.swiper-slide-active ul li').height();
							var li_length = $('.swiper-slide-active ul li').length;
							var tip_h = $('.getmore').height();
							tip_h = tip_h*5;
			     			var new_li = li_length+i;
			     			var ul_h = $('.ul_box').height();
			     			li_h = li_h + ul_h*0.06;
							var wrapper_h = li_h*new_li;
							alert(i);
							setTimeout(function(){
								$('.swiper-wrapper').css('height',wrapper_h+ul_h+tip_h);
							},500);
			     			


							setTimeout(function(){
								$('.comment-inner .ul'+type).append(html);
							},500);

						}else{
							$(".getmore").html('No more');
						}

						
					  },
					  async: false
			    });
				 	
				
					
			}
		</script>
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
			 <a href="/"><span>home</span></a>
			 
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

<?php $this->load->view('footer');?>