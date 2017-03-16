<?php $this->load->view('header');?>

<body style="font-size: 12px;">
    <div class="wrap activity-index" style="background:#efeff4;">
        <!--头部-->
        <div class="index_top">
    <!--<a class="location" id="position" href="#"><span id="city-index" data-id="0">不限</span><i class="fa fa-angle-down"></i></a>-->
    <div class="index_search">
    <form id="test">
        <input type="text" id="keyword" value="" placeholder="Search" onClick="">
    </form>

    </div>
    <div class="index_menu menu"><i class="fa fa-bars fr"></i></div>
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
                                        url:'/api/search',
                                        // action:'search_event',

                                        method:'POST',
                                        data:{
                                            title:val,
                                            action:'search_event'                       
                                        },
                                        success:function(data){
                                             var   res=JSON.parse(data);
             var len=res.data;
            if(len){
            len=len.length;
            console.log(len)
            var str='';
            for(var i=0;i<len;i++){
                var info=res.data[i];
                if(info.join_count){
                    var join_count=info.join_count
                }else{
                     var join_count=0
                }

                var single_price=info.single_price?info.single_price:0;
                str+='<li><a href="/main/student_detail/'+info.uid+'" class="to-detail"><div class="publisher">';

                if(info.userinfo.icon){
                    str+='<img src="'+info.userinfo.icon+'"><span>'+info.userinfo.nickname+'</span> ';
                }
                str+='</div></a><a href="/main/info_detail/'+info.id+'" class="to-detail"><div class="ad_pic error"><img class="lazy" src="'+info.image+'" data-original="" alt="" style="display: block;"><span class="';
                if(info.status==1){
                    str+='wait';
                    status='募集中';
                }else if(info.status==2){
                    str+='ing'
                    status='进行中';
                }else{
                    str+='end'
                    status='已结束';
                }

                str+=' clear"><i></i>'+status+'</span></div></a><a href="/main/info_detail/'+info.id+'" class="to-detail"><div class="title"> <p>'+info.title+'</p></div><div class="ad_info clear"><span>活动时间:'+info.start_time+'</span><span>活动地点:'+info.address+'</span><span>活动人数:'+join_count+'/'+info.need_num+'人</span><span>报名费用:'+single_price+'元/人</span></div></a></li>';




            }


            $('.main ul').html(str)
        }else{
            $('.main ul').html('<li style="height:1rem;line-height:1rem;text-align:center">没有找到相关内容</li>') 
        }


                                        }
                               })

                         }
                    }
                    });  


</script>




<div class="headerfull"></div>
<!--定位-->   
<div class="position-wrap" style="display: none;z-index:99999">
    <div class="position-header">
        <a class="back" id="back" href="javascript:;"><i class="icon fa fa-angle-left"></i></a>
        <h2>Switch the city</h2>
    </div>
    <div class="city_box">
        <div class="hot_city">
            <p>Switch the city</p>
            <ul class="clear" style="margin-right: 4%">
                <li data-id="52">北京</li>
                <li data-id="76">广州</li>
                <li data-id="77">深圳</li>
                <li data-id="343">天津</li>
                <li data-id="383">杭州</li>
                <li data-id="322">成都</li>
                <li data-id="394">重庆</li>
            </ul>
        </div>
        <div class="hot_city"><p>全部城市</p></div>

        <div class="all_city">
            <div class="word_box">
                <a name="A"><span class="fixed"></span><h4 class="word">A</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="324">阿坝</p>
                <p data-id="352">阿克苏</p>
                <p data-id="353">阿拉尔</p>
                <p data-id="259">阿拉善盟</p>
                <p data-id="345">阿里</p>
                <p data-id="312">安康</p>
                <p data-id="246">鞍山</p>
                <p data-id="112">安顺</p>
                <p data-id="152">安阳</p>
                <p data-id="396">澳门</p>
            </div>
            <div class="word_box">
                <a name="B"><span class="fixed"></span><h4 class="word">B</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="354">巴音郭楞</p>
                <p data-id="325">巴中</p>
                <p data-id="260">巴彦淖尔盟</p>
                <p data-id="213">白城</p>
                <p data-id="99">百色</p>
                <p data-id="122">白沙</p>
                <p data-id="214">白山</p>
                <p data-id="63">白银</p>
                <p data-id="139">保定</p>
                <p data-id="313">宝鸡</p>
                <p data-id="371">宝山</p>
                <p data-id="261">包头</p>
                <p data-id="52">北京</p>
                <p data-id="100">北海</p>
                <p data-id="123">保亭</p>
                <p data-id="247">本溪</p>
                <p data-id="37">蚌埠</p>
                <p data-id="113">毕节</p>
                <p data-id="285">滨州</p>
                <p data-id="355">博尔塔拉</p>
                <p data-id="51">亳州</p>
            </div>
            <div class="word_box">
                <a name="C"><span class="fixed"></span><h4 class="word">C</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="140">沧州</p>
                <p data-id="211">长春</p>
                <p data-id="199">常德</p>
                <p data-id="346">昌都</p>
                <p data-id="356">昌吉</p>
                <p data-id="124">昌江</p>
                <p data-id="197">长沙</p>
                <p data-id="301">长治</p>
                <p data-id="223">常州</p>
                <p data-id="38">巢湖</p>
                <p data-id="78">潮州</p>
                <p data-id="200">郴州</p>
                <p data-id="141">承德</p>
                <p data-id="322">成都</p>
                <p data-id="125">澄迈县</p>
                <p data-id="262">赤峰</p>
                <p data-id="39">池州</p>
                <p data-id="394">重庆</p>
                <p data-id="101">崇左</p>
                <p data-id="40">滁州</p>
            </div>
            <div class="word_box">
                <a name="D"><span class="fixed"></span><h4 class="word">D</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="373">大理</p>
                <p data-id="245">大连</p>
                <p data-id="168">大庆</p>
                <p data-id="302">大同</p>
                <p data-id="169">大兴安岭</p>
                <p data-id="326">达州</p>
                <p data-id="249">丹东</p>
                <p data-id="137">儋州</p>
                <p data-id="374">德宏</p>
                <p data-id="327">德阳</p>
                <p data-id="286">德州</p>
                <p data-id="375">迪庆</p>
                <p data-id="126">定安县</p>
                <p data-id="64">定西</p>
                <p data-id="79">东莞</p>
                <p data-id="287">东营</p>
            </div>
            <div class="word_box">
                <a name="E"><span class="fixed"></span><h4 class="word">E</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="263">鄂尔多斯</p>
                <p data-id="182">鄂州</p>
                <p data-id="196">恩施</p>
            </div>
            <div class="word_box">
                <a name="F"><span class="fixed"></span><h4 class="word">F</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="102">防城港</p>
                <p data-id="80">佛山</p>
                <p data-id="250">抚顺</p>
                <p data-id="251">阜新</p>
                <p data-id="41">阜阳</p>
                <p data-id="53">福州</p>
                <p data-id="234">抚州</p>
            </div>
            <div class="word_box">
                <a name="G"><span class="fixed"></span><h4 class="word">G</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="65">甘南</p>
                <p data-id="235">赣州</p>
                <p data-id="328">甘孜</p>
                <p data-id="271">固原</p>
                <p data-id="329">广安</p>
                <p data-id="330">广元</p>
                <p data-id="76">广州</p>
                <p data-id="103">贵港</p>
                <p data-id="98">桂林</p>
                <p data-id="111">贵阳</p>
                <p data-id="276">果洛</p>
            </div>
            <div class="word_box">
                <a name="H"><span class="fixed"></span><h4 class="word">H</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="167">哈尔滨</p>
                <p data-id="357">哈密</p>
                <p data-id="277">海北</p>
                <p data-id="278">海东</p>
                <p data-id="120">海口</p>
                <p data-id="279">海南</p>
                <p data-id="280">海西</p>
                <p data-id="142">邯郸</p>
                <p data-id="314">汉中</p>
                <p data-id="383">杭州</p>
                <p data-id="153">鹤壁</p>
                <p data-id="104">河池</p>
                <p data-id="36">合肥</p>
                <p data-id="170">鹤岗</p>
                <p data-id="358">和田</p>
                <p data-id="81">河源</p>
                <p data-id="288">菏泽</p>
                <p data-id="105">贺州</p>
                <p data-id="171">黑河</p>
                <p data-id="143">衡水</p>
                <p data-id="201">衡阳</p>
                <p data-id="376">红河</p>
                <p data-id="258">呼和浩特</p>
                <p data-id="252">葫芦岛</p>
                <p data-id="264">呼伦贝尔</p>
                <p data-id="384">湖州</p>
                <p data-id="224">淮安</p>
                <p data-id="42">淮北</p>
                <p data-id="202">怀化</p>
                <p data-id="43">淮南</p>
                <p data-id="183">黄冈</p>
                <p data-id="281">黄南</p>
                <p data-id="44">黄山</p>
                <p data-id="184">黄石</p>
                <p data-id="82">惠州</p>
            </div>
            <div class="word_box">
                <a name="J"><span class="fixed"></span><h4 class="word">J</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="236">吉安</p>
                <p data-id="212">吉林</p>
                <p data-id="283">济南</p>
                <p data-id="289">济宁</p>
                <p data-id="172">鸡西</p>
                <p data-id="154">济源</p>
                <p data-id="173">佳木斯</p>
                <p data-id="385">嘉兴</p>
                <p data-id="66">嘉峪关</p>
                <p data-id="83">江门</p>
                <p data-id="155">焦作</p>
                <p data-id="84">揭阳</p>
                <p data-id="67">金昌</p>
                <p data-id="303">晋城</p>
                <p data-id="386">金华</p>
                <p data-id="304">晋中</p>
                <p data-id="253">锦州</p>
                <p data-id="237">景德镇</p>
                <p data-id="185">荆门</p>
                <p data-id="186">荆州</p>
                <p data-id="238">九江</p>
                <p data-id="68">酒泉</p>
            </div>
            <div class="word_box">
                <a name="K"><span class="fixed"></span><h4 class="word">K</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="359">喀什</p>
                <p data-id="151">开封</p>
                <p data-id="360">克拉玛依</p>
                <p data-id="361">克孜勒苏</p>
                <p data-id="367">昆明</p>
            </div>
            <div class="word_box">
                <a name="L"><span class="fixed"></span><h4 class="word">L</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="344">拉萨</p>
                <p data-id="106">来宾</p>
                <p data-id="290">莱芜</p>
                <p data-id="62">兰州</p>
                <p data-id="144">廊坊</p>
                <p data-id="128">乐东</p>
                <p data-id="331">乐山</p>
                <p data-id="370">丽江</p>
                <p data-id="387">丽水</p>
                <p data-id="225">连云港</p>
                <p data-id="332">凉山</p>
                <p data-id="291">聊城</p>
                <p data-id="254">辽阳</p>
                <p data-id="199">辽源</p>
                <p data-id="377">临沧</p>
                <p data-id="305">临汾</p>
                <p data-id="215">临高县</p>
                <p data-id="69">临夏</p>
                <p data-id="130">陵水</p>
                <p data-id="292">临沂</p>
                <p data-id="347">林芝</p>
                <p data-id="114">六盘水</p>
                <p data-id="107">柳州</p>
                <p data-id="70">陇南</p>
                <p data-id="54">龙岩</p>
                <p data-id="203">娄底</p>
                <p data-id="45">六安</p>
                <p data-id="342">泸州</p>
                <p data-id="165">漯河</p>
                <p data-id="150">洛阳</p>
                <p data-id="306">吕梁</p>
            </div>
            <div class="word_box">
                <a name="M"><span class="fixed"></span><h4 class="word">M</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="46">马鞍山</p>
                <p data-id="85">茂名</p>
                <p data-id="333">眉山</p>
                <p data-id="86">梅州</p>
                <p data-id="323">绵阳</p>
                <p data-id="174">牡丹江</p>
            </div>
            <div class="word_box">
                <a name="N"><span class="fixed"></span><h4 class="word">N</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="348">那曲</p>
                <p data-id="233">南昌</p>
                <p data-id="334">南充</p>
                <p data-id="219">南京</p>
                <p data-id="97">南宁</p>
                <p data-id="55">南平</p>
                <p data-id="226">南通</p>
                <p data-id="156">南阳</p>
                <p data-id="335">内江</p>
                <p data-id="388">宁波</p>
                <p data-id="56">宁德</p>
                <p data-id="368">怒江</p>
            </div>
            <div class="word_box">
                <a name="P"><span class="fixed"></span><h4 class="word">P</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="255">盘锦</p>
                <p data-id="336">攀枝花</p>
                <p data-id="157">平顶山</p>
                <p data-id="71">平凉</p>
                <p data-id="239">萍乡</p>
                <p data-id="369">普洱</p>
                <p data-id="57">莆田</p>
                <p data-id="166">濮阳</p>
            </div>
            <div class="word_box">
                <a name="Q"><span class="fixed"></span><h4 class="word">Q</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="176">齐齐哈尔</p>
                <p data-id="175">七台河</p>
                <p data-id="115">黔东南</p>
                <p data-id="187">潜江</p>
                <p data-id="116">黔南</p>
                <p data-id="117">黔西南</p>
                <p data-id="145">秦皇岛</p>
                <p data-id="108">钦州</p>
                <p data-id="284">青岛</p>
                <p data-id="72">庆阳</p>
                <p data-id="87">清远</p>
                <p data-id="131">琼海</p>
                <p data-id="132">琼中</p>
                <p data-id="378">曲靖</p>
                <p data-id="393">衢州</p>
                <p data-id="58">泉州</p>
            </div>
            <div class="word_box">
                <a name="R"><span class="fixed"></span><h4 class="word">R</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="349">日喀则</p>
                <p data-id="293">日照</p>
            </div>
            <div class="word_box">
                <a name="S"><span class="fixed"></span><h4 class="word">S</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="158">三门峡</p>
                <p data-id="59">三明</p>
                <p data-id="121">三亚</p>
                <p data-id="350">山南</p>
                <p data-id="88">汕头</p>
                <p data-id="89">汕尾</p>
                <p data-id="321">上海</p>
                <p data-id="315">商洛</p>
                <p data-id="159">商丘</p>
                <p data-id="240">上饶</p>
                <p data-id="90">韶关</p>
                <p data-id="389">绍兴</p>
                <p data-id="204">邵阳</p>
                <p data-id="188">神农架林区</p>
                <p data-id="244">沈阳</p>
                <p data-id="77">深圳</p>
                <p data-id="362">石河子</p>
                <p data-id="138">石家庄</p>
                <p data-id="189">十堰</p>
                <p data-id="272">石嘴山</p>
                <p data-id="177">双鸭山</p>
                <p data-id="307">朔州</p>
                <p data-id="216">四平</p>
                <p data-id="217">松原</p>
                <p data-id="227">宿迁</p>
                <p data-id="221">苏州</p>
                <p data-id="47">宿州</p>
                <p data-id="178">绥化</p>
                <p data-id="337">遂宁</p>
                <p data-id="190">随州</p>
            </div>
            <div class="word_box">
                <a name="T"><span class="fixed"></span><h4 class="word">T</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="294">泰安</p>
                <p data-id="397">台湾</p>
                <p data-id="300">太原</p>
                <p data-id="390">台州</p>
                <p data-id="228">泰州</p>
                <p data-id="146">唐山</p>
                <p data-id="343">天津</p>
                <p data-id="191">天门</p>
                <p data-id="73">天水</p>
                <p data-id="256">铁岭</p>
                <p data-id="316">铜川</p>
                <p data-id="218">通化</p>
                <p data-id="265">通辽</p>
                <p data-id="48">铜陵</p>
                <p data-id="118">铜仁</p>
                <p data-id="364">吐鲁番</p>
                <p data-id="363">图木舒克</p>
                <p data-id="133">屯昌县</p>
            </div>
            <div class="word_box">
                <a name="W"><span class="fixed"></span><h4 class="word">W</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="134">万宁</p>
                <p data-id="296">潍坊</p>
                <p data-id="295">威海</p>
                <p data-id="317">渭南</p>
                <p data-id="135">文昌</p>
                <p data-id="379">文山</p>
                <p data-id="391">温州</p>
                <p data-id="266">乌海</p>
                <p data-id="180">武汉</p>
                <p data-id="49">芜湖</p>
                <p data-id="365">五家渠</p>
                <p data-id="267">乌兰察布市</p>
                <p data-id="351">乌鲁木齐</p>
                <p data-id="74">武威</p>
                <p data-id="222">无锡</p>
                <p data-id="136">五指山</p>
                <p data-id="273">吴忠</p>
                <p data-id="109">梧州</p>
            </div>
            <div class="word_box">
                <a name="X"><span class="fixed"></span><h4 class="word">X</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="311">西安</p>
                <p data-id="268">锡林郭勒盟</p>
                <p data-id="275">西宁</p>
                <p data-id="380">西双版纳</p>
                <p data-id="60">厦门</p>
                <p data-id="192">咸宁</p>
                <p data-id="181">仙桃</p>
                <p data-id="318">咸阳</p>
                <p data-id="395">香港</p>
                <p data-id="205">湘潭</p>
                <p data-id="206">湘西</p>
                <p data-id="193">襄阳</p>
                <p data-id="194">孝感</p>
                <p data-id="160">新乡</p>
                <p data-id="161">信阳</p>
                <p data-id="147">邢台</p>
                <p data-id="241">新余</p>
                <p data-id="269">兴安盟</p>
                <p data-id="372">雄楚</p>
                <p data-id="162">许昌</p>
                <p data-id="229">徐州</p>
                <p data-id="50">宣城</p>
            </div>
            <div class="word_box">
                <a name="Y"><span class="fixed"></span><h4 class="word">Y</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="338">雅安</p>
                <p data-id="319">延安</p>
                <p data-id="219">延边</p>
                <p data-id="230">盐城</p>
                <p data-id="297">烟台</p>
                <p data-id="91">阳江</p>
                <p data-id="309">阳泉</p>
                <p data-id="231">扬州</p>
                <p data-id="339">宜宾</p>
                <p data-id="195">宜昌</p>
                <p data-id="242">宜春</p>
                <p data-id="179">伊春</p>
                <p data-id="366">伊犁</p>
                <p data-id="207">益阳</p>
                <p data-id="308">沂州</p>
                <p data-id="270">银川</p>
                <p data-id="243">鹰潭</p>
                <p data-id="257">营口</p>
                <p data-id="208">永州</p>
                <p data-id="110">玉林</p>
                <p data-id="320">榆林</p>
                <p data-id="282">玉树</p>
                <p data-id="381">玉溪</p>
                <p data-id="92">云浮</p>
                <p data-id="209">岳阳</p>
                <p data-id="310">运城</p>
            </div>
            <div class="word_box">
                <a name="Z"><span class="fixed"></span><h4 class="word">Z</h4></a>
            </div>
            <div class="all_city_name">
                <p data-id="93">湛江</p>
                <p data-id="298">枣庄</p>
                <p data-id="198">张家界</p>
                <p data-id="148">张家口</p>
                <p data-id="61">漳州</p>
                <p data-id="75">张掖</p>
                <p data-id="94">肇庆</p>
                <p data-id="382">昭通</p>
                <p data-id="248">朝阳</p>
                <p data-id="232">镇江</p>
                <p data-id="149">郑州</p>
                <p data-id="95">中山</p>
                <p data-id="274">中卫</p>
                <p data-id="210">株洲</p>
                <p data-id="163">周口</p>
                <p data-id="392">舟山</p>
                <p data-id="96">珠海</p>
                <p data-id="164">驻马店</p>
                <p data-id="299">淄博</p>
                <p data-id="341">自贡</p>
                <p data-id="340">资阳</p>
                <p data-id="119">遵义</p>
            </div>
        </div>
    </div>
    <div class="word_nav">
        <ul>
            <li><a href="#A">A</a></li>
            <li><a href="#B">B</a></li>
            <li><a href="#C">C</a></li>
            <li><a href="#D">D</a></li>
            <li><a href="#E">E</a></li>
            <li><a href="#F">F</a></li>
            <li><a href="#G">G</a></li>
            <li><a href="#H">H</a></li>
            <li><a href="#J">J</a></li>
            <li><a href="#K">K</a></li>
            <li><a href="#L">L</a></li>
            <li><a href="#M">M</a></li>
            <li><a href="#N">N</a></li>
            <li><a href="#P">P</a></li>
            <li><a href="#Q">Q</a></li>
            <li><a href="#R">R</a></li>
            <li><a href="#S">S</a></li>
            <li><a href="#T">T</a></li>
            <li><a href="#W">W</a></li>
            <li><a href="#X">X</a></li>
            <li><a href="#Y">Y</a></li>
            <li><a href="#Z">Z</a></li>
        </ul>
    </div>
    <div class="word_alert_box" style="display: none">
        <div class="box"></div>
    </div>
</div>
        <div class="nav-screen">
            <ul>
              <!--   <li class="businessType" data-value="0"><span>所有大洲</span><i class="fa fa-angle-down"></i></li>
                <li class="sortType" data-value="0"><span>汉语水平</span><i class="fa fa-angle-down"></i></li>
                <li class="soType" data-value="0"><span>粉丝数量</span><i class="fa fa-angle-down"></i></li>
 -->
                 
                 <li class="allType" data-value="0"><span>全部分类</span><i class="fa fa-angle-down"></i></li>
                 <li class="orderType" data-value="1"><span>排序规则</span><i class="fa fa-angle-down"></i></li>
                <li class="activeType" data-value="2"><span>活动状态</span><i class="fa fa-angle-down"></i></li>

            </ul>
        </div>
        <div class="dropdown-wrapper">
            <div class="shade"></div>
            <div class="dropdown-scroller">
                <ul class="scroller-inner">
         <!--            <li class="business-wrapper">
                        <ul class="dropdown-list business-list">
                            <li data-type="businessType" id="businessType0" data-value="0" class="active"><span>所有大洲</span><i class="fa fa-check"></i></li>
                            <li data-type="businessType" id="businessType1" data-value="1"><span>亚洲</span><i class="fa fa-check"></i></li>
                            <li data-type="businessType" id="businessType2" data-value="2"><span>欧洲</span><i class="fa fa-check"></i></li>
                            <li data-type="businessType" id="businessType3" data-value="3"><span>非洲</span><i class="fa fa-check"></i></li>
                            <li data-type="businessType" id="businessType4" data-value="4"><span>大洋洲</span><i class="fa fa-check"></i></li>
                            <li data-type="businessType" id="businessType5" data-value="5"><span>美洲</span><i class="fa fa-check"></i></li>

                        </ul>
                    </li>

                 
                    
                    <li class="sort-wrapper">
                        <ul class="dropdown-list">
                            <li data-type="sortType" id="sortType0" data-value="0" class="active"><span>汉语水平</span><i class="fa fa-check"></i></li>
                            <li data-type="sortType" id="sortType1" data-value="1"><span>Less Class 4</span><i class="fa fa-check"></i></li>
                            <li data-type="sortType" id="sortType2" data-value="2"><span>Class 5</span><i class="fa fa-check"></i></li>
                            <li data-type="sortType" id="sortType3" data-value="3"><span>Class 6 +</span><i class="fa fa-check"></i></li>
                        </ul>
                    </li>
                    <li class="sort-wrapper">
                        <ul class="dropdown-list">
                            <li data-type="soType" id="soType0" data-value="0" class="active"><span>粉丝数量</span><i class="fa fa-check"></i></li>
                            <li data-type="soType" id="soType1" data-value="1"><span>Less 5k</span><i class="fa fa-check"></i></li>
                            <li data-type="soType" id="soType2" data-value="2"><span>5k-1W</span><i class="fa fa-check"></i></li>
                        </ul>
                    </li> -->
                      <li class="sort-wrapper">
                        <ul class="dropdown-list">
                            <li data-type="allType" id="allType0" data-value="0" class="active"><span>全部分类</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType1" data-value="1"><span>时尚与服饰</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType2" data-value="2"><span>社交</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType3" data-value="3"><span>职场</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType4" data-value="4"><span>读书会友</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType5" data-value="5"><span>语言与文化交流</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType6" data-value="6"><span>音乐</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType7" data-value="7"><span>电影</span><i class="fa fa-check"></i></li>
                            <li data-type="allType" id="allType8" data-value="8"><span>科技与游戏</span><i class="fa fa-check"></i></li>
                         <li data-type="allType" id="allType9" data-value="9"><span>运动健身</span><i class="fa fa-check"></i></li>
                        </ul>
                    </li>


                      <li class="sort-wrapper">
                        <ul class="dropdown-list">
                            <li data-type="orderType" id="orderType0" data-value="0" class="active"><span>排序规则</span><i class="fa fa-check"></i></li>
                            <li data-type="orderType" id="orderType1" data-value="1"><span>最多浏览</span><i class="fa fa-check"></i></li>
                            <li data-type="orderType" id="orderType2" data-value="2"><span>最新发布</span><i class="fa fa-check"></i></li>
                        </ul>
                    </li>
                             <li class="sort-wrapper">
                        <ul class="dropdown-list">
                            <li data-type="activeType" id="activeType0" data-value="0" class="active"><span>活动状态</span><i class="fa fa-check"></i></li>
                            <li data-type="activeType" id="activeType1" data-value="1"><span>募集中</span><i class="fa fa-check"></i></li>
                            <li data-type="activeType" id="activeType2" data-value="2"><span>已结束</span><i class="fa fa-check"></i></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="main">
        	<ul>
				<?php foreach ($res as $key => $value):
                    $userinfo = get_userinfo_by_uid($value['uid']);

                ?>                   
                <li> 
                    <a href="/main/student_detail/<?php echo $value['uid'];?>" class="to-detail">  
                         
                        <div class="publisher"><img src="<?php echo strstr($userinfo['icon'],'http') ? $userinfo['icon'] : $this->api_url.$userinfo['icon'];?>">
                            <span><?php echo $userinfo['nickname'];?></span>
                        </div> 
                    </a>  
                    <a href="/main/info_detail/<?php echo $value['id'];?>" class="to-detail"> 
                        <div class="ad_pic error">    
                            <img class="lazy" src="<?php echo strstr($value['image'],$url) ? $value['image'] : $url.$value['image'];?>" data-original="<?php echo $value['image'];?>" alt="" style="display: block;">     
                            <span class="<?php if( $value['status'] == 1 ):?>wait<?php elseif( $value['status'] == 2 ):?>ing<?php else:?>end<?php endif;?> clear"><i></i><?php echo get_info_status($value['status']);?></span>  
                        </div>
                    </a>  
                    <a href="/main/info_detail/<?php echo $value['id'];?>" class="to-detail">     
                        <div class="title">
                            <p><?php echo $value['title'];?></p>
                        </div>     
                        <div class="ad_info clear">         
                            <span>活动时间:<?php echo $value['start_time'];?></span>       
                            <span>活动地点:<?php echo $value['address'];?></span> 
                            <!-- <?php var_dump($value);?>          -->
                            <span>活动人数:<?php echo $value['join_count']?$value['join_count'].'/'.$value['need_num']:'0'.'/'.$value['need_num'];?>人</span>         
                            <span>报名费用:<?php echo $value['single_price']?$value['single_price']:0;?>元/人</span>     
                        </div>  
                    </a>                
                </li>
        		<?php endforeach;?>
			</ul>
        <?php if( count($res) > 10 ):?>
        <p class="getmore"><i class="fa fa-spinner fa-pulse fa-fw margin-bottom" style="padding:0"></i>Loading</p>
        <?php endif;?>
        </div>

        <div id="loadactivity" style="display: none;"><i class="fa fa-spinner fa-pulse fa-fw margin-bottom" style="padding:0"></i>Loading...</div>
        <div class="bottom_div"></div>
        <input type="hidden" id="page" value="2">
        <form action="" method='get' id='shaixuan1'>
            <input type="hidden" name='dazhou' id='dazhou' value=''>
            <input type="hidden" name='paixu' id='paixu' value=''>
            <input type="hidden" name='leixing' id='leixing' value=''>
            <input type="hidden" name='zhuangtai' id='zhuangtai' value=''>
           
            <!-- <input type="text"> -->
        </form>

          <form action="" method='get' id='shaixuan2'>
           
            <input type="hidden" name='hanyu' id='hanyu' value=''>
       

        </form>


        <form action="" method='get' id='shaixuan3'>
          
            <input type="hidden" name='fensi' id='fensi' value=''>

        </form>

    </div>

<script>
//切换操作
$(".nav-screen li").on("click", function(){
    
    if($(this).hasClass('active')){
        $('.scroller-inner>li').slideUp('fast');
        $(".dropdown-wrapper").hide();
        $(this).removeClass('active');
    }else{
        $(".dropdown-wrapper").show();

        $(this).addClass('active').siblings().removeClass('active');
        $('.scroller-inner>li').slideUp('fast');
        $('.scroller-inner>li').eq($(this).index()).slideDown('fast');
    }
});
//选择操作
$(".dropdown-list li").click(function(res){
    $(this).addClass('active').siblings().removeClass('active');
    
    $(".dropdown-wrapper").hide();
    $('.scroller-inner>li').slideUp('fast');
    $('.nav-screen li').removeClass('active');
    
    var type = $(this).attr('data-type');
    var value= $(this).attr('data-value');
    var txt  = $(this).find('span').text();
    $("."+type).find('span').text(txt);
    $("."+type).attr('data-value',value);
    // setCookie(type,value,3600);
    //修改数据操作
    // getResource();
    var businessType=['亚洲','欧洲','非洲','大洋洲','美洲'];
    var sortType=['Less Class 4','Class 5','5k-1W'];
    var soType=['Less 5k','5k-1W'];
    var orderType=['view','ctime'];
    var activeType=['','1','0'];
    var val='action=get_event_list';

       if(type=='orderType'){
        var  orderby=orderType[value-1];
        val+='&orderby='+orderby;
        $('#paixu').val(orderby)
        var status=$('#zhuangtai').val();
       var leixing=$('#leixing').val();

        if(status){
            val+='&status='+status;
        }
        if(leixing){
           val+='$category='+leixing
        }

    }else if(type=='activeType'){
        var  status=activeType[value];

        val+='&status='+status;
        $('#zhuangtai').val(status)
        var orderby=$('#paixu').val();
         var leixing=$('#leixing').val();


        if(orderby){
            val+='&orderby='+orderby;
        }
        if(leixing){
           val+='$category='+leixing
        }


    }else if(type=='allType'){
        value=value==0?"":value;
         val+='&category='+value;
          $('#leixing').val(value)
            var orderby=$('#paixu').val();
              var status=$('#zhuangtai').val();
              if(orderby){
            val+='&orderby='+orderby;
        } 
         if(orderby){
            val+='&orderby='+orderby;
        }


    }
    // if(type=='businessType'){
    //     var  dazhou=businessType[value-1];
    //     val+='&dazhou='+dazhou;
    //     $('#dazhou').val(dazhou)
    //     var hanyu=$('#hanyu').val();
    //     var fensi=$('#fensi').val();

    //     if(hanyu){
    //         val+='&hanyu='+hanyu;
    //     }
    //     if(fensi){
    //          val+='&fensi'+fensi;
    //     }



    //     // $('#shaixuan1').submit()
    // }else if(type=='sortType'){
    //     var hanyu=sortType[value-1];
    //     val+='&hanyu='+hanyu;
    //     $('#hanyu').val(hanyu)
    //      var dazhou=$('#dazhou').val();
    //     var fensi=$('#fensi').val();
    //       if(dazhou){
    //         val+='&dazhou='+dazhou;
    //     }
    //     if(fensi){
    //          val+='&fensi'+fensi;
    //     }

    //     // $('#shaixuan2').submit()
    // }else if(type=='soType'){
    //     var fensi=soType[value-1];
    //     val+='&fensi'+fensi;
    //     $('#fensi').val(fensi)

    //       var dazhou=$('#dazhou').val();
    //     var hanyu=$('#hanyu').val();
    //       if(dazhou){
    //         val+='&dazhou='+dazhou;
    //     }
    //     if(hanyu){
    //          val+='&hanyu'+hanyu;
    //     }
    //     // $('#shaixuan3').submit()
    // }
    $.ajax({
        url:'/api/event',
        data:val,
        method:'GET',
        success:function(data){
            console.log(data)
             res=JSON.parse(data);
            var len=res.data;
            if(len){
            len=len.length;
            console.log(len)
            var str='';
            var status='';
            for(var i=0;i<len;i++){
                var info=res.data[i];
                if(info.join_count){
                    var join_count=info.join_count
                }else{
                     var join_count=0
                }
                info.single_price=info.single_price?info.single_price:0
                str+='<li><a href="/main/student_detail/'+info.uid+'" class="to-detail"><div class="publisher">';

                if(info.userinfo.icon){
                    str+='<img src="'+info.userinfo.icon+'"><span>'+info.userinfo.nickname+'</span> ';
                }
                str+='</div></a><a href="/main/info_detail/'+info.id+'" class="to-detail"><div class="ad_pic error"><img class="lazy" src="'+info.image+'" data-original="" alt="" style="display: block;"><span class="';
                if(info.status==1){
                    str+='wait';
                    status='募集中';
                }else if(info.status==2){
                    str+='ing'
                    status='进行中';
                }else{
                    str+='end'
                    status='已结束';
                }

                str+=' clear"><i></i>'+status+'</span></div></a><a href="/main/info_detail/'+info.id+'" class="to-detail"><div class="title"> <p>'+info.title+'</p></div><div class="ad_info clear"><span>活动时间:'+info.start_time+'</span><span>活动地点:'+info.address+'</span><span>活动人数:'+join_count+'/'+info.need_num+'人</span><span>报名费用:'+info.single_price+'元/人</span></div></a></li>';



            }


            $('.main ul').html(str)
        }else{
             $('.main ul').html('<li style="height:1rem;line-height:1rem;text-align:center">没有找到相关内容</li>')
        }



        }
    })

    




})
//关闭选择框
$(".dropdown-wrapper .shade").click(function(){
    $('.scroller-inner>li').slideUp('fast');
    $(".dropdown-wrapper").hide();
    $('.nav-screen li').removeClass('active');
})
</script>

<?php $this->load->view('bottom');?>

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
$('.position-wrap [data-id]').click(function(e){

        var strt=$(this).html();
        
        var id=$(this).attr('data-id');
        $('#city-index').attr('data-id',id).html(strt);
                 $.ajax({
        url:'/api/event',
        data:{city:id,action:'get_event_list'},
        method:'GET',
        success:function(data){
            console.log(data)
             res=JSON.parse(data);
            var len=res.data;
            if(len){
            len=len.length;
            console.log(len)
            var str='';
            for(var i=0;i<len;i++){
                var info=res.data[i];
                if(info.join_count){
                    var join_count=info.join_count
                }else{
                     var join_count=0
                }
                info.single_price=info.single_price?info.single_price:0;
                str+='<li><a href="/main/user_detail/'+info.uid+'" class="to-detail">';

                if(info.icon){
                    str+='<div class="publisher"><img src="'+info.icon+'"><span>'+info.nickname+'</span> ';
                }
                str+='</div></a><a href="/main/info_detail/'+info.id+'" class="to-detail"><div class="ad_pic error"><img class="lazy" src="'+info.image+'" data-original="" alt="" style="display: block;"><span class="';
                if(info.status==1){
                    str+='wait';
                    status='募集中';
                }else if(info.status==2){
                    str+='ing'
                    status='进行中';
                }else{
                    str+='end'
                    status='已结束';
                }

                str+=' clear"><i></i>'+status+'</span></div></a><a href="/main/info_detail/'+info.id+'" class="to-detail"><div class="title"> <p>'+info.title+'</p></div><div class="ad_info clear"><span>活动时间:'+info.start_time+'</span><span>活动地点:'+info.address+'</span><span>活动人数:'+join_count+'/'+info.need_num+'人</span><span>报名费用:'+info.single_price+'元/人</span></div></a></li>';




            }


            $('.main ul').html(str)
            $('.position-wrap').hide();
            $('.main').show();
        }else{
             $('.main ul').html('<li style="height:1rem;line-height:1rem;text-align:center">没有找到相关内容</li>')
            $('.position-wrap').hide();
            $('.main').show();
        }


        }
    })



        return false;
});
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