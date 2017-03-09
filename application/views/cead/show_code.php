<?php $this->load->view('cead/header'); ?>

<div>
  <h2>代码内函数说明</h2>
  <a href="cead/all_code">返回查看所有文件</a>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
       
        <div class="box-content">
           <h3>文件名称:<?php echo $file;?></h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>

                        <th>函数名称</th>
                        <th>注释说明</th>
                        <th>性质</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($res['function_name'] as $k => $row) { 

                        ?>
                        <tr>
                            <td class="center"><?php echo $row; ?></td>
                            <td class="center"><?php echo nl2br($res['comment'][$k]); ?></td>
                            <td class="center">Public</td>
                        </tr>
                  
                    <?php }?>

                </tbody>
            </table>
					
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- content ends -->

<?php $this->load->view('cead/footer');?>