<?php $this->load->view("header");?>
<style>
	.chahuaBanner{
		text-align: center;
		background: #fff;
		border-bottom: 1px solid #EBEAF0;
	}
	.ui_top10 {
    margin-top: 10px;
}
.chahuaBanner h3 {
    font-size: 15px;
    color: #000;
    line-height: 1.316;
    text-shadow: 0 0 2px #eee;
}
.chahuaBanner .banner_word {
    font-size: 24px;
}
.ui_pad15 {
    padding: 15px 0;
}
.activityInfo {
    color: #999;
    line-height: 1.417;
}
body{
	background: #F9F9F9;padding:0;margin:0;
}
.activityInfo {
    color: #999;
    line-height: 1.417;
}
i {
    display: inline-block;
    width: 6px;
    height: 6px;
    -webkit-transform: rotate(45deg);
    vertical-align: middle;
    margin-top: -1px;
    border-color: #999;
    margin-left: 4px;
    border-top: 1px solid #999;
    border-right: 1px solid #999;
}
.afterall{
	text-align: center;
}
.phone_input, .solidbtn {
    width: 89%;
    height: 44px;
    line-height: 44px;
    font-size: 15px;
    display: block;
}
.phone_input {
	margin:0 auto;
    border: 1px solid #e5e5e5;
    margin-top: 30px;
    -webkit-appearance: none;
    color: #999;
    border-radius: 4px;
    padding: 0 2px;

}

.greyBackground {
    background-color: #e5e5e5;
}


.solidbtn {
    background-color: #fa8919;
    border-radius: 4px;
    text-align: center;
    color: #fff;
    margin: 0 auto;
}
.ui_top15 {
    margin-top: 15px;
}



.moreShare_box .c2 {
    background: #ff8b03;
    border-radius: 4px;
}


.moreShare_box a {
    height: 43px;
    line-height: 43px;
    color: #fff;
    font-size: 15px;
}

.moreShare_box a, .share_box a {
    display: block;
    text-align: center;
    width: 89%;
    margin:0 auto;
}

a {
    text-decoration: none;
}
#shareInfo{
	 margin:0 auto;
    margin-bottom:12px;
    display: block;
    width: 89%;
    border-radius:8px;
	height:43px;
	line-height: 1;
	border:1px solid #ddd;
	outline: none;
	padding-left:8px;
	color:#999;
}
</style>
<body style="visibility: visible;">
<script type="text/javascript" src='/html/js/clipboard.min.js'></script>	
	<div id="template"><div id="indexBanner" class="chahuaBanner">
	<div>
		<img class="banner_img" id="bannerImg" style="height: 150px; visibility: visible;padding-top:100px" src="/statics/img/logo.png">
	</div>
	<div class="ui_top10">		
		<h3 id="reTitle">
			<span id="titleOne_view">Invite friends to register successfully</span>
		    <div class="banner_word" id="titleTwo_view">You will receive 10 points bonus</div>
		</h3>		
		<div class="ui_pad15">			
			<!-- <a href="activityRemark.html" class="activityInfo" id="activityInfo">
		    	奖励规则<i></i>
		    </a> -->
		</div>
	</div>
</div>
<div class="afterall">
	

<!-- <div class="input_box display_none" id="inputbox" style="display: none;">
	<input id="inputPhone" class="phone_input" type="number" placeholder="输入手机号">
	<input id="createLinkBtn" class="solidbtn ui_top15 greyBackground" value=''>	
</div> -->
<div id="outApp" class="display_none" style="display: block;">
	<div class="moreShare_box ui_top10"> 
	<input id="shareInfo" class="shareInfo v_hidden" value=''>
	<a id="shareBtn"  class="c2 shareBtnt" href="javascript:void(0)"   data-clipboard-target="#shareInfo">Copy link to share it with friends</a> 	
	<a id="wallet" href="" class="c3" style="display: none;">
		<span id="completeCount"></span>
		<i></i>	
	</a>	
</div>
</div>

</div>
</div>
<script type="text/javascript">
	var url=document.location.href; 
	var base_url=document.location.origin;
	var search_url=document.location.search
	var res_url=base_url+'/user/register'+search_url;
	$('#shareInfo').val(res_url)
var clipboard = new Clipboard('.shareBtnt');
clipboard.on('success', function(e) {
    
});

</script>
<div id="yhzc-loadding" class="mask-layer" style="display: none;"><div class="mask-layer-box">
<!-- <div class="mask-layer-box-circle"></div>正在加载...</div> -->
<?php $this->load->view("footer");?>