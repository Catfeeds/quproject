<?php $this->load->view("header");?>
	<link rel="stylesheet" href="/statics/css/register.css">
	
	




	<body style="font-size: 24px;">
		<div id="container" class="prevent_over_scroll_container" style="height: 667px;">
		<div class="wrap">

			<form action="" method="post" id="form" name="form">
			<div class="reg">
				<div class="top clear">
					<a href="javascript:history.go(-1)"><span class="il prev">Back </span></a>
					找回密码
					
				</div>

				<div class="control">
					 <div class="input-box clear first">
						<span class="title">电话</span>
						<input type="text" id="mobile" name="mobile" datatype="*1-16" id="mobile" value="" placeholder="请填写电话号码">
					</div>
					<div class="input-box clear">
						<span class="title">验证码</span>
						<input type="text" name="checkverify" id="checkverify" style="width:5rem;" value="" placeholder="请输入获取到的验证码">
						<a id="sendverify">获取验证码</a>
						<a id="off"><span id="num">59</span>秒后重试</a>
					</div>
					<div class="input-box clear">
						<span class="title">密码</span>
						<input type="password" placeholder="至少6个字符" name="password" id="pwd1">
					</div>
					<div class="input-box clear">
						<span class="title">确认密码</span>
						<input type="password" placeholder="请确认密码" name="repassword" id="repwd">
					</div>
					<div class="controls top-line Validform_checktip text-warning"></div>
					<div class="sub-btn">
						 <a class="form-get" target-form="dosubmit">提交</a>
						 <button type="button" class="dosubmit" style="display:none"></button>
					</div>
				</div>

			<!-- 	<p style="padding:0.4rem;">*收不到短信，请联系客服<a href="tel:400-992-0220" style="color:#FF8904;padding:0 0.2rem;">400-992-0220</a></p>
 -->
			</div>
			</form>

		</div>
		</div>

		<script type="text/javascript">

			var win_h = $(window).height();
			var header_h = $('.header').height();
			$('#container').height(win_h-header_h);
		 	var list = ['container'];
		 	var preventOverScroll = new window.PreventOverScroll({
		     	list: list
		 	});


			$(function(){
				$('.top i').click(function(){
					history.go(-1);
				})
			})
		
		</script>

		<script>
		$("#sendverify").click(function(){
			var phone = $("#mobile").val();
			var phone_cookie = getCookie(phone)
			var api_url = $('#api_url').val()+'/api/send_mobile_code';
			
			if(phone.length != 11){
				alert("请填写11位电话号码!");
			}else if(!checkMobile(phone)){
				alert("请检查电话号码是否正确!");
			}else if(phone_cookie == 1){
				//60秒后才能再次发送
				alert("信息发送太频繁，请稍后再试!");
			}else{
				
				verifytime.init();
				
				//59S后再次获取
				$.post(api_url,{ telephone:phone,action:'send_mobile_code' },function(res){
					setCookie(phone,1,60);
					alert(res);
				})
			}
		})
		var verifytime = {
			init:function(){
				setTimeout("verifytime.reset()",1000);
				$("#sendverify").hide();
				$('#off').show();
				$('#num').text(59);
			},
			reset:function(){
				var num = parseInt($('#num').text());
				num--;
				if(num == 0){
					$("#sendverify").show();
					$('#off').hide();
				}else{
					$('#num').text(num);
					setTimeout("verifytime.reset()",1000);
				}
			}
		}

		$("form").submit(function(){
			
			var phone = $("#mobile").val();
			
			if(phone.length != 11){
				alert("请填写11位电话号码！");
				return false;
			}else if(!checkMobile(phone)){
				alert("请检查电话号码是否正确！");
				return false;
			}

    		var self = $(this);
			//调用修改密码接口
			var telephone = $('#mobile').val();
			var code = $('#checkverify').val();
			var pwd = $('#pwd1').val();
			var repwd =  $('#repwd').val();
			var api_url = $('#api_url').val()+'/api/forget_password';
			$.post(api_url,{ telephone:telephone,action:'forget_password',code:code,password:pwd,repassword:repwd },			
			function(data)
			{
				data = eval('(' + data + ')');
				if( data.status == 1 )
				{
					alert(data.msg);
					window.location.href = '/user/login';
				}
				else
				{
					alert(data.msg);
    				//刷新验证码
    				$(".reloadverify").click();					
				}
			})			
    		//$.post(self.attr("action"), self.serialize(), success, "json");
    		//return false;

/*    		function success(data){
    			if(data.status){
    				window.location.href = '/Sms/show.html?msg='+data.msg+'&url=/User/login.html';
    			} else {
    				self.find(".Validform_checktip").text(data.msg);
    				//刷新验证码
    				//$(".reloadverify").click();
    			}
    		}*/
    	});
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
</script>
<div id="back_icon" style="display:none" ;=""></div>




<?php $this->load->view("footer");?>