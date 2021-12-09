
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <script language="javascript" src="https://code.jquery.com/jquery-1.8.2.min.js"> </script>
    <!--<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>ckeditor/style.js" type="text/css">
    <script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js" language="javascript"></script>
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap2.min.css">-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/starability-all.min.css"/>
    <!====================================================================================>
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>css/bootstrap-theme2.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>css/elegant-icons-style2.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>css/font-awesome2.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>css/style-responsive2.css" rel="stylesheet" />
    <!====================================================================================>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
<style>

  .hde{color:#ff0000 !important; }
  .iw{padding: 6px; margin-top: 10px; width: 150px;}

  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the image and position the close button */
  .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
  }

  img.avatar {
      width: 40%;
      border-radius: 50%;
  }

  .containerq {
      padding: 16px;
  }

  span.psw {
      float: right;
      padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
      display: none; 
      position: fixed; 
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      overflow: auto; 
      background-color: rgb(0,0,0); 
      background-color: rgba(0,0,0,0.4); 
      padding-top: 60px;
  }

  /* The Close Button (x) */
  .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: red;
      cursor: pointer;
  }
  .atau{
    border-top: 1px solid #ddd;
    margin: 20px 0;
    position: relative;
    text-align: center;
  }
  .txtatau{
    color: #909090 !important;
  }
  .atau p{
    text-align: center;
    position: absolute;
    top: -13px;
    width: 100%;
  }
  .reg-icon-google{
    background-size: auto auto;
    background-size: cover;
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align: middle;
    margin-top: -17px;
    margin-right: 10px;
  }

</style>

  
    <div class="header-area"> <!-- Start header area -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <!==============================START HEADER MENU===================================>
                        <ul>
                            <?php if($this->session->has_userdata("customer_name")){?>
                            <li><a href="<?php echo base_url(); ?>AkunMain"><i class="fa fa-user"></i><?php echo $this->session->userdata("customer_name"); ?></a></li>
                            <!-- <li><a href="<?php echo base_url(); ?> "><i class="fa fa-heart"></i> Wishlist</a></li> -->
                            <li><a href="<?php echo base_url(); ?>cart"><i class="fa fa-user"></i> Cart</a></li>
                            <li><a href="<?php echo base_url(); ?>Konfirmasi"><i class="fa fa-user"></i> Konfirmasi Pembayaran</a></li>
                            <li><a href="<?php echo base_url(); ?>login/logOut"><i class="fa fa-user"></i> Logout</a></li>
                            <?php }else{?>
                            <li><a href="#" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="<?php echo base_url(); ?>register"><i class="fa fa-user"></i> Register</a></li>
                            <?php }?>
                        </ul>
                        <!==============================END HEADER MENU===================================>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
<!=================================================================================================================>
    <div id="id01" class="modal">
  

  <div class="containerq">

    <form class="logn-form modal-content animate" action="<?php echo base_url(); ?>Login/loginSubmit" method="post">
      <!-- ========================LOGIN DI HAL TERKAIT================================================== -->
      <input type="hidden" name="ling" value="<?php echo ($this->uri->segment(1)); ?>"></input>
      <!-- ========================LOGIN DI HAL TERKAIT================================================== -->
      <div class="imgcontainer">
     <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
      </div>

      <div class="logn-wrap">
        <p class="logn-img"><i class="icon_lock_alt"></i></p> <!-- <?php var_dump($this->uri->segment(1)); ?> -->
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" name="email" required class="form-control" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="pass" required class="form-control" id="password" placeholder="Password"><span toggle="#password" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span>                       
                    <style>.field-icon { float: right; margin-left: -25px; margin-right: 10px;  margin-top: 13px; position: relative;  z-index: 10;}
                </style>
        </div>

        <!===============================START CAPTCHA===Tambah di config dan libraries==>
        <div class="input-group">
            <?php //echo $this->recaptcha->render(); ?>
            <div class="g-recaptcha" data-sitekey="6Lel9UMUAAAAAMZMWUuH3d-V_O2-5y4reGivYUbo"></div>
        </div>
        <!===============================END CAPTCHA=====================================>

        <!--<label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
        </label>-->
        <button class="btn btnlogn-primary btn-lg btn-block" type="submit">Login</button>
        <!--<button class="btn btnlogn-info btn-lg btn-block" type="submit"><a href="<?php echo base_url(); ?>register">Register</a></button>-->
        <?php if (isset($loginerror)) { ?>
        <div class="iw">
              <span class="hde" href="#"><?php echo validation_errors(); ?><?php if(isset($loginerror)){ ?> <?php echo $loginerror; ?><?php }?></span>  
        </div>
        <?php } ?>
        </form>
        <!-- <div class="atau">
          <p style="margin: 0 0 10px !important;">
            <span class="txtatau" style="background: #fff; padding: 0 10px;">atau</span>
          </p>
        </div>
        <a href="#" style="text-decoration: none;">
          <button class="btn btn-primary btn-lg btn-block" style="background-color: #fff !important; color: #007aff !important;">
            <i class="reg-icon-google"><img src="https://ecs7.tokopedia.net/img/icon/gplus_icon.png"></i>
              Masuk Dengan Google
          </button>
        </a> -->
        
      </div>
    </div>


    <div class="text-right">
      
  </div>
    </div>
<!=================================================================================================================>

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <!===================troli CART=======================>
        <a <?php if($this->session->has_userdata("customer_name")){ ?> href="<?php echo base_url(); ?>cart" <?php }else{ ?> onclick="document.getElementById('id01').style.display='block'" <?php } ?>>Cart - 
                          <span class="cart-amunt">Rp<?php 
                          $total=0;
                          $subtotal=0;
                          foreach ($this->cart->contents() as $ky) {
                              echo form_hidden (1,$ky['id']);                                                  
                              $subtotal=$ky['price']*$ky['qty'];
                              $total=$total+$subtotal;                                     
                          }                         
                          echo number_format($total,0,',','.');                    
                          ?></span> <i class="fa fa-shopping-cart"></i> 
                          <span class="product-count"><?php 
                          $qty=0;
                          foreach ($this->cart->contents() as $key) {                                        
                              echo form_hidden (1,$key['id']);                                                  
                              $qty=$qty+$key['qty'];                                     
                          }                         
                          echo $qty;                                              
                          ?></span></a>
                          <!===================troli CART=======================>
                           <!-- <?php echo $this->cart->total(); ?>   -->
                          <!===================troli CART=======================>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navi"><!--navi class utk warna. liat shop_layout bagian script-->
                        <!==============================START MENU===================================>
                        <!--<li><a href="<?php echo base_url(); ?>home">Home</a></li>-->
                        <li id="home"><a class="menu"  href="<?php echo base_url(); ?>home">home</a></li>
                        <li id="shop"><a class="menu" href="<?php echo base_url(); ?>shop">Shop page</a></li>
                        
                        <?php if($this->session->has_userdata("customer_name")){?>
                        <li id="cart"><a class="menu" href="<?php echo base_url(); ?>cart">Cart</a></li>
                        <!--<li id="checkout"><a class="menu" href="<?php echo base_url(); ?>checkout">Checkout</a></li>-->
                        <?php }?>
                        <li id="contact"><a class="menu" href="<?php echo base_url(); ?>ContactMain">Contact</a></li>
                        <!==============================END MENU===================================>
                            
                       
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
 	<div class="content"><!--==================START CONTENT===================-->
        <!==============================LOAD VIEW===================================>
            <?php 
                if(isset($content_page)){
                    $this->load->view($content_page); 
                }
            ?>
        <!==============================LOAD VIEW===================================>
    </div><!--===============================END CONTENT======================================-->
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <?php if($this->session->has_userdata("customer_name")){ ?>
                            <li><a href="<?php echo base_url(); ?>"><?php echo $this->session->userdata("customer_name"); ?></a></li>
                            <!--<li><a href="#">Order history</a></li>-->
                            <!-- <li><a href="<?php echo base_url(); ?>">Wishlist</a></li> -->
                            <?php }?>
                            <li><a href="<?php echo base_url(); ?>">Contact</a></li>
                            
                        </ul>                        
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2020 uStora. All Rights Reserved.</p>
                    </div>
                </div>
                
                <!--<div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>-->
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- jQuery sticky menu -->
    <script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.sticky.js"></script>
    <!-- jQuery easing -->
    <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.min.js"></script>
    <!-- Main Script -->
    <script src="<?php echo base_url(); ?>js/main.js"></script>
    <!-- Slider -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bxslider.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/script.slider.js"></script>
    <script type="text/javascript"> 
     <?php  if (isset($loginerror)) { ?>
       document.getElementById('id01').style.display='block';
     <?php } ?>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <!============Start Visible Password=================>
    <script>
      $(".toggle-password").click(function() {
       $(this).toggleClass('glyphicon-eye-close').toggleClass('glyphicon-eye-open');
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    </script>
    <!============End Visible Password=================>

  </body>
</html>