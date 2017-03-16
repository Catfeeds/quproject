$(function () {

    var router = new Router({
        container: '#container',
        enterTimeout: 250,
        leaveTimeout: 250
    });

    // home
    var home = {
        url: '/',
        className: 'home',
        render: function () {
            return $('#tpl_home').html();
        },
		bind: function () {

			// 选择时间插件
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
			opt.default = {
				theme: 'android-ics light', //皮肤样式
		        display: 'modal', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
		        startYear: currYear - 0, //开始年份
		        endYear: currYear + 20 //结束年份
			};

		  	var optDateTime = $.extend(opt['datetime'], opt['default']);
		    $("#begintime").mobiscroll(optDateTime).datetime(optDateTime);
		    $("#overtime").mobiscroll(optDateTime).datetime(optDateTime);
		    // 选择时间插件

			$('#home').show();
			$(document).scrollTop(0);

			//选择城市
			var area2 = new LArea();
		    area2.init({
		        'trigger': '#chosecity',
		        'province': '#province',
				'city': '#city',
		        'type': 2
		    });

		    // 顶部菜单显示
		 //    $(".menu i.fa-bars").on('touchend',function(){
		 //    	alert(123)
			// 	$('.ux-popmenu').fadeIn(300);
			// 	// $('.ux-popmenu .content').show();
			// 	$('.ux-popmenu .content').css('display','blcok')
			// 	$('.ux-popmenu .content').animate({'bottom':'0'},300);
			// })
			// $(".ux-popmenu .close").click(function(){
			// 	$('.ux-popmenu').fadeOut(300);
			// 	$('.ux-popmenu .content').animate({'bottom':'-300px'},300);
			// })

		}
    };

   
   	// uploadbox
   	var uploadbox = {
        url: '/uploadbox',
        className: 'uploadbox',
        render: function () {
            return $('#tpl_uploadbox').html();
        },
		bind: function () {
			$('#home').hide();

			$('#file_box').css('background-image','url('+$('#huploadbox').val()+')');
			$('#cover').val($('#huploadbox').val());
			var check_num = $('input[name="radio"]:checked').val();
			$('.main_box ul li label').click(function(){

				if(check_num == null){
					$('#confirm-btn').css({'background-color':'#FF8904','border-width':'1px','border-color':'#FF8904','border-style':'solid'})
				}
			})
			$('#cancel').click(function(){
				history.go(-1);
			})
			$('#confirm-btn').click(function(){
				var check_num = $('input[name="radio"]:checked').val();
				if(check_num == null){
					notice('请上传图片或者选择一个模板')
				}else{
					$('#cover').val($('input[name="radio"]:checked').siblings().attr('picurl'));
					var cover = $('#cover').val();

					if(cover != ''){
						$('#file_box').css('background-image','url('+cover+')');
						$('#cover').val(cover);
						$('.pic-inner').show();
						$('.uploadbtn').hide();
					}

					history.go(-1);
				}	
			})
		}
    };

    // city
    var city = {
        url: '/city',
        className: 'city',
        render: function () {
            return $('#tpl_city').html();
        },
		bind: function () {
			$("#home").hide();
			var head_h = $('.header').height();
			$('.word_nav ul li').on('touchstart',function(){
				var w_class = $(this).text();
				var scrollTop = $('.'+w_class).offset().top;
				$(document).scrollTop(scrollTop-head_h);
			})

			$('.area').on('click',function(){
				var text = $(this).text();
				$('#citytxt').text(text);
				$('#city').val($(this).attr('data-id'));
				history.back(-1);
			})
		}
    };

    router.push(home)
		.push(uploadbox)
		.push(city)
        .setDefault('/') 
        .init();


    // .container 设置了 overflow 属性, 导致 Android 手机下输入框获取焦点时, 输入法挡住输入框的 bug
    // 相关 issue: https://github.com/weui/weui/issues/15
    // 解决方法:
    // 0. .container 去掉 overflow 属性, 但此 demo 下会引发别的问题
    // 1. 参考 http://stackoverflow.com/questions/23757345/android-does-not-correctly-scroll-on-input-focus-if-not-body-element
    //    Android 手机下, input 或 textarea 元素聚焦时, 主动滚一把
    if (/Android/gi.test(navigator.userAgent)) {
        window.addEventListener('resize', function () {
            if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA') {
                window.setTimeout(function () {
                    document.activeElement.scrollIntoViewIfNeeded();
                }, 0);
            }
        })
    }
});


//上传图片(haibao)
function change(obj){
   // var pic = document.getElementById("head_pic_img"),
        file = document.getElementById(obj);
	if(obj == 'insert_pic') var operate = 'insert_pic';
    var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

     // gif在IE浏览器暂时无法显示
     if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
         alert("图片的格式必须为png或者jpg或者jpeg格式！"); 
         return;
     } 
     var isIE = navigator.userAgent.match(/MSIE/)!= null,
         isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;
 
     if(isIE) {
		alert('浏览器版本太低！');return false;
        file.select();
        var reallocalpath = document.selection.createRange().text;
 
        // IE6浏览器设置img的src为本地路径可以直接显示图片
         if (isIE6) {
           // pic.src = reallocalpath;
         }else {
            // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
            // pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
             // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
             //pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
         }
     }else {
        html5Reader(file,operate);
     }
}

 function html5Reader(file,operate){
     var file = file.files[0];
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function(e){
		
			var dataURL = this.result;

			  if(operate != 'insert_pic'){
				  //上传图片到服务器 picurl图片路径
				  tusiload('上传中');
				  $.post("/Ajaxjson/uploadimg.html",{ dataURL:dataURL,width:320,height:320 },function(res){
						tusiload('false');
						if(res.status == 1){
							tusi(res.msg);
							if(res.path != ''){
								$('#file_box').css('background-image','url('+res.path+')');
								$('#cover').val(res.path);
								$('.pic-inner').show();
								$('.uploadbtn').hide();
							}

							history.go(-1);
						}else{
							tusi(res.msg);
						}
				  });
			  }else{
				  //上传图片到服务器 picurl图片路径
				  tusiload('上传中');
				  $.post("/Ajaxjson/uploadimg.html",{ dataURL:dataURL,width:640,height:9999 },function(res){
						tusiload('false');
						if(res.status == 1){
							tusi(res.msg);
							var value = '<img src="'+res.path +'" />';
							UE.getEditor('editor').execCommand('insertHtml', value)
						}else{
							tusi(res.msg);
						}
				  });
			  }
			  
	 }
 }


