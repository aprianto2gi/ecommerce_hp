            	    <h2>Add Admin</h2>
				  
                    <form action="<?php echo base_url(); ?>MemberMain/addAdminSubmit" method="post" enctype="multipart/form-data"><!--action nya ada di controller AdminMain.php-->
                    
                    <input type="hidden" name="admin_id" value="" />
                    
					<div class="element" >
						<label for="title"> Admin Email <span class="red">(required)</span></label>
						<input type="email" id="admin_email" name="admin_email" class="text" 
                        <?php if(isset($data)){?> value="<?php echo $data; ?>" style="border-color: red;" <?php }?> placeholder="Masukkan Email" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz1234567890@._',this)" pattern="[a-z0-9._]+@[a-z0-9._]+\.[a-z]{2,3}$" required/><span class="hde" href="#" style="color:#ff0000 !important; margin-left: 2px; font-weight: normal;"><?php if (isset($loginerror)) { ?><?php echo $loginerror; }?></span>
					</div>

					<div class="element" >
						<label for="title"> Password <span class="red">(required)</span></label>
						<input id="password" name="password" type="password" class="text" <?php if(isset($data1)){?> value="<?php echo $data1; ?>" <?php }?> placeholder="Password" maxlength="20" required/><!-- <span toggle="#password" class="glyphicon glyphicon-eye-open field-icon toggle-password"></span> 				              
						        <style>.field-icon { float: right; margin-left: -25px; margin-right: 10px;	margin-top: -25px; position: relative;	z-index: 10;}
								</style> -->
					</div>

					<div class="element" >
						<label for="title"> Confirm Password <span class="red">(required)</span></label>
						<input id="confirm_password" name="confirm_password" class="text" type="password" 
                        <?php if(isset($data1)){?> value="<?php echo $data1; ?>" <?php }?> placeholder="Confir Password" maxlength="20" required/>
					</div>					
                    
					<div class="element" >
						<label for="title"> Admin Name <span class="red">(required)</span></label>
						<input id="admin_name" name="admin_name" class="text" 
                        <?php if(isset($data2)){?> value="<?php echo $data2; ?>" <?php }?> onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" placeholder="Name" maxlength="100" required/>
					</div>
                    
                    <div class="element" >
						<label for="title"> Gender <span class="red">(required)</span></label>
						<select class="text" name="gender" id="gender">
							<?php if(isset($data3)){?>  
						    <option <?php if($data3=="Laki-Laki"){echo "selected";} ?> value="Laki-Laki">Laki-Laki</option>
						    <option <?php if($data3=="Perempuan"){echo "selected";} ?> value="Perempuan">Perempuan</option>
						   <?php }else{?>
						    <option value="Laki-Laki">Laki-Laki</option>
						    <option value="Perempuan">Perempuan</option>
						   <?php }?>
						  </select>
					</div>
                    
                    <div class="element" >
						<label for="title"> Born <span class="red">(required)</span></label>
						<input type="date" id="born" name="born" class="date" placeholder="Born" <?php if(isset($data4)){?> value="<?php echo $data4; ?>" <?php }?> required/>
					</div>
                    
                    
					<span style="color:blue !important; margin-left: 13px;"><?php if (isset($selamat)) { ?><?php echo $selamat;} ?></span>
					<div class="entry">
					  <button type="submit" class="hide">Preview</button> <button type="submit" class="add">Save </button> 
					</div>
					
				</form>
				<form action="<?php echo base_url(); ?>MemberMain/back" method="post">
					<button type="submit" style="margin-top: -49px; margin-left: 90px;">Cancel</button>
				</form>

				<!=========start validation password==============================================================>
				<script>
					var password = document.getElementById("password")
					  , confirm_password = document.getElementById("confirm_password");

					function validatePassword(){
					  if(password.value != confirm_password.value) {
					    confirm_password.setCustomValidity("Passwords Don't Match");
					  } else {
					    confirm_password.setCustomValidity('');
					  }
					}

					password.onchange = validatePassword;
					confirm_password.onkeyup = validatePassword;
				</script>
				<!=========end validation password==============================================================>
				<script>
					function goBack() {
					    window.history.back();
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


				