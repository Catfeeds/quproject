<?php $this->load->view('cead/header'); ?>

    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2><?php if( $type == 1 ):?>主播<?php elseif($type == 4 ):?>学生<?php else:?>老师<?php endif;?>列表</h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row ml20">
                	<div class="col-md-12">
    	                昵称：<input class="form-control mt10" id="nickname" name="nickname" type="text" placeholder="用户昵称" autocomplete="off" value="<?php echo isset($search['nickname']) ? $search['nickname'] : '';?>">  
                        <?php if( $type == 1 ):?>     
	                    <span class="ml20"></span> 
    	                地区：<select name="dazhou" class="form-control mt10">
		                        <option value="" <?php if( empty($search['dazhou']) ):?> selected="selected"<?php endif;?>>未知</option>
                                	<?php $area = get_dazhou('-1');?>
                        			<?php foreach( $area as $key => $value ):?>
                                    <option value="<?php echo $key;?>" <?php if( $search['dazhou'] == $key ):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                                    <?php endforeach;?>
                        		</select> 
						<span class="ml20"></span>                                 
						国家：<input class="form-control mt10" id="country" name="country" type="text" placeholder="国家" autocomplete="off" value="<?php echo isset($search['country']) ? $search['country'] : '';?>"> 
                        <?php elseif( $type == 2 ):?>
                        <span class="ml20"></span>
                        公司名称：<input type="text" name="company_name" class="form-control mt10" placeholder="公司名称" autocomplete="off" value="<?php echo $search['company_name'];?>"/>
						<span class="ml20"></span>
                        需求描述：<input type="text" name="company_need" class="form-control mt10" placeholder="需求描述" autocomplete="off" value="<?php echo $search['company_need'];?>"/>                        
                        <?php endif;?>
						<span class="ml20"></span>                                 
						电话：<input class="form-control mt10" id="telephone" name="telephone" type="text" placeholder="联系电话" autocomplete="off" value="<?php echo isset($search['telephone']) ? $search['telephone'] : '';?>">                                                          
        	        	<input class="btn btn-embossed btn-primary ml20" id="btnsearch" name="btnsearch" type="submit" value="搜索">
                        <a class="btn btn-embossed btn-primary ml20" href="/grad/check_users/<?php echo $type;?>?clear=1" >清空搜索条件</a>
            	  	</div>     
                </div>
             </form>   
             <?php if( $type == 3 ):?>    
             <p class="fr"><a href="/grad/add_user/<?php echo $type;?>" class="btn btn-primary" >添加新记录</a></p>        
             <?php endif;?>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
					<th>头像</th>       
                 	<?php if( $type == 1 ):?>                    
                    <th>主播昵称</th>
                    <th>推荐者</th>
                    <th>出生日期</th>                    
                    <th>大洲／国家</th>
                    <th>HSK等级</th>
                    <th>基本信息地址</th>
                    <th>直播间地址</th>
                    <?php elseif($type == 2 ):?>
                    <th>昵称</th>
                    <th>联系人名称</th>
                    <th>公司名称</th>
                    <th>城市</th>
                    <th>需求描述</th>
                    <?php elseif( $type == 3 ):?>
                    <th>昵称</th>
                    <th>个人介绍</th>
                    <?php else:?>
                    <th>昵称</th>
                    <th>推荐者</th>
                    <?php endif;?>
                    <?php if( $type != 3 ):?>
                    <th>电话</th>
                    <th>性别</th>
                    <?php endif;?>
                    <?php if( $type == 4 ):?>
					<th>学校</th>
					<th>年级</th>
					<?php endif;?>
                    <th>注册时间</th>
                    <th>操作</th>
                </tr>
            <?php foreach ($res as $key => $value):?>
            	
                <tr id="name_tr">
                    <td><img width="100" src="<?php echo $value['icon'];?>"></td>
                    <td><?php echo $value['nickname'];?></td>
                    <?php if( $type == 1 ):?>
                    <td><?php echo get_username_by_uid($value['invite_id']);?></td>
                    <td><?php echo $value['birthday'];?></td>
                    <td><?php echo $value['dazhou'].'/'.$value['country'];?></td>
                    <td><?php echo get_hsk_class($value['hsk_class']);?></td>
                    <td><?php echo $value['base_url'];?></td>
                    <td><?php echo $value['show_url'];?></td>
                    <?php elseif($type ==2 ):?>
                    <td><?php echo $value['realname'];?></td>
                    <td><?php echo $value['company_name'];?></td>
                    <td><?php echo $value['city'];?></td>
                    <td><?php echo mb_substr($value['company_need'],0,100);?></td>
                    <?php elseif( $type == 3 ):?>
                    <td><?php echo $value['self_introduction'];?></td>
                    <?php else:?>
                    <td><?php echo get_username_by_uid($value['invite_id']);?></td>
                    <?php endif;?>
                    <?php if( $type != 3 ):?>
                    <td><?php echo $value['telephone'];?></td>
                    <td><?php echo get_gender($value['sex']);?></td>
                    <?php endif;?>
                    <?php if( $type == 4 ):?>
                    <td><?php echo $value['school'];?></td>
                    <td><?php echo $value['grade'];?></td>
                    <?php endif;?>
                    <td><?php echo ymdhis($value['ctime']);?></td>
                    <?php if( $type != 3 ):?>
                    <td><a href="/grad/show_user/<?php echo $type.'/'.$value['id'];?>">查看</a> | <a href="/grad/edit_user/<?php echo $type.'/'.$value['id'];?>">编辑</a> | <a href="/grad/examine_user/<?php echo $type.'/'.$value['id'];?>"><?php if( $value['if_check'] == 1 ):?>取消审核通过<?php else:?>通过审核<?php endif;?></a></td>
                    <?php else:?>
                    <td>
                    	<a href="/grad/edit_user/3/<?php echo $value['id'];?>">编辑</a> | <a href='javascript:void(0);' onclick='if(confirm("是否删除"))location.href="/grad/delete_user/3/<?php echo $value['id'];?>"'>删除</a>
                    </td>
                    <?php endif;?>
            
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