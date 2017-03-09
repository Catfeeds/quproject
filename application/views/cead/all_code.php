<?php $this->load->view('cead/header'); ?>

<div>
  <h2>核心代码说明</h2>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
       
        <div class="box-content">
           <?php foreach($res as $key=>$value){?>
            <h3>目录名称:<?php echo $key;?></h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>

                        <th>文件名称</th>
                        <th>注释说明</th>
                        <th>操作</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($value as $k => $row) { 
                            
                                if(is_array($row['sub'])){
                                   foreach ($row['sub'][$key] as $k3 => $row3) { 

                        ?>
                        <tr>
                            <td class="center"><?php echo $row3['file_name']; ?></td>
                            <td class="center"><?php echo nl2br($row3['comment']); ?></td>
                            <td class="center"><a href="cead/show_code/<?php echo str_replace("/", "-", $key); ?><?php echo str_replace("/", "-", $row3['file_name']); ?>">查看函数</a></td>
                        </tr>
                    <?php } }if(!empty($row['file_name'])){ ?>
                        <tr>
                            <td class="center"><?php echo $row['file_name']; ?></td>
                            <td class="center"><?php echo nl2br($row['comment']); ?></td>
                            <td class="center"><a href="cead/show_code/<?php echo str_replace("/", "-", $key); ?><?php echo str_replace("/", "-", $row['file_name']); ?>">查看函数</a></td>
                        </tr>
                    <?php }}?>

                </tbody>
            </table>
             <?php }?>
					
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- content ends -->

<?php $this->load->view('cead/footer');?>