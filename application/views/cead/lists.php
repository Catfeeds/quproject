<?php $this->load->view('cead/header') ?>
<div>
  <h2><?php echo $table_info['Comment'];?>列表</h2>
</div>
<div class="row-fluid sortable container">
    <div class="box span12">
       
        <div class="box-content ml20">
        <br/>
        <?php if( $table != 'main_aboutus' ):?>
		<p class="fr"><a href="/cead/add/<?php echo $table;?>" class="btn btn-primary" >添加新记录</a></p>
        <?php endif;?>
		<?php if( $_SESSION['msg']) :?>
        <p class="error"><?php echo $_SESSION['msg']; unset($_SESSION['msg']);?></p>
        <?php endif;?>        
            
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>                	
                    <tr>
					<?php foreach ($column as $key => $value):?>
                    	<?php $field = explode(' ',$value['Comment']);?>
                        <?php if( ($value['Field'] == 'content' || $value['comment'] == '内容') ):?>
                        <?php else:?>                        
                        <th><?php echo $field[0];?></th>
                        <?php endif;?>
                    <?php endforeach;?>
                    	<th>操作</th>
                    </tr>
                </thead>   
                <tbody>
                <?php foreach($data  as $key => $value):?>
                    <tr>                        
                        <?php foreach ($column as $k => $val ):?>
                        <?php if( ($val['Field'] == 'content' || $val['comment'] == '内容') ):?>
                        <?php else:?>
                        <td>
                            <?php 						
										$col_value = explode(' ',$val['Comment']);
										unset($col_value[0]);
									
                                if( is_numeric($value[$val['Field']]) && strlen($value[$val['Field']])==10 )
                                {
                                    echo ymdhis($value[$val['Field']]);
                                }
                                elseif( $val['Field'] == 'image' )
                                {
                                    echo "<a href='".$value[$val['Field']]."'><img src='".$value[$val['Field']]."' width='200px'/></a>";
                                }
								elseif( $table == 'bc_admin_users' && $val['Field'] == 'access' )
								{
									echo $value['access'] != 'all' ? $value['access_name'] : 'all';
								}								
                                else 
                                {
									if( $val['Field'] == 'if_show' )
									{
										sort($col_value);
									}
				
									echo array_key_exists($value[$val['Field']],$col_value) ? preg_replace('/(\d+)/','',htmlspecialchars_decode($col_value[$value[$val['Field']]])) : mb_substr(htmlspecialchars_decode($value[$val['Field']]),0,60);
                                } 
                            ?>
                         </td>
                         <?php endif;?>
                       <?php endforeach;?>
                         <td class="center">
                            <a href="/cead/edit/<?php echo $table;?>/<?php echo $value['id']; ?>">编辑</a>
                            <span class="ml20"></span>
                            <a href='javascript:void(0);' onclick='if(confirm("是否删除"))location.href="cead/delete/<?php echo $table;?>/<?php echo $value['id']; ?>"'>删除</a>
<?php /*?>                            <?php if( $table != 'main_aboutus' ):?>
                            <br>
                            <a href='javascript:void(0);' onclick='if(confirm("是否删除"))location.href="cead/delete/<?php echo $table;?>/<?php echo $value['id']; ?>"'>删除</a>
                            <?php endif;?><?php */?>
                        </td>                               
                        </tr>
                    <?php endforeach;?>
                </tbody>
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


<!-- content ends -->

<?php $this->load->view('cead/footer')?>
