<?php $this->load->view('cead/header'); ?>

    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well" data-original-title>
			<h2>
				<?php if( $id ):?>编辑<?php else:?>新增<?php endif;?><?php echo $table_info['Comment'];?>
            </h2>
		</div>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>
        <div class="box-content">
            <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <?php foreach ($column as $key => $value):?>
            	<?php $field = explode(' ',$value['Comment']); $field_name = $field[0];?>
                <tr <?php if( $value['Field'] == 'name' && $table =='main_info' ):?> id="name_tr" style="display:none" <?php endif;?> >
                    <td width="15%"><?php echo $field_name;?>：</td>
                    <td width="65%" <?php if( preg_match("/是否显示/i", $value['Comment']) || preg_match("/是否是视频/i", $value['Comment']) ):?> class="evaluate"<?php endif;?>>
						<?php if(preg_match("/上传/i", $value['Comment']) || preg_match("/图片/i", $value['Comment']) || $value['Comment'] == '宣传图'):?>
                        	<?php if( $value['Field'] == 'image' ):?>
                            <p>请上传jpg png图片</p>
                            <input type="hidden" id="<?php echo $value['Field']; ?>" name="<?php echo $value['Field']; ?>" value="<?php echo $data[$value['Field']];?>" />
                            <input id="<?php echo $value['Field']; ?>_file" name="<?php echo $value['Field']; ?>_file" type="file" multiple="false">
                            <div class="grey" id="<?php echo $value['Field']; ?>_text_div"><img id="image_img" src="<?php echo $data[$value['Field']];?>" width="200"/></div>
                            <?php else:?>
                                <input name="<?php echo $value['Field']; ?>" type="file" value="">
                                <?php if(!empty($data[$value['Field']])): ?>
                                	<?php $ext = explode('.',$data[$value['Field']]); $ext = array_pop($ext);?>
                                    <?php if( in_array($ext,array('jpg','jpeg','png','gif','bmp','JPG','JPEG','PNG') )):?>
                                    <img src="<?php echo $data[$value['Field']];?>" width='100'>
                                    <?php else:?>
                                    <?php if( $data[$value['Field']]):?>文件已上传：<span id="image_text"><?php echo $data[$value['Field']];?></span><?php endif;?>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endif;?>
                        <?php elseif( preg_match("/是否显示/i", $value['Comment']) || preg_match("/是否是视频/i", $value['Comment']) ):?>
                            <div class="row pl20">
                                <div class="col-md-6">
                                <input type="radio" name="<?php echo $value['Field'];?>" id="<?php echo $value['Field'];?>1" value="1" <?php if($data[$value['Field']] == 1 || empty($data[$value['Field']]) )echo'checked="checked"'; ?>><label for="show">是</label>
                                </div>
                                <div class="col-md-6">
                                 <input type="radio"  style="margin-left:20px;" name="<?php echo $value['Field'];?>" id="<?php echo $value['Field'];?>2" value="0" <?php if($data[$value['Field']] === 0)echo'checked="checked"'; ?>><label for="no_show">否</label>
                                </div>
                      		</div>
                        <?php elseif(preg_match("/内容/i", $value['Comment']) || preg_match("/活动状态/i", $value['Comment']) || preg_match("/分类/i", $value['Comment'])):?>
                            <?php if( preg_match("/内容类型/i", $value['Comment']) || preg_match("/活动状态/i", $value['Comment']) || preg_match("/分类/i", $value['Comment'])):?>
                                <?php

										$comment = explode(' ',$value['Comment']);
										if( count($comment) > 1 )
											unset($comment[0]);
										sort($comment);

								?>
                                <select name="<?php echo $value['Field']; ?>" id="<?php echo $value['Field']; ?>">
                                <?php foreach( $comment as $key => $val):?>
                                <option value="<?php echo $key;?>" <?php if( $data[$value['Field']] == $key ):?> selected="selected"<?php endif;?>><?php echo preg_replace('/(\d+)/','',$val);?></option>
                                <?php endforeach;?>
                                </select>
                            <?php else:?>
                            <?php $if_need_ue=1;?>
                            <script id="container" name="<?php echo $value['Field']; ?>" type="text/plain">
                                <?php echo htmlspecialchars_decode($data[$value['Field']]); ?>
                            </script><br>
                            <?php endif;?>
                         <?php elseif( preg_match("/简介/i", $value['Comment']) || preg_match("/说明/i", $value['Comment'])):?>
                         	<textarea name="<?php echo $value['Field'];?>" rows="8" style="width:500px"><?php echo $data[$value['Field']];?></textarea>\
						<?php elseif( $table == 'bc_admin_users' && preg_match("/权限/i",$value['Comment']) ):?>
	                        <label><input type="checkbox" name="all_access" onclick="selectAccess();" id="all_access" <?php if( $data['access'] == 'all' ):?> checked="checked"<?php endif;?> value="1" >全选</label><br/>
							<?php $user_access = explode(',',$data['access']);?>
                        	<?php foreach( $access as $ky => $acl ):?>
	                        <label><input type="checkbox" name="<?php echo $value['Field'];?>[]" class="accessCheck"  value="<?php echo $acl['id'];?>" <?php if(in_array($acl['id'],$user_access) || $user_access[0] == 'all')echo'checked="checked"'; ?>><?php echo $acl['access_name'];?></label> 	                            
							<?php if( $ky !=0 && $ky%7 == 0 ):?>
                            <br/>
                            <?php endif;?>
                            <?php endforeach;?>                 
                         <?php else:?>
                            <input <?php if($value['Field'] == 'id' ):?> readonly="readonly"<?php endif;?> <?php if( $table == 'main_info' ):?> id='<?php echo $value['Field'];?>'<?php endif;?><?php if( strpos($value['Field'],'time')!==FALSE || strpos($value['Field'],'date')!==FALSE ):?>class="datetime" <?php endif;?> name="<?php echo $value['Field'];?>" type="text" value="<?php if(($value['Field']=='ctime' || $value['Field']=='publish_date' || $value['Field']=='end_time' || $value['Field']=='start_time') && $data[$value['Field']]==0 ):?><?php echo ymdhis();?><?php elseif(($value['Field']=='ctime' || $value['Field']=='end_time' || $value['Field']=='start_time' || $value['Field']=='publish_date') && $data[$value['Field']]!=0):?><?php  echo ymdhis($data[$value['Field']]);?><?php else:?><?php echo $data[$value['Field']];?><?php endif;?>" ><?php if( $value['Field'] == 'sort' || $value['Field'] == 'list_num' ):?><span class="ml20 error">请输入数字，数字大的优先显示</span><?php endif;?>
                        <?php endif;?>
                        <?php if($value['Field']=='password'):?>
                            <input type="checkbox" name="if_update_password" value="1">是否更新密码
                        <?php endif;?>
                    </td>
                    <td class="error"><?php echo $error['title'] ? '*'.$error['title'] : '';?></td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td>操作</td>
                <td><input type='submit' class="btn btn-primary" value="提交" /><a <?php if( $table == $this->event_table ):?>href="/grad/check_info"<?php else:?>href="/cead/lists/<?php echo $table;?>" <?php endif;?> class="ml20 btn btn-primary">返回列表</a></td>
                <td></td>
            </tr>
            </table>
            </form>

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
function selectAccess()
{
	if ($(".accessCheck").attr("checked")) 
	{
		$(".accessCheck").attr("checked", false);
	} 
	else 
	{
		$(".accessCheck").attr("checked", true);
	}	
}	
</script>

<!-- content ends -->

<?php $this->load->view('cead/footer');?>