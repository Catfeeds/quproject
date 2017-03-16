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
			var topview = $("#topview").val();
			if(topview == 'none') $('#topblock').hide();
			
			if($('#hheadimgurl').val() != ''){
				$('#headimgsrc img').attr('src',$('#hheadimgurl').val());
				$('.control_headimgurl_ft').show();
				$('.control_headimgurl_ft2').hide();
			}else{
				
				$('.control_headimgurl_ft').hide();
				$('.control_headimgurl_ft2').show();
			}

			//姓名
			if($('#hrealname').val() != '') $('#realnametxt').text($('#hrealname').val());
			else $('#realnametxt').html('<font color="#ccc">必填</font>');


			$('#signaturetxt').text($('#hsignature').val());

			$(".menu i.fa-bars").on('touchend',function(){
				$('.ux-popmenu').fadeIn(300);
				$('.ux-popmenu .content').show();
				$('.ux-popmenu .content').animate({'bottom':'0'},300);
			})
			$(".ux-popmenu .close").click(function(){
				$('.ux-popmenu').fadeOut(300);
				$('.ux-popmenu .content').animate({'bottom':'-300px'},300);
			})
		}
    };

    // headimgurl
    var headimgurl = {
        url: '/headimgurl',
        className: 'top80',
        render: function () {
            return $('#tpl_headimgurl').html();
        },
        bind: function () {

			
			if('' != $("#hheadimgurl").val()){
				$('.head_pic img').attr('src',$("#hheadimgurl").val());
			}else{
				$('.head_pic img').attr('src','/Public/Home/images/appicon200.png');
			}


			$('#upload2').click(function(){
				$('.head_pic').fadeIn(200);
				$('.pic_box').fadeOut(200);
				$('.photo-clip-rotateLayer img').attr('src','');
			})
        	$('#pic_back').click(function(){
        		history.go(-1);
        	})
        	
        	
        	

        }
    };

    // realname
    var realname = {
        url: '/realname',
        className: 'top40',
        render: function () {
            return $('#tpl_realname').html();
        },
        bind: function () {
			$('#realname').val($('#hrealname').val());
			$('#realname').attr('old-val',$('#hrealname').val());

            $(".weui_text_clear").click(function(){
				var oldval = $(this).parent().find('input').attr('old-val');
//				$(this).parent().find('input').val(oldval);
				$(this).parent().find('input').val('');
				
			})
			$(".save-info").click(function(){
				var realname = $("#realname").val();
				if(realname == ''){
					notice('名称不能为空');
					return false;
				}
				$.post("/UserAjax/updateUserInfo.html",{ realname:realname },function(res){
					$("#hrealname").val(realname);
					checkcomplete();
					history.go(-1);
				})
			})
        }
    };

    // text
    var signature = {
    	url: '/signature',
        className: 'text',
        render: function () {
            return $('#tpl_signature').html();
        },
        bind: function (){
        	$('#signature').val($('#hsignature').val());
        	$('.save-info').click(function(){
        		var signature = $('#signature').val();
        		if(signature == ''){
        			notice('您的个性签名不能为空');
        			return false;
        		}
        		$.post("/UserAjax/updateUserInfo.html",{ signature:signature },function(res){
					$("#hsignature").val(signature);
					history.go(-1);
				})
        	})
        }
    }
    
   

    router.push(home)
        .push(headimgurl)
        .push(realname)
        .push(signature)
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


function checkcomplete(){
	var hheadimgurl = $("#hheadimgurl").val();
	var hrealname = $("#hrealname").val();
	if (hheadimgurl != "" && hrealname != "") {
		$("#topview").val('none');
	}
}

//上传图片
function change() {
    var pic = document.getElementById("head_pic_img"),
        file = document.getElementById("headimgurl");

    var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

     // gif在IE浏览器暂时无法显示
     if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
         alert("图片的格式必须为png或者jpg或者jpeg格式！"); 
         return;
     } 
     var isIE = navigator.userAgent.match(/MSIE/)!= null,
         isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;
 
     if(isIE) {alert('浏览器版本太低！');return false;
        file.select();
        var reallocalpath = document.selection.createRange().text;
 
        // IE6浏览器设置img的src为本地路径可以直接显示图片
         if (isIE6) {
            pic.src = reallocalpath;
         }else {
            // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
             pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
             // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
             pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
         }
     }else {
        html5Reader(file);
     }
}
 
 function html5Reader(file){
     var file = file.files[0];
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function(e){
		

		//裁减，上传头像
		var W_W = $(window).width();
		var W_H = $(window).height();
		$('#clipArea').css('height',W_H);
		var clipArea = new bjj.PhotoClip("#clipArea", {
			size: [W_W, W_W],
			outputSize: [400, 400],
			source: this.result,
			view: "#hit",
			ok: "#clipBtn",
			loadStart: function () {
				//tusi("照片读取中");
				$('.lazy_tip span').text('');
				$('.lazy_cover,.lazy_tip').show();
			},
			loadComplete: function () {
				$('.lazy_cover,.lazy_tip').hide();
				//tusi('照片读取完成');
			},
			clipFinish: function (dataURL) {
				tusiload('裁剪中');
				$.post("/Ajaxjson/cutimg.html",{ dataURL:dataURL },function(data){
					if(data.status == 1){
						//成功
						setTimeout(function(){
							tusiload('false');
							$("#hheadimgurl").val(dataURL);
							
							checkcomplete();
							history.go(-1);
							tusi(data.msg);
						},1000);
						
						
					}else{
						//成功
						setTimeout(function(){
							tusiload('false');
							notice(data.msg);
							$('.head_pic').fadeIn(200);
							$('.pic_box').fadeOut(200);
						},1000);
						
					}
					
				})
			}
		});
		$('.head_pic').fadeOut(200);
		$('.pic_box').fadeIn(200);
	 }
 }