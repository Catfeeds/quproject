<?php $this->load->view('cead/header'); ?>

    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>用户相册管理列表</h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row ml20">
                	<div class="col-md-12">
    	                用户名：<input class="form-control mt10" id="puname" name="puname" type="text" placeholder="用户名" autocomplete="off" value="<?php echo isset($search['puname']) ? $search['puname'] : '';?>">                                                 						                   
        	        	<input class="btn btn-embossed btn-primary ml20" id="btnsearch" name="btnsearch" type="submit" value="搜索">
                        <a class="btn btn-embossed btn-primary ml20" href="/grad/check_photo?clear=1" >清空搜索条件</a>
            	  	</div>     
                </div>              
            </form>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
                    <th width="5%">照片ID</th>
                    <th width="10%">提交时间</th>
                    <th width="10%">提交者</th>
                    <th width="15%">照片预览</th>
                    <th width="15%">操作</th>
                </tr>
            <?php foreach ($data as $key => $value):?>
            	
                <tr id="name_tr">
                    <td width="5%"><?php echo $value['id'];?></td>
                    <td width="10%"><?php echo ymdhis($value['ctime']);?></td>
                    <td width="10%"><?php echo get_username_by_uid($value['uid']);?></td>
                    <td width="15%"><img src="<?php echo $value['pic'];?>" width="200"/></td>
                    <td width="15%">
						<a href="/grad/edit_photo/<?php echo $value['id']; ?>">编辑</a>
                        <span class="ml20"></span>
                        <a href='javascript:void(0);' onclick='if(confirm("是否删除"))location.href="grad/delete_photo/<?php echo $value['id']; ?>"'>删除</a>                    </td>            
	            </tr>
            <?php endforeach;?>
            </table>
            

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