<?php $this->load->view('cead/header')?>

			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						修改密码
					</div>

					<form class="form-horizontal" action="" method="post">
						<?php if( isset($error['login_error']) && !empty($error['login_error']) ):?><p style="color:red"><?php echo $error['login_error'];?></p><?php endif;?>
						<table width="100%">

							<tr>
								<td width="55px">密码: </td>
								<td>
								 <div class="input-prepend" title="Username" data-rel="tooltip">
									<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="password" id="password" type="password" value="<?php echo isset($data['password']) ? $data['password'] : '';?>" /><span style="color:red"><?php echo isset($error['password']) ? $error['password'] : '';?></span>
								</td>
							</tr>		
							<tr>
								<td><?php if(!empty($res)){?>修改密码成功,下次登录生效<?php }?></td>
								<td>							
									<br/>
									<p class="center span5">
									<button type="submit" class="btn btn-primary">修改密码</button>
									</p>									
								</td>
							</tr>					
						</table>
					</form>
				</div><!--/span-->
			</div><!--/row-->

       
					<!-- content ends -->
	
<?php $this->load->view('cead/footer')?>