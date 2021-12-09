<style type="text/css">
	.lbl_nama{
		width: 100%; text-align: left; margin-left: 17px;
	}
	.form-control{
		text-align: center;	
	}
	.a_a{
		color: #ffffff !important;
    	background-color: #007aff !important;
    	border-color: #007aff !important;
	}
	.a_a:hover{
		color: #007aff !important;
		background-color: transparent !important;
    	border-color: #007aff !important;	
	}
	.b_b{
		display: inline-block !important;
	    padding: 12px 12px !important;
	    margin-bottom: 0 !important;
	    font-size: 14px !important;
	    font-weight: normal !important;
	    line-height: 1.428571429 !important;
	    text-align: center !important;
	    vertical-align: middle !important;
	    cursor: pointer !important;
	    border: 1px solid transparent !important;
	    border-radius: 4px !important;
	    white-space: nowrap !important;
	    -webkit-user-select: none !important;
	    -moz-user-select: none !important;
	    -ms-user-select: none !important;
	    -o-user-select: none !important;
	    user-select: none !important;
	    font-weight: 300 !important;
	    -webkit-transition: all 0.15s !important; 
	    -moz-transition: all 0.15s !important;
	    transition: all 0.15s !important;
	}
</style>

<div class="container">
	<?php if(isset($data_konfir)){ ?>
	<div class="col-md-4"></div>

	<div class="col-md-4">
		<h4 class="b2">Unggah Bukti Pembayaran</h4><br>
					<form class="form-horizontal" action="<?php echo base_url() ?>Konfirmasi/konfirSubmit" method="post" enctype="multipart/form-data">
						
						<input type="hidden" name="customer_id" value="<?php echo $data_konfir->customer_id; ?>">

						<div class="form-group">
						    <label class="lbl_nama" for="inputorder3" class="col-sm-2 control-label">Order ID :</label>
						    <div class="b3">
						      <input type="text" class="form-control" value="<?php echo $data_konfir->order_id; ?>" name="order_id" id="inputorder3" placeholder="Order ID" required readonly>
						    </div>
						</div>

						<div class="form-group">
						    <label class="lbl_nama" for="namabank" class="col-sm-2 control-label">Nama Bank :</label>
						    <div class="b3">
						      <input type="name" class="form-control" name="nama_bank" id="namabank" placeholder="Name Bank" required>
						    </div>
   						</div>

						<div class="form-group">
						    <label class="lbl_nama" for="nomorrekening" class="col-sm-2 control-label">Nomor Rekening :</label>
						    <div class="b3">
						      <input type="text" class="form-control" name="nomor_rekening" id="nomorrekening" placeholder="Nomor Rekening" onkeypress="return isNumberKey(event)" required>
						    </div>
						</div>

						<div class="form-group">
						    <label class="lbl_nama" for="inputName3" class="col-sm-2 control-label">Atas Nama :</label>
						    <div class="b3">
						      <input type="name" class="form-control" name="atas_nama" id="inputName3" placeholder="Atas Nama" required>
						    </div>
   						</div>

						<div class="form-group">
						    <label class="lbl_nama" for="total_bayar" class="col-sm-2 control-label">Total Bayar :</label>
						    <div class="b3">
						      <input type="text" class="form-control" name="total" value="Rp <?php echo number_format($data_konfir->total_price,0,',','.'); ?>" id="total_bayar" placeholder="Total Bayar" readonly required>
						      <input type="hidden" name="total_bayar" value="<?php echo $data_konfir->total_price; ?>">
						    </div>
						</div>

						<div class="element"> 
	                        <label for="gambar"> Bukti : </label>
							<input type="file" name="gambar" id="gambar" />
						</div><br>

						<div class="form-group">
						    <div class="b3">
						      <button type="submit" class="a_a b_b col-sm-12">Konfirmasi</button>
						    </div>
						</div>

						

					</form>

					
	<?php }?>	
	</div>

</div>

 	<script language="Javascript">
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
		}
	</script>
	