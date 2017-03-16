<?php $this->load->view('cead/header'); ?>

<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>活动《<?php echo $event['title'];?>》报名人员列表</h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">   
        <p class="fr"><a href="/grad/check_info" class="btn btn-primary" >返回活动列表</a></p>            
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
					<th>头像</th>                                 
                    <th>昵称</th>   
                    <th>报名时间</th>
                    <th>电话</th>
                    <th>报名状态</th>
                    <th>报名成功时间</th>
                </tr>
            <?php foreach ($data as $key => $value):?>
            	
                <tr id="name_tr">
                    <td><img width="100" src="<?php echo $value['icon'];?>"></td>
                    <td><?php echo $value['nickname'];?></td>  
                    <td><?php echo ymdhis($value['ctime']);?></td>
                     <td><?php echo $value['telephone'];?></td>
                    <td><?php echo $value['if_accept'] == 1 ? '报名成功' : '未支付';?></td>
                    <td><?php echo $value['accept_time']?ymdhis($value['accept_time']):'';?></td>                    
            </tr>
            <?php endforeach;?>
            </table>
            <div class="clear"></div>
            <div class="pager">
                <br/>
                <?php if (isset($pagination)):?>
                    <?php echo $pagination;?>
                <?php endif;?>
            </div>  

        </div>
    </div><!--/span-->

</div><!--/row-->

<script type="text/javascript">
<?php if($if_need_ue==1):?>
	var ue = UE.getEditor('container', {
		initialFrameWidth : 800,
		initialFrameHeight : 300,
		toolbars:[["source","forecolor","backcolor","bold","italic","underline","strikethrough","|","justifyleft","justifycenter","justifyright","justifyjustify","fontfamily","fontsize","|","link","unlink","blockquote","insertorderedlist","insertunorderedlist","|","simpleupload","insertimage","emotion","insertvideo","music","attachment","map","|","inserttable","deletetable","mergecells","|","removeformat",
			"pasteplain","cleardoc","lineheight"]]
	});
<?php endif;?>
<?php if( $table == 'main_info' ):?>
$(function(){
	<?php if( $data['type'] == 3 ):?>
	$('#name_tr').show();
	<?php endif;?>
});
function showName( id )
{
	if( $("#"+id).val() == 3 )
	{
		$('#name_tr').show();
	}
	else
	{
		$('#name_tr').hide();
	}
}
<?php endif;?>
</script>

<!-- content ends -->

<?php $this->load->view('cead/footer');?>