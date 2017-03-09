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
				
			//性别
			if($('#hsex').val() != '') $('#sextxt').text($('#hsex').attr('txt'));
			else $('#sextxt').html('<font color="#ccc">必填</font>');
			
			//生日
			if($('#hbirthday').val() != '1970-01-01') $('#birthdaytxt').text($('#hbirthday').val());
			else $('#birthdaytxt').html('<font color="#ccc">必填</font>');

			//平台
			if($('#hplatform').val() != '') $('#platformtxt').text($('#hplatform').attr('txt'));
			else $('#platformtxt').html('<font color="#ccc">必选</font>');

			//房间id
			if($('#hfid').val() != '') $('#fidtxt').text($('#hfid').val());
			else $('#fidtxt').html('<font color="#ccc">必填</font>');

			//地区
			if($('#harea').val() != '') $('#areatxt').text($('#harea').val());
			else $('#areatxt').html('<font color="#ccc">选填</font>');

			//粉丝数量 选填
			if($('#hfans_s').val() != '') $('#fans_stxt').text($('#hfans_s').attr('txt'));
			else $('#fans_stxt').html('<font color="#ccc">选填</font>');
			
			$('#file_box').css('background-image',$('#huploadbox').val());

			//个性签名
			if($('#hsignature').val() != '')	$('#signaturetxt').text($('#hsignature').val());
			else $('#signaturetxt').html('<font color="#ccc">选填</font>');


			$(".menu i.fa-bars").on('touchend',function(){
				$('.ux-popmenu').fadeIn(300);
				$('.ux-popmenu .content').css('display','block');
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
        bind: function (){

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
    //studentIdentity
    var studentIdentity={
    		url: '/studentIdentity',
        className: 'top80',
        render: function () {
            return $('#tpl_studentIdentity').html();
        },
        bind: function (){

			if('' != $("#hstudentIdentity").val()){
				$('.head_pic img').attr('src',$("#hstudentIdentityimgurl").val());
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
    }
    //passport
    var passport={
    		url: '/passport',
        className: 'top80',
        render: function () {
            return $('#tpl_passport').html();
        },
        bind: function (){

			if('' != $("#hpassport").val()){
				$('.head_pic img').attr('src',$("#hpassportimgurl").val());
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
    }

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
				$(this).parent().find('input').val('');
				
			})
			$(".save-info").click(function(){
				var realname = $("#realname").val();
				if(realname == ''){
					notice('姓名不能为空');
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
    //country
    var country={
    	url: '/country',
        className: 'top40',
        render: function () {
            return $('#tpl_country').html();
        },
        bind: function () {
			$('#country').val($('#hcountry').val());
			$('#country').attr('old-val',$('#hcountry').val());

            $(".weui_text_clear").click(function(){
				var oldval = $(this).parent().find('input').attr('old-val');
				$(this).parent().find('input').val('');
				
			})
			$(".save-info").click(function(){
				var country = $("#country").val();
				if(country == ''){
					notice('国家不能为空');
					return false;
				}
				$.post("/UserAjax/updateUserInfo.html",{ country:country },function(res){
					$("#hcountry").val(country);
					checkcomplete();
					history.go(-1);
				})
			})
        }
    }
    //city
    var city={
    	url: '/city',
        className: 'top40',
        render: function () {
            return $('#tpl_city').html();
        },
        bind: function () {
			$('#city').val($('#hcity').val());
			$('#city').attr('old-val',$('#hcity').val());

            $(".weui_text_clear").click(function(){
				var oldval = $(this).parent().find('input').attr('old-val');
				$(this).parent().find('input').val('');
				
			})
			$(".save-info").click(function(){
				var city = $("#city").val();
				if(city == ''){
					notice('城市不能为空');
					return false;
				}
				$.post("/UserAjax/updateUserInfo.html",{ city:city },function(res){
					$("#hcity").val(city);
					checkcomplete();
					history.go(-1);
				})
			})
        }
    }
    //grade
    var grade={
    	url: '/grade',
        className: 'top40',
        render: function () {
            return $('#tpl_grade').html();
        },
        bind: function () {
			$('#grade').html($('#hgrade').val());
			$('#grade').attr('old-val',$('#hgrade').val());

            $(".weui_text_clear").click(function(){
				var oldval = $(this).parent().find('input').attr('old-val');
				$(this).parent().find('input').val('');
				
			})
			$(".save-info").click(function(){
				var city = $("#grade").val();
				if(city == ''){
					notice('年级不能为空');
					return false;
				}
				// $.post("/UserAjax/updateUserInfo.html",{ city:city },function(res){
					$("#hgrade").val(city);
					checkcomplete();
					history.go(-1);
				// })
			})
        }
    }
    // sex
    var sex = {
        url: '/sex',
        className: '',
        render: function () {
            return $('#tpl_sex').html();
        },
		bind: function () {
			var hsex = $("#hsex").val();
			$("input[name='sex'][value='"+hsex+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var sex = $(this).val();
				var that = $(this);
				$.post("/UserAjax/updateUserInfo.html",{ sex:sex },function(res){
					var sextxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hsex").val(sex);
					$("#hsex").attr('txt',sextxt);
					checkcomplete();
					history.go(-1);
				})
			})
		}
    };


    //continent
    var continent={
    	url: '/continent',
        className: '',
        render: function () {
            return $('#tpl_continent').html();
        },
		bind: function () {
			var hsex = $("#hcontinent").val();
			$("input[name='continent'][value='"+hsex+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var sex = $(this).val();
				var that = $(this);
				$.post("/UserAjax/updateUserInfo.html",{ sex:sex },function(res){
					var sextxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hcontinent").val(sex);
					$("#hcontinent").attr('txt',sextxt);
					checkcomplete();
					history.go(-1);
				})
			})
		}



    }

    //yearStay
    var yearStay={
    	url: '/yearStay',
        className: '',
        render: function () {
            return $('#tpl_yearStay').html();
        },
		bind: function () {
			var hsex = $("#hyearStay").val();
			$("input[name='yearStay'][value='"+hsex+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var sex = $(this).val();
				var that = $(this);
				// $.post("/UserAjax/updateUserInfo.html",{ sex:sex },function(res){
					var sextxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hyearStay").val(sex);
					$("#hyearStay").attr('txt',sextxt);
					// checkcomplete();
					history.go(-1);
				// })
			})
		}
    }
    //HSK
    var HSK={
    	url: '/HSK',
        className: '',
        render: function () {
            return $('#tpl_HSK').html();
        },
		bind: function () {
			var hsex = $("#hHSK").val();
			$("input[name='HSK'][value='"+hsex+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var sex = $(this).val();
				var that = $(this);
				// $.post("/UserAjax/updateUserInfo.html",{ sex:sex },function(res){
					var sextxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hHSK").val(sex);
					$("#hHSK").attr('txt',sextxt);
					// checkcomplete();
					history.go(-1);
				// })
			})
		}
    }
    //freeTime
    var freeTime={
    		url: '/freeTime',
        className: '',
        render: function () {
            return $('#tpl_freeTime').html();
        },
		bind: function () {
			var hsex = $("#hfreeTime").val();
			$("input[name='freeTime'][value='"+hsex+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var sex = $(this).val();
				var that = $(this);
				// $.post("/UserAjax/updateUserInfo.html",{ sex:sex },function(res){
					var sextxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hfreeTime").val(sex);
					$("#hfreeTime").attr('txt',sextxt);
					// checkcomplete();
					history.go(-1);
				// })
			})
		}


    }
    //experience
    var experience={
    			url: '/experience',
        className: '',
        render: function () {
            return $('#tpl_experience').html();
        },
		bind: function () {
			var hsex = $("#hexperience").val();
			$("input[name='experience'][value='"+hsex+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var sex = $(this).val();
				var that = $(this);
				// $.post("/UserAjax/updateUserInfo.html",{ sex:sex },function(res){
					var sextxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hexperience").val(sex);
					$("#hexperience").attr('txt',sextxt);
					// checkcomplete();
					history.go(-1);
				// })
			})
		}
    }
	// birthday
    var birthday = {
        url: '/birthday',
        className: 'top40',
        render: function () {
            return $('#tpl_birthday').html();
        },
		bind: function () {
			$.extend({
	         myTime: {
	             CurTime: function(){
	                 return Date.parse(new Date())/1000;
	             },
	             DateToUnix: function(string) {
	                 var f = string.split(' ', 2);
	                 var d = (f[0] ? f[0] : '').split('-', 3);
	                 var t = (f[1] ? f[1] : '').split(':', 3);
	                 return (new Date(
	                         parseInt(d[0], 10) || null,
	                         (parseInt(d[1], 10) || 1) - 1,
	                         parseInt(d[2], 10) || null,
	                         parseInt(t[0], 10) || null,
	                         parseInt(t[1], 10) || null,
	                         parseInt(t[2], 10) || null
	                         )).getTime() / 1000;
	             },
	         }
	     });

			$("#birthday").val($("#hbirthday").val());
			$(".save-info").click(function(){
				var birthday = $("#birthday").val();
				var new_birthday = $.myTime.DateToUnix(birthday);
				var d = new Date(),str = '';
				str += d.getFullYear()+'-';
				str += d.getMonth() + 1+'-';
				str += d.getDate()+' ';
				str += d.getHours()+':'; 
				str += d.getMinutes()+'';
				str = $.myTime.DateToUnix(str);
				if(new_birthday >= str){
					notice('请选择您正确的生日');
					return false;
				}else{
					$.post("/UserAjax/updateUserInfo.html",{ birthday:birthday },function(res){
						$("#hbirthday").val(birthday);
						checkcomplete();
						history.go(-1);
					})
				}
				
			})
		}
    };



    // platform
    var platform = {
        url: '/platform',
        className: '',
        render: function () {
            return $('#tpl_platform').html();
        },
		bind: function () {
		
			var  hplatform = $("#hplatform").val();
			$("input[name='platform'][value='"+hplatform+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var platform = $(this).val();
				//alert($(this).attr('txt'));
				var that  =  $(this);
				$.post("/UserAjax/updateUserInfo.html",{ platform:platform },function(res){
					var platformtxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hplatform").val(platform);
					$("#hplatform").attr('txt',platformtxt);
					checkcomplete();
					history.go(-1);
				})
			})
		}
    };

    //area
    var area = {
    	 url: '/area',
        className: '',
        render: function () {
            return $('#tpl_area').html();
        },
        bind:function(){
			var txt_city1 = $("#hcity1").attr('txt');
			var txt_city2 = $("#hcity2").attr('txt');
			if(txt_city1 == '') txt_city1 = '<font color="#888">请选择</font>';
			if(txt_city2 == '') txt_city2 = '<font color="#888">请选择</font>';
			$("#city1txt").html(txt_city1);
			$("#city2txt").html(txt_city2);

        

        	// 点击选择城市框，弹出省级城市
        	function cityClick(){

        		$('#city label').removeClass('current');
        		$('.city_sort').show();

        		var city_html = '';
				city_html += '<div class="city_box">';
				city_html += '<div id="city">';
					city_html += '<label data-sort="52" for="city2"><p>北京</p></label>';
					city_html += '<label data-sort="343" for="city3"><p>天津</p></label>';
					city_html += '<label data-sort="10" for="city4"><p>河北省</p></label>';
					city_html += '<label data-sort="23" for="city5"><p>山西省</p></label>';
					city_html += '<label data-sort="19" for="city6"><p>内蒙古自治区</p></label>';
					city_html += '<label data-sort="18" for="city7"><p>辽宁省</p></label>';
					city_html += '<label data-sort="15" for="city8"><p>吉林省</p></label>';
					city_html += '<label data-sort="12" for="city9"><p>黑龙江</p></label>';
					city_html += '<label data-sort="321" for="city10"><p>上海</p></label>';
					city_html += '<label data-sort="16" for="city11"><p>江苏省</p></label>';
					city_html += '<label data-sort="31" for="city12"><p>浙江省</p></label>';
					city_html += '<label data-sort="3" for="city13"><p>安徽省</p></label>';
					city_html += '<label data-sort="4" for="city14"><p>福建省</p></label>';
					city_html += '<label data-sort="17" for="city15"><p>江西省</p></label>';
					city_html += '<label data-sort="22" for="city16"><p>山东省</p></label>';
					city_html += '<label data-sort="11" for="city17"><p>河南省</p></label>';
					city_html += '<label data-sort="13" for="city18"><p>湖北省</p></label>';
					city_html += '<label data-sort="14" for="city19"><p>湖南省</p></label>';
					city_html += '<label data-sort="6" for="city20"><p>广东省</p></label>';
					city_html += '<label data-sort="7" for="city21"><p>广西壮族自治区</p></label>';
					city_html += '<label data-sort="9" for="city22"><p>海南省</p></label>';
					city_html += '<label data-sort="394" for="city23"><p>重庆</p></label>';
					city_html += '<label data-sort="26" for="city24"><p>四川省</p></label>';
					city_html += '<label data-sort="8" for="city25"><p>贵州省</p></label>';
					city_html += '<label data-sort="30" for="city26"><p>云南省</p></label>';
					city_html += '<label data-sort="28" for="city27"><p>藏族自治区</p></label>';
					city_html += '<label data-sort="24" for="city28"><p>陕西省</p></label>';
					city_html += '<label data-sort="5" for="city29"><p>甘肃省</p></label>';
					city_html += '<label data-sort="21" for="city30"><p>青海省</p></label>';
					city_html += '<label data-sort="20" for="city31"><p>宁夏回族自治区</p></label>';
					city_html += '<label data-sort="29" for="city32"><p>新疆维吾尔自治区</p></label>';
					city_html += '<label data-sort="35" for="city33"><p>台湾省</p></label>';
					city_html += '<label data-sort="33" for="city34"><p>香港特别行政区</p></label>';
					city_html += '<label data-sort="34" for="city35"><p>香港特别行政区</p></label>';
				city_html += '</div>';
				city_html += '<div class="check_city">';
					
				city_html += '</div>';
				city_html += '</div>';

				$('.city_sort').html(city_html);


        	}
        	// 常驻城市1
        	$('.control_text').click(function(){
        		cityClick();
        		provinceCheck($(this));
        		$('.check_city').height($('#city').height());
        	})

        	//选择省
			function provinceCheck(city_obj){
        		$('#city label').click(function(){

	        		$(this).addClass('current').siblings().removeClass('current');
	        		var city_sort = $(this).attr('data-sort');
	        		var city_txt = $(this).children('p').text();
	        		if(city_sort==343 || city_sort==321 || city_sort==394 || city_sort==52){
	        			$('.check_city').hide();
	        			city_obj.find('input').val(city_sort);
	        			city_obj.find('input').attr('data-txt',city_txt);
	        			city_obj.find(".control_text_ft").text(city_txt);
	        			$('.city_sort').hide();
	        		}else{
	        			$.post('/Ajaxjson/get_area',{ area_id:city_sort },function(data){
	        				if(data.status==1){
								var html = '';
								for(var i = 0; i < data.list.length; i++){
									html+="<label class='check_on'  data-sort='" + data.list[i].area_id + "' data-txt='"+data.list[i].area_name+"'><p>" + data.list[i].area_name + "</p></label>";
								}
								$('.check_city').show(0);
								$('.check_city').html(html);
								$('.check_on').click(function(){
									//选择城市
									var city_sort = $(this).attr('data-sort');
					        		var city_txt = $(this).attr('data-txt');
					        		city_obj.find('input').val(city_sort);
	        						city_obj.find('input').attr('data-txt',city_txt);
				        			city_obj.find(".control_text_ft").text(city_txt);
				        			$('.city_sort').hide();
					        	})
							}
							
	        			})
	        		}
	        	})
        	}
      	      	
        	// 保存按钮
        	$(".save-info").click(function(){
				var city1 = $("#city1");
				var city2 = $("#city2");
				if(city1.val() == $("#hcity1").val() && city2.val() == $("#hcity2").val()){
					checkcomplete();
					history.go(-1);
				}else{
					$("#hcity1").val(city1.val()).attr("txt",city1.attr('data-txt'));
					$("#hcity2").val(city2.val()).attr("txt",city2.attr('data-txt'));
					var str = city1.attr('data-txt')+','+city2.attr('data-txt');
					
					var str_find = str.indexOf(',');
					var str_length = str.length;
					if(str_find == 0 || str_length - 1 == str_find){
						str = str.replace(",",'');
					}
					$("#harea").val(str);

					$.post("/UserAjax/updateUserInfo.html",{ city1:city1.val(),city2:city2.val() },function(res){
						checkcomplete();
						history.go(-1);
					})
				}
			})

        }
    }

	// fans
    var fans_s = {
        url: '/fans_s',
        className: '',
        render: function () {
            return $('#tpl_fans').html();
        },
		bind: function () {
			var hfans_s = $("#hfans_s").val();
			$("input[name='fans_s'][value='"+hfans_s+"']").attr("checked",true); 

			$(".weui_check").click(function(){
				var fans_s = $(this).val();
				var that = $(this);
				$.post("/UserAjax/updateUserInfo.html",{ fans_s:fans_s },function(res){
					var fans_stxt = that.parent().parent().find('.weui_cell_bd').find('p').text();
					$("#hfans_s").val(fans_s);
					$("#hfans_s").attr('txt',fans_stxt);
					checkcomplete();
					history.go(-1);
				})
			})

		}
    };

	// fid
    var fid = {
        url: '/fid',
        className: 'top40',
        render: function () {
            return $('#tpl_fid').html();
        },
		bind: function () {
			$('#fid').val($('#hfid').val());
			$(".save-info").click(function(){
				var fid = $("#fid").val();
				$.post("/UserAjax/updateUserInfo.html",{ fid:fid },function(res){
					$("#hfid").val(fid);
					checkcomplete();
					history.go(-1);
				})
			})
		}
    };

    
    //pic
    var pic={
    	url: '/pic',
        className: 'pic',
        render: function () {
            return $('#tpl_pic').html();
        },
        bind:function(){
			 var pic_num = $('.pic_list li').length;
			 $('.pic_num').text(pic_num);
  	//			删除图片
			  $('#delete_photo').click(function(){
				
				var picurl = new Array();
				$('input[name="checkbox"]:checked').each(function(){
					picurl.push($(this).val());
				})
//				alert(picurl);
				 

				if($('input[name="checkbox"]:checked').length == 0){
					notice('请先选中图片！')
				}else{
					if(!confirm('确认要删除选中照片吗?')){
	                    return false;
	                }
					// $.post("/UserAjax/updateUserInfo.html",{ picurl:picurl },function(res){
						// if(res.status == 1){
							tusi('删除成功！')
							$('input[name="checkbox"]:checked').parents('li').remove();
							var pic_num = $('.pic_list li').length;
							$('.pic_num').text(pic_num);
						// }else{
						// 	notice('删除失败！')
						// }
					// })
				}
				
			  })
        }
    }

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
		.push(sex)
		.push(birthday)
		.push(platform)
		.push(fid)
		.push(fans_s)
		.push(pic)
		.push(signature)
		.push(area)
		.push(continent)
		.push(country)
		.push(city)
		.push(grade)
		.push(yearStay)
		.push(HSK)
		.push(freeTime)
		.push(experience)
		.push(studentIdentity)
		.push(passport)
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
	var hrealname   = $("#hrealname").val();
	var hsex	    = $("#hsex").val();
	var hbirthday   = $("#hbirthday").val();
	var hplatform   = $("#hplatform").val();
	var hfid   = $("#hfid").val();
	
	if (hheadimgurl != "" && hrealname != "" && hsex != "" && hbirthday != "" && hplatform != "" && hfid != ""){
		$("#topview").val('none');
	}
}


//上传图片
//Cut 为1表示裁剪
function uploadphotos() {

	var length = $("#pic-box").children("li").length;
				 if(length >= 9){
					notice('最多上传9张图片');
					return false;
				}
   // var pic = document.getElementById("head_pic_img"),
        file = document.getElementById("uploadphotos");

    var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

     // gif在IE浏览器暂时无法显示
     if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
         alert("图片的格式必须为png或者jpg或者jpeg格式！"); 
         return;
     } 
     var isIE = navigator.userAgent.match(/MSIE/)!= null,
         isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;
 
     if(isIE) {
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
        html5Reader(file);
     }
}

function uploadheadimgurl() {
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
        html5Reader(file,1);
     }
}
function uploadpassportimgurl() {
    var pic = document.getElementById("head_pic_img"),
        file = document.getElementById("passportimgurl");

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
        html5Reader(file,1);
     }
}
 function uploadstudentIdentityimgurl() {
    var pic = document.getElementById("head_pic_img"),
        file = document.getElementById("studentIdentityimgurl");

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
        html5Reader(file,1);
     }
}
 function html5Reader(file,cut){
     var file = file.files[0];
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function(e){
		//document.write(this.result);
		if(cut == 1){
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
								$("#hheadimgurl").val(data.path);
								
								checkcomplete();
								history.go(-1);
								tusi(data.msg);
							},1000);
							
							
						}else{
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
		}else{
			var dataURL = this.result;
			  //上传图片到服务器 picurl图片路径
			  tusiload('上传中');
			  $.post("/Ajaxjson/uploadimg.html",{ dataURL:dataURL },function(data){
				  if(data.status == 1){
					  //将照片信息保存到个人相册 res=1 
					  $.post("/UserAjax/updateUserInfo.html",{ photo:data.path },function(res){
							tusiload('false');
							var number = $('.pic_list li:last').attr('date-k');
							number = parseInt(number) + 1;
							$('.pic_list').append('<li style="background-image:url('+data.path+')"><input type="checkbox" id="checkbox'+number+'" name="checkbox" value="'+data.path+'"/><label for="checkbox'+number+'"></label><a href="#enter{$k}"></a></li>');
							tusi('上传成功！');
							var pic_num = $('.pic_list li').length;
							$('.pic_num').text(pic_num);
					  })
					  //此处为上传成功的操作 返回值res为图片路径
				  }else{
					 tusiload('false');
					 notice(data.msg);
				  }
			  });
		}

		
	 }
 }
