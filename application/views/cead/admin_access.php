<?php $this->load->view('cead/header'); ?>

    <div>
        <h2>所有管理员列表</h2>
    </div>
    <div class="row-fluid sortable">
    <div class="box span12">

    <div class="box-content">


    <form method="post" action="" id="loginForm" autocomplete="off">

    <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
    <tr>

        <th>人员ID</th>
        <th>人员名称</th>
        <th>人员权限</th>

        <th>加入时间</th>
        <th>操作</th>


    </tr>
    </thead>
    <tbody>
<?php foreach ($res_all as $k => $row) { ?>
    <tr>
        <td class="center"><?php echo $row['id']; ?></td>
        <td class="center"><?php echo $row['username']; ?></td>
        <?php if ($id == $row['id']) {
            $all_access = get_admin_access(1);
            $user_access = get_admin_access_id($row['id']);

            ?>
            <td class="center">

                <?php foreach ($all_access as $key => $one) { ?>
                    <input type="checkbox" name="access[]"
                           value="<?php echo $one['id']; ?>" <?php if(in_array($one['id'],$user_access))echo 'checked' ?>>
                    <?php echo $one['access_name']; ?>
                <?php } ?>
                <input type="hidden" name="id"
                       value="<?php echo $row['id']; ?>">
                <input type="submit">

            </td>
        <?php } else { ?>
            <td class="center">
                <?php
                echo get_admin_access_name($row['id']);
                ?></td>
        <?php } ?>
        <td class="center"><?php echo ymdhis($row['ctime']); ?></td>
        <td class="center"><a href="cead/admin_access/<?php echo $row['id']; ?>">编辑</a></td>

    </tr>

<?php }?>
    </tbody>
    </table>
    </form>
    <div style="clear:both">
        <br/>
        <?php if (isset($pagination)): ?>
            <?php echo $pagination; ?>
        <?php endif; ?>
    </div>

    </div>
    </div><!--/span-->

    </div><!--/row-->


    <!-- content ends -->

    <?php $this->load->view('cead/footer'); ?>