<?php $this->load->view("header");?>



<body style="font-size: 24px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">all registered lists</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>


<link rel="stylesheet" type="text/css" href="/statics/css/activity.css">

<div class="wrap" style="min-height: auto;">

	<div class="enrolllist-wrap">
    	<?php if( $data ):?>
		<ul>
        	<?php foreach( $data as $key => $value ):?>
			<a href="/main/student_detail/<?php echo $value['id'];?>">
            	<li class="clear" data-time="<?php echo $value['ctime'];?>">
					<span class="pic" style="background-image:url(<?php echo strstr($value['icon'],'http') ? $value['icon'] : $this->api_url.$value['icon'];?>)"></span>
					<p class="name"><?php echo $value['nickname'];?></p>
					<p class="time"><?php echo $value['ctime'];?></p>
				</li>
            </a>
            <?php endforeach;?>
            </ul>
		<?php endif;?>
		<!--  -->
		<input type="hidden" id="page" value="2"/>
        <input type="hidden" id="id" value="<?php echo $id;?>"/>
	</div>
</div>
<script type="text/javascript">
	$(window).scroll(function(){
	　　var scrollTop = $(this).scrollTop();
	　　var scrollHeight = $(document).height();
	　　var windowHeight = $(this).height();
	　　if(scrollTop + windowHeight >= scrollHeight){
			var index  = $('#page').val();
			
			var oldindex = getCookie('index');
			if(oldindex == index) return false;
			else{
				setCookie('index',index,3);
				getResource(index);
			}
	　　}
	});

	function getResource(index){ 
		var index  = parseInt(index);
		var html='';
		var api_url = $('#api_url').val()+'/api/get_signup_list';
		var id = $('#id').val();
		 $.ajax({
		 	 type: "POST",
		 	 url: api_url,
		 	 data: { action:'get_info_list',id:id,page:index},		
		 	 success: function(data){
				//alert(data.status);
				data = eval('(' + data + ')');
		 		if(data.status == 1){
					 
					for(var i=0;i<data.data.length;i++){
						html+='<a href="/main/student_detail/'+ data.data[i].id +'"><li class="clear" data-time="'+ data.data[i].ctime +'">';
						html+='  <span class="pic" style="background-image:url('+ data.data[i].icon +')"></span>';		
						html+='	 <p class="name">'+ data.data[i].nickname +'</p>';
						html+='  <p class="time">'+data.data[i].ctime+'</p>';
						html+='</li></a>';

					}
					setTimeout(function(){
						$('.enrolllist-wrap ul').append(html);
					 },500);
				 }else{
				 	$(".getmore").html('没有更多了');
				 }
			   },
			   async: false
	     });
		 			
	}
</script>
<div class="ux-popmenu" style="position: fixed; background-color: rgba(0, 0, 0, 0.498039);">
	<div class="content show" style="bottom: 0px; position: fixed;">
		<section class="card-combine"> 
			 <a href="/"><span>返回首页</span></a>
			 
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