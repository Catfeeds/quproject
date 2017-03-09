
<?php $this->load->view("header");?>
<link rel="stylesheet" type="text/css" href="/statics/css/register.css">


<body style="background: rgb(255, 255, 255); font-size: 12px;">
<div id="container" style="height: 619px;">
<div class="wrap">
	<div class="login">
		<div class="logo"></div>
		<form class="login-form" action="/user/login" method="post" name="form1" id="loginForm" >
		<div class="phone">
			<i class="phone_icon"></i>
			<input id="phone" type="text" placeholder="电话号码" value="" name="telephone">
			<i class="cancel_icon" id="phone_cancel"></i>
		</div>
		<div class="pwd">
			<i class="pwd_icon"></i>
			<input id="password" type="password" placeholder="密码" maxlength="16" minlength="6" value="" name="password">
			<i class="cancel_icon" id="password_cancel"></i>
		</div>

		<div class="control-group">
            <label class="control-label"></label>
            <div class="controls Validform_checktip text-warning"></div>
          </div>
		  <label class="checkbox" style="display:none;">
			<input type="checkbox" checked="checked"> Remember Me
		  </label>

		<div class="login_btn">
			<a>登录</a>
		</div>
		
		<div class="bottom_btn">
			<a href="/user/register">注册新用户</a>
			<span class="dotted">|</span>
			<a href="/user/forget_pass">忘记密码?</a>
		</div>
        <input type="hidden" id="api_url" value="<?php echo $this->api_url;?>"/>
        <input type="hidden" id="openid" value="<?php echo $_SESSION['wx_openid'];?>"/>
		</form>
	</div>
	</div>
	
	
<div class="ux-popmenu" style="position: fixed; background-color: rgba(0, 0, 0, 0.498039);">
	<div class="content show" style="bottom: 0px; position: fixed;">
		<section class="card-combine"> 
			 <a href="/main"><span>返回首页</span></a>
			 
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
$(function()
{
	//$("#phone").bind('input propertychange',function(){
	//	console.log(11);	
	//});
});
function checkMobile()
{
	var phone = $('#phone').val();	
	
	//检测手机号
	if( phone == '' )
	{		
		//alert('请填写手机号码');
		return false;
	}
	else if( !phone.match(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(170|147))+\d{8})$/) )
	{
		//alert('请填写正确格式的手机号码');
		return false;
	}
	else
	{
		return true;
	}
}


function checkPassword()
{	
	var password = $('#password').val();
	//检测密码
	if( password == '' )
	{		
		//alert('请填写密码');
		return false;
	}
	else if( password.length < 6 || password.length > 16 )
	{
		//alert('密码长度应在6~16位');
		return false;
	}
	else
	{
		return true;
	}		
}
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
 

<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>


	

<script type="text/javascript">

	// 浏览器下拉
	var win_h = $(window).height();
	var header_h = $('.header').height();
	$('#container').height(win_h-header_h);
 	var list = ['container'];
 	var preventOverScroll = new window.PreventOverScroll({
     	list: list
 	});

	$(function(){
		var _phoneCancel = $('#phone_cancel'),
			_passwordCancel = $('#password_cancel'),
			_phone = $('#phone'),
			_password = $('#password');
		_phoneCancel.click(function(){
			_phone.val('');
		})
		_passwordCancel.click(function(){
			_password.val('');
		})
	})
</script>
<script type="text/javascript">

	$('.login_btn').click(function(){
		var that = $(this);
		$(this).addClass('disabled').css('background-color','#ccc');
		setTimeout(function(){
			that.removeClass('disabled').css('background-color','#FF8904')
		},1500);
		//检测手机号格式
		var res_phone = false;
		var phone_res = false;
		res_phone = checkMobile();
		//检测密码
		var res_pwd = false;
		res_pwd = checkPassword();

		if( res_pwd == false )
		{
			alert('请填写6~16位长度的密码');
		}
		
		if( res_phone && res_pwd ) 
		{
			$('#loginForm').submit();
			
/*			//检测手机号是否已注册
			var telephone = $('#phone').val();
			var api_url = $('#api_url').val();
			var postdata = 'action=check_mobile&telephone='+telephone;
			$.ajax(
			{ 
				url: api_url+'/api/check_mobile', 
				data: postdata, 
				type :'POST',
				success: function( result )
				{			
					if( result == 1 )
					{
						if( res_pwd )
						{
							$('#loginform').submit();
						}												
					}
					else
					{
						alert('手机号尚未注册，请先注册');				
					}
				 }
			});*/	
		}
		else
		{
			alert('请输入正确的手机号');
		}
	
		
		//loginForm();
		//$("form[name='form1']").submit();
	})
		
	

	$(function(){
		var verifyimg = $(".verifyimg").attr("src");
		$(".reloadverify").click(function(){
			if( verifyimg.indexOf('?')>0){
				$(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
			}else{
				$(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
			}
		});
	});
</script>



<?php $this->load->view("footer");?>