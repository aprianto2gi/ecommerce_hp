<?php
	if(!$this->session->has_userdata('admin_name')){
		redirect(base_url() . "AdminLogin");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title>Station Shop</title>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/adminstyle.css" media="screen" />
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navi.css" media="screen" />-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>ckeditor/style.js" type="text/css">

	<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js" language="javascript"></script>
	<!--<script type="text/javascript" src="<?php echo base_url();  ?>js/jquery-3.2.1.min.js"></script>-->

	<!--<script language="javascript" src="https://code.jquery.com/jquery-1.8.2.min.js"> </script>-->

	<!== start datatables ==>
	<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dataTables.min.css">
    <script language="javascript" src="<?php echo base_url(); ?>js/dataTables.min.js"> </script>-->
    
    <!-- end datatables -->

    <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script language="javascript" src="js/dataTables.min.js"> </script>
    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
	    $(document).ready(function() {
	        $('#example').DataTable();
	    } );
    </script>

    <script type="text/javascript">
	    $(document).ready(function() {
	        $('#example1').DataTable();
	    } );
    </script>

	<script type="text/javascript">
	$(function(){
		$(".box .h_title").not(this).next("ul").hide("normal");
		$(".box .h_title").not(this).next("#home").show("normal");
		$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
	});
	</script>
	<style>
		
		.hide{ display:none !important;  /*visibility:hidden;*/ }


	</style>
</head>
<body>
	<div class="container-fluid">
		<!-- <button class="btn btn-primary"></button> -->
	<div class="wrap">
		<div id="header">
			<div id="top">
				<div class="left">
					<p style="color: #5a88ca;">Welcome, <strong><?php if($this->session->has_userdata("admin_name")){ ?><?php echo $this->session->userdata("admin_name"); ?><?php }?></strong> [ <a href="<?php echo base_url(); ?>AdminLogin/LogOut">logout</a> ]</p>
				</div>
				<div class="right">
					<div class="align-right">
	               
	                
						<p><strong></p>
					</div>
				</div>
			</div>
			<div id="nav"> <?php #ini adalah menu ?>
				<ul>
					<li class="upp"><a href="<?php echo base_url(); ?>#">News</a>
						
					</li>
					<li class="upp "><a href="<?php echo base_url(); ?>MemberMain">Admin</a>
					
					</li>
					<li class="upp "><a href="<?php echo base_url(); ?>UserMain">Customer</a>
					
					</li>
					<li class="upp "><a href="<?php echo base_url(); ?>AdminMain">Product</a>
					
					</li>
	                <li class="upp "><a href="<?php echo base_url(); ?>#">Contact</a>
					
					</li>
				</ul>
			</div> 
		</div>
		
		<div id="content">
			<div id="sidebar">
				<div class="box">
					<div class="h_title">&#8250; Menu Content</div>
					<ul id="home">
						<li class="b1"><a class="icon page" href="<?php echo base_url(); ?>news_admin.php">News </a></li>
	                    <li class="b1"><a class="icon add_user" href="<?php echo base_url(); ?>MemberMain">Admin</a></li>
	                    <li class="b2"><a class="icon report" href="<?php echo base_url(); ?>OrderMain">Order</a></li>
						<li class="b2"><a class="icon config" href="<?php echo base_url(); ?>UserMain">Customer </a></li>
						
						<li class="b2"><a class="icon product" href="<?php echo base_url(); ?>AdminMain">Product</a></li>
	                    
	                    <li class="b2"><a class="icon contact" href="<?php echo base_url(); ?>contact_admin.php">Contact</a></li>
					</ul>
				</div>
				
				<div class="box hide">
					<div class="h_title">&#8250; Manage content</div>
					<ul>
						<li class="b1"><a class="icon page" href="<?php echo base_url(); ?>">Show all pages</a></li>
						<li class="b2"><a class="icon add_page" href="<?php echo base_url(); ?>">Add new page</a></li>
						<li class="b1"><a class="icon photo" href="<?php echo base_url(); ?>">Add new gallery</a></li>
						<li class="b2"><a class="icon category" href="<?php echo base_url(); ?>">Categories</a></li>
					</ul>
				</div>
				<div class="box hide">
					<div class="h_title">&#8250; Users</div>
					<ul>
						<li class="b1"><a class="icon users" href="<?php echo base_url(); ?>">Show all users</a></li>
						<li class="b2"><a class="icon add_user" href="<?php echo base_url(); ?>">Add new user</a></li>
						<li class="b1"><a class="icon block_users" href="<?php echo base_url(); ?>">Lock users</a></li>
					</ul>
				</div>
				<div class="box hide">
					<div class="h_title">&#8250; Settings</div>
					<ul>
						<li class="b1"><a class="icon config" href="<?php echo base_url(); ?>">Site configuration</a></li>
						<li class="b2"><a class="icon contact" href="<?php echo base_url(); ?>">Contact Form</a></li>
					</ul>
				</div>
			</div>
	        
	        
	        
			<div id="main">
	        
	        
			  <div class="clear"></div>
	          <div class="full_w">
					<div class="h_title">Manage pages - table</div>
					  <?php 
						  if (isset($content_page)) {
							  $this->load->view("admin/" . $content_page);
						  }
					  ?>
					</div>
				    
				
				
			</div>
	            
	            
	         
	            
		  </div>
		 <div class="clear"></div>
		</div> <?php ?> 
	    
	    	<?php
				
				// akhir dari product_admin.php
			
			?>

		<div id="footer">
			<!--<div class="left">
				<p>Design: <a href="<?php echo base_url(); ?>http://kilab.pl">Paweł Balicki</a> | Admin Panel: <a href="<?php echo base_url(); ?>">YourSite.com</a></p>
			</div>
			<div class="right">
				<p><a href="<?php echo base_url(); ?>">Example link 1</a> | <a href="<?php echo base_url(); ?>">Example link 2</a></p>
			</div>-->
		</div>
	</div>
	</div>


			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<!--<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
			 <!-- Include all compiled plugins (below), or include individual files as needed
			<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>-->
</body>
</html>
