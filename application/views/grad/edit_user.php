<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在编辑：<?php echo $data['nickname'];?></h2>
		</div>
        <div class="box-content">
        	<form method="post" enctype="multipart/form-data">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <tr>
                    <td width="15%">联系电话：</td>  
                    <td><input type="text" name="telephone" value="<?php echo $data['telephone'];?>"/></td>
                </tr>
                <tr>
                    <td width="15%">积分:</td>  
                    <td><input type="text" name="integral" value="<?php echo $data['integral'];?>"/></td>
                </tr>
                <?php if( $type != 3 ):?>  
                <tr>
                    <td>头像：</td>  
                    <td>
						<p>请上传jpg png图片</p>
                        <input type="hidden" id="icon" name="icon" value="<?php echo $data['icon'];?>" />
                        <input id="icon_file" name="icon_file" type="file" multiple="false">
                        <div class="grey" id="icon_text_div"><img src="<?php echo $data['icon'];?>" width="200" id="icon_img"/></div>                    
                    </td>
                </tr> 
                <?php endif;?>
                <?php if( $type != 3 && $type != 4 ):?>        
                <tr>
                    <td><?php if( $type == 1 ):?>真实姓名<?php else:?>联系人姓名<?php endif;?>：</td>
                    <td><input type="text" name="realname" value="<?php echo $data['realname'];?>"/></td>
                </tr>
                <?php endif;?>
                <tr>
                    <td>昵称：</td>
                    <td><input type="text" name="nickname" value="<?php echo $data['nickname'];?>"/></td>
                </tr>   
                <?php if( $type == 1 ):?>         
                <tr class="evaluate" align="left">
                    <td>性别：</td>
                    <td>
                    	<div class="row pl20">
                            <div class="col-md-6">
                                <input type="radio" name="sex" value="1" id="boy" <?php if( $data['sex'] == 1 ):?>checked="checked"<?php endif;?> /><label for="boy"><?php echo get_gender(1);?></label>
                            </div>                           
                            <div class="col-md-6 ml20" style="padding-left:20px">                            
                                <input type="radio" name="sex" value="2" id="girl" <?php if( $data['sex'] == 2 ):?>checked="checked"<?php endif;?>  /><label for="girl"><?php echo get_gender(2);?></label>
                            </div>
                            
                    	</div>            
                   	</td>
                </tr>
                <tr>
                    <td>出生日期：</td>
                    <td><input type="text" class="form_date" name="birthday" value="<?php echo $data['birthday'];?>"/></td>
                </tr>
                <tr>
                    <td>大洲：</td>
                    <td>
                        <select name="dazhou" class="form-control mt10">
                        	<option value="" <?php if( empty($data['dazhou']) ):?> selected="selected"<?php endif;?>>未知</option>
                            <?php $area = get_dazhou('-1');?>
                            <?php foreach( $area as $key => $value ):?>
                            <option value="<?php echo $key;?>" <?php if( $data['dazhou'] == $key ):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                            <?php endforeach;?>
						</select>                     
                    </td>
                </tr>
                <tr>
                    <td>国家：</td>
                    <td><input type="text" name="country" value="<?php echo $data['country'];?>"/></td>
                </tr>
                <tr>
                    <td>所在中国城市：</td>
                    <td><input type="text" name="city" value="<?php echo $data['city'];?>"/></td>
                </tr>
                <tr>
                    <td>学生证照片：</td>  
                    <td>
						<p>请上传jpg png图片</p>
                        <input type="hidden" id="xueshengzheng" name="xueshengzheng" value="<?php echo $data['xueshengzheng'];?>" />
                        <input id="xsz_file" name="xsz_file" type="file" multiple="false">
                        <div class="grey" id="xsz_text_div"><img src="<?php echo $data['xueshengzheng'];?>" width="200" id="xsz_img"/></div>                     
                    </td>
                </tr> 
                <tr>
                    <td>护照照片：</td>  
                    <td>
						<p>请上传jpg png图片</p>
                        <input type="hidden" id="huzhao" name="huzhao" value="<?php echo $data['huzhao'];?>" />
                        <input id="hz_file" name="hz_file" type="file" multiple="false">
                        <div class="grey" id="hz_text_div"><img src="<?php echo $data['huzhao'];?>" width="200" id="hz_img"/></div>                       
                    </td>
                </tr> 
                <tr>
                    <td>主播收入：</td>
                    <td><input type="text" name="income" value="<?php echo $data['income'];?>"/></td>
                </tr>
                <tr>
                    <td>年级：</td>
                    <td><input type="text" name="grade" value="<?php echo $data['grade'];?>"/></td>
                </tr>                
                <tr>
                    <td>还在要中国停留几年：</td>
                    <td>
						<select name="stay_china_year">
                        	<?php $years = get_stay_china_year('-1');?>
                            <option value="">未知</option>
                            <?php foreach( $years as $key => $value ):?>
                            	<option value="<?php echo $key;?>" <?php if( $data['stay_china_year'] == $key):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                            <?php endforeach;?>
                        </select>
					</td>
                </tr>
                <tr>
                    <td>HSK等级：</td>
                    <td>
						<select name="hsk_class">
                        	<?php $hsk = get_hsk_class('-1');?>
                            <?php foreach( $hsk as $key => $value ):?>
                            	<option value="<?php echo $key;?>" <?php if( $data['hsk_class'] == $key):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                            <?php endforeach;?>
                        </select>					
					</td>
                </tr>
                <tr>
                    <td>每天有多少空闲时间：</td>
                    <td>
						<select name="free_time">
                        	<?php $free = get_free_time('-1');?>
                            <?php foreach( $free as $key => $value ):?>
                            	<option value="<?php echo $key;?>" <?php if( $data['free_time'] == $key):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                            <?php endforeach;?>
                        </select>					
					</td>
                </tr>
                <tr  class="evaluate" align="left">
                    <td >之前是过直播或演出经验：</td>
                    <td>
                    	<div class="row pl20">
                            <div class="col-md-6">
                                <input type="radio" name="if_show_experience" value="0" id="yes" <?php if( $data['if_show_experience'] == 0 ):?>checked="checked"<?php endif;?>  /><label for="yes"><?php echo get_if_show_experience(0);?></label>
                            </div>                           
                            <div class="col-md-6 ml20" style="padding-left:20px">                            
                                <input type="radio" name="if_show_experience" value="1" id="no" <?php if( $data['if_show_experience'] == 1 ):?>checked="checked"<?php endif;?> /><label for="no"><?php echo get_if_show_experience(1);?></label>
                            </div>
                            
                    	</div>  					
					</td>
                </tr>   
                <tr>
                    <td>基本信息链接地址：</td>
                    <td><input type="text" name="base_url" value="<?php echo $data['base_url'];?>"/></td>
                </tr>                 
                <tr>
                    <td>直播间链接地址：</td>
                    <td><input type="text" name="show_url" value="<?php echo $data['show_url'];?>"/></td>
                </tr>                             	
				<?php elseif($type == 2 ):?>
                <tr>
                    <td>公司名称：</td>
                    <td><input type="text" name="company_name" value="<?php echo $data['company_name'];?>"/></td>
                </tr>                
                <tr>
                    <td>城市：</td>
                    <td><input type="text" name="city" value="<?php echo $data['city'];?>"/></td>
                </tr>  
                <tr>
                    <td>需求描述：</td>
                    <td><textarea name="company_need" rows="8" style="width:50%"><?php echo $data['company_need'];?></textarea></td>
                </tr>                                              
                <?php endif;?>                                                                                                                          
                <?php if( $type ==3 ):?>
                <tr>
                    <td>密码：</td>
                    <td><input type="password" class="fl" name="password" value="<?php echo $data['password'];?>"/>
                    	<?php if( $id ):?>
                            <div class="row ml20 fl">
                                <div class="col-md-6">                    
                    			<input type="checkbox" class="fl" id="update_pwd" name="if_update_password" value="1"><label for="update_pwd" class="fl">是否更新密码</label>
                               	</div>
                            </div>
                        <?php endif;?>
                     </td>
                </tr>                  
                <tr>
                    <td>个人介绍：</td>
                    <td><textarea name="self_introduction" rows="8" style="width:50%"><?php echo $data['self_introduction'];?></textarea></td>
                </tr> 
                <?php elseif( $type == 4 ):?>
                <tr class="evaluate" align="left">
                    <td>性别：</td>
                    <td>
                    	<div class="row pl20">
                            <div class="col-md-6">
                                <input type="radio" name="sex" value="1" id="boy" <?php if( $data['sex'] == 1 ):?>checked="checked"<?php endif;?> /><label for="boy"><?php echo get_gender(1);?></label>
                            </div>                           
                            <div class="col-md-6 ml20" style="padding-left:20px">                            
                                <input type="radio" name="sex" value="2" id="girl" <?php if( $data['sex'] == 2 ):?>checked="checked"<?php endif;?>  /><label for="girl"><?php echo get_gender(2);?></label>
                            </div>
                            
                    	</div>            
                   	</td>
                </tr>
                <tr>
                    <td>学校：</td>
                    <td><input type="text" name="school" value="<?php echo $data['school'];?>"/></td>                
                </tr> 
                <tr>
                    <td>年级：</td>
                    <td><input type="text" name="grade" value="<?php echo $data['grade'];?>"/></td>                
                </tr>                                
                <?php endif;?>                
                <tr>
                	<td>操作</td>
                	<td><input type="submit" value="提交" class="btn btn-embossed btn-primary"/><a class="btn btn-embossed btn-primary ml20" href="/grad/check_users/<?php echo $type;?>" >返回列表</a></td>
                </tr>
            </table>   
           </form>
        </div>
    </div>
</div>
		<script type="text/javascript">
            <?php $timestamp = time();?>
            $(function() {              
                $('#icon_file').uploadify({
					//'debug'    : true,
					'checkExisting' : '/statics/js/uploadify/check-exists.php',
                    'swf'      : '/statics/js/uploadify/uploadify.swf',
                    'uploader' : '/statics/js/uploadify/uploadify.php',					
                    'formData'     : {
                        'timestamp' : '<?php echo $timestamp;?>',
                        'token'     : '<?php echo md5('unique_salt' .  $timestamp);?>'
                    },
                    'fileSizeLimit' : '2000KB',
                    'fileTypeDesc' : 'jpg or png ',
                    'fileTypeExts' : '*.jpg;*.png;*.jpeg',
                    'buttonText' : '上传文件',
                    'onUploadSuccess': function (file, data, response) 
                    {
                          $('#icon').val(data);
						  $('#icon_img').attr('src',data);
                         // var span_text = '<span id="icon_text">文件已上传：'+data+'</span>';				  
                          //$('#icon_text_div').html(span_text);				  
                    },	

					//检测FLASH失败调用
					'onFallback':function(){
						alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
					},					
                });		
                $('#xsz_file').uploadify({
					//'debug'    : true,
					'checkExisting' : '/statics/js/uploadify/check-exists.php',
                    'swf'      : '/statics/js/uploadify/uploadify.swf',
                    'uploader' : '/statics/js/uploadify/uploadify.php',					
                    'formData'     : {
                        'timestamp' : '<?php echo $timestamp;?>',
                        'token'     : '<?php echo md5('unique_salt' .  $timestamp);?>'
                    },
                    'fileSizeLimit' : '2000KB',
                    'fileTypeDesc' : 'jpg or png ',
                    'fileTypeExts' : '*.jpg;*.png;*.jpeg',
                    'buttonText' : '上传文件',
                    'onUploadSuccess': function (file, data, response) 
                    {
                          $('#xueshengzheng').val(data);
						  $('#xsz_img').attr('src',data);
//                          var span_text = '<span id="xsz_text">文件已上传：'+data+'</span>';				  
//                          $('#xsz_text_div').html(span_text);				  
                    },	

					//检测FLASH失败调用
					'onFallback':function(){
						alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
					},					
                });	
                $('#hz_file').uploadify({
					//'debug'    : true,
					'checkExisting' : '/statics/js/uploadify/check-exists.php',
                    'swf'      : '/statics/js/uploadify/uploadify.swf',
                    'uploader' : '/statics/js/uploadify/uploadify.php',					
                    'formData'     : {
                        'timestamp' : '<?php echo $timestamp;?>',
                        'token'     : '<?php echo md5('unique_salt' .  $timestamp);?>'
                    },
                    'fileSizeLimit' : '2000KB',
                    'fileTypeDesc' : 'jpg or png ',
                    'fileTypeExts' : '*.jpg;*.png;*.jpeg',
                    'buttonText' : '上传文件',
                    'onUploadSuccess': function (file, data, response) 
                    {
                          $('#huzhao').val(data);
						  $('#hz_img').attr('src',data);
//                          var span_text = '<span id="hz_text">文件已上传：'+data+'</span>';				  
//                          $('#hz_text_div').html(span_text);				  
                    },	

					//检测FLASH失败调用
					'onFallback':function(){
						alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
					},					
                });									
            });
        </script>
<?php $this->load->view('cead/footer');?>