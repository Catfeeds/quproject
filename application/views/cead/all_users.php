<?php $this->load->view('cead/header'); ?>

<div>
  <h2>所有员工统计</h2>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
       
        <div class="box-content">
            <form method="post" action="" id="loginForm" autocomplete="off">
                   
                    <div class="form-group">
                        <label class="login-img account-img" for="start_time">开始时间</label>
                        <input class="form-control datetime" id="start_time" name="start_time" type="text" placeholder="开始时间" autocomplete="off" value="<?php echo isset($start_time) ? ymdhis($start_time) : '';?>">
                    </div>
                     <div class="form-group">
                        <label class="login-img account-img" for="end_time">结束时间</label>
                        <input class="form-control datetime" id="end_time" name="end_time" type="text" placeholder="结束时间" autocomplete="off" value="<?php echo isset($end_time) ? ymdhis($end_time): '';?>">
                    </div>
                   <div class="form-group">
                        <input class="btn btn-embossed btn-primary" id="loginSubmit" name="loginSubmit" type="submit" value="查询">
                    </div>
                    
                </form>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>

                        <th>人员ID</th>
                        <th>人员名称</th>
                        <th>人员邮箱</th>
                        <th>联系方式优先级</th>
                        <th>标签</th>
                        <th>加入时间</th>
                        <th>已经申请工单</th>
                        <th>leader尚未处理工单</th>
                        <th>已经获得收入</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($all_users as $k => $row) { 
                        ?>
                        <tr>
                            <td class="center"><?php echo $row['id']; ?></td>
                            <td class="center"><?php echo $row['username']; ?></td>
                            <td class="center"><?php echo $row['email']; ?></td>
                            <td class="center"><?php echo $row['contact_info']; ?></td>
                            <td class="center"><?php echo $row['tags']; ?></td>
                            <td class="center"><?php echo ymdhi($row['ctime']); ?></td>
                            <td class="center"><?php echo $row['all_manday']; ?></td>
                            <td class="center"><?php echo $row['manday']; ?></td>
                            <td class="center"><?php echo $row['salary']; ?></td>
                            
                     </tr>
                    
                    <?php $all_manday+=$row['all_manday'];
                          $manday+=$row['manday'];
                          $salary+=$row['salary'];}?>
                     <tr>
                            <td class="center">汇总(<?php echo count($all_users);?>人)</td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"></td>
                            <td class="center"><?php echo $all_manday; ?></td>
                            <td class="center"><?php echo $manday; ?></td>
                            <td class="center"><?php echo $salary; ?></td>
                            
                     </tr>


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

<?php $this->load->view('cead/footer');?>