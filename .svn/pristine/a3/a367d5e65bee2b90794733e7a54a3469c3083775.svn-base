<?php $this->load->view('cead/header'); ?>
<script type="text/javascript" charset="utf-8" src="statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="statics/ueditor/ueditor.all.js"> </script>
     <script type="text/javascript" charset="utf-8" src="statics/ueditor/lang/zh-cn/zh-cn.js"></script>
<div>
 
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>操作</h2> <a href="cead/manage_table/<?php echo $table;?>">返回列表</a>

        </div>
        <div class="box-content">
           <?php foreach ($res['columns_info'] as $k2 => $row2) { ?>
                <?php echo $row2['Comment']?$row2['Comment']:'自增或时间字段'; ?>(<?php echo $row2['Field']; ?>):
                  
                  <?php if(preg_match("/上传/i", $row2['Comment'])){?>
                      
                    <?php if(!empty($res['all_data'][$row2['Field']])){ ?><img src="<?php echo $res['all_data'][$row2['Field']];?>" width='100'><?php }?>

                    <?php }elseif(preg_match("/富文本/i", $row2['Comment'])){?>

                   
                <?php echo htmlspecialchars_decode($res['all_data'][$row2['Field']]); ?>
                
            
            
            
            <br>
                    <?php }else{?>

                   <?php 
                   if($row2['Field']=='ctime' && $res['all_data'][$row2['Field']]==0)
                    {
                        echo date("Y-m-d H:i:s",time());
                    }
                    elseif($row2['Field']=='ctime' && $res['all_data'][$row2['Field']]!=0)
                    {
                        echo date("Y-m-d H:i:s",$res['all_data'][$row2['Field']]);
                    } else
                    {
                        echo $res['all_data'][$row2['Field']]; 
                    }
                    ?>
                <?php }?>

                <br>
            
            <?php } ?>
            
            
            <br>	
            <a href="cead/edit_row/<?php echo $table;?>/<?php echo $res['all_data']['id'];?> ">编辑</a>			
           
			<div style="clear:both">
				
			</div>				
        </div>
    </div><!--/span-->

</div><!--/row-->

<script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
<!-- content ends -->

<?php $this->load->view('cead/footer');?>