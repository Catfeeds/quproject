<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在编辑评价：<?php echo mb_substr($data['content'],0,100);?></h2>
		</div>
        <div class="box-content">
        	<form method="post" enctype="multipart/form-data">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <tr>
                    <td width="15%">发布者：</td>  
                    <td>
						<?php echo get_username_by_uid($data['uid']);?>                  
                    </td>
                </tr>
                <tr>
                    <td width="15%">主播：</td>  
                    <td>
						<?php echo get_username_by_uid($data['zhubo_id']);?>                  
                    </td>
                </tr> 
                <tr>
                    <td>评价星级：</td>
                    <td><input type="text" name="star_num" value="<?php echo $data['star_num'];?>"/>请填写1~5之间的数字</td>
                </tr>                  
                <tr>
                    <td width="15%">评价内容：</td>  
                    <td>
						<textarea name="content" rows="8" style="width:50%"><?php echo $data['content'];?></textarea>               
                    </td>
                </tr>                               
                                                                                                                         
                <tr>
                	<td>操作</td>
                	<td><input type="submit" value="提交" class="btn btn-embossed btn-primary"/><a class="btn btn-embossed btn-primary ml20" href="/grad/check_comment" >返回列表</a></td>
                </tr>
            </table>   
           </form>
        </div>
    </div>
</div>
		
<?php $this->load->view('cead/footer');?>