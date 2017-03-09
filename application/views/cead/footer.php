				</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				

		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
	<!--<textarea id="SWFUpload_Console" wrap="off" style="font-family: monospace; overflow: auto; width: 700px; height: 350px; margin: 5px;"></textarea>-->	
	</div><!--/.fluid-container-->

				

				<script type="text/javascript">
					$(".form_date").datepicker({format: 'yyyy-mm-dd'});
					$(".datetime").datetimepicker({format: 'yyyy-mm-dd HH:mm:ss'});
				</script>

		<script type="text/javascript">
            <?php $timestamp = time();?>
            $(function() {              
                $('#image_file').uploadify({
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
                          $('#image').val(data);
						  $('#image_img').attr('src',data);			  
                    },	

/*					//选择上传文件后调用
					'onSelect' : function(file) {
            console.log(
                  "文件名：" + file.name + "\r\n" +
                  "文件大小：" + file.size + "\r\n" +
                  "创建时间：" + file.creationDate + "\r\n" +
                  "最后修改时间：" + file.modificationDate + "\r\n" +
                  "文件类型：" + file.type
            );},
			 'onSWFReady' : function() {
            console.log('The Flash file is ready to go.');
        },
'onUploadStart' : function(file) {
            $("#image_file").uploadify("settings", "someOtherKey", 2);
        }	,	
'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            $('#image_text_div').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');
        },			
 'onUploadError' : function(file, errorCode, errorMsg, errorString) {
            console.log('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },	
'onInit'   : function(instance) {
            console.log('The queue ID is ' + instance.settings.queueID);
        },						
					//返回一个错误，选择文件的时候触发
					'onSelectError' : function() {
						console.log('The file ' + file.name + ' returned an error and was not added to the queue.');
					},*/
					//检测FLASH失败调用
					'onFallback':function(){
						alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
					},					
                });		
            });
        </script>
                

	</body>
</html>