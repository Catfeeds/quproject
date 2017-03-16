<?php $this->load->view('header');?>
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<link rel="stylesheet" href="/statics/css/cell.css">
<link rel="stylesheet" href="/statics/css/example.css">
<link rel="stylesheet" href="/statics/css/weui.css">
<script src="/statics/js/iscroll-zoom.js">
</script><script src="/statics/js/hammer.js"></script>
<script src="/statics/js/jquery.photoClip.js"></script>

<body style="font-size: 24px;">
<input type="hidden" id="api_url" value="<?php echo $this->api_url;?>"/>
<input type="hidden" id="user_id" value="<?php echo $_SESSION['uid'];?>"/>
	<div class="wrap">
				<div class="container" id="container"></div>
		
		<script type="text/html" id="tpl_home">
		
			<div class="header">
				<a class="goback" href="javascript:history.go(-1)"><p></p></a>
				<p class="header_title">edit information</p>
				<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
			</div>
			<div class="headerfull"></div>

		
			<div class="control">
				
				<a class="control_headimgurl" href="#/headimgurl">
					<div class="control_headimgurl_primary">
						<p>Avatar</p>
					</div>
					<div class="control_headimgurl_ft2" id="headimgsrc"><span style="float:left;height:1.5rem;line-height:1.5rem;color:#ccc;">upload your picture</span></div>
					<div class="control_headimgurl_ft iconsrcarea" id="headimgsrc"><img src="<?php echo strstr($res['icon'],'http:') ? $res['icon'] : $this->api_url.$res['icon'];?>"></div>
				</a>
				<a class="control_text" href="#/realname">
					<div class="control_text_primary">
						<p>Name</p>
					</div>
					<div class="control_text_ft" id="realnametxt"><?php echo $res['nickname'];?></div>
				</a>
				<a class="control_text" href="#/sex">
					<div class="control_text_primary">
						<p>gender</p>
					</div>
					<div class="control_text_ft" id="sextxt"><?php echo $res['sex'] == 1 ? 'male' : 'Female';?></div>
				</a>
				<a class="control_text" href="#/birthday">
					<div class="control_text_primary">
						<p>birthday</p>
					</div>
					<div class="control_text_ft" id="birthdaytxt"><?php echo ymd($res['birthday']);?></div>
				</a>

				<a class="control_text" href="#/continent">
					<div class="control_text_primary">
						<p>Continent</p>
					</div>
					<div class="control_text_ft" id="continent"><?php echo get_dazhou($res['dazhou']);?></div>	
				</a>
				<a class="control_text" href="#/country">
					<div class="control_text_primary">
						<p>country</p>
					</div>
					<div class="control_text_ft" id="countryT"><?php echo $res['country'];?></div>	
				</a>
				
				<a class="control_text" href="#/city">
					<div class="control_text_primary">
						<p>In the Chinese city</p>
					</div>
					<div class="control_text_ft" id="cityT"><?php echo $res['city'];?></div>	
				</a>
				

					<a class="control_headimgurl" href="#/studentIdentity">
					<div class="control_headimgurl_primary">
						<p>Student ID photo</p>
					</div>
					<div class="control_headimgurl_ft2" id="studentIdentitysrc1"><span style="float:left;height:1.5rem;line-height:1.5rem;color:#ccc;">upload your picture</span></div>
					<div class="control_headimgurl_ft xushengzhengsrcarea" id="studentIdentitysrc2"><img src="<?php echo $res['xueshengzheng'];?>"></div>
				</a>


					<a class="control_headimgurl" href="#/passport">
					<div class="control_headimgurl_primary">
						<p>Passport photos</p>
					</div>
					<div class="control_headimgurl_ft2" id="passportysrc1"><span style="float:left;height:1.5rem;line-height:1.5rem;color:#ccc;">Passport photos</span></div>
					<div class="control_headimgurl_ft huzhaosrcarea" id="passportsrc2"><img src="<?php echo $res['huzhao'];?>"></div>
				</a>


				<!-- <a class="control_text" href="#/grade">
					<div class="control_text_primary">
						<p>grade</p>
					</div>
					<div class="control_text_ft" id="gradeT"><?php echo $res['grade'];?></div>	
				</a> -->


						<a class="control_text" href="#/yearStay">
					<div class="control_text_primary">
						<p>stay in China for several years</p>
					</div>
					<div class="control_text_ft" id="yearStayT"><?php echo get_stay_china_year($res['stay_china_year']);?></div>	
				</a>



				<a class="control_text" href="#/HSK">
					<div class="control_text_primary">
						<p>HSK level</p>
					</div>
					<div class="control_text_ft" id="HSKT"><?php echo get_hsk_class($res['hsk_class']);?></div>	
				</a>
				
				<a class="control_text" href="#/freeTime">
					<div class="control_text_primary">
						<p>Free time every day</p>
					</div>
					<div class="control_text_ft" id="freeTimeT"><?php echo get_free_time($res['free_time']);?></div>	
				</a>
				
				<?php /****<a class="control_text" href="#/experience">
					<div class="control_text_primary">
						<p>Have a live or experience before</p>
					</div>
					<div class="control_text_ft" id="experienceT"><?php echo $res['if_show_experience'] == 1 ? 'YES' : 'NO';?></div>	
				</a>
				***/
				?>
			</div>

			<div class="control">
				
				
				<a class="control_text first" href="#/platform">
					<div class="control_text_primary">
						<p>platform</p>
					</div>
					<div class="control_text_ft" id="platformtxt"><?php echo get_platform($res['platform']);?></div>
				</a>
				<a class="control_text" href="#/fid">
					<div class="control_text_primary">
						<p>room number</p>
					</div>
					<div class="control_text_ft" id="fidtxt"><?php echo $res['room'];?></div>
				</a>
				<a class="control_text" href="#/fans_s">
					<div class="control_text_primary">
						<p>fans</p>
					</div>
					<div class="control_text_ft" id="fans_stxt"><?php echo get_fans_num($res['fans_num']);?></div>
				</a>
				
			</div>

			<div class="control">

				<!--<a class="control_text first" href="#/area">
					<div class="control_text_primary">
						<p>常驻城市</p>
					</div>
					<div class="control_text_ft" id="areatxt"><?php echo $res['city'];?></div>
				</a>
				-->
				<a class="control_text" href="#/pic">
					<div class="control_text_primary pic_p">
						<p>Album</p>
					</div>
					<div class="control_text_ft" id="pictxt"><span><?php echo $res['photo_num'];?></span>张</div>
				</a>
				<a class="control_text" href="#/signature">
					<div class="control_text_primary">
						<p>Signature</p>
					</div>
					<div class="control_text_ft" id="signaturetxt"><?php echo $res['signature'];?></div><i class="text_i"></i>
				</a>
			</div>

			
		</script>

		<!--修改头像-->
		<script type="text/html" id="tpl_headimgurl">
		
		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Upload avatar</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="headimgurl" style="height: 100%;">	
		
			<div class="head_pic" style="display:block">
				<div>
					<img src="<?php echo strstr($res['icon'],'http:') ? $res['icon'] : $this->api_url.$res['icon'];?>">
				</div>
				<label id="upload_btn" for="headimgurl"><i></i><span>Modify avatar</span></label>
				<input type="file" id="headimgurl" onchange="uploadheadimgurl()">
				<p id="pic_back"><i></i><span>Back</span></p>
			</div>

			<!--加载资源-->
			<div class="pic_box" style="display:none;">
				<div class="resource_lazy hide"></div>
				<div class="pic_edit">
					<div id="clipArea"></div>
					<div class="btn_box">
						<button id="upload2">cancel</button>
				    	<button id="clipBtn">confirm</button>
					</div>
				</div>
				<img src="" fileName="" id="hit" style="display:none;z-index: 9">
				<div id="cover"></div>
			</div>
			
			
			
		</div>
		</script>
		<!--修改头像-->

		<!--修改姓名-->
		<script type="text/html" id="tpl_realname">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Name</p>
			<div class="menu"><span class="save-info">save</span></div>
		</div>
		

		<div class="control_text first">
			<input type="text" placeholder="please enter your name" class="weui_text" name="nickname" id="realname" old-val="<?php echo $res['nickname'];?>" value="<?php echo $res['nickname'];?>">
			<span class="weui_text_clear"><i class="fa fa-times-circle"></i></span>
		</div>

		</script> 
		<!--修改姓名-->

		<!--修改性别-->
		<script type="text/html" id="tpl_sex">s

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">gender</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<label class="weui_cell weui_check_label" for="sex1">
				<div class="weui_cell_bd weui_cell_primary">
					<p>male</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="sex" id="sex1" value="1" <?php if( $res['sex'] == 1 ):?> checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="sex2">

				<div class="weui_cell_bd weui_cell_primary">
					<p>Female</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="sex" id="sex2" value="2" <?php if( $res['sex'] == 2 ):?> checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
		</div>
		</script> 
		<!--修改性别-->
			
			<!--修改大洲-->
		<script type="text/html" id="tpl_continent">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Continent</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<?php $dazhou = get_dazhou('-1');?>
			<?php foreach( $dazhou as $key => $value ):?>
			<label class="weui_cell weui_check_label" for="continent<?php echo $key;?>">
				<div class="weui_cell_bd weui_cell_primary">
					<p><?php echo $value;?></p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check continenttext" name="continent" id="continent<?php echo $key;?>" value="<?php echo $key;?>" <?php if( $res['dazhou'] == $key ):?> checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<?php endforeach;?>			
		</div>
		</script> 
		<!--修改大洲-->		
		
				<!--修改国家-->
		<script type="text/html" id="tpl_country">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">country</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		
	<div class="weui_cells weui_cells_radio">
		<?php $country = get_country(get_dazhou($res['dazhou']));?>
			<?php foreach( $country as $key => $value ):?>
			<label class="weui_cell weui_check_label" for="continent<?php echo $key;?>">
				<div class="weui_cell_bd weui_cell_primary">
					<p><?php echo $value;?></p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check continenttext" name="country" id="country<?php echo $key;?>" value="<?php echo $value;?>" <?php if( $res['country'] == $key ):?> checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<?php endforeach;?>			
		</div>
		<!-- <div class="control_text first">
			<input type="text" placeholder="Please enter your country" class="weui_text" name="country" id="country" old-val="<?php echo $res['country'];?>" value="<?php echo $res['country'];?>">
			<span class="weui_text_clear"><i class="fa fa-times-circle"></i></span>
		</div> -->

		</script> 
		<!--修改国家-->
			
		
		<!--修改城市-->
		<script type="text/html" id="tpl_city">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">City</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		

		<div class="control_text first">
			<input type="text" placeholder="Please enter your city" class="weui_text" name="city" id="city" old-val="<?php echo $res['city'];?>" value="<?php echo $res['city'];?>">
			<span class="weui_text_clear"><i class="fa fa-times-circle"></i></span>
		</div>

		</script> 
		<!--修改城市-->

		
		<!--修改学生证件照-->
		<script type="text/html" id="tpl_studentIdentity">

					<div class="header">
					<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
					<p class="header_title">Upload student documents</p>
					<div class="menu"></div>
				</div>
				<div class="headerfull"></div>

				<div class="headimgurl" style="height: 100%;">	
				
					<div class="head_pic" style="display:block">
						<div>
							<img src="<?php echo strstr($res['xueshengzheng'],'http:') ? $res['xueshengzheng'] : $this->api_url.$res['xueshengzheng'];?>">
						</div>
						<label id="upload_btn" for="studentIdentityimgurl"><i></i><span>Modify student documents</span></label>
						<input type="file" style='display: none' id="studentIdentityimgurl" onchange="uploadstudentIdentityimgurl()">
						<p id="pic_back"><i></i><span>Back</span></p>
					</div>

					<!--加载资源-->
					<div class="pic_box" style="display:none;">
						<div class="resource_lazy hide"></div>
						<div class="pic_edit">
							<div id="clipArea"></div>
							<div class="btn_box">
								<button id="upload2">cancel</button>
						    	<button id="clipBtn">confirm</button>
							</div>
						</div>
						<img src="" fileName="" id="hit" style="display:none;z-index: 9">
						<div id="cover"></div>
					</div>
				</div>			
	

		</script>
		<!--修改学生证件照-->

		<!--修改护照照片-->
		<script type="text/html" id="tpl_passport">
						<div class="header">
					<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
					<p class="header_title">Upload passport photos</p>
					<div class="menu"></div>
				</div>
				<div class="headerfull"></div>

				<div class="headimgurl" style="height: 100%;">	
				
					<div class="head_pic" style="display:block">
						<div>
							<img src="<?php echo strstr($res['huzhao'],'http:') ? $res['huzhao'] : $this->api_url.$res['huzhao'];?>">
						</div>
						<label id="upload_btn" for="passportimgurl"><i></i><span>Modify passport photos</span></label>
						<input type="file" style='display: none' id="passportimgurl" onchange="uploadpassportimgurl()">
						<p id="pic_back"><i></i><span>Back</span></p>
					</div>

					<!--加载资源-->
					<div class="pic_box" style="display:none;">
						<div class="resource_lazy hide"></div>
						<div class="pic_edit">
							<div id="clipArea"></div>
							<div class="btn_box">
								<button id="upload2">cancel</button>
						    	<button id="clipBtn">confirm</button>
							</div>
						</div>
						<img src="" fileName="" id="hit" style="display:none;z-index: 9">
						<div id="cover"></div>
					</div>
				</div>			



		</script>
		<!--修改护照照片-->
		
				<!--修改年级-->
		<script type="text/html" id="tpl_grade">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">grade</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		

		<div class="control_text first">
			<input type="text" placeholder="Please enter your grade" class="weui_text" name="grade" id="grade" old-val="<?php echo $res['grade'];?>" value="<?php echo $res['grade'];?>">
			<span class="weui_text_clear"><i class="fa fa-times-circle"></i></span>
		</div>

		</script> 
		<!--修改年级-->

			<!--修改停留年限-->
		<script type="text/html" id="tpl_yearStay">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Stay time</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<?php $stay_year = get_stay_china_year('-1');?>
			<?php foreach( $stay_year as $key => $value ):?>
			<label class="weui_cell weui_check_label" for="yearStay<?php echo $key;?>">
				<div class="weui_cell_bd weui_cell_primary">
					<p><?php echo $value;?></p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="yearStay" class='yearStayChange' id="yearStay<?php echo $key;?>" value="<?php echo $key;?>" <?php if( $res['stay_china_year']== $key ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<?php endforeach;?>
		</div>
		</script> 
		<!--修改停留年限-->		



		<!--修改HSK等级-->
		<script type="text/html" id="tpl_HSK">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">HSK level</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<?php $hsk = get_hsk_class('-1');?>
			<?php foreach( $hsk as $k => $value ):?>

			<label class="weui_cell weui_check_label" for="HSK<?php echo $k;?>">
				<div class="weui_cell_bd weui_cell_primary">
					<p><?php echo $value;?></p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="HSK" id="HSK<?php echo $k;?>" value="<?php echo $k;?>" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<?php endforeach;?>			
			
		</div>
		</script> 
		<!--修改HSK等级-->		
		

		<!--修改空闲时间-->
		<script type="text/html" id="tpl_freeTime">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Free time every day</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<label class="weui_cell weui_check_label" for="freeTime1">
				<div class="weui_cell_bd weui_cell_primary">
					<p>One hour and less</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="freeTime" id="freeTime1" value="1" <?php if( $res['free_time']==1 ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>

			<label class="weui_cell weui_check_label" for="freeTime2">
				<div class="weui_cell_bd weui_cell_primary">
					<p>2 hours</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="freeTime" id="freeTime2" value="2" <?php if( $res['free_time']==2 ):?>checked="checked"<?php endif;?> >
					<span class="weui_icon_checked"></span>
				</div>
			</label>

			<label class="weui_cell weui_check_label" for="freeTime3">
				<div class="weui_cell_bd weui_cell_primary">
					<p>3 hours and above</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="HfreeTime" id="freeTime3" value="3" <?php if( $res['free_time']==3 ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			
		</div>
		</script> 
		<!--修改空闲时间-->		

			<!--修改空闲时间-->
		<script type="text/html" id="tpl_experience">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Free time every day</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<label class="weui_cell weui_check_label" for="experience1">
				<div class="weui_cell_bd weui_cell_primary">
					<p>Yes</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="experience" id="experience1" value="1" <?php if( $res['free_time']==1 ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>

			<label class="weui_cell weui_check_label" for="experience2">
				<div class="weui_cell_bd weui_cell_primary">
					<p>No</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="experience" id="experience2" value="2" <?php if( $res['free_time']==2 ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			
		</div>
		</script> 
		<!--修改空闲时间-->		



		

		<!--修改生日-->
		<script type="text/html" id="tpl_birthday">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">birthday</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		

		<div class="control_text first">
			<input type="date" class="weui_text" name="birthday" id="birthday" value="<?php echo $res['birthday'];?>" style="background:none;">
			<span class="weui_text_clear"></span>
		</div>
		
		</script> 
		<!--修改生日-->

		<!--修改平台-->
		<script type="text/html" id="tpl_platform">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Live platform</p>
			<div class="menu"></div>
		</div>
		<div class="headerfull"></div>
		<?php $platform = get_platform('-1');?>
		<div class="weui_cells weui_cells_radio">
			<?php 
				foreach( $platform as $key => $value ):
			?>
			<label class="weui_cell weui_check_label" for="platform<?php echo $key;?>">
				<div class="weui_cell_bd weui_cell_primary">
					<p><?php echo $value;?></p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="platform" data="<?php echo $value;?>" id="platform<?php echo $key;?>" value="<?php echo $key;?>" <?php if( $res['platform']== $key ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<?php endforeach;?>
		</div>
		</script> 
		<!--修改平台-->

		<!--修改房间号-->
		<script type="text/html" id="tpl_fid">

		<div class="header" style="position: relative;top:-0.4rem;">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Live room number</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		

		<div class="control_text first">
			<input type="text" class="weui_text" name="room" id="fid" value="<?php echo $res['room'];?>">
			<span class="weui_text_clear"><i class="fa fa-times-circle"></i></span>
		</div>
		
		</script> 
		<!--修改房间号-->

		<!-- 修改地区 -->
		<script type="text/html" id="tpl_area">
		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><p></p></a>
			<p class="header_title">Resident city</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		<div class="headerfull"></div>
		<div class="control">
			<a class="control_text first" href="#/area">
				<div class="control_text_primary">
					<p style="font-size:0.35rem;">Resident city</p>
				</div>
				<div class="control_text_ft" id="city1txt"></div>
				<input type="hidden" id="city1" data-txt="<?php echo $res['city'];?>" value="<?php echo $res['city'];?>" />
			</a>
<?php /*?>			<a class="control_text" href="#/area">
				<div class="control_text_primary">
					<p style="font-size:0.35rem;">常驻城市二</p>
				</div>
				<div class="control_text_ft" id="city2txt"></div>
				<input type="hidden" id="city2" data-txt="" value="" />
			</a><?php */?>
		</div>
		 <div class="area"><div class="city_sort clear" style="display: none"></div>
			
		
		</script>
		<!-- 修改地区 -->

		<!--修改粉丝-->
		<script type="text/html" id="tpl_fans">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Number of fans</p>
		</div>
		<div class="headerfull"></div>

		<div class="weui_cells weui_cells_radio">
			<?php $fans_num = get_fans_num('-1');
				foreach( $fans_num as $key => $value ):?>
			<label class="weui_cell weui_check_label" for="fans<?php echo $key;?>">
				<div class="weui_cell_bd weui_cell_primary">
					<p><?php echo $value;?></p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="fans_num" data-fans="<?php echo $value;?>" id="fans<?php echo $key;?>" value="<?php echo $key;?>" <?php if( $res['fans_num']==$key ):?>checked="checked"<?php endif;?>>
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<?php endforeach;?>			
		</div>
		
		</script> 
		<!--修改粉丝-->
		
		<!--相册-->
		<script type="text/html" id="tpl_pic">
			<link rel="stylesheet" href="css/weui.css" />
			<style>
			.wrap{ height: 100%;}
			body{ background-color: rgb(255, 255, 255);}
			</style>

			<div class="header">
				<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>back</span></a>
				<p class="header_title">Album（<span class="pic_num"><?php echo $res['photo_num'];?></span>）sheets</p>
				<div class="menu"></div>
			</div>
			<div class="headerfull"></div>

			<div class="photo">
				<ul class="pic_list pics_box clear" id="pic-box">
					<?php foreach( $res['photo'] as $value ):?>
					 <li>
							<input type="checkbox" id="checkbox<?php echo $value['id'];?>" data-k="<?php echo $value['id'];?>" name="checkbox" value="<?php echo strstr($value['pic'],'http:') ? $value['pic'] : 'http:'.$value['pic'];?>"/>
							<label class="checkbox" for="checkbox<?php echo $value['id'];?>" style="background-image:url(<?php echo strstr($value['pic'],'http:') ? $value['pic'] : $this->api_url.$value['pic'];?>)"></label>
							<a href="#enter<?php echo $value['id'];?>"></a>
					</li>
					<?php endforeach;?>
				</ul>
				<?php if( empty($photo) ):?>
					<div class="no_pic">
						<p>You have not uploaded pictures yet</p>
					</div>					
				<?php endif;?>
				<div class="bottom-btn order-btn clear">
					<a class="cancel_activity" id="delete_photo">batch deletion</a>
					<a><label style="width:100%;height:100%;display:block;" for="uploadphotos">upload photos</label></a>
					<input type="file" style="display:none;" id="uploadphotos" onchange="uploadphotos()">
				</div>		

			</div>
		</script>

		<!-- 个性签名 -->
		<script type="text/html" id="tpl_signature">

		<div class="header">
			<a class="goback" href="javascript:history.go(-1)"><i class="fa fa-angle-left"></i><span>Back</span></a>
			<p class="header_title">Signature</p>
			<div class="menu"><span class="save-info">Save</span></div>
		</div>
		<div class="headerfull"></div>

		<textarea id="signature" style="margin-top:0.4rem;" placeholder="Edit my personality signature"><?php echo $res['signature'];?></textarea>
			
		</script>

	
	<input type="hidden" id="hheadimgurl" value="<?php echo strstr($res['icon'],'http:') ? $res['icon'] : $this->api_url.$res['icon'];?>">
	<input type="hidden" id="hstudentIdentity" value="<?php echo strstr($res['xueshengzheng'],'http:') ? $res['xueshengzheng'] : $this->api_url.$res['xueshengzheng'];?>">
	<input type="hidden" id="hpassport" value="<?php echo strstr($res['huzhao'],'http') ? $res['huzhao'] : $this->api_url.$res['huzhao'];?>">
	<input type="hidden" id="hrealname" value="<?php echo $res['nickname'];?>">

	<input type="hidden" id="hcity" value="<?php echo $res['city'];?>">
	<input type="hidden" id="hcountry" value="<?php echo $res['country'];?>">
	<input type="hidden" id="hgrade" value="1" txt='<?php echo $res['grade'];?>'>

	<input type="hidden" id="hHSK" value="1" txt='<?php echo get_hsk_class($res['hsk_class']);?>'>
	<input type="hidden" id="hfreeTime" value="1" txt='<?php echo get_free_time($res['free_time']);?>'>
	
	<input type="hidden" id="hsex" value="1" txt="<?php echo get_gender($res['sex']);?>">
	
	<input type="hidden" id="hexperience" value="<?php echo $res['if_show_experience'];?>" txt="<?php echo get_if_show_experience($res['if_show_experience']);?>">

	<input type="hidden" id="hcontinent" value="1" txt="<?php echo get_dazhou($res['dazhou']);?>">
	<input type="hidden" id="hyearStay" value="1" txt="<?php echo get_stay_china_year($res['stay_china_year']);?>">
	<input type="hidden" id="hbirthday" value="<?php echo $res['birthday'];?>">
	<input type="hidden" id="hplatform" value="<?php echo $res['platform'];?>" txt="<?php echo get_platform($res['platform']);?>">
	<input type="hidden" id="hfid" value="<?php echo $res['room'];?>">
	<input type="hidden" id="hfans_s" value="<?php echo $res['fans_num'];?>" txt="<?php echo get_fans_num($res['fans_num']);?>">
	<input type="hidden" id="hphotonum" value="<?php echo $res['photo_num'];?>">
	<input type="hidden" id="hsignature" value="<?php echo $res['signature'];?>">
	<input type="hidden" id="topview" value="<?php echo $res['view'];?>">
	<input type="hidden" id="hcity1" value="" txt="<?php echo $res['city'];?>">
	<!--<input type="hidden" id="hcity2" value="" txt="">-->
	<input type="hidden" id="harea" value="">
</div>
	

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
 

<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>




<!--js路由-->
<script src="/statics/js/zepto.min.js"></script>
<script src="/statics/js/router.min.js"></script>
<script src="/statics/js/example.js"></script>
<!--js路由--></body></html>