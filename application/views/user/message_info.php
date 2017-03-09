<?php $this->load->view("header");?>
	<link rel="stylesheet" href="/statics/css/sms.css"></head>

	<body style="height: 100%; font-size: 24px;">
		<div class="wrap">
			<form action="" method="post" onSubmit="return false;">
			<p class="loading" id="loading"><i class="fa fa-spinner fa-spin fa-3x fa-fw margin-bottom"></i><span>加载中...</span></p>
			<!---->
			<div class="sms-wrap" id="sms-wrap">   

				<?php 
				$myinfo  = get_userinfo_by_uid($_SESSION['uid']);
				foreach ($data as $key => $value) { ?>
					
                <?php if($value['uid']!=$_SESSION['uid']){
                	//这个消息应该显示在左边
                	$info = get_userinfo_by_uid($value['uid']);?>						
                <div class="text-box text-box2 clear" data-mid="1271">
							<img src="<?php echo strstr($info['icon'],'http:') ? $info['icon'] : $this->api_url.$info['icon'];?>">
							<p><?php echo $value['content'];?></p>
				</div>
				<?php }else{?>
					<div class="text-box text-box1 clear" data-mid="1271">
							<img src="<?php echo strstr($myinfo['icon'],'http:') ? $myinfo['icon'] : $this->api_url.$myinfo['icon'];?>">
							<p><?php echo $value['content'];?></p>
					</div>
				<?php }}?>
			</div>
			<div class="empty"><a href="javascript:;"></a></div>
			
				<div class="sms-box clear" style="position: fixed;bottom: 0;width: 100%;height: 1.2rem;line-height: 1.2rem;background-color: #eee;">
					<input type="text" name="msg" id="msg" value="" placeholder="你好...">
					<a id="dosubmit" style="outline: none">发送</a>
				</div>
			
			
			<a name="enter" href="#enter"></a>
			<div id="enter"></div>
			<input type="hidden" name="sender" id="sender" value="<?php echo $_SESSION['uid'];?>">
            <input type="hidden" name="to_uid" id="to_uid" value="<?php echo $info['id'];?>"/>
			<input type="hidden" id="link2" value="/u/147495522110640">
			<input type="hidden" id="link1" value="/u/248464716484568">
			</form>
		</div>


	
		
		<script>
		var sender = $('#sender').val();
		var link1  = $('#link1').val();
		var link2  = $('#link2').val();
		$('.text-box2 img').click(function(){
			window.location = link2; 
		})
		$('.text-box1 img').click(function(){
			window.location = link1; 
		})


		$(window).scroll(function(){
		　　var scrollTop = $(this).scrollTop();
		 
		　　if(scrollTop == 0){
				var index = $("#index").val();
		　　　　getResource(index);
		　　}
		});
		function getResource(index){ 
			//$('#loading span').html('加载中...');
			//$('#loading').show();
			//$('#loading i').show();
			var time = $('.text-box:first-child').attr('data-time');
			var mid = $('.text-box:first-child').attr('data-mid');
			
			// $.post("/MessageAjax/getchats.html",{ mid:mid,objid:sender },function(data){
				// if(data.status == 1){
					//setTimeout(function(){
						for(var i=0;i<data.msglist.length;i++){
							var html = '';
							if(data.msglist[i].name != null){
								html = '<h2 class="timename">'+format(data.msglist[i].name*1000)+'</h2>';
							}

							if(sender == data.msglist[i].sender) {								
								html = html+'<div class="text-box text-box2 clear" data-mid="'+data.msglist[i].id+'"><img src="/html//Uploads/Headimgurl/2016-09-13/thumb_78bc98ae59d1923841f2377768fa2a10.jpeg" /><p>'+data.msglist[i].msg+'</p></div>';
							}else{
								html = html+'<div class="text-box text-box1 clear" data-mid="'+data.msglist[i].id+'"><img src="/html//Uploads/Headimgurl/2017-01-17/thumb_7669c796163e902237e2af223e78ee52.jpeg" /><p>'+data.msglist[i].msg+'</p></div>';
							}
							$(html).hide().prependTo($('.sms-wrap')).slideDown('slow');
							
						}
						$('.text-box2 img').click(function(){
							window.location = link2;
						})
						$('.text-box1 img').click(function(){
							window.location = link1;
						})
						//$('#loading').hide();
					//},&nbsp;1500);
					
					
				// }else{
					/*setTimeout(function(){
						$('#loading span').html('没有更多了！');
						$('#loading i').hide();
						$('#loading').show();
					},&nbsp;1500);*/
				// }
			// })
				
		}


		</script>
		<script>

		
			$("#dosubmit").on('click',function(){
				var that = $(this);
				that.addClass('disabled');
				that.css('background-color','rgba(150,150,150,0.7)');
				setTimeout(function(){
					that.removeClass('disabled');
					that.css('background-color','rgba(255,137,4,0.7)');
				},2000)
				
				var msg = $("#msg").val();
				var id = $('#sender').val();
				var to_uid = $('#to_uid').val();
				if(msg.match(/^\s*$/)){
					$("#msg").val('');
					$("#msg").attr("placeholder","消息不能为空！");
				}else if(msg == ''){
					$("#msg").attr("placeholder","消息不能为空！");
				}else{
					$("#msg").attr("placeholder","你好...");
					var api_url = $('#api_url').val()+'/api/add_message';
					 $.post(api_url,{ to_uid:to_uid,content:msg,uid:id,action: 'add_message'},function(data)
					 {
						 data = eval('(' + data + ')');
						 if(data.status == 1){
							$('#msg').val('');
							
							var html = '';
							 var time1 = new Date()
							//输出时间
							// if(data.name != null){
								// html = '<h2 class="timename">'+format(data.name*1000)+'</h2>';
								html = '<h2 class="timename">'+format(time1*1000)+'</h2>';
							// }

							html  = html + '<div class="text-box text-box1 clear" data-mid="'+id+'"><img src="/html//Uploads/Headimgurl/2017-01-17/thumb_7669c796163e902237e2af223e78ee52.jpeg" /><p>'+msg+'</p></div>';
							// html  = html + '<div class="text-box text-box1 clear" data-mid="'+msg+'"><img src="/html/img/thumb_7669c796163e902237e2af223e78ee52.jpeg" /><p>'+msg+'</p></div>';
							$(".sms-wrap").append(html);
							
							
							//滚动条高度
				　			var scrollTop    = $(window).scrollTop();
// 							var scrollHeight = $(document).height();
// 　　						var windowHeight = $(window).height();
							var smg_h = $('.sms-box').height();
							smg_h = smg_h*2;
 							
// 							scrollTop = windowHeight-scrollHeight;
							// window.location.href="#enter";
							window.scrollTo(0,scrollTop+smg_h);
							 
						 }else{
						 	tusi(data.msg);
						 }
					 });
				}
			})
		
			//延迟执行
			var _timer = {};
			function delay_till_last(id, fn, wait) {
			    if (_timer[id]) {
			        window.clearTimeout(_timer[id]);
			        delete _timer[id];
			    }

			    return _timer[id] = window.setTimeout(function() {
			        fn();
			        delete _timer[id];
			    }, wait);
			}

			$(document).keydown(function(e){

			  delay_till_last('keydown',function(){
			  	// 回车键事件
			  	 if(e.which == 13) { 
				  // notice('点击发送按钮，发送消息！');
				  $("#dosubmit").click();
				}
			  },200)
			    
		    });

			$('.wrap').on('touchend',function(){
				$('.sms-box input').blur();
			})
			$('.sms-box input').focus(function(){
				$('.sms-box').css('position','absolute');
			})
			$('.sms-box input').blur(function(){
				$('.sms-box').css('position','fixed');
			})

			//ajax 10s 一次从服务器请求聊天数据
/*			setInterval(function(){
				var mid = $('.text-box:last-child').attr('data-mid');
				$.post("/MessageAjax/getMsg.html",{ objid:sender,mid:mid },function(data){
					if(data.status == 1){

						//添加前高度
						var h_h = parseInt($(".sms-wrap").css('height'));

						for(var i=0;i<data.msglist.length;i++){
							var html = '';
							if(data.msglist[i].name != null){
								html = '<h2 class="timename">'+format(data.msglist[i].name*1000)+'</h2>';
							}

							if(sender == data.msglist[i].sender){
								html = html + '<div class="text-box text-box2 clear" data-mid="'+data.msglist[i].id+'"><img src="/html//Uploads/Headimgurl/2016-09-13/thumb_78bc98ae59d1923841f2377768fa2a10.jpeg" /><p>'+data.msglist[i].msg+'</p></div>';
								
							}else{
								html = html + '<div class="text-box text-box1 clear" data-mid="'+data.msglist[i].id+'"><img src="/html//Uploads/Headimgurl/2017-01-17/thumb_7669c796163e902237e2af223e78ee52.jpeg" /><p>'+data.msglist[i].msg+'</p></div>'
								
							}
							$(".sms-wrap").append(html);
						}
						
						//滚动条高度
			　			var scrollTop    = $(window).scrollTop();
						var scrollHeight = $(document).height();
　　					var windowHeight = $(window).height();
						
						scrollTop = windowHeight-scrollHeight;
						window.location.href="#enter";
						//window.scrollTo(0,-scrollTop);
					}
				});
			},3000)*/
			
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
</script><div id="back_icon" style="display:none" ;=""></div>

<?php $this->load->view("footer");?>