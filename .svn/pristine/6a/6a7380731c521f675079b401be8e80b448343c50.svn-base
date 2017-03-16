<?php $this->load->view("header");?>

	


<body style="font-size: 12px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">I posted the event</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" href="/statics/css/mypro.css">
<link rel="stylesheet" href="/statics/css/show.css">

<div class="wrap">
	<div class="mypro-wrap">
	<!-- 	<div class="top-pic">
			<img src="/statics/img/bustopad.jpg" alt="">
		</div> -->
		<div class="title-list top-list clear" style="top: 54px;">
			<ul class="swiper-pagination">

				<li <?php if( $type == 1 ):?>class="current"<?php endif;?>><a href="/user/mypost/1">Initiated</a></li>
				<li <?php if( $type == 2 ):?>class="current"<?php endif;?>><a href="/user/mypost/2">Participate</a></li>
				<li <?php if( $type == 3 ):?>class="current"<?php endif;?>><a href="/user/mypost/3">Be evaluated</a></li>
				<li <?php if( $type == 4 ):?>class="current"<?php endif;?>><a href="/user/mypost/4">Completed</a></li>

			</ul>
		</div>
		<div class="nav_div" style="height: 1rem; display: none;"></div>
		
		<div class="main-box">
				
			<div class="activity-inner">
            <?php if( $res ):?>
			<ul>            	
				<?php foreach( $res as $key => $value ):?>
                    <a href="/main/info_detail/<?php echo $value['id'];?>">
                        <li class="clear">
                            <div class="box_l" style="background-image:url(<?php echo strstr($value['image'],'http:') ? $value['image'] : $this->api_url.$value['image'];?>)"></div>
                            <div class="box_r">
                            <p class="title"><?php echo $value['title'];?></p>
                            <p class="time">Number of applicants:<?php echo $value['join_count'];?>&nbsp;&nbsp;people</p>
                            <p class="time">Starting time:<?php echo date_md($value['start_time']).' '.date_hi($value['start_time']);?></p>
                            </div>

                            <?php if( $type== 3 ):?>
											<div style='height:.8rem;line-height:.8rem; margin-top:.1rem;'>
												<a href="/main/info_manage/<?php echo $value['id'];?>" style='float:right;background: #FF8904;color: #fff; padding:0 .2rem;border-radius: .04rem; margin-right:.2rem'>evaluate</a>
											</div>
                            <?php endif;?>
                        </li>
                    </a>					
                <?php endforeach;?>               
            </ul>
            <?php else:?>
	            <h2 class="blank_tip big"><i></i>No activity yet</h2>
			<?php endif;?>
			</div>
		</div>

		<div class="bottom_div"></div>
	</div>
</div>

<script type="text/javascript">
	// 顶部菜单固定在顶部
		$('.swiper-pagination li').click(function(){
		$('.swiper-pagination li').removeClass('current')
		$(this).addClass('current')
	})
	var header_h = $('.header').height();
	var pic_h = $('.top-pic').height();
	var nav_t = $('.title-list').offset().top;
	var top_h = nav_t-header_h;
	$(document).scroll(function(){
		var win_t = $(window).scrollTop();
		if(win_t>=top_h){
			$('.nav_div').show();
			$('.title-list').css({'position':'fixed','top':header_h});
		}else{
			$('.nav_div').hide();
			$('.title-list').css('position','');
		}
	})
</script>

	<!-- 底部================================================== -->
	<?php $this->view('bottom');?>
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
</script><div id="back_icon" style="display: none; bottom: 1.2rem;" ;=""></div>
 



<?php $this->load->view("footer");?>