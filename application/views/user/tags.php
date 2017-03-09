<?php $this->load->view("header");?>
<link rel="stylesheet" href="/statics/css/cell.css">
	<link rel="stylesheet" href="/statics/css/tags.css"></head>
	
	




<body style="font-size: 12px;">
	<div id="container">
		<div class="tags-wrap">
			<div class="header">
				<a class="goback" href="javascript:history.go(-1)"><p></p></a>
				<p class="header_title">My Tags</p>
				<div class="menu"><span class="save-info">Save</span></div>
			</div>
            <input type="hidden" id="user_id" value="<?php echo $_SESSION['uid'];?>"/>
			<!-- 选中的标签 -->
			<div class="tagson clear">
            	<?php $my_tag = json_decode($res['tags'],true);?>
				<p class="tit">Set your label to make you different（<span class="check_num"><?php echo count($my_tag);?></span>/8）</p>
				<ul class="clear">
					<?php foreach( $my_tag as $key => $value ):?>
						<li data-id="<?php echo $value;?>"><?php echo get_tags($value);?><i class="close_icon fa fa-remove"></i></li>
					<?php endforeach;?>
				</ul>
                <?php $tags = get_tags('-1');?>           
				<p class="addtag"><i class="add_icon fa fa-plus"></i>add tag</p>
				<input type="hidden" id="tagval" value="<?php echo implode(',',$my_tag);?>">
			</div>
			<!-- 标签分类 -->
			<div class="tagsort" style="display: none;">
				<div class="tagsort_title">
					<div class="clear" style="height:1px;"></div>
					<div class="sort_tit clear">
						<p class="type1">Add own tags, more able to impress advertisers!</p>
					</div>
				</div>

				<ul class="sort_type sort1 clear">
                	<?php for( $i = 1; $i< 9; $i++ ):?>
					<li data-id='<?php echo $i;?>'><?php echo $tags[$i];?></li>
                    <?php endfor;?>
				</ul>
				<ul class="sort_type sort2 clear">
                	<?php for( $i = 9; $i< count($tags); $i++ ):?>
					<li data-id='<?php echo $i;?>'><?php echo $tags[$i];?></li>
                    <?php endfor;?>					
				</ul>
				
			</div>

		</div>
	</div>


	<script type="text/javascript">
		// 点击添加按钮
		$('.addtag').click(function(){
			$('.tagsort').slideToggle(200);
		})


		// 点击添加标签
		$('.sort_type li').click(function(){
			var value = $('#tagval').val();
			var tags_word = $(this).attr('data-id');
			var tag_text = $(this).text();
		
			if(value.indexOf(tags_word) > -1){
				notice('The tag you added already exists!');
			}else{
				if(value == ''){
					value = value + tags_word;
				}else{
					value = value +','+tags_word;
				}
				
				var html = '<li>'+tag_text+'<i class="close_icon fa fa-remove"></i></li>';
				// 改变标签个数
				var check_length = $('.tagson ul li').length+1;
				if(check_length>8){
					notice('You can select up to 8 tags');
					return false;
				}else{
					$('.check_num').text(check_length);
					$('.tagson ul').append(html);
					$('#tagval').val(value);
				}
				
				
			}
		})

		//删除标签
		$(document).on('click','.close_icon',function(){
			var del_word = $(this).parent().attr('data-id');
			var value = $('#tagval').val();
			value = value.replace(','+del_word,'');
			value = value.replace(del_word,'');
			// 去掉value里的逗号
			
			var val_length = value.length;
			if(value.substring(0,1) == ','){
				value = value.substring(1,val_length);
			}
			$(this).parent().remove();
			$('#tagval').val(value);

			// 改变标签个数
			var check_length = $('.tagson ul li').length;
			$('.check_num').text(check_length);
		})

		// 保存按钮
		$('.save-info').click(function(){
			var value = $('#tagval').val();
			var api_url = $('#api_url').val()+'/api/add_tag';
			var uid = $('#user_id').val();
				
			$.post(api_url,{ tag_id:value,action:'add_tags',uid:uid },function(res)
			{
				res = eval('(' + res + ')');
				if(res.status==1){
					tusi('Saved successfully');
					//window.location.href="/user";
				}else{
					notice('Save failed');
				}
			})
		})

	</script>

	<!-- 底部================================================== -->

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
</script><div id="back_icon" style="display:none" ;=""></div>
 

<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<!-- <div id="back_icon" style="display:none"></div> -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

<?php $this->load->view("footer");?>