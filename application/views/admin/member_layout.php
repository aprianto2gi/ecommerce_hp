<h2>Admin</h2><?php //judul table ?>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
				<table>
					<thead>
						<tr>
							<th scope="col">No.</th>
                            <th scope="col">Admin Email</th>
							<!-- <th scope="col">Admin Password</th> -->
							<th scope="col">Admin Name</th>
							<th scope="col">Gender</th>
							<th scope="col">Born</th>
							<th scope="col">Create Date</th>
							
							
							<th scope="col" style="width: 65px;">Modify</th>
						</tr>
					</thead>
						
					<tbody>
                     <?php $no=1; ?> 
                     <?php foreach($admin_data as $row) { ?>
						<tr>
							<td class="align-center"><?php echo $no; ?></td>
                            <!--<td><img src="<?php echo base_url(); ?>images/product/<?php ///////////////////////// ?>" width="70" height="70" /></td>-->
							
							<td><?php echo $row["admin_email"]; ?></td>
							<!-- <td><?php //echo $row["admin_password"]; ?></td> -->
							<td><?php echo $row["admin_name"]; ?></td>
							<td><?php echo $row["gender"]; ?></td>	
							<td><?php echo $row["born"]; ?></td>
							<td><?php echo $row["create_date"]; ?></td>
							
							<td>
								<a href="<?php echo base_url(); ?>MemberMain/edit_Admin/<?php echo $row["admin_id"]; ?>" class="table-icon edit" title="Edit"></a>
								<a onClick="javascript: return confirm('Are you sure??');" href="<?php echo base_url(); ?>MemberMain/deleteAdmin/<?php echo $row["admin_id"]; ?>" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
                        <?php $no++; ?>
				   <?php } ?>
					</tbody>
				</table>
				<div class="sep hide"></div>		
				  <a class="button add " href="<?php echo base_url(); ?>MemberMain/addAdmin">Add New Admin</a> <a class="button hide" href="">Categories</a> 
<!===========================================================================================================================>