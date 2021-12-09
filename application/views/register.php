<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Daftar | TH</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-theme2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>
<body>

		

		<div class="container">
			<div class="jdl" style="margin-top: 100px;">
				<h3 class="bl">TH</h3>
				<h2 class="bl">Daftar di TH</h2>
				<p>Sudah punya akun TH? Silahkan <a href="<?php echo base_url(); ?>Home">Masuk</a></p>
			</div>

			<div class="col-md-5">
				<div class="borderDaftar">
					<h4 class="b2">Daftar</h4>
					<form class="form-horizontal" action="<?php echo base_url(); ?>Register/daftar" method="post">
						<div class="form-group">
						    <label for="customer_email" class="col-sm-2 control-label" style="margin-left: -4px !important;">Email</label>
						    <div class="b3">
						      <input type="email" class="form-control" name="customer_email" id="customer_email" <?php if(isset($data)){?> value="<?php echo $data; ?>" style="border-color: red;" autofocus <?php }?> placeholder="Email" required onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz1234567890@._',this)" pattern="[a-z0-9._]+@[a-z0-9._]+\.[a-z]{2,3}$">
						    </div>
						    <span class="hde" href="#" style="color:#ff0000 !important; margin-left: 26px;"><?php if (isset($loginerror)) { ?><?php echo $loginerror; ?></span>
						<?php }?>
						</div>

						<div class="form-group" style="margin-top: -20px;">
						    <label for="customer_password" class="col-sm-2 control-label">Password</label>
						    <div class="b3">
						    	<input type="password" class="form-control" name="customer_password" id="customer_password" <?php if(isset($data1)){?> value="<?php echo $data1; ?>" <?php }?> placeholder="Password" maxlength="20" required><span toggle="#customer_password" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span> 				              
						        <style>.field-icon { float: right; margin-left: -25px; margin-right: 10px;	margin-top: -25px; position: relative;	z-index: 2;}
								</style>
						    </div>
						</div>

						<div class="form-group">
						    <label for="confir_password" class="col-sm-2 control-label" style="width: 142px;">Confir Password</label>
						    <div class="b3">
						      <input type="password" class="form-control" name="confir_password" id="confir_password" <?php if(isset($data1)){?> value="<?php echo $data1; ?>" <?php }?> placeholder="Password" maxlength="20" required><span toggle="#confir_password" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span> 				              
						        
						    </div>
						</div>

						<div class="form-group">
						    <label for="customer_name" class="col-sm-2 control-label" style="margin-left: -4px !important;">Name</label>
						    <div class="b3">
						      <input type="name" class="form-control" name="customer_name" id="customer_name" <?php if(isset($data2)){?> value="<?php echo $data2; ?>" <?php }?> placeholder="Name" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" maxlength="100" required>
						    </div>
   						</div>

   						<div class="form-group">
						  <label for="gender" class="col-sm-2 control-label">Gender</label>
						  <div class="b3">
						  <select class="form-control" name="gender" id="gender">
						  <?php if(isset($data3)){?>  
						    <option <?php if($data3=="Laki-Laki"){echo "selected";} ?> value="Laki-Laki">Laki-Laki</option>
						    <option <?php if($data3=="Perempuan"){echo "selected";} ?> value="Perempuan">Perempuan</option>
						   <?php }else{?>
						    <option value="Laki-Laki">Laki-Laki</option>
						    <option value="Perempuan">Perempuan</option>
						    <?php }?>
						  </select>
						  </div>
						</div>

						<div class="form-group">
						    <label for="born" class="col-sm-2 control-label" style="margin-left: -10px !important;">Born</label>
						    <div class="b3">
						      <input type="date" class="form-control" name="born" id="born" <?php if(isset($data4)){?> value="<?php echo $data4; ?>" <?php }?> required>
						    </div>
						</div>

						<div class="form-group">
						    <div class="b3">
						      <button type="submit" class="btn btn-primary col-sm-12">Sign up</button>
						    </div>
						</div>
						<span style="color:blue !important;"><?php if (isset($selamat)) { ?><?php echo $selamat;} ?></span>
					</form>

				</div>	
			</div>

			<div class="col-md-2">
				<div class="garis1 grs1"></div>	
				<p class="textGaris">atau</p>
				<div class="garis1"></div>
			</div>

			<div class="col-md-5" style="margin-top: 200px;">
				<div class="well">
					<a href="#" style="text-decoration: none;">
			          <button class="btn btn-primary btn-lg btn-block" style="background-color: #fff !important; color: #007aff !important;">
			            <i class="reg-icon-google"><img src="https://ecs7.tokopedia.net/img/icon/gplus_icon.png" style="width: 15px; height: 15px;"></i>
			              Daftar Dengan Google
			          </button>
			        </a>
				</div>
			</div>
			
		
		


		</div>

		<footer class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>
						&copy; 2018, th
					</p>
				</div>
			</div>
		</footer>
		


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
		 <!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
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

		<!=========start validation password==============================================================>
				<script>
					var customer_password = document.getElementById("customer_password")
					  , confir_password = document.getElementById("confir_password");

					function validatePassword(){
					  if(customer_password.value != confir_password.value) {
					    confir_password.setCustomValidity("Passwords Don't Match");
					  } else {
					    confir_password.setCustomValidity('');
					  }
					}

					customer_password.onchange = validatePassword;
					confir_password.onkeyup = validatePassword;
				</script>
		<!=========end validation password==============================================================>

		<script language="javascript">
			function getkey(e)
			{
				if(window.event)
					return window.event.keyCode;
				else if (e)
					return e.which;
				else
					return null;	
			}
			function goodchars(e,goods,field)
			{
				var key,keychar;
				key = getkey(e);
				if(key==null) return true;
				keychar = String.fromCharCode(key);
				keychar = keychar.toLowerCase();
				goods = goods.toLowerCase();
				
				if(goods.indexOf(keychar)!=-1)
					return true;
				if(key==null || key==0 || key==8 || key==9 || key==27)
					return true;
				if(key==13){
					var i;
					for(i=0;i<field.form.elements.lenght;i++)
						if(field==field.form.elements[i])
							break;
						i=(i+1)% field.form.elements[i].focus();
					return false;	
				}
				return false;
			}
		</script>
</body>
</html>
