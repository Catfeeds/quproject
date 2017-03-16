<?php $this->load->view('cead/header'); ?>

<div>
  <h2>数据字典</h2>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
       
        <div class="box-content">
           <?php foreach($res as $key=>$value){?>
            <h3>表名称:<?php echo $key;?>,当前记录数:<?php echo $value['table_info']['Rows'];?>,表说明:<?php echo $value['table_info']['Comment'];?>,最后更新:<?php echo $value['table_info']['Update_time'];?></h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>

                        <th>字段名称</th>
                        <th>类型</th>
                        <th>默认值</th>
                        <th>说明</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($value['columns_info'] as $k => $row) { ?>
                        <tr>
                            <td class="center"><?php echo $row['Field']; ?></td>
                            <td class="center"><?php echo $row['Type']; ?></td>
                            <td class="center"><?php echo $row['Default']; ?></td>
                            <td class="center"><?php echo $row['Comment']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
             <?php }?>
					
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- content ends -->

<?php $this->load->view('cead/footer');?>