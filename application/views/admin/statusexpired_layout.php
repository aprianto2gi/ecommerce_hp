<div>
	<?php if(isset($data)){ ?>
              	    <h2>Edit Order</h2>
				   <p>Edit Data Order</p>
                    <form action="<?php echo base_url(); ?>OrderMain/verifExpiredSubmit" method="post" enctype="multipart/form-data">
                    
                    <!-- <input type="hidden" name="product_id" value="<?php echo $data->product_id; ?>" /> -->
                    
					<div class="element" >
						<label for="order_id"> Order ID <span class="red">(required)</span></label>
						<input id="order_id" name="order_id" class="text" 
                        value="<?php echo $data->order_id; ?>" readonly required />
					</div>

					<div class="element" >
						<label for="email"> Email <span class="red">(required)</span></label>
						<input id="email" name="email" class="text" value="<?php echo $data->customer_email; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="name"> Name <span class="red">(required)</span></label>
						<input id="name" name="name" class="text" value="<?php echo $data->customer_name; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="address"> Address <span class="red">(required)</span></label>
						<input id="address" name="address" class="text" value="<?php echo $data->address; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="province"> Province <span class="red">(required)</span></label>
						<input id="province" name="province" class="text" value="<?php echo $data->province; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="city"> City <span class="red">(required)</span></label>
						<input id="city" name="city" class="text" value="<?php echo $data->city; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="postcode"> Postcode <span class="red">(required)</span></label>
						<input id="postcode" name="postcode" class="text" value="<?php echo $data->postcode; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="phone"> Phone <span class="red">(required)</span></label>
						<input id="phone" name="phone" class="text" value="<?php echo $data->phone; ?>" required readonly />
					</div>

					<div class="element" >
						<label for="date"> Date(Order) <span class="red">(required)</span></label>
						<input id="date" name="date" class="text" value="<?php echo date('d-m-Y', strtotime($data->order_date)); ?>" required readonly />
					</div>

					<div class="element" >
						<label for="time"> Time(Order) <span class="red">(required)</span></label>
						<input id="date" name="date" class="text" value="<?php echo date('H:i:s', strtotime($data->order_date)); ?>" required readonly />
					</div>
               
					<div class="element">
						<label for="status"> Status Order <span class="red">(required)</span></label>
						<select name="status" id="status">
							<?php if(isset($data->status)){?>  
						    <option <?php if($data->status=="Belum Lunas"){echo "selected";} ?> value="Belum Lunas">Belum Lunas</option>
						    <option <?php if($data->status=="Proses"){echo "selected";} ?> value="Proses">Proses</option>
						    <option <?php if($data->status=="Expired"){echo "selected";} ?> value="Expired">Expired</option>
						    <option <?php if($data->status=="Lunas"){echo "selected";} ?> value="Lunas">Lunas</option>
						    <option <?php if($data->status=="Selesai"){echo "selected";} ?> value="Selesai">Selesai</option>
						   <?php }else{?>
						    <option value="Belum Lunas">Belum Lunas</option>
						    <option value="Proses">Proses</option>
						    <option value="Expired">Expired</option>
						    <option value="Lunas">Lunas</option>
						    <option value="Selesai">Selesai</option>						   
						    <?php }?>
						</select>
					</div>

					<?php foreach($detail as $po) {?>
					<div class="element" >
						<label for="product_id"> Product Data <span class="red">(required)</span></label>
						<input id="product_id" name="product_id" value="<?php echo $po['product_name']; ?>" required readonly />
						<input id="product" name="product" value="<?php echo $po['jumlah_barang']; ?> Buah" required readonly />
						<input type="hidden" name="jumlah" value="<?php echo $po['jumlah_barang']; ?>"></input>
					</div>
                    <?php }?>

                    <div class="element" >
						<label for="pay"> Must Pay <span class="red">(required)</span></label>
						<input id="pay" name="pay" class="text" value="<?php echo number_format($data->total_price,0,',','.'); ?>" required readonly />
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
					    window.location = "<?php echo base_url(); ?>OrderMain";
					}
			</script>