<?php $this->load->view('cead/header') ?>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-picture"></i>网站概况</h2>

        </div>
        <div class="box-content">        
			 <table class="table table-striped table-bordered bootstrap-datatable datatable">
                 <tr>
                    <th width="15%">时间</th>
                    <th width="15%">新增活动</th>
                    <th width="15%">新增主播</th>
                    <th width="15%">收藏信息</th>
                    <th width="15%">点赞信息</th>
                     <th width="15%">邀请人员</th>
                    <th width="15%">消息</th>
                     <th width="15%">照片</th>
                     <th width="15%">评论</th>
                     <th width="15%">关注</th>
                </tr>
            <?php foreach ($resent_days as $key => $value):?>
            	
                <tr id="name_tr">
                    <td width="15%"><?php echo $value;?></td>
                    <td width="15%"><?php echo $res['info_num'][$value]?$res['info_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['zhubo_num'][$value]?$res['zhubo_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['favor_num'][$value]?$res['favor_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['support_num'][$value]?$res['support_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['invite_num'][$value]?$res['invite_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['msg_num'][$value]?$res['msg_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['photo_num'][$value]?$res['photo_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['comments_num'][$value]?$res['comments_num'][$value]:0;?></td>
                    <td width="15%"><?php echo $res['guanzhu_num'][$value]?$res['guanzhu_num'][$value]:0;?></td>
            </tr>
            <?php endforeach;?>
            </table>
						
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- content ends -->

<?php
$this->load->view('cead/footer')?>