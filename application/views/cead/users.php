<?php $this->load->view('cead/header'); ?>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>操作</h2>

        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>头像</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($res as $k => $row) { ?>
                        <tr>
                            <td class="center"><?php echo $row['username']; ?></td>
                            <td class="center"><?php echo $row['email'];?></td>
                            <td class="center"><?php echo $row['icon']; ?></td>
                            <td class="center"><?php echo date("Y-m-d H:i:s",$row['ctime']); ?></td>
                            <td class="center"><a href="/cead/edit_users/<?php echo $row['id']; ?>">编辑</a>|<a href="javascript:confirm_delete(<?php echo $row['id']; ?>)">删除</a></td>                               
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
            window.location.href = "cead/delete_users/" + id;
        } else {
            return false;
        }
    }
</script>
<?php $this->load->view('cead/footer');?>