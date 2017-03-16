<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在编辑活动：<?php echo $data['title'];?></h2>
		</div>
        <div class="box-content">
        	<form method="post" enctype="multipart/form-data">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <tr>
                    <td width="15%">活动主题：</td>  
                    <td><input type="text" name="title" value="<?php echo $data['title'];?>"/></td>
                </tr>
                 
                <tr>
                    <td width="15%">活动地点：</td>  
                    <td><input type="text" name="city" value="<?php echo $data['city'];?>"/></td>
                </tr>
                
                <tr>
                    <td width="15%">活动详细地址：</td>  
                    <td><input type="text" name="address" value="<?php echo $data['address'];?>"/></td>
                </tr>
                                                              
                <tr>
                    <td>海报：</td>  
                    <td>
						<p>请上传jpg png图片</p>
                        <input type="hidden" id="image" name="image" value="<?php echo $data['image'];?>" />
                        <input id="image_file" name="image_file" type="file" multiple="false">
                        <div class="grey" id="image_text_div"><img src="<?php echo $data['image'];?>" width="200" id="image_img"/></div>                    
                    </td>
                </tr>            
                <tr>
                    <td>直播时间：</td>
                    <td><input type="text" name="start_time" class="datetime" value="<?php echo ymdhis($data['start_time']);?>"/></td>
                </tr>
                <tr>
                    <td width="15%">活动类型：(1付费,2免费)</td>  
                    <td><input type="text" name="type" value="<?php echo $data['type'];?>"/></td>
                </tr>  
                <tr>
                    <td>结束时间：</td>
                    <td><input type="text" name="end_time" class="datetime" value="<?php echo ymdhis($data['end_time']);?>"/></td>
                </tr>   
                <tr>
                    <td width="15%">招募人数：</td>  
                    <td><input type="text" name="need_num" value="<?php echo $data['need_num'];?>"/></td>
                </tr>   

                <tr>
                    <td width="15%">单价：</td>  
                    <td><input type="text" name="single_price" value="<?php echo $data['single_price'];?>"/></td>
                </tr>                                                                     
                
                <tr>
                    <td width="15%">免费活动需要积分：</td>  
                    <td><input type="text" name="integral" value="<?php echo $data['integral'];?>"/></td>
                </tr>      
                <tr>
                    <td width="15%">活动介绍：</td>  
                    <td><textarea name="details" rows="8" style="min-width:50%"><?php echo $data['details'];?></textarea></td>
                </tr>     
                                                                                                                         
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