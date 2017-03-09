<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在编辑消息：<?php echo mb_substr($data['content'],0,10).'...';?></h2>
		</div>
        <div class="box-content">
        	<form method="post" enctype="multipart/form-data">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <tr>
                    <td width="15%">发件人：</td>  
                    <td><?php echo get_username_by_uid($data['uid']);?></td>
                </tr>
                <tr>
                    <td>收件人：</td>  
                    <td>
						<?php echo get_username_by_uid($data['to_uid']);?>                   
                    </td>
                </tr>            
                <tr>
                    <td>内容：</td>
                    <td><textarea name="content" rows="8" style="width:50%"><?php echo $data['content'];?></textarea></td>
                </tr>
                
                <tr  class="evaluate" align="left">
                    <td >审核状态：</td>
                    <td>
                    	<div class="row pl20">
                            <div class="col-md-6">
                                <input type="radio" name="if_check" value="0" id="yes" <?php if( $data['if_check'] == 0 ):?>checked="checked"<?php endif;?>  /><label for="yes">待审核</label>
                            </div>                           
                            <div class="col-md-6 ml20" style="padding-left:20px">                            
                                <input type="radio" name="if_check" value="1" id="no" <?php if( $data['if_check'] == 1 ):?>checked="checked"<?php endif;?> /><label for="no">审核通过</label>
                            </div>
                            
                    	</div>  					
					</td>
                </tr>               	
				                                                                                                                          
                <tr>
                	<td>操作</td>
                	<td><input type="submit" value="提交" class="btn btn-embossed btn-primary"/><a class="btn btn-embossed btn-primary ml20" href="/grad/check_msg" >返回列表</a></td>
                </tr>
            </table>   
           </form>
        </div>
    </div>
</div>
		
<?php $this->load->view('cead/footer');?>