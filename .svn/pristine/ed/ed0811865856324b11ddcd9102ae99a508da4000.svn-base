<?php $this->load->view('cead/header'); ?>

    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>活动列表</h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row ml20">
                	<div class="col-md-12">
    	                活动标题：<input class="form-control mt10" id="title" name="title" type="text" placeholder="活动标题" autocomplete="off" value="<?php echo isset($search['title']) ? $search['title'] : '';?>">                          
                        <span class="ml20"></span>
                        活动地点：<input type="text" name="city" class="form-control mt10" placeholder="活动地点" autocomplete="off" value="<?php echo $search['city'];?>"/>
						<span class="ml20"></span>
                        募集人数：<input type="text" name="need_num" class="form-control mt10" placeholder="募集人数" autocomplete="off" value="<?php echo $search['need_num'];?>"/>                    						                   
        	        	<input class="btn btn-embossed btn-primary ml20" id="btnsearch" name="btnsearch" type="submit" value="搜索">
                        <a class="btn btn-embossed btn-primary ml20" href="/grad/check_info?clear=1" >清空搜索条件</a>
            	  	</div>     
                </div>            
            </form>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
                    <th width="15%">标题</th>
                    <th width="10%">提交时间</th>
                    <th width="10%">开始时间</th>
                    <th width="10%">结束时间</th>
                    <th width="5%">需要人数</th>
                    <th width="10%">招募价格</th>
                    <th width="15%">地址</th>
                    <th width="10%">活动状态</th>
                    <th width="15%">操作</th>
                </tr>
            <?php foreach ($res as $key => $value):?>
            	
                <tr id="name_tr">
                    <td width="15%"><?php echo $value['title'];?></td>
                    <td width="10%"><?php echo ymdhis($value['ctime']);?></td>
                    <td width="10%"><?php echo ymdhis($value['start_time']);?></td>
                    <td width="10%"><?php echo ymdhis($value['end_time']);?></td>
                    <td width="5%"><?php echo $value['need_num'];?></td>
                    <td width="10%"><?php echo $value['single_price'];?></td>
                    <td width="15%"><?php echo $value['address'];?></td>
                    <td width="10%"><?php echo get_info_status($value['status']);?></td>
            		<td width="15%"><a href="/grad/edit_info/<?php echo $value['id'];?>">编辑</a><?php if( $value['status'] == 0 ):?><span class="ml10"></span><a href="/grad/examine_info/<?php echo $value['id'];?>">通过审核</a><?php endif;?><span class="ml10"></span><a href="grad/user_info/<?php echo $value['id'];?>">查看报名人员</a></td>
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