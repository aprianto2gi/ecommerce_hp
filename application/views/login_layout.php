<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">

  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap2.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url(); ?>css/bootstrap-theme2.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo base_url(); ?>css/elegant-icons-style2.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>css/font-awesome2.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style-responsive2.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
<style>
  
  .hde{color:#ff0000; }


</style>

  <div class="container">

    <form class="logn-form" action="<?php echo base_url(); ?>Login/loginSubmit" method="post">
      <div class="logn-wrap">
        <p class="logn-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php //echo $loginerror; ?>" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="pass" class="form-control" placeholder="Password">
        </div>
        <!--<label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
        </label>-->
        <button class="btn btnlogn-primary btn-lg btn-block" type="submit">Login</button>
        <button class="btn btnlogn-info btn-lg btn-block" type="submit">Register</button>
        <a class="hde" href=""><?php echo validation_errors(); ?><?php if(isset($loginerror)){ ?><?php echo $loginerror; ?><?php }?></a>
        
      </div>
    </form>


    <!--<form class="logn-form2" action="<?php echo base_url(); ?>Login/loginSubmit" method="post">
      <div class="logn-wrap">
        <p class="logn-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php //echo $loginerror; ?>" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="pass" class="form-control" placeholder="Password">
        </div>
       
        <button class="btn btnlogn-primary btn-lg btn-block" type="submit">Login</button>
        <button class="btn btnlogn-info btn-lg btn-block" type="submit">Register</button>
        <a class="hde" href=""><?php echo validation_errors(); ?><?php if(isset($loginerror)){ ?><?php echo $loginerror; ?><?php }?></a>
        
      </div>
    </form>-->

    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <!--<a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
        </div>
    </div>
  </div>


</body>

</html>
