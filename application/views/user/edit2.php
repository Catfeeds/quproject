<?php $this->load->view('header');?>
	<!--<base target="_blank">-->
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	<link rel="stylesheet" href="/statics/css/cell.css">
	<link rel="stylesheet" href="/statics/css/example.css">
	<link rel="stylesheet" href="/statics/css/weui.css">
	<script src="/statics/js/iscroll-zoom.js">
		
	</script><script src="/statics/js/hammer.js">
		
	</script><script src="/statics/js/jquery.photoClip.js"></script>

	<script type="text/javascript" src='/statics/js/chinaUniversityList.js'></script>
	<script type="text/javascript" src='/statics/js/chinaUniversitychange2.js'></script>
	</head>
	
	






<!--裁剪头像-->


 
<!--裁剪头像-->
  

<body style="font-size: 24px; background-color: rgb(239, 239, 244);">
	<div class="wrap">
		<div class="container" id="container"></div>
		
		<script type="text/html" id="tpl_home">
			
			<div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">编辑资料</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>



			
			<div class="control">
				
				<a class="control_headimgurl" href="#/headimgurl">
					<div class="control_headimgurl_primary">
						<p>头像</p>
					</div>
					<div class="control_headimgurl_ft2" id="headimgsrc"><span style="float:left;height:1.5rem;line-height:1.5rem;color:#ccc;">请上传头像</span></div>
					<div class="control_headimgurl_ft" id="headimgsrc"><img src="<?php echo strstr($res['icon'],'http') ? $res['icon'] : $this->api_url.$res['icon'];?>"></div>
				</a>
				<!--  <a class="control_text" href="#/realname">
					<div class="control_text_primary">
						<p>学校</p>
					</div>
					<div class="control_text_ft" id="realnametxt"><?php echo $res['school'];?></div>
				</a> -->
				<a class="control_text" href="#/signature">
					<div class="control_text_primary">
						<p>性别</p>
					</div>
					<div class="control_text_ft" id="signaturetxt"><?php echo $res['sex']==1?'男':'女';?></div><i class="text_i"></i>
				</a> 


				<a class="control_text" href="#/grade">
					<div class="control_text_primary">
						<p>年级</p>
					</div>
					<div class="control_text_ft" id="aagrade"><?php echo $res['grade'];?></div>
				</a> 
			</div>

		</script>

		<!--修改头像-->
		<script type="text/html" id="tpl_headimgurl">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>返回</span></a>
			<p class="header_title">上传头像</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>
		
		<div class="headimgurl" style="height: 100%;">
			<!--<label for="headimgurl"><img src="/Uploads/Headimgurl/2017-01-18/thumb_56e6824705305c24da910bcdc6dd1905.jpeg" width="100%" id="chooseImage"></label>
			<input type="hidden" style="display:none;" name="headimgurl" id="headimgurl" value="/Uploads/Headimgurl/2017-01-18/thumb_56e6824705305c24da910bcdc6dd1905.jpeg">-->
			
			<div class="head_pic" style="display:block">
				<div>
					<img id="head_pic_img" src="<?php echo strstr($res['icon'],'http') ? $res['icon'] : $this->api_url.$res['icon'];?>">
				</div>
				<label id="upload_btn" for="headimgurl"><i></i><span>上传头像</span></label>
				<input type="file" id="headimgurl" onchange="change()">
				<p id="pic_back"><i></i><span>返回</span></p>
			</div>

			<!--加载资源-->
			<div class="pic_box" style="display:none;">
				<div class="resource_lazy hide"></div>
				<div class="pic_edit">
					<div id="clipArea"></div>
					<div class="btn_box">
						<button id="upload2">取消</button>
				    	<button id="clipBtn">确认</button>
					</div>
				</div>
				<img src="" fileName="" id="hit" style="display:none;z-index: 9">
				<div id="cover"></div>
			</div>
			
			

			
		</div>
		</script>
		<!--修改头像-->

		<!--修改学校-->
		<script type="text/html" id="tpl_realname">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>返回</span></a>
			<p class="header_title">学校名称</p>
			<div class="menu"><span class="save-info">保存</span></div>
		</div>
		<!-- <div class="headerfull"></div> -->

		<div class="control_text first">
			<input type="text" placeholder="请输入学校名称" class="weui_text" name="realname" id="realname" old-val="<?php echo $res['school'];?>" value="<?php echo $res['school'];?>">
			<span class="weui_text_clear"><i class="fa fa-times-circle-o"></i></span>
		</div>
		</script> 
		<!--修改姓名-->

		<!-- 个性签名 -->
		<script type="text/html" id="tpl_signature">
		
		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>返回</span></a>
			<p class="header_title">性别</p>
			<div class="menu"><span class="save-info">保存</span></div>
		</div>
		<div class="headerfull" ></div>

		<!-- <textarea id="signature" placeholder="编辑我的性别"><?php echo $res['sex']==1?'男':'女';?></textarea>  -->
			<label><input class='signature'  type="radio" name="sex" value='1'>男</label>
			<label><input class='signature' type="radio" name="sex" value='2'>女</label>


		</script>
		<!-- 年级 -->
		<script type="text/html" id="tpl_grade">
		
		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>返回</span></a>
			<p class="header_title">年级</p>
			<div class="menu"><span class="save-info">保存</span></div>
		</div>
		<div class="headerfull" ></div>

			<select name="grade" id="changeGrade"  value='本科一年级'>
                        	<option value='本科一年级' checked>本科一年级</option>
                        	<option value='本科二年级'>本科二年级</option>
                        	<option value='本科三年级'>本科三年级</option>
                        	<option value='本科三年级'>本科四年级</option>
                        	<option value='研究生一年级'>研究生一年级</option>
                        	<option value='研究生二年级'>研究生二年级</option>
                        	<option value='研究生三年级'>研究生三年级</option>
                        	<option value='博士生'>博士生</option>
			</select>


		</script>
		<input type="hidden" id="header_title" value="编辑资料">
		<input type="hidden" id="hheadimgurl" value="<?php echo strstr($res['icon'],'http') ? $res['icon'] : $this->api_url.$res['icon'];?>">
		<input type="hidden" id="hrealname" value="<?php echo $res['school'];?>">
		<input type="hidden" id="hsignature" value="<?php echo $res['sex']==1?'男':'女';?>">
		<input type="hidden" id="topview" value="">
		<input type="hidden" id="user_id" value="<?php echo $_SESSION['uid'];?>">
		<input type="hidden" id="hgrade" value="<?php echo $res['grade'];?>">
	</div>

	<!-- 底部================================================== -->
	<div class="bottom">
		
		<a class="activity off" href="/"><i></i>活动</a>
		<!--<a class="special off" href="/Special/index.html"><i></i>专题</a>-->
		<a class="release off" href="/main/post"><i style="background-size: auto 0.52rem;"></i>发布</a>
		<a class="list off" href="/main/student"><i></i>主播</a>
		<!--<a class="news off" href="/Message/center.html"><i></i>消息</a>-->
		<a class="mine on" href="/user"><i></i><span class="on"></span>我的</a>
	</div>
	<style type="text/css">
		.signature{
				width:.5rem;
				height: .5rem;
				margin-left:2rem;
				position: relative;
				top:.14rem;
		}

	</style>
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
</script>





<script src="/statics/js/zepto.min.js"></script>
<script src="/statics/js/router.min.js"></script> 
<script src="/statics/js/examplebus.js"></script>
<?php $this->load->view('footer');?>