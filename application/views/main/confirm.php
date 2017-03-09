<html data-dpr="1" style="font-size: 54px;"><head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
	<meta content="no-cache" http-equiv="pragma">
	<meta content="0" http-equiv="expires">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta content="telephone=no, address=no" name="format-detection">
	<meta name="apple-mobile-web-app-capable" content="yes"> 
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="x5-fullscreen" content="true">
	<meta name="full-screen" content="yes">
    <title><?php echo $title ? $title.'-' : '';?><?php echo $this->config->item('site_name');?></title>
    
    <meta name="keywords" content="<?php echo $this->config->item('keywords');?>">
    <meta name="description" content="<?php echo $this->config->item('description');?>">
	 
	<script type="text/javascript" src="/statics/js/jquery-2.0.3.min.js"></script>
	 <script>
        document.querySelector('html').style.fontSize = document.documentElement.clientWidth / 320 * 50 + 'px';
        window.location.href.indexOf("#") >= 0?window.location.href="/main/pay/":'';

    </script>
    <style>
    	.border-bg{
		   margin:0 .15rem;
		   border-radius: .1rem;
		   border:.01rem solid #ccc;
		   background: #fff;
		   height: 1.04rem;
		   line-height:1.04rem;
		   padding:0 .15rem;
		   margin-top:.3rem;
		   font-weight: bold;
		   margin-bottom:.3rem;
		   font-size:.32rem;
		   font-weight: bold;
		}	
	.money{
	    float:right;
	    margin-right:.15rem;
	    color: #F62621; 
	}
	
	.choose-way{
		    color:#999;
		    font-size:.26rem;
		    height:.28rem;
		    line-height:.28rem;
		    padding-left:.3rem; 
		    font-weight: bold;
		    color:#333;
		}

		.confirm-pay{
    background: #42E38C;
    color:#fff;
    text-align: center;
    border:none;
}
.choose-pay{
    float:right;
    margin-right:.15rem;
    height:.36rem;
    position: relative;
    top:.3rem;
  }
  .pay-way{
    background: #fff url('/statics/img/weixin-pay.png') no-repeat .15rem center;
    background-size:.53rem .48rem;
    padding-left:.88rem;
    
}
.shade{
    position: fixed;
    top:0;
    right:0;
    bottom:0;
    left:0;
    background:rgba(151,151,151,.5);
    display: none;
}
.shade-container{
    width:6rem;
    height:7.2rem;
    background: #fff;
    position: absolute;
    top:50%;
    left:50%;
    margin-left:-3rem;
    margin-top:-3.6rem;
    border-radius:.1rem;
}
.success-p{
    width:1.5rem;
    height:1.5rem;
    text-align: center;
    margin:.4rem auto;
}
.success-p img{
     width:1.5rem;
    height:1.5rem;
}
.success-title{
    text-align: center;
    color: #010101;
    font-size:.48rem;
    font-weight: bold;
    margin-bottom:.4rem;
}
.success-des{
    width:5.2rem;
    text-align: center;
    color:#666666;
    font-size:.24rem;
    line-height: .36rem;
 
    margin:0 auto;
       margin-bottom:.3rem;
}
.success-button{
    width: 5.25rem;
    height: .8rem;
    line-height:.8rem;
    text-align: center;
    color: #666666;
    font-size:.3rem;
    border:.01rem solid #ccc;
    background: #EEEEEE;
    border-radius: .1rem;
    margin:0 auto;
}
.adjustimg{
    background: #42E38C;
    color:#fff;
    border:none;
    margin-bottom:.3rem;
}

    </style>
	</head>
	
	<body>
		<div class='paymoney border-bg'>
		    支付金额  
		    <div class='money'>¥<?php echo number_format($payinfo['money'],2);?></div>
		</div>		
		<div class='choose-way'>支付方式</div>

		<div class='pay-way border-bg'>
		微信支付
		<img src="/statics/img/choose-pay.png" class='choose-pay'>
		</div>

		<div class='border-bg confirm-pay active' onClick="callpay()" >
		确认支付
		</div>

		
		


<div class='shade'>
    <div class='shade-container'>
        <div class='success-p'><img src="/statics/img/success-p.png"></div>
        <div class='success-title'>支付成功</div>
        <div class='success-des'>您已付款成功，现在可以选择</div>

        <div class='success-button adjustimg' onClick="location.href='/main'">返回首页</div>
        <div class='success-button' onClick="location.href='/user'">返回个人中心</div>

    </div>
</div>

<div class='shade' id="pay_success">
    <div class='shade-container'>
        <div class='success-p'><img src="/statics/img/success-p.png"></div>
        <div class='success-title'>支付成功</div>
        <div class='success-des'>您已付款成功，现在可以选择</div>

        <div class='success-button adjustimg' onClick="location.href='/main'">返回首页</div>
        <div class='success-button' onClick="location.href='/user'">返回个人中心</div>

    </div>
</div>

<div class='shade' id="pay_fail">
    <div class='shade-container'>
        <div class='success-p'><img src="/statics/img/fail-p.png"></div>
        <div class='success-title'>支付失败，请重试</div>
        <div class='success-des'>付款失败，现在可以选择</div>

        <div class='success-button adjustimg' onClick="location.href='/main'">返回首页</div>
        <div class='success-button' onClick="location.href='/main/pay/<?php echo $id.'/'.$pay_id;?>'">重新支付</div>

    </div>
</div>
<?php // var_dump($jsApiParameters);exit;?>
<script>
/*$('.confirm-pay').click(function(){
	
})*/

//调用微信JS api 支付
function jsApiCall()
{
	WeixinJSBridge.invoke(
		'getBrandWCPayRequest',
		<?php echo $jsApiParameters; ?>,
		function(res)
		{
			
		   if(res.err_msg == "get_brand_wcpay_request:ok" ) 
		   {
			   $('#pay_success').show(200);
		   }   
		   else
		   {
			   //$('#pay_fail').show(200);
		   }

		}
	);
	//$('#payForm').submit();
}

function callpay()
{

	if (typeof WeixinJSBridge == "undefined"){
		if( document.addEventListener ){
			document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		}else if (document.attachEvent){
			document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
			document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		}
	}else{
		jsApiCall();
	}
}
//callpay();

</script>


	</body>
	</html>