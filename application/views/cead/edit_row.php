<?php $this->load->view('cead/header'); ?>
<script type="text/javascript" charset="utf-8" src="statics/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="statics/ueditor/ueditor.all.js"> </script>
     <script type="text/javascript" charset="utf-8" src="statics/ueditor/lang/zh-cn/zh-cn.js"></script>
<div>
 
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>操作</h2>
        <a href="cead/manage_table/<?php echo $table;?>">返回列表</a>
        </div>
        <div class="box-content">
            <h2><?php if(!empty($_POST)){?>操作成功<?php }?></h2>
            <form action="" method="post" enctype="multipart/form-data">
             <?php foreach ($res['columns_info'] as $k2 => $row2) { ?>
                <?php echo $row2['Comment']?$row2['Comment']:'自增或时间字段'; ?>(<?php echo $row2['Field']; ?>):
                  
                  <?php if(preg_match("/上传/i", $row2['Comment'])){?>
                      <input name="<?php echo $row2['Field']; ?>" type="file" value="">
                    <?php if(!empty($res['all_data'][$row2['Field']])){ ?>
                    <img src="<?php echo $res['all_data'][$row2['Field']];?>" width='100'><?php }?>

                    <?php }elseif(preg_match("/富文本/i", $row2['Comment'])){$if_need_ue=1;?>

                    <script id="container" name="<?php echo $row2['Field']; ?>" type="text/plain">
                <?php echo htmlspecialchars_decode($res['all_data'][$row2['Field']]); ?>
                </script>
            
            
            
            <br>
                     

                    <?php }else{?>

                   <input <?php if(strpos($row2['Field'],'time')!==FALSE){
                 echo 'class="datetime"';}
                 ?> name="<?php echo $row2['Field'];?>" type="text"
                   value="<?php
                   if(($row2['Field']=='ctime' || $row2['Field']=='end_time' || $row2['Field']=='start_time') && $res['all_data'][$row2['Field']]==0)
                    {
                        echo ymdhis();
                    }
                    elseif(($row2['Field']=='ctime' || $row2['Field']=='end_time' || $row2['Field']=='start_time') && $res['all_data'][$row2['Field']]!=0)
                    {
                        echo ymdhis($res['all_data'][$row2['Field']]);
                    } else
                    {
                        echo $res['all_data'][$row2['Field']];
                    }
                    ?>" >
                <?php }?>
                <?php if($row2['Field']=='password'){?>
                <input type="checkbox" name="if_update_password" value="1">是否更新密码
                <?php }?>
                <br>
            
            <?php } ?>
            

            <br>
            <input type="submit">
            </form>
        </div>
    </div><!--/span-->

</div><!--/row-->
<?php if($if_need_ue==1){?>
<script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
    <?php }?>
<!-- content ends -->

<?php $this->load->view('cead/footer');?>