<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在查看消息：<?php echo mb_substr($data['content'],0,10).'...';?></h2>
		</div>
        <div class="box-content">
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
                    <td><?php echo $data['content'];?></td>
                </tr>
                <tr class="evaluate" align="left">
                    <td>审核状态：</td>
                    <td><?php echo $data['if_check'] == 0 ? '待审核' : '审核通过';?></td>
                </tr>  
                                                                                                                            
                <tr>
                	<td>操作</td>
                	<td><a class="btn btn-embossed btn-primary" href="/grad/check_msg" >返回列表</a><a class="btn btn-embossed btn-primary ml20" href="/grad/edit_msg/<?php echo $id;?>" >编辑</a></td>
                </tr>
            </table>   
               
        </div>
    </div>
</div>
<?php $this->load->view('cead/footer');?>