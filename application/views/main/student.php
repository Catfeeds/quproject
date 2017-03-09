<?php $this->load->view('header');?>
<link rel="stylesheet" href="/statics/css/zhubosort.css">
<style type="text/css">
		#test{
			position: absolute;
    		width: 80%;
    		margin-left:.2rem;
		}
	#keyword{
		width: 100%;
	}
	.wrap .zhubo-list #list.pic_sort ul {
    margin-top: 1.2rem;
    background-color: #f0f0f0;
    overflow: hidden;
}
</style>
<body style="background-color: rgb(240, 240, 240); font-size: 12px;">
	<div class="sort_top header">
		<a class="goback" href="javascript:history.go(-1)"><p></p></a>
		  <form id="test">
        <input type="text" id="keyword" value="" placeholder="Search" onClick="">
    </form>
		<i class="list_type pic"></i>
	</div>
	<script>
		$('#test').submit(function(){
    
    return false;
})
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
					           				var data=JSON.parse(data);
					           				var res=data.data;
					           				if(res){
					           				if(res.length>0){
			var html = '<ul>';	
			for(var i = 0;i<res.length;i++){
				html +='<li><a class="clear" href="/main/student_detail/'+res[i].id+'">';
				if($('#list').attr('class')=='sort_lists'){
					html +=' <img src="'+res[i].icon+'" />';
				}else if($('#list').attr('class')=='pic_sort'){
					html +=' <img src="'+res[i].icon+'" />';
				}
				var girlOrBoy=res[i].sex;
				girlOrBoy=girlOrBoy==2?'girl':'boy';
				var nowDate=new Date();
				var age=res[i].birthday;
				var userage=nowDate.getFullYear()-age.slice(0,4);

				var tags=JSON.parse(res[i].tags);
				var htmltags='';
				for(var k in tags){
					var idx=tags[k]-1;
					console.log(idx)
					htmltags+='<i>'+tags_name[idx]+'</i>'

				}
				var fans_num=res[i].fans_num?res[i].fans_num:0;
				html +=' <p class="tit clear"><span class="name">'+res[i].nickname+'</span><i class="sex '+girlOrBoy+'"></i></p>';
				html +=' <p class="tit2 clear"><span>'+userage+'岁&nbsp;&nbsp;&nbsp;</span><span>粉丝:'+fans_num+'</span></p>';
				html +=' <div class="list_tips">'+htmltags+'</div>';
				html +=' <div class="collect">';
				html +='  <i class="on"></i>';
				html +='  <p>Follow</p>';
				html +=' </div>';
				html +='</a></li>';
			}
			html +='</ul>';
			if(res.length > 9){
			 	html +='<h2 class="getmore on" data-page="1">Load more>></h2>';
				html +='<h2 class="getmore off"><i class="fa fa-spinner fa-pulse fa-fw" style="padding:0;"></i>loading</h2>';
			 }
			// $('.getmore.on').attr('data-page',data.page);
			setTimeout(function(){
				$('#list').html(html);
			},300);
			
		}}else{
			$('#list').html('<ul><li style="height:1rem;line-height:1rem;text-align:center;">没有搜索到相关内容</li></ul>');
		}

					           			}


					           })

					     }
					}
					});  


			</script>
	<div class="wrap">
		<div class="zhubo-list">

			<div class="sort"  style="display: none;">

				<ul class="sort_nav clear">
					<li class="platform" data-attr="0"><span>大洲</span><i></i></li>
					<li class="fans" data-attr="0"><span>粉丝</span><i></i></li>
					<li class="city" data-attr="0"><span>城市</span><i></i></li>
					<li class="tips" data-attr="0"><span>HSK 等级</span><i></i></li>
				</ul>
				<div class="list_box">
					<ul class="platform_sort sort_list clear" style="height: 8rem;overflow-y: auto;">
												<li data-sort="0" id="pt0">全部<i class="fa fa-check"></i></li>
												<li data-sort="1" id="pt1">美洲<i class="fa fa-check"></i></li>
												<li data-sort="2" id="pt2">亚洲 <i class="fa fa-check"></i></li>
												<li data-sort="3" id="pt3">大洋洲 <i class="fa fa-check"></i></li>
												<li data-sort="4" id="pt4">非洲 <i class="fa fa-check"></i></li>
												<li data-sort="5" id="pt5">欧洲 <i class="fa fa-check"></i></li>
													
						<div class="btn_box" style="position: fixed;top: 9rem;">
							<div class="btn_l">重置</div>
							<div class="btn_r">确定</div>
						</div>
						
					</ul>
					<ul class="fans_sort sort_list clear">
						<li data-sort="0" id="fs0"><span>不限制</span> <i class="fa fa-check"></i></li>
						<li data-sort="1" id="fs1"><span>5千以下</span> <i class="fa fa-check"></i></li>
						<li data-sort="2" id="fs2"><span>5K-1万</span> <i class="fa fa-check"></i></li>
						<li data-sort="3" id="fs3"><span>1-2万</span> <i class="fa fa-check"></i></li>
						<li data-sort="4" id="fs4"><span>2-5万</span> <i class="fa fa-check"></i></li>
						<li data-sort="5" id="fs5"><span>5-10万</span> <i class="fa fa-check"></i></li>
						<li data-sort="6" id="fs6"><span>10-20万</span> <i class="fa fa-check"></i></li>
						<li data-sort="7" id="fs7"><span>20-50万</span> <i class="fa fa-check"></i></li>
						<li data-sort="8" id="fs8"><span>50万以上</span> <i class="fa fa-check"></i></li>
					</ul>

					<div class="city_sort sort_list clear">
						<div class="city_box">
						<div id="city">
							<input type="radio" name="city" id="city1" value="0">
							<label data-sort="0" for="city1">
								<p>不限城市</p>
							</label>
							<input type="radio" name="city" id="city2" value="52">
							<label data-sort="52" for="city2">
								<p>北京</p>
							</label>
							<input type="radio" name="city" id="city3" value="343">
							<label data-sort="343" for="city3">
								<p>天津</p>
							</label>
							<input type="radio" name="city" id="city4" value="10">
							<label data-sort="10" for="city4">
								<p>河北省</p>
							</label>
							<input type="radio" name="city" id="city5" value="23">
							<label data-sort="23" for="city5">
								<p>山西省</p>
							</label>
							<input type="radio" name="city" id="city6" value="19">
							<label data-sort="19" for="city6">
								<p>内蒙古自治区</p>
							</label>
							<input type="radio" name="city" id="city7" value="18">
							<label data-sort="18" for="city7">
								<p>辽宁省</p>
							</label>
							<input type="radio" name="city" id="city8" value="15">
							<label data-sort="15" for="city8">
								<p>吉林省</p>
							</label>
							<input type="radio" name="city" id="city9" value="12">
							<label data-sort="12" for="city9">
								<p>黑龙江</p>
							</label>
							<input type="radio" name="city" id="city10" value="321">
							<label data-sort="321" for="city10">
								<p>上海</p>
							</label>
							<input type="radio" name="city" id="city11" value="16">
							<label data-sort="16" for="city11">
								<p>江苏省</p>
							</label>
							<input type="radio" name="city" id="city12" value="31">
							<label data-sort="31" for="city12">
								<p>浙江省</p>
							</label>
							<input type="radio" name="city" id="city13" value="3">
							<label data-sort="3" for="city13">
								<p>安徽省</p>
							</label>
							<input type="radio" name="city" id="city14" value="4">
							<label data-sort="4" for="city14">
								<p>福建省</p>
							</label>
							<input type="radio" name="city" id="city15" value="17">
							<label data-sort="17" for="city15">
								<p>江西省</p>
							</label>
							<input type="radio" name="city" id="city16" value="22">
							<label data-sort="22" for="city16">
								<p>山东省</p>
							</label>
							<input type="radio" name="city" id="city17" value="11">
							<label data-sort="11" for="city17">
								<p>河南省</p>
							</label>
							<input type="radio" name="city" id="city18" value="13">
							<label data-sort="13" for="city18">
								<p>湖北省</p>
							</label>
							<input type="radio" name="city" id="city19" value="14">
							<label data-sort="14" for="city19">
								<p>湖南省</p>
							</label>
							<input type="radio" name="city" id="city20" value="6">
							<label data-sort="6" for="city20">
								<p>广东省</p>
							</label>
							<input type="radio" name="city" id="city21" value="7">
							<label data-sort="7" for="city21">
								<p>广西壮族自治区</p>
							</label>
							<input type="radio" name="city" id="city22" value="9">
							<label data-sort="9" for="city22">
								<p>海南省</p>
							</label>
							<input type="radio" name="city" id="city23" value="394">
							<label data-sort="394" for="city23">
								<p>重庆</p>
							</label>
							<input type="radio" name="city" id="city24" value="26">
							<label data-sort="26" for="city24">
								<p>四川省</p>
							</label>
							<input type="radio" name="city" id="city25" value="8">
							<label data-sort="8" for="city25">
								<p>贵州省</p>
							</label>
							<input type="radio" name="city" id="city26" value="30">
							<label data-sort="30" for="city26">
								<p>云南省</p>
							</label>
							<input type="radio" name="city" id="city27" value="28">
							<label data-sort="28" for="city27">
								<p>藏族自治区</p>
							</label>
							<input type="radio" name="city" id="city28" value="24">
							<label data-sort="24" for="city28">
								<p>陕西省</p>
							</label>
							<input type="radio" name="city" id="city29" value="5">
							<label data-sort="5" for="city29">
								<p>甘肃省</p>
							</label>
							<input type="radio" name="city" id="city30" value="21">
							<label data-sort="21" for="city30">
								<p>青海省</p>
							</label>
							<input type="radio" name="city" id="city31" value="20">
							<label data-sort="20" for="city31">
								<p>宁夏回族自治区</p>
							</label>
							<input type="radio" name="city" id="city32" value="29">
							<label data-sort="29" for="city32">
								<p>新疆维吾尔自治区</p>
							</label>
							<input type="radio" name="city" id="city33" value="35">
							<label data-sort="35" for="city33">
								<p>台湾省</p>
							</label>
							<input type="radio" name="city" id="city34" value="33">
							<label data-sort="33" for="city34">
								<p>香港特别行政区</p>
							</label>
							<input type="radio" name="city" id="city35" value="34">
							<label data-sort="34" for="city35">
								<p>香港特别行政区</p>
							</label>
						</div>
						<div class="check_city" val="" data-txt="不限">
							
						</div>
						</div>
					</div>
					<ul class="tips_sort sort_list clear">

												<li data-sort="1" id="tags1">不限制 <i class="fa fa-check"></i></li>
												<li data-sort="2" id="tags2">4级以下 <i class="fa fa-check"></i></li>
												<li data-sort="3" id="tags3">5级<i class="fa fa-check"></i></li>
												<li data-sort="4" id="tags4">6级<i class="fa fa-check"></i></li>
		


											<div class="btn_box clear">
							<div class="btn_l">重置</div>
							<div class="btn_r">确定</div>
						</div>
					</ul>
				</div>

				<div class="sort_bg"></div>

			</div>
			
			<!--主播列表开始-->
			<div id="list" class="pic_sort"><ul>

		<?php 
		$tags_name = $this->config->item('all_tags');
		foreach ($res as $key => $value) {
        ?>
           
			<li><a class="clear" href="/main/student_detail/<?php echo $value['id'];?>">
			 <img src="<?php echo strstr($value['icon'],'http:') ? $value['icon'] : $this->api_url.$value['icon'];?>">
			  <p class="tit clear">
			  <span class="name"><?php echo $value['nickname'];?></span>
			  <i class="sex <?php echo $value['sex']==2?"girl":"boy";?>"></i></p> <p class="tit2 clear">
			  <span><?php echo get_how_old($value['birthday']);?>岁&nbsp;&nbsp;&nbsp;</span>
			  <span>粉丝:<?php echo $value['fans_num']?$value['fans_num']:0;?></span></p> 
			  <div class="list_tips">
			  <?php $tags = json_decode($value['tags'],true);
			  foreach($tags as $tags_value){?>
			  <i><?php echo $tags_name[$tags_value];?></i>
			  <?php }?>


			  </div> <div class="collect">  <i class="on"></i>  <p>关注</p> </div></a>

			  </li>
		<?php }?>			
			</ul>


			<h2 class="getmore on" data-page="1">加载更多&gt;&gt;</h2><h2 class="getmore off"><i class="fa fa-spinner fa-pulse fa-fw" style="padding:0;"></i>加载中</h2></div>

			<div class="bottom_div" style="width: 100%;float: left"></div>

			<!--主播列表结束-->

	
			<!-- 保存城市cookie-->
			<!-- <div class="gear area_city" data-areatype="area_city" val="" data-val="不限" data-len="0" style="display: none"></div> -->
		


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
</script>
 

<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>



<script>
	$(document).ready(function(){

		//读取筛选条件的缓存
		var fs = getCookie('fs');var fs_txt = $("#fs"+fs).text();
		var ct = getCookie('ct');var ct_txt = $(".check_city").attr('data-txt');
		// 读取平台cookie
		var pt_t = getCookie('pt');
		var arr_t = pt_t.split('A');
		var pt_txt = '';
		for(var i = 0;i < arr_t.length;i++){
			pt_txt += $('#pt'+arr_t[i]).text();
		}
		var pt = pt_t.replace(/\A/g,',');

		// 读取标签cookie
		var tg_t = getCookie('tg');
		var arr = tg_t.split("A");
		var tg_txt  = '';
		for(i=0;i<arr.length;i++){
			tg_txt += $("#tags"+arr[i]).text();
		}
		var tg = tg_t.replace(/\A/g,',');

		var list_types = getCookie('list_type');

		// 保存cookie
		function saveCookie(saveVal,saveBtn,saveTxt){
			if(saveVal != 0 && saveVal != ''){
				$(saveBtn).addClass('active').css('border-width','1px');
				$(saveBtn).attr('data-attr',saveVal);
				$(saveBtn).html(saveTxt);
			}
		}
		saveCookie(pt,'.platform',pt_txt);
		saveCookie(fs,'.fans',fs_txt);
		saveCookie(ct,'.city',ct_txt);
		saveCookie(tg,'.tips',tg_txt);


		if(list_types=='pic_sort'||list_types==''){
			$('.list_type').addClass('pic');
			$('#list').attr('class','pic_sort');
		}
		if(list_types=='sort_lists'){
			$('.list_type').removeClass('pic');
			$('#list').attr('class','sort_lists');
		}

		// sortContent();
	});
</script>
<script>

// 点击改变图片显示模式

$('.list_type').on('touchend',function(){
	$('.list_box .sort_list,.gearArea').hide();
	$('.sort_bg').hide();
	if(!$(this).hasClass('pic')){
		var length = $("#list li img").length;
		for(var i=0;i<length;i++){
			var imgsrc = $("#list li").eq(i).find('img').attr("src");	
			imgsrc = imgsrc.replace('thumb_','');
			$("#list li").eq(i).find('img').attr("src",imgsrc);			
		}
		
		$(this).addClass('pic');
		$('#list').removeClass('sort_lists').addClass('pic_sort');
	}else{
		$(this).removeClass('pic');
		$('#list').addClass('sort_lists').removeClass('pic_sort');
	}
	var list_type = $('#list').attr('class');
	setCookie('list_type',list_type,3600);
})



// 选择城市
$(document).on('click','#city label',function(){
	var city_sort = $(this).attr('data-sort');
	var city_txt = $(this).children('p').text();
	if(city_sort==343||city_sort==321||city_sort==394||city_sort==52){
		$('.check_city').hide();
		$('.city').attr('data-attr',city_sort).attr('data-txt',city_txt);
		// 城市保存到nav
		$('.city_sort').slideUp(200);
		setTimeout(function(){
			$('.sort_bg').hide();
		},200);
		$('.city').text(city_txt).addClass('current');
		$('.city').removeClass('on');
		$('.wrap').css({'height':'auto','overflow-y':'auto'});

		// 保存cookie
		var city_val = city_sort;
		sortContent();
		setCookie('ct',city_val,3600);
		setCookie('ct_txt',city_txt,3600);
	}else if(city_sort==0){
		$('.check_city').hide();
		$('.city').attr('data-attr','0').removeClass('current').removeClass('active').removeClass('on');

		$('.city_sort').slideUp(200);
		setTimeout(function(){
			$('.sort_bg').hide();
		},200);
		$('.city').html('<span>城市</span><i></i>');
		var city_val = city_sort;
		sortContent();
		setCookie('ct',city_val,3600);
		setCookie('ct_txt',city_txt,3600);

		$('.wrap').css({'height':'auto','overflow-y':'auto'});
	}else{
		$.post('/api/get_city',{ area_id:city_sort },function(data){
			var city=$('[data-sort='+city_sort+']').find('p').html();
			console.log(city)
			 var data=JSON.parse(data);
			 var getCity;
			  for(var k in data){
                                if(data[k].province_name==city){
                                        getCity=data[k].city;
                                }
                            }
			// if(data.status==1){
				var html = '';
				for(var m in getCity){
					html+="<label class='check_on'  data-sort='" + getCity[m].city_name + "' data-txt='"+getCity[m].city_name+"'>" + getCity[m].city_name + "</label>";
				}
				$('.check_city').show(0);
				$('.check_city').html(html);
			// }
		})
	}
	
})

$(document).on('click','.check_on',function(){
	$(this).addClass('current').siblings().removeClass('current');
	// 保存数据
	var city_val = $('.check_city > .current').attr('data-sort');
	var city_txt = $('.check_city > .current').attr('data-txt');
	$('.city').attr('data-attr',city_val);

	// 城市保存到nav
	$('.city_sort').slideUp(200);
	setTimeout(function(){
		$('.sort_bg').hide();
	},200);
	$('.city').text(city_txt).addClass('current').attr('data-attr',city_val).attr('data-txt',city_txt);
	$('.city').removeClass('on');
	$('.wrap').css({'height':'auto','overflow-y':'auto'});
	// $('.city').attr('data-txt',city_txt)
	// 保存cookie
	sortContent();
	setCookie('ct_txt',city_txt,3600);
	setCookie('ct',city_val,3600);
})


//点击筛选弹框
$('.sort_nav > li').click(function(){
	var win_h = $(window).height();
	var header_h = $('.header').height();
	var wrap_h = win_h-header_h;
	$('.wrap').css({'height':wrap_h,'overflow-y':'hidden'});

	var index = $(this).index();
	$('.sort_bg').show();
	if($(this).hasClass('on')){
		setTimeout(function(){
			$('.sort_bg').hide();
		},200)
		
		$(this).removeClass('on').siblings().removeClass('on');
		$('.list_box > .sort_list').eq(index).slideToggle(200).siblings().hide();
		$('.wrap').css({'height':'auto','overflow-y':'auto'});
	}else{

		$(this).addClass('on').siblings().removeClass('on');
		$('.list_box > .sort_list').eq(index).slideToggle(200).siblings().hide();
	}
})

// 筛选粉丝
$('.fans_sort li').click(function(){

	$(this).addClass('current').siblings().removeClass('current');
	var current_text = $('.fans_sort .current span').text();
	var index =  $(this).parents('.sort_list').index();
	var fs = $('.fans_sort .current').attr('data-sort');
	if(current_text==''||current_text=='不限'){
		$('.fans_sort').hide();
		$('.sort_bg').hide();
		$('.sort_nav li').eq(index).html('<span>粉丝</span><i></i>');
		$('.sort_nav li').eq(index).css({'border-width':'0'});
		$('.sort_nav li').eq(index).removeClass('active');
	}else{
		$('.sort_nav li').eq(index).text(current_text);
		$('.sort_nav li').eq(index).addClass('active').css('border-width','1px');
		$('.fans_sort').hide();
		$('.sort_bg').hide();
	}
	$('.sort_nav li').eq(index).removeClass('on');
	$('.fans').attr('data-attr',fs);
	$('.wrap').css({'height':'auto','overflow-y':'auto'});
	setCookie('fs',fs,3600);
	setCookie('fs_txt',current_text,3600);
	sortContent();
})

//筛选标签与平台
function checkType(cktype,tipText){
	$(cktype+' li').click(function(){
		if($(this).hasClass('current')){
			$(this).removeClass('current');
		}else{
			$(this).addClass('current');
		}
		var check_num = $(cktype+' li.current').length;
		if(check_num > 1){
			custom('Tips','You can only select one at most'+tipText);
			if($(this).hasClass('current')){
				$(this).removeClass('current');
			}
		}
	})
}
checkType('.tips_sort',' HSK level');
checkType('.platform_sort',' Continent');


// 选择平台以及标签确认按钮
function changeStatus(ckbtn,ckval,cktxt,text){
	$(ckbtn+' .btn_r').click(function(){
		var current_text = $(ckbtn+' .current').text();
		var index =  $(this).parents('.sort_list').index();

		var platform = $(ckbtn+' .current');
		var pt = '';
		for(i=0;i<platform.length;i++){
			pt	+= platform.eq(i).attr('data-sort')+'A';
		}
		var length = pt.length;
		pt = pt.substring(0,length-1);
		var pt_t = pt.replace(/\A/g,',');
		if(current_text==''){
			$(ckbtn).hide();
			$('.sort_bg').hide();
			$('.sort_nav li').eq(index).html('<span>'+text+'</span><i></i>');
			$('.sort_nav li').eq(index).css({'border-width':'0'});
			$('.sort_nav li').eq(index).removeClass('active');
		}else{
			$('.sort_nav li').eq(index).text(current_text);
			$('.sort_nav li').eq(index).addClass('active').css('border-width','1px');
			$(ckbtn).hide();
			$('.sort_bg').hide();
		}
		$('.sort_nav li').eq(index).attr('data-attr',pt_t);
		$('.wrap').css({'height':'auto','overflow-y':'auto'});
		$('.sort_nav li').eq(index).removeClass('on');

		setCookie(ckval,pt,3600);
		setCookie(cktxt,current_text,3600);
		sortContent();
		
	})
}
changeStatus('.platform_sort','pt','pt_txt','Continent');
changeStatus('.tips_sort','tg','tg_txt','HSK level');

// 重置按钮
function resBtn(res){
	$(res+' .btn_l').click(function(){
		var index = $(this).parents('.sort_list').index();
		$(res+' li').removeClass('current');
		$('.sort_nav li').eq(index).attr('data-attr','0').removeClass('on');
		$(res+' .btn_r').click();
	})
}
resBtn('.platform_sort');
resBtn('.tips_sort');

//Clear all filters
$(document).on('click','.res_btn',function(){
	$('.sort_nav li').attr('data-attr','0').removeClass('active');
	$('.platform_sort .btn_l').click();
	$('.tips_sort .btn_l').click();
	$('.fans_sort li').eq(0).click();
	$('#city label').eq(0).click();
	sortContent();
})
	var tags_name=['旅游','户外','美食','电商','娱乐','健身','美业','公益','游戏','秀场','体育','棋牌','网红','母婴','服装','亲子','教学','财经','外语','宠物','情感','美女','帅哥','辣妈','萌叔','大龄','农业'];
// 点击加载内容
$(document).on("click",".zhubo-list .getmore.on",function(){
	var pt = $('.platform').attr('data-attr');
	var fs = $('.fans').attr('data-attr');
	var ct = $('li.city').attr('data-attr');
	var tg = $('.tips').attr('data-attr');
	$(this).hide();
	var newtg=tg;

		var newtg=tg-1;
	if(pt==0){
		pt='';
	}
	if(fs==0){
		fs='';
	}
	if(newtg<=0){
		newtg='';
	}
	$(this).parents('#list').find('h2.off').show();
var ct= $('[data-sort="'+ct+'"]').html();
	var that = this;
	var page = $(that).attr('data-page');

	$.post("/api/anchor_list",{anchor_list:'anchor_list',page:page,dazhou:pt,fans_num:fs,city:ct,hsk_class:newtg},function(data){
		if(data!=0&&data!=-1){
		var data=JSON.parse(data);
		console.log(data)
		var res=data.data;
		if(res.length>0){
			var html = '<ul>';	
			for(var i = 0;i<res.length;i++){
				html +='<li><a class="clear" href="/main/student_detail/'+res[i].id+'">';
				if($('#list').attr('class')=='sort_lists'){
					html +=' <img src="'+res[i].icon+'" />';
				}else if($('#list').attr('class')=='pic_sort'){
					html +=' <img src="'+res[i].icon+'" />';
				}
				var girlOrBoy=res[i].sex;
				girlOrBoy=girlOrBoy==2?'girl':'boy';
				var nowDate=new Date();
				var age=res[i].birthday;
				var userage=nowDate.getFullYear()-age.slice(0,4);

				var tags=JSON.parse(res[i].tags);
				var htmltags='';
				for(var k in tags){
					var idx=tags[k]-1;
					console.log(idx)
					htmltags+='<i>'+tags_name[idx]+'</i>'

				}
				html +=' <p class="tit clear"><span class="name">'+res[i].nickname+'</span><i class="sex '+girlOrBoy+'"></i></p>';
				html +=' <p class="tit2 clear"><span>'+userage+'age&nbsp;&nbsp;&nbsp;</span><span>fans:'+res[i].fans_num+'</span></p>';
				html +=' <div class="list_tips">'+htmltags+'</div>';
				html +=' <div class="collect">';
				html +='  <i class="on"></i>';
				html +='  <p>Follow</p>';
				html +=' </div>';
				html +='</a></li>';
			}
			html +='</ul>';
			if(res.length > 9){
			 	html +='<h2 class="getmore on" data-page="1">Load more>></h2>';
				html +='<h2 class="getmore off"><i class="fa fa-spinner fa-pulse fa-fw" style="padding:0;"></i>loading</h2>';
			 }
			// $('.getmore.on').attr('data-page',data.page);
			setTimeout(function(){
				$('#list').html(html);
			},300);
			
		}}else{
			$(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
			setTimeout(function(){
				$(that).html('No more!');
				$(that).show();
				$(that).siblings('.getmore.off').hide();	
			},500);
		}
		
	})
})






// ajax获取ul内容
function sortContent(){
	$('#list').html('<p style="padding-top:60%;text-align: center;"><i class="fa fa-spinner fa-pulse fa-fw margin-bottom" style="padding:0"></i>loading...</p>');
	var pt = $('.platform').attr('data-attr');
	var fs = $('.fans').attr('data-attr');
	var ct = $('.city').attr('data-attr');
	var tg = $('.tips').attr('data-attr');
	console.log(ct+'=ct')
	if(ct==0){
		ct=''
	}else{
		 ct= $('[data-attr="'+ct+'"]').attr('data-txt');
	}
	
	var newtg=tg-1;
	if(pt==0){
		pt='';
	}
	if(fs==0){
		fs='';
	}
	if(newtg<=0){
		newtg='';
	}
	var arr = tg.split(",");  
	var tg  = '';
	for(i=0;i<arr.length;i++){
		var txt = $("#tags"+arr[i]).text();
		tg +=  txt+',';
	}
	var tg_length = tg.length;
	tg = tg.substring(0,tg_length-1);

	
	// var page = $('.getmore.on').attr('data-page');
	$.post("/api/anchor_list",{action:'anchor_list',page:1,dazhou:pt,fans_num:fs,city:ct,hsk_class:newtg},function(data){
		if(data!=0&&data!=-1){
		var data=JSON.parse(data);
		console.log(data)
		var res=data.data;
		if(res.length>0){
			var html = '<ul>';
			
			for(var i = 0;i<res.length;i++){
				html +='<li><a class="clear" href="/main/student_detail/'+res[i].id+'">';
				if($('#list').attr('class')=='sort_lists'){
					html +=' <img src="'+res[i].icon+'" />';
				}else if($('#list').attr('class')=='pic_sort'){
					html +=' <img src="'+res[i].icon+'" />';
				}
				var girlOrBoy=res[i].sex;
				girlOrBoy=girlOrBoy==2?'girl':'boy';
				var nowDate=new Date();
				var age=res[i].birthday;
				var userage=nowDate.getFullYear()-age.slice(0,4);

				var tags=JSON.parse(res[i].tags);
				var htmltags='';
				for(var k in tags){
					var idx=tags[k]-1;
					console.log(idx)
					htmltags+='<i>'+tags_name[idx]+'</i>'

				}
				html +=' <p class="tit clear"><span class="name">'+res[i].nickname+'</span><i class="sex '+girlOrBoy+'"></i></p>';
				html +=' <p class="tit2 clear"><span>'+userage+'age&nbsp;&nbsp;&nbsp;</span><span>fans:'+res[i].fans_num+'</span></p>';
				html +=' <div class="list_tips">'+htmltags+'</div>';
				html +=' <div class="collect">';
				html +='  <i class="on"></i>';
				html +='  <p>Follow</p>';
				html +=' </div>';
				html +='</a></li>';
			}
			html +='</ul>';
			if(res.length > 9){
			 	html +='<h2 class="getmore on" data-page="1">Load more>></h2>';
				html +='<h2 class="getmore off"><i class="fa fa-spinner fa-pulse fa-fw" style="padding:0;"></i>loading</h2>';
			 }
			// $('.getmore.on').attr('data-page',data.page);
			setTimeout(function(){
				$('#list').html(html);
			},300);
			
		}}else{
			var html = "";
			html +='<div class="sorry">';
			html +=' <img src="/statics/img/logo.png">';
			html +=' <p>Sorry, no eligible anchor found</p>';
			html +='</div>';
			html +='<div class="res_btn">Clear all filters</div>';
			$('#list').html(html);
		}
	})
}


</script></div></div><div id="back_icon" style="display: none; bottom: 1.2rem;" ;=""></div>


<?php $this->load->view('header');?>