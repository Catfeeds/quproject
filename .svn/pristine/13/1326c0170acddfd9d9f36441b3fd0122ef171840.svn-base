<?php $this->load->view("header");?>

	<link rel="stylesheet" href="/html/css/show.css">
	<link rel="stylesheet" href="/html/css/swiper.min.css">
	<script type="text/javascript" src="/html/js/swiper.min.js"></script>



	<body style="font-size: 24px;">
		<div class="wrap">
			<div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">All evaluation</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


			<div class="comment-wrap">
				
				<div class="ul_box" style="width: 100%;position: fixed !important;top:1rem;z-index:2;">
					<ul class="title clear swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><li class="swiper-pagination-bullet swiper-pagination-bullet-active" data-page="1" data-type="0">All<br>(1)</li><li class="swiper-pagination-bullet" data-page="1" data-type="1">Praise<br>(1)</li><li class="swiper-pagination-bullet" data-page="1" data-type="2">Average<br>(0)</li><li class="swiper-pagination-bullet" data-page="1" data-type="3">Bad review<br>(0)</li></ul>
				</div>
				

				<div class="swiper-container swiper-container-horizontal swiper-container-autoheight">
					<div class="swiper-wrapper" style="height: auto;">
						<!-- 全部评价 -->
						<div class="comment-inner swiper-slide swiper-slide-active" style="min-height: 580.5px; width: 375px;">
							<ul class="ul0">
								<li class="clear" data-time="1477796081">
										<h2>
											<a href="/u/447505671293039" data-time="">
												<span style="background-image:url(/html/img/thumb_05906ee7fa0109c0cf353c89144f940a.jpeg)"></span>
												<span>趣果仁官方 </span>
											</a>
											<span class="time">2016-10-30</span>
										</h2>
										<div class="comment_inner">
											<h3><span class="boss-star star clear"><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i></span></h3>
											<p>人气主播，大主播，经常热门，卖萌，美女</p>
										</div>
										<div class="comment_bottom">
											<p>参与活动：【2016首届网红旅游节】100主播遇上100景点</p>
											<p>开始时间：2016-10-02 06:30</p>
										</div>
										
									</li>							</ul>
																						
						</div>
						<!-- 好评 -->
						<div class="comment-inner swiper-slide swiper-slide-next" style="min-height: 580.5px; width: 375px;">
							<ul class="ul1">
								<li class="clear" data-time="1477796081">
										<h2>
											<a href="/u/447505671293039" data-time="">
												<span style="background-image:url(/html/img/thumb_05906ee7fa0109c0cf353c89144f940a.jpeg)"></span>
												<span>趣果仁官方 </span>
											</a>
											<span class="time">2016-10-30</span> 
										</h2>
										<div class="comment_inner">
											<h3><span class="boss-star star clear"><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i><i class="on"></i></span></h3>
											<p>人气主播，大主播，经常热门，卖萌，美女</p>
										</div>
									
										<div class="comment_bottom">
											<p>参与活动：【2016首届网红旅游节】100主播遇上100景点</p>
											<p>开始时间：2016-10-02 06:30</p>
										
										</div>
									</li>							</ul>
								
														
						</div>
						<!-- 中评 -->
						<div class="comment-inner swiper-slide" style="min-height: 580.5px; width: 375px;">
															<h2 class="blank_tip"><i></i>No comment</h2>							
						</div>
						<!-- 差评 -->
						<div class="comment-inner swiper-slide" style="min-height: 580.5px; width: 375px;">
															<h2 class="blank_tip"><i></i>No comment</h2>							
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
					  case 0: name='All<br />(1)';datatype=0;break;
					  case 1: name='Praise<br />(1)';datatype=1;break;
					  case 2: name='Average<br />(0)';datatype=2;break;
					  case 3: name='Bad review<br />(0)';datatype=3;break;
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
					var page  = $('.swiper-pagination-bullet-active').attr('data-page');
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
				
				$.ajax({
					 type: "POST",
					 url: "/EvaluateAjax/getcomment.html",
					 data: { page:page,type:type,objid:"298" },
					 dataType: "json",
					 success: function(data){
						
						if(data.status == 1){
							for(var i=0;i<data.list.length;i++){
								html+=' <li class="clear" data-time="'+ data.list[i].create_time +'">';
								html+='  <h2>';
								html+='	 <a href="/u/'+ data.list[i].uguid +'">';
								html+='   <span style="background-image:url('+ data.list[i].headimgurl +')"></span>';		
								html+='	  <span>'+data.list[i].realname +'</span></a>';
								html+='   <span class="time">'+data.list[i].createtime+'</span>';
								html+='  </h2>';
								html+='  <div class="comment_inner">';
								html+='   <h3><span class="boss-star star clear">'+data.list[i].level+'</span></h3>';
								html+='   <p>'+ data.list[i].comment+'</p>';
								html+='  </div>';
								html+='  <div class="comment_bottom">';
								html+='   <p>参与活动：'+data.list[i].proname+'</p>';
								html+='   <p>开始时间：'+data.list[i].begintime+'</p>';
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
							$(".getmore").html('没有更多了');
						}

						
					  },
					  async: false
			    });
				 	
				
					
			}
		</script>
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
 


<?php $this->load->view("footer");?>