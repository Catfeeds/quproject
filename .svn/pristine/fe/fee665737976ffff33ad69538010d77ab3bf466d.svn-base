<?php $this->load->view('cead/header'); ?>

<div>
  <h2>所有内容管理后台</h2>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
       
        <div class="box-content">
           <?php foreach($res as $key=>$value){?>
            <h3><?php echo $value['table_info']['Comment'];?>(<?php echo $key;?>)管理后台,当前记录数:<?php echo $value['table_info']['num_rows'];?></h3>
           <br>
            <a href="cead/manage_table/<?php echo $key;?>">进入<?php echo $value['table_info']['Comment'];?>管理界面</a>
           <br><br>
            <?php }?>
					
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- content ends -->

<?php $this->load->view('cead/footer');?>