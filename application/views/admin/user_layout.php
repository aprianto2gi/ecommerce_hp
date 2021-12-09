<h2>Customer</h2><?php //judul table ?>
			
				<div class="entry">
					<div class="sep"></div>
				</div>
				<table id="example" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th scope="col">No.</th>
                            <th scope="col">Customer Email</th>
							<th scope="col">Customer Password</th>
							<th scope="col">Customer Name</th>
							<th scope="col">Gender</th>
							<th scope="col">Born</th>
							<th scope="col">Create Date</th>
						</tr>
					</thead>
						
					<tbody>
                     <?php $no=1; ?> 
                     <?php foreach($customer_data as $row) { ?>
						<tr>		
							<td class="align-center"><?php echo $no; ?></td>
							<td><?php echo $row["customer_email"]; ?></td>
							<td><?php echo $row["customer_password"]; ?></td>
							<td><?php echo $row["customer_name"]; ?></td>
							<td><?php echo $row["gender"]; ?></td>	
							<td><?php echo $row["born"]; ?></td>
							<td><?php echo $row["create_date"]; ?></td>
						</tr>
                        <?php $no++; ?>
				   <?php } ?>
					</tbody>
				</table>
