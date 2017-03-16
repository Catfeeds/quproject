<?php $this->load->view('cead/header'); ?>

<div>

</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>操作</h2><a href="cead/manage_all_tables">返回列表</a>|<a href="cead/add_row/<?php echo $table;?>">添加</a>

        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <form action="" method="post">
                    <tr>
                    <?php foreach ($res['columns_info'] as $k => $row) { ?>
                        <th>
                            <?php echo $row['Comment']?$row['Comment']:'自增或时间字段'; ?>
                            (<?php echo $row['Field']; ?>)
                            <br><input style="width:100px;"
                                <?php if(strpos($row['Field'],'time')!==FALSE){
                                    echo 'class="datetime"';}
                                ?> type="text" name="<?php echo $row['Field']; ?>">
                        </th>
                    <?php }?>
                        <th>操作<br><input type="submit" name="搜索"></th>
                    </tr>
                    </form>
                </thead>   
                <tbody>
                    <?php foreach ($res['all_data'] as $k1 => $row1) { ?>
                    <tr>
                        
                        <?php foreach ($res['columns_info'] as $k2 => $row2) { ?>
                        <td><?php if(is_numeric($row1[$row2['Field']])&&strlen($row1[$row2['Field']])==10){
                            echo ymdhis($row1[$row2['Field']]);
                        }else {
                            echo mb_substr($row1[$row2['Field']],0,60);
                        } ?></td>
                       <?php } ?>
                         <td class="center">
                            <a href="/cead/show_row/<?php echo $table;?>/<?php echo $row1['id'];?>">查看</a>
                            <br>
                            <a href="/cead/edit_row/<?php echo $table;?>/<?php echo $row1['id']; ?>">编辑</a>
                            <br>
                            <a href="javascript:confirm_delete(<?php echo $row1['id']; ?>)">删除</a></td>                               
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
			<div style="clear:both">
				<br/>
				 <?php if (isset($pagination)):?>
					<?php echo $pagination;?>
				 <?php endif;?>
			</div>				
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- content ends -->

<script>
    function confirm_delete(id) {
        if (confirm("您确定要删除这个记录么？")) {
            window.location.href = "cead/delete_row/<?php echo $table;?>/" + id;
        } else {
            return false;
        }
    }
</script>
<?php $this->load->view('cead/footer');?>