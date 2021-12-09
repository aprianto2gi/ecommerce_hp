
	<div class="entry">
		<div class="sep"></div>
	</div>
    <style type="text/css">

    </style>
    <h2>Payment Tabel</h2>
    <div class="entry">
        <div class="sep"></div>
    </div>
	 <table id="example" class="display" cellspacing="0" width="90%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Must Pay</th>
                <th>No Account</th>
                <th>Image</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Must Pay</th>
                <th>No Account</th>
                <th>Image</th>
                <th>Status</th>
                <th></th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($lihat as $lihat){?>
        	<?php $date=date_create($lihat['order_date']); ?>
            <tr>
                <td><?php echo $lihat['order_id']; ?></td>
                <td><a href="#" alt="<?php echo $lihat['customer_name']; ?>"><?php echo $lihat['customer_email']; ?></a></td>
		      	<td><?php echo date_format($date,"d/m/Y H:i:s"); ?></td>
                <td><?php echo number_format($lihat['total_price'],0,',','.'); ?></td>
                <td><?php echo $lihat['nomor_rekening']; ?></td>
                <td><a href=""><img src="<?php echo base_url(); ?>img/products/<?php echo $lihat['gambar']; ?>" width="70" height="70" /></a></td>
                <td><?php echo $lihat['status']; ?></td>
                <td><a href="<?php echo base_url(); ?>OrderMain/verif/<?php echo $lihat['order_id']; ?>" class="table-icon edit"></a></td>
            </tr>    
        <?php }?>   
        </tbody>
    </table>

    <div class="entry">
        <div class="sep"></div>
    </div>
    <h2>Order(Expired) Tabel</h2>
    <div class="entry">
        <div class="sep"></div>
    </div>
     <table id="example1" class="display" cellspacing="0" width="90%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Must Pay</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Must Pay</th>
                <th>Status</th>
                <th></th>
            </tr>
        </tfoot>

        <tbody>
        <?php foreach($lihatE as $lihatE){?>
            <?php $date=date_create($lihatE['order_date']); ?>
            <tr>
                <td><?php echo $lihatE['order_id']; ?></td>
                <td><a href="#" alt="<?php echo $lihatE['customer_name']; ?>"><?php echo $lihatE['customer_email']; ?></a></td>
                <td><?php echo date_format($date,"d/m/Y H:i:s"); ?></td>
                <td><?php echo number_format($lihatE['total_price'],0,',','.'); ?></td>
                <td><?php echo $lihatE['status']; ?></td>
                <td><a href="<?php echo base_url(); ?>OrderMain/verifExpired/<?php echo $lihatE['order_id']; ?>" class="table-icon edit"></a></td>
            </tr>    
        <?php }?>   
        </tbody>
    </table>
    