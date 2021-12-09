<div class="container">
	<div class="jdl">
		<h3 class="bl">KONFIRMASI PEMBAYARAN</h3><br>	
	  	<p>Terima kasih telah berbelanja di uStora! Bila Anda telah melakukan pembayaran secara BANK TRANSFER, <br>konfirmasikan pembayaran Anda disini agar dapat kami proses segera.</p><br><br>
  	</div>            
  		<table class="table table-hover">
		    <thead>
		      <tr>
		      	<th>Order Detail</th>
		        <th>Order ID</th>
		        <th>Total Price</th>
		        <th>Bayar Sebelum</th>
		        <th>Status</th>
		        <th>Aksi</th>
		      </tr>
		    </thead>
		    <?php foreach ($konfirmasi_data as $rows) {?>
		    <tbody>
		      	<?php $date=date_create($rows['order_date']); ?>
		      	<?php $wb=$date->modify('+1 day'); ?>
			<tr <?php if($rows['status']=='Lunas') {?> style="color: green;" <?php }else if($rows['status']=='Selesai') {?> style="color: #007aff; font-weight: bold;" <?php } ?> />     	
		      	<td><?php echo date_format($date,"m/d/Y"); ?></td>
		        <td><?php echo $rows['order_id']; ?></td>
		        <td>Rp <?php echo number_format($rows['total_price']); ?></td>
		        <td><?php echo $rows['expired']; ?></td>
		        <td><?php echo $rows['status']; ?></td>
		        <?php if($rows['status']=='Expired' or $rows['status']=='Lunas' or $rows['status']=='Selesai' ){?>
		        <td></td>
		        <?php }else{?>
		        <td><a href="<?php echo base_url(); ?>Konfirmasi/konfir/<?php echo $rows['order_id']; ?>">Unggah Bukti</a></td>
		        <?php }?>
		      </tr>
		      
		    </tbody>
			<?php }?>
		</table>

</div>