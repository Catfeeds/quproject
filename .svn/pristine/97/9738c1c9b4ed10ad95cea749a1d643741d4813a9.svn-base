/**
 * LArea移动端城市选择控件
 * 
 * version:1.7.2
 * 
 * author:黄磊
 * 
 * git:https://github.com/xfhxbb/LArea
 * 
 * Copyright 2016
 * 
 * Licensed under MIT
 * 
 * 最近修改于： 2016-6-12 16:47:41
 */
window.LArea = (function() {
    var MobileArea = function() {
        this.gearArea;
        this.index = 0;
        this.value = [1, 1];
    }
    MobileArea.prototype = {
        init: function(params) {
            this.params = params;
            this.trigger = document.querySelector(params.trigger);
            if(params.province){
              this.province=document.querySelector(params.province);
            }
			if(params.city){
              this.city=document.querySelector(params.city);
            }
            this.type = params.type||1;
            switch (this.type) {
                case 1:
                case 2:
                    break;
                default:
                    throw new Error('错误提示: 没有这种数据源类型');
                    break;
            }
            this.bindEvent();
        },
        getData: function(callback) {
			callback();
            /*var _self = this;
            if (typeof _self.params.data == "object") {
                _self.data = _self.params.data;
                callback();
            } else {
                var xhr = new XMLHttpRequest();
                xhr.open('get', _self.params.data);
                xhr.onload = function(e) {
                    if ((xhr.status >= 200 && xhr.status < 300) || xhr.status === 0) {
                        var responseData = JSON.parse(xhr.responseText);
                        _self.data = responseData.data;
                        if (callback) {
                            callback()
                        };
                    }
                }
                xhr.send();
            }*/
        },
        bindEvent: function() {
            var _self = this;
            //呼出插件
            function popupArea(e) {
                
				_self.gearArea = document.getElementById("gearArea");
				_self.gearArea.style.display='block';
                areaCtrlInit();
                var larea_cancel = _self.gearArea.querySelector(".larea_cancel");
                larea_cancel.addEventListener('touchstart', function(e) {
                    _self.close(e);
                });
                var larea_finish = _self.gearArea.querySelector(".larea_finish");
                larea_finish.addEventListener('touchstart', function(e) {
                    _self.finish(e);
                });
                var area_province = _self.gearArea.querySelector(".area_province");
                var area_city = _self.gearArea.querySelector(".area_city");
                area_province.addEventListener('touchstart', gearTouchStart);
                area_city.addEventListener('touchstart', gearTouchStart);
                area_province.addEventListener('touchmove', gearTouchMove);
                area_city.addEventListener('touchmove', gearTouchMove);
                area_province.addEventListener('touchend', gearTouchEnd);
                area_city.addEventListener('touchend', gearTouchEnd);
            }
            //初始化插件默认值
            function areaCtrlInit() {
                _self.gearArea.querySelector(".area_province").setAttribute("val",_self.province.value);
                _self.gearArea.querySelector(".area_city").setAttribute("val", _self.city.value);
               // _self.gearArea.querySelector(".area_county").setAttribute("val", _self.value[2]);

                switch (_self.type) {
                    case 1:
                        _self.setGearTooth(_self.data);
                        break;
                    case 2:
						_self.setGearTooth(_self.province.value);
                        break;
                }
            }
            //触摸开始
            function gearTouchStart(e) {
                e.preventDefault();
                var target = e.target;
                while (true) {
                    if (!target.classList.contains("gear")) {
                        target = target.parentElement;
                    } else {
                        break
                    }
                }
                clearInterval(target["int_" + target.id]);
                target["old_" + target.id] = e.targetTouches[0].screenY;
                target["o_t_" + target.id] = (new Date()).getTime();
                var top = target.getAttribute('top');
                if (top) {
                    target["o_d_" + target.id] = parseFloat(top.replace(/em/g, ""));
                } else {
                    target["o_d_" + target.id] = 0;
                }
                target.style.webkitTransitionDuration = target.style.transitionDuration = '0ms';
            }
            //手指移动
            function gearTouchMove(e) {
                e.preventDefault();
                var target = e.target;
                while (true) {
                    if (!target.classList.contains("gear")) {
                        target = target.parentElement;
                    } else {
                        break
                    }
                }
                target["new_" + target.id] = e.targetTouches[0].screenY;
                target["n_t_" + target.id] = (new Date()).getTime();
                var f = (target["new_" + target.id] - target["old_" + target.id]) * 30 / window.innerHeight;
                target["pos_" + target.id] = target["o_d_" + target.id] + f;
                target.style["-webkit-transform"] = 'translate3d(0,' + target["pos_" + target.id] + 'em,0)';
                target.setAttribute('top', target["pos_" + target.id] + 'em');
                if(e.targetTouches[0].screenY<1){
                    gearTouchEnd(e);
                };
            }
            //离开屏幕
            function gearTouchEnd(e) {
                e.preventDefault();
                var target = e.target;
                while (true) {
                    if (!target.classList.contains("gear")) {
                        target = target.parentElement;
                    } else {
                        break;
                    }
                }
                var flag = (target["new_" + target.id] - target["old_" + target.id]) / (target["n_t_" + target.id] - target["o_t_" + target.id]);
               
				if (Math.abs(flag) <= 0.2) {
                    target["spd_" + target.id] = (flag < 0 ? -0.08 : 0.08);
                } else {
                    if (Math.abs(flag) <= 0.5) {
                        target["spd_" + target.id] = (flag < 0 ? -0.16 : 0.16);
                    } else {
                        target["spd_" + target.id] = flag / 2;
                    }
                }
                if (!target["pos_" + target.id]) {
                    target["pos_" + target.id] = 0;
                }
                rollGear(target);
            }
            //缓动效果
            function rollGear(target) {
                var d = 0;
                var stopGear = false;
                function setDuration() {
                    target.style.webkitTransitionDuration = target.style.transitionDuration = '200ms';
                    stopGear = true;
                }
                clearInterval(target["int_" + target.id]);
                target["int_" + target.id] = setInterval(function() {
                    var pos = target["pos_" + target.id];
                    var speed = target["spd_" + target.id] * Math.exp(-0.03 * d);
                    pos += speed;
                    if (Math.abs(speed) > 0.1) {} else {
                        var b = Math.round(pos / 2) * 2;
                        pos = b;
                        setDuration();
                    }
                    if (pos > 0) {
                        pos = 0;
                        setDuration();
                    }
                    var minTop = -(target.dataset.len - 1) * 2;
                    if (pos < minTop) {
                        pos = minTop;
                        setDuration();
                    }
                    if (stopGear) {
                        var gearVal = Math.abs(pos) / 2;
                        setGear(target, gearVal);
                        clearInterval(target["int_" + target.id]);
                    }
                    target["pos_" + target.id] = pos;
                    target.style["-webkit-transform"] = 'translate3d(0,' + pos + 'em,0)';
                    target.setAttribute('top', pos + 'em');
                    d++;
                }, 30);
            }
            //控制插件滚动后停留的值
            function setGear(target, val) {
                val = Math.round(val);
                target.setAttribute("val", val);
                switch (_self.type) {
                    case 1:
                         _self.setGearTooth(_self.data);
                        break;
                    case 2:

						var area_id = $('.'+target.dataset['areatype']+' .tooth').eq(val).attr('ref');
						
                     switch(target.dataset['areatype']){
                         case 'area_province':
							_self.setGearTooth(area_id);
                             break;
                         case 'area_city':
                             var ref = target.childNodes[val].getAttribute('ref');
							 _self.index=1;
							break;
                     }
                }
                
            }
            _self.getData(function() {
                _self.trigger.addEventListener('click', popupArea);
            });
        },

        //重置节点个数
        setGearTooth: function(area_id) {
            var _self = this;
			var gearChild = _self.gearArea.querySelectorAll(".gear");
            //var gearVal   = gearChild[_self.index].getAttribute('val');
			
			switch(_self.index){
				case 0:
					var gearVal = $(".area_province .tooth[ref='"+area_id+"']").index();
					gearChild[_self.index].style["-webkit-transform"] = 'translate3d(0,' + (-gearVal * 2) + 'em,0)';
					gearChild[_self.index].setAttribute('top', -gearVal * 2 + 'em');
					gearChild[_self.index].setAttribute('val', gearVal);

					_self.index++;
					_self.setGearTooth(area_id);
					break;
				case 1:
					if(area_id == 1 || area_id == 343 || area_id == 321 || area_id == 394 || area_id == 52 || area_id == 2195){
						var gearVal = 0;
						gearChild[_self.index].style["-webkit-transform"] = 'translate3d(0,' + (-gearVal * 2) + 'em,0)';
						gearChild[_self.index].setAttribute('top', -gearVal * 2 + 'em');
						gearChild[_self.index].setAttribute('val', 1);
						gearChild[_self.index].setAttribute('data-len', 1);
						gearChild[_self.index].innerHTML = '<div class="tooth">- -</div>';
					}else{
                        area_id=$("div[ref='"+area_id+"']").html();

						 $.post('/api/get_city',function(data){
                            var data=JSON.parse(data)
                            var getCity;
                            // console.log(data)
                            for(var k in data){
                                if(data[k].province_name==area_id){
                                        getCity=data[k].city;
                                }
                            }

							
								var itemStr = '';
								for (var m in getCity) {
                                    // console.log(getCity[m].city_name)
								   itemStr += "<div class='tooth'  ref='" + getCity[m].city_name + "'>" + getCity[m].city_name + "</div>";
								}
								gearChild[_self.index].innerHTML = itemStr;

								var gearVal = $(".area_city .tooth[ref='"+_self.city.value+"']").index();
								if(gearVal == -1) gearVal = 0;
								gearChild[_self.index].style["-webkit-transform"] = 'translate3d(0,' + (-gearVal * 2) + 'em,0)';
								gearChild[_self.index].setAttribute('top', -gearVal * 2 + 'em');
								gearChild[_self.index].setAttribute('val', gearVal);
								gearChild[_self.index].setAttribute('data-len', getCity.length);
							
							
						})
					}
					
					break;
			}
        
        },
        finish: function(e) {
            var _self = this;

			var area_province = $('.area_province .tooth');
			var area_city = $('.area_city .tooth');

			var provinceVal = $('.area_province').attr("val");
            var provinceText = area_province.eq(provinceVal).text();
			var provinceCode = area_province.eq(provinceVal).attr('ref');

			var cityVal = $('.area_city').attr("val");
			var cityDataLen = $('.area_city').attr("data-len");
			if(cityVal == 1 && cityDataLen == 1){
				var cityText = provinceText;
				var cityCode = provinceCode;
			}else{
				var cityText = area_city.eq(cityVal).text();
				var cityCode = area_city.eq(cityVal).attr('ref');
			}
            _self.trigger.value = cityText;
            _self.value = [provinceVal, cityVal];
            if(this.province){
                this.province.value= provinceCode;
            }
			this.city.value= cityCode;
            _self.close(e);
        },
        close: function(e) {
			e.preventDefault();
			var _self=this;
			_self.gearArea.style.display='none';
            var evt = new CustomEvent('input');
            _self.trigger.dispatchEvent(evt);
            //_self.gearArea=null;
        }
    }
    return MobileArea;
})()