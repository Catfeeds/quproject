<?php $this->load->view("header");?>
	

<body style="font-size: 24px;"><div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">活动管理</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>

<link rel="stylesheet" type="text/css" href="/html/css/hdgl.css">
<style>
	.creater{    margin-top: 0.01rem !important;
	    margin-left: 0.3rem !important;;
	    display: block;
	    width: 2rem;
	    height: 2rem;
	    border-radius: 50%;
	    background-image: url(/html/img/appicon200.png);
	    background-repeat: no-repeat;
	    background-size: cover;
	    background-position: center;}
	.alert-box {
	    position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background-color: rgba(0,0,0,0.5);
	    z-index: 99;
	} 
	.box {
	    position: fixed;
	    left: 10%;
	    top: 20%;
	    /* margin: 30% 0 0 10%; */
	    width: 80%;
	    border-radius: 20px;
	    background-color: #fff;
	    z-index: 99;
	}
	.box .close-icon {
	    position: absolute;
	    right: 0.2rem;
	    top: 0.2rem;
	    display: inline-block;
	    width: 0.6rem;
	    height: 0.6rem;
	    background-image: url(/html/img/x.png);
	    background-repeat: no-repeat;
	    background-size: 0.6rem auto;
	}
	.box img {
	    padding: 0.4rem 0;
	    margin-left: 50%;
	    transform: translate(-50%);
	    display: block;
	    width: 2.8125rem;
	    height: 2.8125rem;
	    border-radius: 50%;
	}
	.box p:first-of-type {
	    color: #333;
	    font-size: 0.4rem;
	    text-align: center;
	}
	.box span {
	    margin-left: 50%;
	    margin-top: 0.2rem;
	    transform: translate(-50%);
	    display: inline-block;
	    width: 3.5rem;
	    height: 0.625rem;
	    text-align: center;
	}
	.box textarea {
	    margin-left: 10%;
	    margin-top: 0.2rem;
	    padding: 0.2rem 0 0 0.2rem;
	    width: 80%;
	    height: 2.5rem;
	    border: none;
	    border-radius: 8px;
	    background-color: #ddd;
	    font-size: 0.35rem;
	    color: #a1a0a1;
	}
	.box a {
	    margin: 0.2rem 0 0.4rem 0;
	    padding: 4px 40px;
	    margin-left: 50%;
	    display: inline-block;
	    transform: translate(-50%);
	    font-size: 0.35rem;
	    color: #8b8b8c;
	    border-radius: 4px;
	    border: 1px #c0c0c1 solid;
	}
</style>
	
<div class="bus-manage">
	
	<dl class="control">
		<dt><span>活动信息</span><a class="more" href="/main/info_detail/<?php echo $data['id'];?>">查看活动&gt;&gt;</a></dt>
		<dd class="control_flr">
			<a href="/main/info_detail/<?php echo $data['id'];?>"><div class="il">
				<div class="l" style="background-image:url('<?php echo strstr($data['image'],'http') ? $data['image'] : $this->api_url.$data['image'];?>')"></div>
				<div class="r">
					<h2><?php echo $data['en_title'] ? $data['en_title'] : $data['title'];?></h2>
					<p>募集人数：<?php echo $data['accept_count'].'/'.$data['need_num'];?></p>
				</div>
			</div></a>
			<div class="ir">
            	<?php $creater = get_userinfo_by_uid($data['uid']);?>
            	
               <!-- <img src=""/>-->
                <span class="creater" style="background-image:url(<?php echo $creater['icon'];?>)"></span>
				<!--<a class="btn-orange" href="release.html" style="padding: 0.2rem 0.4rem;">修改</a>-->
							</div>
		</dd>
		
	</dl>
	
	<dl class="control">
		<dt><span>报名人员（<?php echo $data['accept_count'] ? $data['accept_count'] : 0 ;?>）</span><a class="more" href="/main/accept_list/<?php echo $data['id'];?>">查看全部&gt;&gt;</a></dt>
		<dd class="control_hli">
			<ul>
            	<?php foreach( $data['accept_user'] as $value ):?>
                <?php $user = get_userinfo_by_uid($value['uid']);?>            
				<li class="clear">
					<a href="/main/student_detail/<?php echo $value['uid'];?>"><span class="pic" style="background-image:url(<?php echo $user['icon'];?>)"></span>
					<span class="name"><?php echo $user['nickname'];?></span></a>
					<?php if($data['end_time']<=time()){?>
					<span class="call">
					
						<span class="false evaluate-btn" objid="<?php echo $creater['id'];?>" pid='<?php echo $value['uid'];?>' picon="<?php echo $user['icon'];?>" pname="<?php echo $user['nickname'];?>" style="background: #FF8904;color:#fff;">评价</span>
										
					</span>
					<?php }?>
				</li>	
                <?php endforeach;?>
             </ul>
					</dd>
	</dl>
	<?php /***
	<dl class="control">
		<dt><span>报名列表（<?php echo $data['join_count'] ? $data['join_count'] : 0 ;?>）</span><a class="more" href="/main/join_list/<?php echo $data['id'];?>">查看全部&gt;&gt;</a></dt>
		<dd class="control_hli">
			<ul>
            	<?php foreach( $data['join_user'] as $value ):?>
                <?php $user = get_userinfo_by_uid($value['uid']);?>
				<li class="clear">
					<a href="/main/student_detail/<?php echo $value['uid'];?>"><span class="pic" style="background-image:url(<?php echo $user['icon'];?>)"></span>
					<span class="name"><?php echo $user['nickname'];?></span></a>
					<span class="call">
					
						<span class="false evaluate-btn" objid="<?php echo $creater['id'];?>" pid='<?php echo $value['uid'];?>' picon="<?php echo $user['icon'];?>" pname="<?php echo $user['nickname'];?>" style="background: #FF8904;color:#fff;">评价</span>
										
					</span>
					
				</li>		
                <?php endforeach;?>
            </ul>
					</dd>
	</dl>
	<?php ***/?>
	<input type="hidden" id="user_id" value="<?php echo $_SESSION['uid'];?>"/>
    <input type="hidden" id="info_id" value="<?php echo $data['id'];?>"/>
	<div class="clear" style="padding-bottom:1rem;"></div>
	

	<div class="alert-box" style="display: none;"></div>
				<div class="box" style="display: none;">
					<i class="close-icon"></i>
					<img id="headimgurl" src="" alt="">
					<p id="realname"></p>
					<!-- <p id="signature">null</p> -->
					<span id="fraction" class="star">
						<i class="on" id="star1"></i>
						<i class="on" id="star2"></i>
						<i class="on" id="star3"></i>
						<i class="on" id="star4"></i>
						<i class="on" id="star5"></i>
					</span>
					<textarea id="text-box" name="" placeholder="请您对参加的活动评价！"></textarea>
					<a class="sub-btn">提交</a>
				</div>

</div>


		<script type="text/javascript">
				var pid;
				var objid;
				var info_id;
				$('.evaluate-btn').click(function(){
					objid = $(this).attr('objid');
					pid = $(this).attr('pid');
					info_id=$(this).attr('infoid')

					$('#headimgurl').attr('src',$(this).attr('picon'))
					$('#realname').html($(this).attr('pname'))
					// console.log(pid)
					$(this).parents('li').addClass('pid'+pid);
					$('.box').css('top','20%');
					$('.alert-box,.box').show();
				})


			$('.cancel_activity').click(function(){
				
				make_sure('确认要取消此次活动吗');

				$('#bottom_tip .true').click(function(){
					
					var id = $('#user_id').val();
					var api_url = $('#api_url').val()+'/api/close_event';
					var info_id = $('#info_id').val();
					$.ajax({
						url: api_url, 
						data: {action:'close_event',uid:id,info_id:info_id}, 
						type :'POST',
						success: function( data )
						{		
							data = eval('(' + data + ')');	
							if(data.status){
								//成功	
								alert(data.msg);
								location.reload();													
							}else{
								alert(data.msg);
								location.reload();									
							}
						 }						
					});						
					
/*					$.post("/BusAjax/editActivityStatus/pid/496/status/0.html",{ pid:"496"},function(data){
						if(data.status == 1){
							window.location.href='/Sms/show.html?msg=活动已取消&url=/User/index.html'
						}else{
							alert(data.msg);
						}
					})*/
				})

				
			})

			$('#fraction i').click(function(){
					var num = $(this).index();
					$(this).parents('#fraction').find('i').removeClass('on');
					for(var i=0;i<=num;i++){
						$(this).parents('#fraction').find('i').eq(i).addClass('on');
					}
				})
			$('.sub-btn').click(function(){
					if($('.control_hli li').hasClass('pid'+pid)){
						var comment = $('#text-box').val();
						$("#text-box").val('');
						if(comment.length<1){
							notice('评论不能为空！');return false;
						}
						var fraction = $('#fraction').children('i.on').length;
						var that = $(this);
						var api_url = $('#api_url').val()+'/api/add_comment';
						$.post(api_url,{uid:objid,zhubo_id:pid,content:comment,star_num:fraction,info_id:info_id },function(res){
								// console.log(res)
							if(res!= 1){
								notice('评价提交失败，请重试');
								$('.alert-box,.box').show();
							}
							if(res== 1){
								tusi('评价提交成功！');
								$('.alert-box,.box').hide();
								$('.ready-list .pid'+pid).remove();
							}

							$('.box').css('top','10%');
							
						})
					}
				})

			// $('.sure_activity').click(function(){

			// 	make_sure('确认活动已完成');

			// 	$('#bottom_tip .true').click(function(){
			// 		$.post("/BusAjax/editActivityStatus/pid/496/status/3.html",{ pid:"496"},function(data){
			// 			if(data.status == 1){
			// 				tusi(data.msg);
			// 				window.location.href='/Bus/comment/pid/496.html';
							
			// 			}else{
			// 				notice(data.msg);
			// 			}
			// 		})
			// 	})
				
			// })

			$('.close-icon,.alert-box').click(function(){
					$('.alert-box,.box').hide();
				})
				$('#text-box').focus(function(){
					$('.box').css('top','-20%');
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
</script><div id="back_icon" style="display:none" ;=""></div>
 
  <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>



<?php $this->load->view("footer");?>