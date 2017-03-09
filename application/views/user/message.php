<?php $this->load->view("header");?>
	

<body style="font-size: 24px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">Message Center</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" href="/statics/css/msg.css">
	
	
		<div class="wrap">
			<div class="news-wrap">
				<div class="news-list">
                	<?php if( $res ):?>
					<ul>
                    	<?php foreach( $res as $key => $value ):?>
                        <?php $value['uid']=($value['uid']==$_SESSION['uid'])?$value['to_uid']:$value['uid'];$user = get_userinfo_by_uid($value['uid']);?>
						<a href="/main/message/<?php echo $value['uid'];?>"><li class="w-left clear" id="w-left1" data-id="<?php echo $value['id'];?>">
							<div class="talk-box clear">
								<span><img src="<?php echo strstr($user['icon'],'http:') ? $user['icon'] : $this->api_url.$user['icon'];?>"></span>
								<span><?php echo $user['nickname'];?></span>
								<p></p>
								
								<span><?php echo get_date_content($value['ctime']);?></span>
							</div>
							<div class="delete-box">delete</div>
						</li>
						</a>
                        <?php endforeach;?>					
                    </ul>
                    <?php endif;?>
				</div>
			</div>
		</div>
		<script src="/statics/js/touch-0.2.14.min.js"></script>

		<script type="text/javascript">
		//swipe example
				touch.on('.w-left', 'swipeleft swiperight', function(ev){
					
					if(ev.type == 'swipeleft'){
						$('.w-left').stop().animate({left:'0'},200);
						$(this).parents(".w-left").stop().animate({left:'-2rem'},200);
						//this.style.webkitTransform = "translate3d(" + -100 + "px,0,0)";
						$('.w-left').parents('a').attr('onclick','return false');
						
						
					}else if(ev.type == 'swiperight'){
						$(this).parents(".w-left").stop().animate({left:'0'},200);
						//this.style.webkitTransform = "translate3d(-" + this.offsetLeft + "px,0,0)";
					}
				});
				
				$('.w-left').click(function(){
					if($(this).css('left') == "0px"){
						window.location.href=$(this).parent().attr('href');
//						$(this).parents('a').attr('onclick','return true');
					}else{
						$(this).stop().animate({left:'0'},200);
					}
				})
				$('.delete-box').click(function(){
					var objid = $(this).parents('li').attr('data-id');
					var that = $(this);
					$.post("/user/delete_msg",{ id:objid },function(data){
						data = eval('(' + data + ')');
						if(data.status == 1){
							that.parents(".w-left").remove();
						}else{
							notice(data.msg);
						}
					})
					
				})
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
	function chinaz(){
		this.init();
	}
	chinaz.prototype = {
		constructor: chinaz,
		init: function(){		
			this._initBackTop();
		},	
		_initBackTop: function(){
			var $backTop = this.$backTop = $('<div id="back_icon" style="display:none";>'+'</div>');
			$('body').append($backTop);
			
			$backTop.click(function(){
				$("html, body").animate({
					scrollTop: 0
				}, 120);
			});

			var timmer = null;
			$(window).bind("scroll",function() {
	            var d = $(document).scrollTop(),
	            e = $(window).height();
	            400 < d ? $backTop.css({"bottom":"1.2rem","display":"inline-block"}) : $backTop.css({"bottom":"1.2rem","display":"none"});
				clearTimeout(timmer);
				timmer = setTimeout(function() {
	                clearTimeout(timmer)
	            },100);
		   });
		}
		
	}
	var chinaz = new chinaz();

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