<?php $this->load->view('cead/header'); ?>

    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>评价管理列表</h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row ml20">
                	<div class="col-md-12">
    	               评价内容 ：<input class="form-control mt10" id="content" name="content" type="text" placeholder="评价" autocomplete="off" value="<?php echo isset($search['content']) ? $search['content'] : '';?>">
                       星级 ：<input class="form-control mt10" id="star_num" name="star_num" type="text" placeholder="星级" autocomplete="off" value="<?php echo isset($search['star_num']) ? $search['star_num'] : '';?>">                                                                        						                   		<input class="btn btn-embossed btn-primary ml20" id="btnsearch" name="btnsearch" type="submit" value="搜索">
                        <a class="btn btn-embossed btn-primary ml20" href="/grad/check_comment?clear=1" >清空搜索条件</a>
            	  	</div>     
                </div>              
            </form>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
                    <th width="5%">发布者</th>
                    <th width="10%">主播</th>
                    <th width="10%">星级</th>
                    <th width="15%">评价内容</th>
                    <th width="15%">操作</th>
                </tr>
            <?php foreach ($data as $key => $value):?>
            	
                <tr id="name_tr">
                    <td width="5%"><?php echo get_username_by_uid($value['uid']);?></td>
                    <td width="10%"><?php echo get_username_by_uid($value['zhubo_id']);?></td>
                    <td width="10%"><?php echo $value['star_num'];?></td>
                    <td width="15%"><?php echo mb_substr($value['content'],0,100);?></td>
                    <td width="15%">
						<a href="/grad/edit_comment/<?php echo $value['id']; ?>">编辑</a>
                        <span class="ml20"></span>
                        <a href="/grad/examine_comment/<?php echo $value['id']; ?>"><?php echo $value['if_check'] == 1 ? '通过审核' : '取消审核通过';?></a>                    
                    </td>            
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