<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在编辑用户：<?php echo get_username_by_uid($data['uid']);?>的相册图片</h2>
		</div>
        <div class="box-content">
        	<form method="post" enctype="multipart/form-data">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <tr>
                    <td width="15%">图片：</td>  
                    <td>
						<p>请上传jpg png图片</p>
                        <input type="hidden" id="image" name="pic" value="<?php echo $data['pic'];?>" />
                        <input id="image_file" name="image_file" type="file" multiple="false">
                        <div class="grey" id="image_text_div"><img src="<?php echo $data['pic'];?>" width="200" id="image_img"/></div>                    
                    </td>
                </tr>
                                                                                                                         
                <tr>
                	<td>操作</td>
                	<td><input type="submit" value="提交" class="btn btn-embossed btn-primary"/><a class="btn btn-embossed btn-primary ml20" href="/grad/check_photo" >返回列表</a></td>
                </tr>
            </table>   
           </form>
        </div>
    </div>
</div>
		
<?php $this->load->view('cead/footer');?>