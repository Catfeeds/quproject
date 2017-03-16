$(function(){

	//取cookie,第一次进入页面的引导页
	// var ready_pic = getCookie('ready_pic');
	// if(ready_pic != 1){
	// 	$('html').prepend('<div class="ready_box"><div class="ready_pic"></div></div>');
	// 	// $('.ready_box').show();
	// 	setTimeout(function(){
	// 		$('.ready_box').remove();
	// 	},2000);
	// 	setCookie('ready_pic', 1, 3600 * 24);
	// }


	//ajax get请求
    $('.ajax-get').click(function(){
        var target;
        var that = this;
        if ( $(this).hasClass('confirm') ) {
            if(!confirm('确认要执行该操作吗?')){
                return false;
            }
        }
        if ( (target = $(this).attr('href')) || (target = $(this).attr('url')) ) {
            $.get(target).success(function(data){
                if (data.status==1) {
                    if (data.url) {
                        alert(data.info + ' 页面即将自动跳转~','alert-success');
                    }else{
                        alert(data.info,'alert-success');
                    }
                    setTimeout(function(){
                        if (data.url) {
                            location.href=data.url;
                        }else if( $(that).hasClass('no-refresh')){
                            $('#top-alert').find('button').click();
                        }else{
                            location.reload();
                        }
                    },1500);
                }else{
                    alert(data.info);
                    setTimeout(function(){
                        if (data.url) {
                            location.href=data.url;
                        }else{
                            $('#top-alert').find('button').click();
                        }
                    },1500);
                }
            });

        }
        return false;
    });

    //ajax post submit请求
    $('.ajax-post').click(function(){
        var target,query,form;
        var target_form = $(this).attr('target-form');
        var that = this;
        var nead_confirm=false;
        if( ($(this).attr('type')=='submit') || (target = $(this).attr('href')) || (target = $(this).attr('url')) ) {
            form = $('.'+target_form);
            if ($(this).attr('hide-data') === 'true'){//无数据时也可以使用的功能
            	form = $('.hide-data');
            	query = form.serialize();
            }else if (form.get(0)==undefined){
            	return false;
            }else if ( form.get(0).nodeName=='FORM' ){
                if ( $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                if($(this).attr('url') !== undefined){
                	target = $(this).attr('url');
                }else{
                	target = form.get(0).action;
                }
                query = form.serialize();
            }else if( form.get(0).nodeName=='INPUT' || form.get(0).nodeName=='SELECT' || form.get(0).nodeName=='TEXTAREA') {
                form.each(function(k,v){
                    if(v.type=='checkbox' && v.checked==true){
                        nead_confirm = true;
                    }
                })
                if ( nead_confirm || $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                query = form.attr('id')+'='+form.val();
				
            }else{
                if ( $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                query = form.find('input,select,textarea').serialize();
            }
			
            $(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
            $.post(target,query).success(function(data){
                if(data.status==-1){
					window.location.href = '/user/login.html';
				}else if(data.status==-3){
					window.location.href = '/Sms/show.html?msg='+data.msg+'&url=/User/edit.html';
				}else{
					if(data.status==1){
						//操作成功
						if($(that).hasClass("off")) {
							$(that).addClass("on");
							$(that).removeClass("off");
						}else if($(that).hasClass("on")){
							$(that).addClass("off");
							$(that).removeClass("on");
						}
						
						//改变按钮类型
						if(typeof($(that).attr('return-msg')) != 'undefined'){
							$(that).find('span').text($(that).attr('return-msg'));
							var return_msg = $(that).attr('return-msg');
							$(that).attr('return-msg',$(that).attr('change-msg'));
							$(that).attr('change-msg',return_msg);
						}else if(typeof($(that).attr('remove-msg')) != 'undefined'){ 
							//改变状态，移除点击操作
							$(that).html($(that).attr('remove-msg'));
							$(that).removeAttr("target-form")
							$(that).removeClass("ajax-post");
						}else if(typeof($(that).attr('remove-block')) != 'undefined'){
							//移除div
							$(that).parents('.main-box3').remove();
							$(that).parents('.main-box3').css('background','red');
						}
						tusi(data.msg);
						
							
						
					}else{
						notice(data.msg);
					}
					

					//按钮点击后,1.5S内不能重复点击
					setTimeout(function(){
							$(that).removeClass('disabled').attr('autocomplete','on').prop('disabled',false);
	                    },1500);
                }
            });
        }
        return false;
    });

    //$('.top_backhome_icon').click(function(){
    //	history.go(-1);
    //})

	$('.jump').click(function(){
		var url = $(this).attr('url');
		if(url != undefined && url != ''){
			window.location.href = url;
		}
	});

	 $('.form-get').click(function(){
		var form;
        var target_form = $(this).attr('target-form');
        var that = this;
		
		form = $('.'+target_form);
		form.submit(); 
		
	 });
		
	// 活动页点击字母弹框
	$('.word_nav ul li').click(function(){
		$('.word_alert_box .box').text($(this).text());
		$('.word_alert_box').show();
		setTimeout(function(){
			$('.word_alert_box').hide();
		},300);
	})

	//活动页选择城市
	$('#position').click(function(){
		$('.position-wrap').css('display','block');
		$('.main').hide();
	})
	$('#back,.all_city_name p').click(function(){
		$('.position-wrap').css('display','none');
		$('.main').show();
	})
	$('.all_city_name p').click(function(){
		setCookie('city',$(this).attr('data-id'));
		location.reload();
	})

	$('.hot_city li').click(function(){
		setCookie('city',$(this).attr('data-id'));
		location.reload();
	})

	
});

function checkMobile(str) {
	 var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
	 if (reg.test(str)) {
		  return true;
	 }else{
		  return false;
	 };
}

/**
 * 吐丝信息框
 * @param txt
 * @returns
 */
function tusi(txt){
	$('.toast').remove();
	var div  = $('<div id="toast"><div class="weui_mask_transparent"></div><div class="weui_toast"><i class="weui_icon_toast"></i><p class="weui_toast_content">'+txt+'</p></div></div>');
	
	$('body').append(div);
	div.css('zIndex',9999999);
	//div.css('left',parseInt(($(window).width()-div.width())/2));
	//var top = parseInt($(window).scrollTop()+($(window).height()-div.height())/2);
	//div.css('top',top);
	setTimeout(function(){
		div.remove();
	},2000);
}

//错误提示框
function notice(txt){
	$('.toast').remove();
	var div  = $('<div id="toast"><div class="weui_mask_transparent"></div><div class="weui_toast"><i class="weui_icon_clear" style="margin: 0.4rem 0 0;display: block;"></i><p class="weui_toast_content" style="padding: 0 0.2rem;">'+txt+'</p></div></div>');
	
	$('body').append(div);
	div.css('zIndex',9999999);
	//div.css('left',parseInt(($(window).width()-div.width())/2));
	//var top = parseInt($(window).scrollTop()+($(window).height()-div.height())/2);
	//div.css('top',top);
	setTimeout(function(){
		div.remove();
	},2000);
	
}

function tusiload(txt){
	if(txt == 'false'){
		$("#loadingToast").remove();
	}else{
		$('.toast').remove();
		var div  = $('<div id="loadingToast" class="weui_loading_toast"><div class="weui_mask_transparent"></div><div class="weui_toast"><div class="weui_loading"><div class="weui_loading_leaf weui_loading_leaf_0"></div><div class="weui_loading_leaf weui_loading_leaf_1"></div><div class="weui_loading_leaf weui_loading_leaf_2"></div><div class="weui_loading_leaf weui_loading_leaf_3"></div><div class="weui_loading_leaf weui_loading_leaf_4"></div><div class="weui_loading_leaf weui_loading_leaf_5"></div><div class="weui_loading_leaf weui_loading_leaf_6"></div><div class="weui_loading_leaf weui_loading_leaf_7"></div><div class="weui_loading_leaf weui_loading_leaf_8"></div><div class="weui_loading_leaf weui_loading_leaf_9"></div><div class="weui_loading_leaf weui_loading_leaf_10"></div><div class="weui_loading_leaf weui_loading_leaf_11"></div></div><p class="weui_toast_content">'+txt+'</p></div></div>');
		$('body').append(div);
		div.css('zIndex',9999999);
	}
}

/**
 * 自定义alert信息框
 * @param title
 * @param txt
 * @returns
 */
function custom(title,txt){
	$('.weui_dialog_alert').remove();
	var div  = $('<div class="weui_dialog_alert"><div class="weui_mask"></div><div class="weui_dialog"><div class="weui_dialog_hd"><strong class="weui_dialog_title">'+title+'</strong></div><div class="weui_dialog_bd">'+txt+'</div><div class="weui_dialog_ft"><a onclick="rmtusi()" class="weui_btn_dialog primary">确定</a></div></div></div>');
	
	$('body').append(div);
	div.css('zIndex',9999999);
	//div.css('left',parseInt(($(window).width()-div.width())/2));
	//var top = parseInt($(window).scrollTop()+($(window).height()-div.height())/2);
	//div.css('top',top);
}

function rmtusi(){
	$('.weui_dialog_alert').remove();
}

//设置cookie
function setCookie(cname, cvalue, second) {
    var d = new Date();
    d.setTime(d.getTime() + (second*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
//获取cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}
//清除cookie  
function clearCookie(name) {  
    setCookie(name, "", -1);  
}  

//顶部提示框
function notice1(msg){
	$('.tip-box').remove();
	var div  = $('<div class="tip-box"><p>'+msg+'</p></div>');
	
	$('body').append(div);
	div.css('zIndex',9999999);
	div.css('left',0);
	div.css('top',0);
	setTimeout(function(){
		div.remove();
	},2000);
	
}

function make_sure(msg){
	$('.bottom_tip').remove();
	var html = "";
	html += '<div class="bottom_tip" id="bottom_tip">';
	html += ' <div class="tip_box">';
	html += '  <div class="content_box">';
	html += '   <h2>'+ msg +'</h2>';
	html += '   <p class="true">确定</p>';
	html += '   <p class="false">取消</p>';
	html += '  </div>';
	html += ' </div>';
	html += '</div>';

	
	$('body').append(html);
	$('.content_box').animate({'bottom':'0'},300);
	$('.false').click(function(){
		make_sure_hide();
	})	
	$('.true').click(function(){
		make_sure_hide();
	})
}

function make_sure_hide(){
	$('.content_box').animate({'bottom':'-3.7rem'},300);
	setTimeout(function(){
		$('.bottom_tip').remove();
	},300);
}

/*
function bottom_notice(msg){
	$('.bottom_tip').remove();
	var html = "";
	html += '<div class="bottom_tip" id="bottom_tip">';
	html += ' <div class="tip_box">';
	html += '  <div class="content_box">';
	html += '   <h2>'+ msg +'</h2>';
	html += '   <p class="true">确定</p>';
	html += '   <p class="false">取消</p>';
	html += '  </div>';
	html += ' </div>';
	html += '</div>';

	
	$('body').append(html);
	$('.content_box').animate({'bottom':'0'},300);
	$('.false').click(function(){
		$('.content_box').animate({'bottom':'-3.7rem'},300);
		setTimeout(function(){
			$('.bottom_tip').remove();
		},300);
	})
	
}*/

function add0(m){return m<10?'0'+m:m }
function format(shijianchuo,param){
	//shijianchuo是整数，否则要parseInt转换
	var time = new Date(shijianchuo);
	var y = time.getFullYear();
	var m = time.getMonth()+1;
	var d = time.getDate();
	var h = time.getHours();
	var mm = time.getMinutes();
	var s = time.getSeconds();

	var now   = new Date();
	var now_m = now.getMonth()+1;
	var now_d = now.getDate();
	
	if(now_m == m && now_d == d) return add0(h)+':'+add0(mm);
	else return add0(m)+'-'+add0(d)+' '+add0(h)+':'+add0(mm);
}

