<?php $this->load->view('header');?>
<link rel="stylesheet" href="/statics/css/search.css">
<link rel="stylesheet" href="/statics/css/example.css">
<body style="font-size: 12px;">
		<div class="wrap">
			<div class="container" id="container"></div>
				<div class="search-wrap">
				
					<div class="search_box clear">
						<div id="form1">
							<div class="input_box clear">
								<i class="weui-icon-search"></i>
								<input class="search_input" id="keyword" name="keyword" type="text" placeholder="search" value="">
								<i class="fa fa-times-circle cancel_btn" style="display:none"></i>
							</div>
							<label for="keyword" class="weui-search-bar__label" id="search_text" style="display:none;">
								<i class="weui-icon-search"></i>
								<span>search</span>
							</label>
							
						</div>
						<a class="clear_btn"  href="javascript:history.go(-1)" style="display:inline;">cancel</a>
					</div>
			<script>
				$(function(){
					document.onkeydown = function(e){ 
					    var ev = document.all ? window.event : e;
					    if(ev.keyCode==13&&$('#keyword').val()!='') {
					           // $('#FormId').submit();//处理事件
					           var val=$('#keyword').val();
					           $.ajax({
					           			url:'/api/search_anthor',
					           			// action:'search_event',

					           			method:'POST',
					           			data:{
					           				nickname:val,
					           				action:'search_event'         				
					           			},
					           			success:function(data){
					           					console.log(data)

					           			}
					           })

					     }
					}
					});  


			</script>


					<!--无搜索内容-->
						<ul class="title_list">
							<div class="control">
								<a id="activity">
									<li>
										<label for="activity">
										<i class="fa"></i>
										<p>Active</p>
										</label>
										<input type="checkbox" id="activity" name="t" value="1">
									</li>
								</a>
								<a id="find"> 
									<li>
										<label for="member">
										<i class="fa"></i>
										<p>Anchor</p>
										</label>
										<input type="checkbox" id="person" name="t" value="2">
									</li>
								</a>
								<a id="news">
									<li>
										<label for="news">
										<i class="fa"></i>
										<p>News</p>
										</label>
										<input type="checkbox" id="news" name="t" value="3">
									</li>
								</a>
							</div>
						</ul>
										
				</div>
			<input type="hidden" id="back_url" value="">
		</div>

<script>
$(document).ready(function(){
	$("#keyword").focus();
}); 
// $('.clear_btn').click(function(){
// 	// window.location.href=$('#back_url').val();
// 	history.go(-1)
// })
/*
$('.search_input').on('focus',function(){
	$(".weui-search-bar__label").hide();
	$(".").show();
})*/
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

<?php $this->load->view('footer');?>