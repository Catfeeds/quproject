<?php $this->load->view('cead/header'); ?>

    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>消息管理列表</h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row ml20">
                	<div class="col-md-12">
    	                内容：<input class="form-control mt10" id="content" name="content" type="text" placeholder="消息内容" autocomplete="off" value="<?php echo isset($search['content']) ? $search['content'] : '';?>">  
	                    <span class="ml20"></span>     	                                              
						发送者：<input class="form-control mt10" id="uname" name="uname" type="text" placeholder="发送者" autocomplete="off" value="<?php echo isset($search['uname']) ? $search['uname'] : '';?>"> 
                       
                        <span class="ml20"></span>
                        接收者：<input type="text" name="touser" class="form-control mt10" placeholder="接受者" autocomplete="off" value="<?php echo $search['touser'];?>"/>						                                                         
        	        	<input class="btn btn-embossed btn-primary ml20" id="btnsearch" name="btnsearch" type="submit" value="搜索">
                        <a class="btn btn-embossed btn-primary ml20" href="/grad/check_msg?clear=1" >清空搜索条件</a>
            	  	</div>     
                </div>            
            </form>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
                    <th width="3%">消息ID</th>
                    <th width="10%">提交时间</th>
                    <th width="5%">发送者</th>
                    <th width="5%">收件人</th>
                    <th width="15%">内容预览</th>
                    <th width="5%">是否审核</th>
                    <th width="10%">审核时间</th>
                    <th width="15%">操作</th>
                </tr>
            <?php foreach ($data as $key => $value):?>
            	
                <tr id="name_tr">
                    <td width="3%"><?php echo $value['id'];?></td>
                    <td width="10%"><?php echo ymdhis($value['ctime']);?></td>
                    <td width="5%"><?php echo get_username_by_uid($value['uid']);?></td>
                    <td width="5%"><?php echo get_username_by_uid($value['to_uid']);?></td>
                    <td width="15%"><?php echo mb_substr($value['content'],0,100);?></td>
                    <td width="5%"><?php echo get_if_check($value['if_check']);?></td>
                    <td width="10%"><?php echo (int)$value['check_time'] > 0 ? ymdhis($value['check_time']) : '-';?></td>
                    <td width="15%"><a href="/grad/show_msg/<?php echo $value['id'];?>">查看</a> | <a href="/grad/edit_msg/<?php echo $value['id'];?>">编辑</a> | <a href="/grad/examine_msg/<?php echo $value['id'];?>"><?php if( $value['if_check'] == 1 ):?>取消审核通过<?php else:?>通过审核<?php endif;?></a></td>
            
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