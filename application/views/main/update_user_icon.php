
<?php $this->load->view("header");?>

<form action="/api/update_user_icon" method="POST" enctype="multipart/form-data">
<?php

foreach ($form as $key => $value) {

	echo array_form($key,$value,'','','',$postinfo);
		# code...
}

?>
<?php if($error){echo $error;}?>
<input type='submit' value="提交">
</form>

<?php $this->load->view("footer");?>