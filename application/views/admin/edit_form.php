<div>
	<?php if(isset($data_product)){ ?>
              	    <h2>Edit Products</h2>
				   <p>Edit Data Products on StationShop</p>
                    <form action="<?php echo base_url(); ?>AdminMain/editProductSubmit" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="product_id" value="<?php echo $data_product->product_id; ?>" />
                    
					<div class="element" >
						<label for="title"> Product Name <span class="red">(required)</span></label>
						<input id="product_name" name="product_name" class="text" 
                        value="<?php echo $data_product->product_name; ?>" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvxwyz1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" required/>
					</div>
               
					<div class="element">
						<label for="title"> Brand <span class="red">(required)</span></label>
						<select name="brand_id" id="brand_id">
							<option selected="selected">-----select-----</option>
							<?php foreach($combo_box as $cmb1) { ?>
							<?php foreach($combo_data as $cmb) { ?>
                				<option value="<?php echo $cmb['brand_id'];?>" <?php if($cmb1['brand_id'] == $cmb['brand_id']){ ?> selected="selected" <?php } ?> ><?php echo $cmb['brand_name'];?></option>
            				<?php } ?>
            				<?php } ?>
						</select>
					</div>
                    
                    <div class="element" >
						<label for="title"> Price <span class="red">(required)</span></label>
						<input id="price" name="price" class="text" value="<?php echo $data_product->price; ?>" required placeholder="Price Hanya Angka" onkeypress="return isNumberKey(event)"/>
					</div>
                    
                    <div class="element" >
						<label for="title"> Stock <span class="red">(required)</span></label>
						<input id="stock" name="stock" class="text" value="<?php echo $data_product->stock; ?>" required placeholder="Stock Hanya Angka" onkeypress="return isNumberKey(event)"/>
					</div>
                    
                    <div class="element">  
                    	
                        <label for="description"> Description <span class="red">(required)</span></label>
						<textarea class="textarea ckeditor" name="product_description" rows="10" ><?php echo $data_product->product_description; ?></textarea>
 
                    </div>
                    
                    <div class="element"> 
                         <img src="<?php echo base_url(); ?>img/products/<?php echo $data_product->gambar1; ?>" width="200" height="200"/>
					
                        <input type="hidden" name="gambar_old1" value="<?php echo $data_product->gambar1; ?>" />
                        <label for="gambar1">Gambar 1</label>
						<input type="file" name="gambar1" id="gambar1" />
					</div>
					<div class="element"> 
                         <img src="<?php echo base_url(); ?>img/products/<?php echo $data_product->gambar2; ?>" width="200" height="200"/>
					
                        <input type="hidden" name="gambar_old2" value="<?php echo $data_product->gambar2; ?>" />
                        <label for="gambar2">Gambar 2</label>
						<input type="file" name="gambar2" id="gambar2" />
					</div>
					<div class="element"> 
                         <img src="<?php echo base_url(); ?>img/products/<?php echo $data_product->gambar3; ?>" width="200" height="200"/>
					
                        <input type="hidden" name="gambar_old3" value="<?php echo $data_product->gambar3; ?>" />
                        <label for="gambar3">Gambar 3</label>
						<input type="file" name="gambar3" id="gambar3" />
					</div>
                    
                    <div class="element">
                    	
                    </div>
                    
                    
					<div class="entry">
					  <button type="submit" class="hide">Preview</button> <button type="submit" class="add">Save </button> <button onclick="goBack()">Cancel</button>
					</div>
				</form>
                <?php }?>
		  </div>

		  	<script>
					function goBack() {
					    window.history.back();
					}
			</script>


		  <script>CKEDITOR.replace('product_description');</script>
		  <script language="Javascript">
					function isNumberKey(evt){
						var charCode = (evt.which) ? evt.which : event.keyCode
						if (charCode > 31 && (charCode < 48 || charCode > 57))
						return false;
						return true;
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

