<div id="page-wrap">
	<h1>All Vendors</h1>
	<table>
		<thead>
			<tr>
				<th>S No.</th>
				<th>Vendor Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact No.</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$get_vendor = "select * from vendor";
				$result_vendor = mysqli_query($conn,$get_vendor);
				$i = 0;
				if(mysqli_num_rows($result_vendor) == 0){
					echo "<td>No Vendors Listed</td>";
				}
				else{
					while($row_vendor = mysqli_fetch_array($result_vendor)){
						$id = $row_vendor['vendor_id'];
						$name = $row_vendor['contact_name'];
						$email = $row_vendor['email'];
						$contact = $row_vendor['phone_no'];
						$i++;
	   		?>
   			<tr>
      			<td><?php echo $i; ?></td>
      			<td><?php echo $id; ?></td>
      			<td><?php echo $name;?></td>
      			<td><?php echo $email; ?></td>
      			<td><?php echo $contact; ?></td>
      			<td><a href="index.php?edit_vendor=<?php echo $id;?>">Edit</a></td>
      			<td><a href="delete_vendor.php?delete_vendor=<?php echo $id; ?>">Delete</a></td>
   			</tr>
   		<?php 
   				} 
  			}
  		?>
		</tbody>
	</table>
</div>