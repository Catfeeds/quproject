<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>管理后台</title>
	<base href="<?php echo base_url();?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<link id="bs-css" href="/statics/css/bootstrap-cerulean.css" rel="stylesheet">
	<link href="/statics/css/font-awesome.min.css" rel="stylesheet">
	<link href="/statics/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen"> 
    <link href="/statics/css/bootstrap-datepicker.css" rel="stylesheet" media="screen"> 
    <link rel="stylesheet" type="text/css" href="/statics/js/uploadify/uploadify.css">

    <script type="text/javascript" src="/statics/js/jquery-2.0.3.min.js" charset="UTF-8"></script>
   
    <script src="/statics/js/uploadify/jquery.uploadify.js" type="text/javascript"></script>    
	<script type="text/javascript" src="/statics/js/bootstrap.min.js"></script>              
    <script type="text/javascript" src="/statics/js/bootstrap-datetimepicker.js" charset="UTF-8"></script> 
     <script type="text/javascript" src="/statics/js/bootstrap-datepicker.js" charset="UTF-8"></script>  
                
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  * {word-break:break-all; word-wrap:break-word;}
	  .fr{ float:right}
	  .fl{ float:left}
	  .mt10{ margin-top:10px;}
	  .ml5{ margin-left:5px;}
	  .ml10{ margin-left:10px;}
	  .ml20{ margin-left:20px;}
	  .ml50{ margin-left:50px;}
	  .pl20{ padding-left:20px;}
	  .clear{clear:both}
	  .download li{ list-style:none}
	  .download li span{ min-width:80px; float:left}	
	  .defect{ padding-left:300px;}
	  .evaluate label,.evaluate input{ float:left;}
	  .evaluate input[type=radio]{ margin-top:5px;}
	  .evaluate label{ margin-top:2px;}
	  .pl20{ padding-left:20px;}
	  .error{ color:#F00}
	  .pager strong{    display: inline-block;
    padding: 5px 14px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px;
		}
	</style>
	


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>				
				<!-- theme selector ends -->
				
				
			
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
			<div style="clear:both">
				<?php if(!empty($_SESSION['admin_name'])){ ?>
				<span align="right">账户:<?php echo $_SESSION['admin_name'];?>
				<a href="cead/logout">退出</a></span>
				<?php }?>
			</div>
		<div class="row-fluid">			
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">


						<?php if( (isset($_SESSION['admin_id']) )):?>
							 
							<li><a class="ajax-link" href="<?php echo base_url();?>" target="_blank"><i class="icon-home"></i><span class="hidden-tablet">查看网站首页</span></a></li>
							<li class="nav-header hidden-tablet">管理</li>
							<?php $all_access = get_admin_access($_SESSION['admin_id']);foreach ($all_access as $key => $value) {?>
							
							<li><a class="ajax-link" href="<?php echo $value['access_path'];?>"><i class="icon-home"></i><span class="hidden-tablet"><?php echo $value['access_name'];?></span></a></li>
                           <?php }?>
                           <?php endif;?>       
					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			