<?php $this->load->view('cead/header');?>
<div class="row-fluid sortable">
    <div class="box span12">
		<div class="box-header well data-original-title">
			<h2>您正在查看：<?php echo $data['nickname'];?></h2>
		</div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <tr>
                    <td width="15%">联系电话：</td>  
                    <td><?php echo $data['telephone'];?></td>
                </tr>
                <tr>
                    <td>头像：</td>  
                    <td><img src="<?php echo $data['icon'];?>" width="200"></td>
                </tr>   
                <?php if( $type != 4 ):?>         
                <tr>
                    <td><?php if( $type == 1 ):?>真实姓名<?php else:?>联系人姓名<?php endif;?>：</td>
                    <td><?php echo $data['realname'];?></td>
                </tr>
                <?php endif;?>
                <tr>
                    <td>昵称：</td>
                    <td><?php echo $data['nickname'];?></td>
                </tr>  
                <?php if( $type == 1 ):?>          
                <tr>
                    <td>性别：</td>
                    <td><?php echo get_gender($data['sex']);?></td>
                </tr>
                <tr>
                    <td>出生日期：</td>
                    <td><?php echo $data['birthday'];?></td>
                </tr>
                <tr>
                    <td>大洲：</td>
                    <td><?php echo get_dazhou($data['dazhou']);?></td>
                </tr>
                <tr>
                    <td>国家：</td>
                    <td><?php echo $data['country'];?></td>
                </tr>
                <tr>
                    <td>所在中国城市：</td>
                    <td><?php echo $data['city'];?></td>
                </tr>
                <tr>
                    <td>学生证照片：</td>  
                    <td><img src="<?php echo $data['xueshengzheng'];?>" width="200"></td>
                </tr> 
                <tr>
                    <td>护照照片：</td>  
                    <td><img src="<?php echo $data['huzhao'];?>" width="200"></td>
                </tr> 
                <tr>
                    <td>年级：</td>
                    <td><?php echo $data['grade'];?></td>
                </tr>
                <tr>
                    <td>收入：</td>
                    <td><?php echo $data['income'];?></td>
                </tr>                
                <tr>
                    <td>还在要中国停留几年：</td>
                    <td><?php echo get_stay_china_year($data['stay_china_year']);?></td>
                </tr>
                <tr>
                    <td>HSK等级：</td>
                    <td><?php echo $data['hsk_class'];?></td>
                </tr>
                <tr>
                    <td>每天有多少空闲时间：</td>
                    <td><?php echo get_free_time($data['free_time']);?></td>
                </tr>
                <tr>
                    <td>之前是过直播或演出经验：</td>
                    <td><?php echo get_if_show_experience($data['if_show_experience']);?></td>
                </tr>  
                <tr>
                    <td>基本信息链接地址：</td>
                    <td><?php echo $data['base_url'];?></td>
                </tr>                 
                <tr>
                    <td>直播间链接地址：</td>
                    <td><?php echo $data['show_url'];?></td>
                </tr>                                 
				<?php elseif( $type == 2 ):?>
                <tr>
                    <td>公司名称：</td>
                    <td><?php echo $data['company_name'];?></td>
                </tr>
                <tr>
                    <td>城市：</td>
                    <td><?php echo $data['city'];?></td>
                </tr>
                <tr>
                    <td>需求描述：</td>
                    <td><?php echo $data['company_need'];?></td>
                </tr>                
                <?php else:?>
                <tr>
                	<td>学校:</td>
                    <td><?php echo $data['school'];?></td>
                </tr>
                <tr>
                	<td>年级：</td>
                    <td><?php echo $data['grade'];?></td>
                </tr>
                <?php endif;?>         
                                                                                                                                   
                <tr>
                	<td>操作</td>
                	<td><a class="btn btn-embossed btn-primary" href="/grad/check_users/<?php echo $type;?>" >返回列表</a><a class="btn btn-embossed btn-primary ml20" href="/grad/edit_user/<?php echo $type.'/'.$id;?>" >编辑</a></td>
                </tr>
            </table>   
               
        </div>
    </div>
</div>
<?php $this->load->view('cead/footer');?>