<style type="text/css">
	.lbl_nama{
		width: 100%; text-align: left; margin-left: 17px;
	}
	table, th, tr, td {
    	border: 1px solid black;
    	text-align: center;
	}
	
</style>
<div class="container">
	<div class="col-md-12" style="background-color: #dfdfdf; margin: 20px 0 20px; padding-bottom: 0px;">
		<p class="navbar-text" style="width: 97%; padding: 20px; font-size: 18px; background-color: white">
			Informasi Kontak
		</p>
		<!-- <div class="col-md-11" style="background-color: #dfdfdf; margin-top: 20px; margin-bottom: 30px;"> -->
			<?php if(isset($data_akun)){?>
			
			<form method="post" action="<?php echo base_url(); ?>AkunMain/editAkunSubmit">
				<div class="col-md-6" style="margin-top: 20px; margin-bottom: 40px;">
					<div class="form-group">
				    	<label class="lbl_nama" for="email" class="col-sm-2 control-label">Customer Email: </label>
				    	<div class="b3">
				        	<label class="lbl_nama" name="email" id="email1"><?php echo $data_akun->customer_email; ?></label>
				        	<input type="hidden" class="form-control" value="<?php echo $data_akun->customer_email; ?>" name="customer_email">
				    	</div>
					</div>

					<div class="form-group">
					    <label class="lbl_nama" for="name" class="col-sm-2 control-label">Customer Name: </label>
					    <div class="b3">
					        <input type="text" class="form-control" value="<?php echo $data_akun->customer_name; ?>" name="customer_name" id="name" required>
					    </div>
					</div>

					<div class="form-group">
					    <label class="lbl_nama" for="password" class="col-sm-2 control-label">Password: </label>
					    <div class="b3">
					        <input type="password" class="form-control" <?php if(isset($data)){?> value="<?php echo $data; ?>" style="border-color: red;" <?php }?> placeholder="Old Password" name="customer_password" id="customer_password" required><span toggle="#customer_password" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span><style>.field-icon { float: right; margin-left: -20px; margin-right: 20px;	margin-top: -25px; position: relative;	z-index: 2;}
							</style>
					    </div><span class="hde" href="#" style="color:#ff0000 !important; margin-left: 26px;"><?php if (isset($passerror)) { ?><?php echo $passerror; }?></span> 				              
						        
					</div>	

					<div class="form-group" style="margin-top: -15px;">
					    <label class="lbl_nama" for="Npassword" class="col-sm-2 control-label">New Password: </label>
					    <div class="b3">
					        <input type="password" class="form-control" placeholder="New Password" name="Npassword" id="Npassword" required><span toggle="#Npassword" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span>
					    </div>
					</div>
				</div>

				<div class="col-md-6" style="margin-top: 20px;">
					<div class="form-group">
					    <label class="lbl_nama" for="CNpassword" class="col-sm-2 control-label">Confir New Password: </label>
					    <div class="b3">
					        <input type="password" class="form-control" placeholder="Confir New Password" name="CNpassword" id="CNpassword" required><span toggle="#CNpassword" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span>
					    </div>
					</div>

					<div class="form-group">
					    <label for="lbl_nama" class="col-sm-2 control-label">Gender: </label>
					    <div class="b3">
					        <select name="gender" id="gender" class="form-control">
								<option selected="selected">-----select-----</option>
								<?php foreach($combo_box as $cmb1) { ?>
								<?php foreach($combo_data as $cmb) { ?>
	                				<option value="<?php echo $cmb['gender'];?>" <?php if($cmb1['gender'] == $cmb['gender']){ ?> selected="selected" <?php } ?> ><?php echo $cmb['gender'];?></option>
	            				<?php } ?>
	            				<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
					    <label class="lbl_nama" for="born" class="col-sm-2 control-label">Born:</label>
					    <div class="b3">
					        <input type="date" class="form-control" value="<?php echo $data_akun->born; ?>" name="born" id="born" required>
					    </div>
					</div>

					<div class="form-group">
					    <div class="b3" style="margin-top: 24px;">
					        <button type="submit" class="a_a b_b col-sm-4">Simpan</button>
					    </div>
					</div>		
					<div class="form-group">
					    <div class="b3">
					        <button type="submit" onclick="goBack()" style="margin-left: 10px;" class="a_a b_b col-sm-4">Batal</button>

					    </div>
					</div>
				</div>
				

			</form>
					

			<?php }?>
		<!-- </div> -->
	</div>

	<div class="col-md-12" style="float: left; background-color: #f2f2f2; margin: 20px 0 20px; padding-bottom: 20px;">
		<p class="navbar-text" style="width: 97%; padding: 20px; font-size: 18px; background-color: white;">
			Pesanan
		</p>
		<table class="table table-hover">
		    <thead>
		      <tr>
		      	<th>No Order</th>
		        <th>Tgl Order</th>
		        <th>Total(Rp)</th>
		        <th>Status</th>
		        <th></th>
		      </tr>
		    </thead>
		    <?php foreach($order as $order){?>
		    <tbody>
		    	<td><?php echo $order['order_id'] ?></td>
		    	<?php $date=date_create($order['order_date']); ?>
		   		<td><?php echo date_format($date,"m/d/Y"); ?></td>
		   		<td><?php echo number_format($order['total_price'],0,',','.'); ?></td>
		   		<td><?php echo $order['status'] ?></td>
		   		<td><a href="#">Lihat</a></td>
		    </tbody>
		    <?php }?>
		</table>
	</div>

</div>
	<!-- <!============Start Visible Password=================>
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
	<!============End Visible Password=================> -->
	<script>
					function goBack() {
					    window.location = "<?php echo base_url(); ?>Home";
					}
			</script>
	<!=========start validation password==============================================================>
				<script>
					var Npassword = document.getElementById("Npassword")
					  , CNpassword = document.getElementById("CNpassword");

					function validatePassword(){
					  if(Npassword.value != CNpassword.value) {
					    CNpassword.setCustomValidity("Passwords Don't Match");
					  } else {
					    CNpassword.setCustomValidity('');
					  }
					}

					Npassword.onchange = validatePassword;
					CNpassword.onkeyup = validatePassword;
				</script>
	<!=========end validation password==============================================================>
