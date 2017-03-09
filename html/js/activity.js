$(document).ready(function(){
	// changetabtxt();
	// $("#loadactivity").show();
	var businessType = $('.businessType').attr('data-value');
	var statusType = $('.statusType').attr('data-value');
	var sortType = $('.sortType').attr('data-value');
	var type = 1;//改变结果html(res)
	var page = $("#page").val();
	$("#page").val(page);
	
	var top = getCookie('top');
	requestdata(type,businessType,statusType,sortType,page,1,top);

	$('.lazy').css('display','block')
	$("img.lazy").lazyload({threshold : 100});
});



//恰换tab的值
function changetabtxt(){
	var businessType = getCookie('businessType');
	var statusType = getCookie('statusType');
	var sortType = getCookie('sortType');
	$(".businessType").find('span').html($("#businessType"+businessType).find('span').text());
	$(".statusType").find('span').html($("#statusType"+statusType).find('span').text());
	$(".sortType").find('span').html($("#sortType"+sortType).find('span').text());
}


function getResource(){
	//$(".main").html('<p style="padding-top:60%;text-align: center;"><i class="fa fa-spinner fa-pulse fa-fw margin-bottom" style="padding:0"></i>加载中...</p>');
	// $("#loadactivity").show();
	var businessType = $('.businessType').attr('data-value');
	var statusType = $('.statusType').attr('data-value');
	var sortType = $('.sortType').attr('data-value');
	var type = 1;//改变结果html(res)
	var page = 1;
	requestdata(type,businessType,statusType,sortType,page);
}

$(window).scroll(function(){
　　var scrollTop = $(this).scrollTop();
	setCookie('top',scrollTop,3600);
　　var scrollHeight = $(document).height();
　　var windowHeight = $(this).height();
　　if(scrollTop + windowHeight >= scrollHeight){
		var page = $('#page').val();
		var oldpage = getCookie('oldpage'); 
		if(oldpage == page) return false;
		else{
			setCookie('oldpage',page,3);
			getMore(page);
		}
　　}
});
function getMore(page){ 
	var businessType = $('.businessType').attr('data-value');
	var statusType = $('.statusType').attr('data-value');
	var sortType = $('.sortType').attr('data-value');
	var page = parseInt(page);
	var type = 2;//添加append(res)
	requestdata(type,businessType,statusType,sortType,page);
}	
function get_info_status( num )
{
	switch(num)
	{
		case '0' : return '待审核';break;
		case '1':return "募集中";break;
		case '2':return "已过期";break;
		default:return "未知";
	}

}
function requestdata(type,businessType,statusType,sortType,page,first,top){
	var city = $('#city-index').attr('data-id');
	if(first != 1) first = 0;
	if(type == 1){
		var html ='<ul>';
	}else{
		var html = '';
	}
	var api_url = $('#api_url').val();
	var data_class = 'wait';
	
	 $.ajax({
	 	 type: "POST",
	 	 url: api_url+"/api/event?action=get_event_list&page="+page,
	 	 data: { },
	 	 dataType: "json",
	 	 success: function(data){
	 		if(data.status == 1){
	 			for(var i=0;i<data.list.length;i++)
				{
					if( data.list[i].status == 1 )
						data_class = 'wait';
					else if( data.list[i].status == 2 )
						data_class = 'ing';
					else
						data_clas = 'end';
	 				html+='<li>';
	 				html+='  <a href="/main/user_detail/'+ data.list[i].uid +'" class="to-detail">';
	 				html+='		<div class="publisher"><img src="'+ data.list[i].icon +'"><span>'+ data.list[i].nickname +'</span></div>';
	 				html+='  </a>';

	 				html+='  <a href="/p/'+data.list[i]['id']+'" class="to-detail">';
	 				html+='	<div class="ad_pic error">';
	 				html+='		<img class="lazy" src="'+api_url+data.list[i]['image']+'" data-original="'+api_url+data.list[i].image+'" alt="">';
	 				html+='		<span class="'+data_class+' clear"><i></i>'+ get_info_status(data.list[i]['status']) +'</span>';
	 				html+='	</div></a>';
					
	 				html+='  <a href="/p/'+data.list[i]['id']+'" class="to-detail">';
	 				html+='		<div class="title"><p>'+data.list[i].en_title+'</p></div>';
	 				html+='		<div class="ad_info clear">';
	 				html+='			<span>活动时间：'+data.list[i].start_time+'</span>';
	 				html+='			<span>活动地点：'+data.list[i].en_city+'</span>';
	 				html+='			<span>募集人数：'+data.list[i].join_count+'/'+data.list[i].need_num+'人</span>';

	 				if(data.list[i].unit_price == 0){
	 					html+='			<span>酬谢资金：面议</span>';
	 				}else{
	 					html+='			<span>酬谢资金：'+data.list[i].single_price+'元/人</span>';
	 				}	
					
	 				html+='		</div>';
	 				html+='	</a>';
	 				html+='</li>';
	 			}

	 			if(type == 1){
	 				html+='</ul>';
	 				if(data.list.length>=10){
	 					html+='<p class="getmore"><i class="fa fa-spinner fa-pulse fa-fw margin-bottom" style="padding:0"></i>加载中</p>';
	 				}else{
	 					html+='<p class="getmore">没有更多了</p>';
	 				}
	 			}
				
	 			switch (type){
	 				case 1:
	 					$('.main').html(html);
	 					if(page > 1){
	 						$(document).scrollTop(top);
	 					}
	 					setTimeout(function(){
	 						$("#loadactivity").hide();
	 					},100);
	 					break;
	 				case 2:
	 					$('.main ul').append(html);
	 					break;
	 			}
	 			$('#page').val(data.page);
	 			$('.lazy').css('display','block');
	 			$("img.lazy").lazyload({threshold : 100});
				
	 		}else{
	 			switch (type){
	 				case 1:
	 					$('.main').html('<h2 class="blank_tip"><i></i>暂无活动<a href="javascript:clearscreen()">清空筛选条件</a></h2>');
	 					setTimeout(function(){
	 						$("#loadactivity").hide();
	 					},100);
	 					break;
	 				case 2:
	 					$(".getmore").html('没有更多了');
	 					break;
	 			}
	 		}
			
	 	  },
	 	  async: false
	 });
}	



function clearscreen(){
	var businessType = 0;
	var statusType = 0;
	var sortType = 0;
	var type = 1;//改变结果
	var page = 1;
	$(".businessType").attr('data-value',0);
	$(".statusType").attr('data-value',0);
	$(".sortType").attr('data-value',0);
	setCookie('businessType',0);
	setCookie('statusType',0);
	setCookie('sortType',0);
	changetabtxt();//切换tab的值
	requestdata(type,businessType,statusType,sortType,page);
}
		