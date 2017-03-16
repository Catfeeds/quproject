<?php $this->load->view("header");?>



<body style="font-size: 12px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">my focus</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" href="/html/css/mylike.css">
	
		<style>
		html, body {
			background-color:#fff;
		}
		
		</style>
		<div class="wrap">
			<div class="rank-wrap">
				<div class="main-list">
                	<?php if( $res ):?>
                    <ul>         
                    	<?php foreach( $res as $key => $value ):?>           	
                        <a class="clear" href="/main/student_detail/<?php echo $value['id'];?>">
                            <li class="zhubo">
                            	<div class="box_l" style="background-image:url(<?php echo strstr($value['icon'],'http:') ? $value['icon'] : $this->api_url.$value['icon'];?>)"></div>
                                <div class="box_r">
                                    <p class="name"><?php echo $value['nickname'];?></p>
                                    <p class="text"></p>
                                </div>
                            </li>
                         </a>
                         <?php endforeach;?>					
                    </ul>
                    <?php else:?>
	                    <h2 class="blank_tip"><i></i>No attention<a href="/main/student">Go Follow</a></h2>
                    <?php endif;?>
				</div>
			</div>
		</div>
	<!-- 底部================================================== -->

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
</script><div id="back_icon" style="display: none; bottom: 1.2rem;" ;=""></div>



<?php $this->load->view("bottom");?>