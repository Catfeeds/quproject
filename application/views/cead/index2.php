<?php $this->load->view('ckad/header') ?>

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
                        <th>项目名称</th>
                         <th tilte="表示幻灯,T表示头条,F表示第一栏目,S表示第二栏">标记</th>
                        <th>发起人</th>
                        <th>应用平台</th>
                        <th>网站分类</th>
                        <th>logo</th>
                        <th>视频地址</th>
                        <th>预估总时间</th>
                        <th>已使用时间</th>
                        <th>项目地址</th>
                        <th>项目简介</th>
                        <th>募资期限</th>
                        <th>募资目标</th>
                        <th>访问次数</th>
                        <th>发行商</th>
                        <th>后期融资</th>
                        <th>是否审核</th>
                        <th>发起时间</th>
                        <th>详细</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($product as $row) { ?>
                        <tr>
                            <td title="<?php echo $row['name']; ?>">
                                <?php if (mb_strlen($row['name']) < 9) echo $row['name'];
                                else echo mb_substr($row['name'], 0, 8) . "..."; ?>
                            
                            </td>
                            <td class="center"><?php echo $row['flag']; ?></td>
                            <td class="center"><?php echo $row['username']; ?></td>
                            <td class="center"><?php echo $row['app_equip']; ?></td>
                            <td class="center"><?php echo $row['type_id']; ?></td>
                            <td class="center">
                                <?php if ($row['logo']): ?>
                                    <img class="avatar-medium" height="60" width="60" src="<?php echo strstr($row['logo'], 'http://') ? $row['logo'] : "./uploads/" . $row['logo']; ?>">
    <?php endif; ?>
                            </td>
                            <td class="center">
                                点我
                            </td>
                            <td class="center"><?php echo $row['all_time']; ?></td>
                            <td class="center"><?php echo $row['used_time']; ?></td>
                            <td class="center"><?php echo $row['province'] . "<br/>" . $row['city'] . "<br/>" . $row['town']; ?></td>
                            <td class="center" title="<?php echo $row->content; ?>">
                                <?php if (mb_strlen($row['content']) < 9) echo $row['content'];else echo mb_substr($row['content'], 0, 9) . "..."; ?>
                            </td>
                            <td class="center"><?php echo $row['duration']; ?></td>
                            <td class="center"><?php echo $row['goal']; ?></td>
                            <td class="center"><?php echo $row['logs']; ?></td>
                            <td class="center"><?php echo $row['if_has_publisher']; ?></td>
                            <td class="center"><?php echo $row['if_finance']; ?></td>
                            <td>
                                <?php if ($row['if_show'] == 1): ?>
                                    <span class="btn btn-primary">通过</span>
                                <?php elseif ($row['if_show'] == 3): ?>
                                    <span class="btn btn-danger">拒绝</span>
                                <?php else: ?>
                                    未审核
                                <?php endif; ?>
                            </td>
                            <td><?php echo date("Ymd", strtotime($row['ctime'])); ?></td>
                            <td><a href="/ckad/product/<?php echo $row['id']; ?>">查看</a></td>
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
                                            window.location.href = "ckad/delete_web/" + id;
                                        } else {
                                            return false;
                                        }
                                    }
</script>
<?php
$this->load->view('ckad/footer')?>