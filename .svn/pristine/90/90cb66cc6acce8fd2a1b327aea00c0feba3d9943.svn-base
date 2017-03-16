<?php $this->load->view("header");?>


<body style="background-color: rgb(239, 239, 244); font-size: 12px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">my collection</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" href="/statics/css/show.css">

<div class="wrap">
	<div class="collect-wrap">
		<div class="top-pic">
			<img src="/statics/img/zhubotopad.jpg" alt="找活动 就上趣果仁">
		</div>
		<h2 class="title"><span>my collection</span></h2>
		<div class="main-box">
			<div class="activity-inner">
            	<?php if( $res ):?>
				<ul>
                	<?php foreach( $res as $key => $value ):?>
                    <a href="/main/info_detail/<?php echo $value['id'];?>">
                        <li class="clear">
                            <div class="box_l" style="background-image:url(<?php echo $value['image'];?>)"></div>
                            <div class="box_r">
                            <p class="title"><?php echo $value['en_title']?$value['en_title']:$value['title'];?></p>
                            <p class="time">Starting time:<?php echo date_md($value['start_time']).' '.date_hi($value['start_time']);?></p>
                            <p class="time">City:<?php echo $value['city'];?></p>
                            </div>
                    	</li>
                    </a>	
                    <?php endforeach;?>				
                </ul>
                <?php else:?>
                <h2 class="blank_tip big"><i></i>No collection<a href="/main">Go collection</a></h2>
                <?php endif;?>
           </div>
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