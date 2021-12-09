<div>
	<?php if(isset($data_admin)){ ?>
              	    <h2>Edit Data Admin</h2>
				   
                    <form action="<?php echo base_url(); ?>MemberMain/editAdminSubmit" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="admin_id" value="<?php echo $data_admin->admin_id; ?>" />
                    <input type="hidden" name="admin_email" value="<?php echo $data_admin->admin_email; ?>" />
                    
					<div class="element" >
						<label for="title"> Email <span class="red">(required)</span></label>
						<input id="admin_email" name="admin_email" class="text" 
                        value="<?php echo $data_admin->admin_email; ?>" <?php echo !is_int($data_admin->admin_email) ? ' disabled="disabled"' : ''; ?>/>
					</div>
                    
                    <div class="element" >
						<label for="title"> Old Password <span class="red">(required)</span></label>
						<input id="admin_password" name="admin_password" class="text" <?php if(isset($pass)){?> value="<?php echo $pass; }?>" placeholder="Old Password" type="password" maxlength="20" required/>
					</div><span class="hde" href="#" style="color:#ff0000 !important; margin-left: 13px;"><?php if (isset($passerror)) { ?><?php echo $passerror; }?></span> 

					<div class="element" >
						<label for="title"> New Password <span class="red">(required)</span></label>
						<input id="Npassword" name="Npassword" class="text" placeholder="New Password" type="password" maxlength="20" required/>
					</div>

					<div class="element" >
						<label for="title"> Confirm New Password <span class="red">(required)</span></label>
						<input id="CNpassword" name="CNpassword" class="text" type="password" value="" placeholder="Confirm New Password" maxlength="20" required/>
					</div>		
                    
                    <div class="element" >
						<label for="title"> Admin Name <span class="red">(required)</span></label>
						<input id="admin_name" name="admin_name" class="text" value="<?php echo $data_admin->admin_name; ?>" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" placeholder="Name" maxlength="100" required/>
					</div>
                    
                    <div class="element" >
						<label for="title"> Gender <span class="red">(required)</span></label>
						<!-- <input id="gender" name="gender" class="text" value="<?php echo $data_admin->gender; ?>" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz- ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required/> -->
						<select name="gender" id="gender" class="text">
							<option selected="selected">-----select-----</option>
							<?php foreach($box as $box) { ?>
							<?php foreach($data as $dta) { ?>
                				<option value="<?php echo $dta['gender'];?>" <?php if($box['admin_id'] == $dta['admin_id']){ ?> selected="selected" <?php } ?> ><?php echo $dta['gender'];?></option>
            				<?php } ?>
            				<?php } ?>
						</select>
					</div>
                    
                    <div class="element">  
                        <label for="description"> Born <span class="red">(required)</span></label>
						<input id="born" name="born" type="date" value="<?php echo $data_admin->born; ?>" placeholder="Born" required/>
                    </div>
                    
                    <!--<div class="element"> 
                         <img src="<?php echo base_url(); ?>images/product/<?php /////////////// ?>" width="200" height="200"/>
					
                        <input type="hidden" name="gambar_old" value="<?php /////////////////////////////////////// ?>" />
                        <label for="gambar">Attachments</label>
						<input type="file" name="gambar" id="gambar" />
					</div>-->
                    
                    <div class="element">
                    	
                    </div>
                    
                    
					<div class="entry">
					  <button type="submit" class="hide">Preview</button> <button type="submit" class="add">Save </button> <button onclick="goBack()">Cancel</button>
					</div>
				</form>
    <?php //}elseif(isset($data_customer)) { ?>

              	   <!--  <h2>Edit Data Customer</h2>
				   
                    <form action="<?php echo base_url(); ?>UserMain/editCustomerSubmit" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="customer_id" value="<?php echo $data_customer->customer_id; ?>" />
                    
					<div class="element" >
						<label for="title"> Email <span class="red">(required)</span></label>
						<input id="customer_email" name="customer_email" class="text" 
                        value="<?php echo $data_customer->customer_email; ?>" <?php echo !is_int($data_customer->customer_email) ? ' disabled="disabled"' : ''; ?>/>
					</div>
                    
                    <div class="element" >
						<label for="title"> Password <span class="red">(required)</span></label>
						<input id="customer_password" name="customer_password" class="text" value="<?php echo $data_customer->customer_password; ?>" required/>
					</div>
                    
                    <div class="element" >
						<label for="title"> customer Name <span class="red">(required)</span></label>
						<input id="customer_name" name="customer_name" class="text" value="<?php echo $data_customer->customer_name; ?>" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required/>
					</div>
                    
                    <div class="element" >
						<label for="title"> Gender <span class="red">(required)</span></label>
						<input id="gender" name="gender" class="text" value="<?php echo $data_customer->gender; ?>" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz- ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required/>
					</div>
                    
                    <div class="element">  
                        <label for="description"> Born <span class="red">(required)</span></label>
						<input id="born" name="born" type="date" value="<?php echo $data_customer->born; ?>" required/>
                    </div>
                    
                    <!--<div class="element"> 
                         <img src="<?php echo base_url(); ?>images/product/<?php /////////////// ?>" width="200" height="200"/>
					
                        <input type="hidden" name="gambar_old" value="<?php /////////////////////////////////////// ?>" />
                        <label for="gambar">Attachments</label>
						<input type="file" name="gambar" id="gambar" />
					</div>-->
                    
                   <!--  <div class="element">
                    	
                    </div>
                    
                    
					<div class="entry">
					  <button type="submit" class="hide">Preview</button> <button type="submit" class="add">Save </button> <button onclick="goBack()">Cancel</button>
					</div>
				</form>  -->
				<?php }?>
		  </div>

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


			<script>
					function goBack() {
					    window.location = "<?php echo base_url(); ?>MemberMain";
					}
			</script>

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
