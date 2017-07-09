<div id="page-wrap">
	<h1>All Notices</h1>
	<table>
		<thead>
			<tr>
				<th>S No.</th>
				<th>Notice Id</th>
				<th>Contract No.</th>
				<th>Date</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$get_notice = "select * from notice_period";
				$result_notice = mysqli_query($conn,$get_notice);
				$i = 0;
				if(mysqli_num_rows($result_notice) == 0){
					echo "<td>No Notice Periods found.</td>";
				}
				else{
					while($row_notice = mysqli_fetch_array($result_notice)){
						$id = $row_notice['id'];
						$contract_num = $row_notice['contact_no'];
						$date = $row_notice['date'];
						$description = $row_notice['description'];
						$i++;
	   		?>
   			<tr>
      			<td><?php echo $i; ?></td>
      			<td><?php echo $id; ?></td>
      			<td><?php echo $contract_num;?></td>
      			<td><?php echo $date; ?></td>
      			<td><?php echo $description; ?></td>
      			<td><a href="index.php?edit_notice=<?php echo $id;?>">Edit</a></td>
      			<td><a href="delete_notice.php?delete_notice=<?php echo $id; ?>">Delete</a></td>
   			</tr>
   		<?php 
   				} 
  			}
  		?>
		</tbody>
	</table>
</div>