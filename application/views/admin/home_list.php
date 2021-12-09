
				<h2>Products</h2><?php //judul table ?>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
				<table>
					<thead>
						<tr>
							<th scope="col">No.</th>
                            <th scope="col">Image</th>
							<th scope="col">Products</th>
							<th scope="col" style="width: 130px;">Price</th>
							<th scope="col" style="width: 85px;">Modify</th>
							<style type="text/css">
								th{
									text-align: center;
								}
							</style>
						</tr>
					</thead>
						
					<tbody>
                     <?php $no=1; ?> 
                     <?php foreach($products_data as $row) { ?>
						<tr>
							<td class="align-center"><?php echo $no; ?></td>
                            <td><img src="<?php echo base_url(); ?>img/products/<?php echo $row['gambar1']; ?>" width="70" height="70" /></td>
							
							<td><?php echo $row["product_name"]; ?></td>
							<td><?php echo $row["price"]; ?></td>
							
							<td>
								<a href="<?php echo base_url(); ?>AdminMain/editProduct/<?php echo $row["product_id"]; ?>" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title=" View Comment"></a>
								<a onClick="javascript: return confirm('Are you sure??');" href="<?php echo base_url(); ?>AdminMain/deleteProduct/<?php echo $row["product_id"]; ?>" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
                        <?php $no++; ?>
				   <?php } ?>
					</tbody>
				</table>
				<div class="entry">
					<!--<div class="pagination">
                   
						
					
						
                   
					</div>-->
                    
					<div class="sep hide"></div>		
				  <a class="button add " href="<?php echo base_url(); ?>AdminMain/addProduct">Add new product</a> <a class="button hide" href="">Categories</a> 
				
            
            
	
