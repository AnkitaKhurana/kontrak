<div id="page-wrap">
	<h1>All Reviews</h1>
	<table>
		<thead>
			<tr>
				<th>S No.</th>
				<th>Review Id</th>
				<th>Contract No.</th>
				<th>Reviewer</th>
				<th>Date</th>
				<th>Comments</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$get_review = "select * from review";
				$result_review = mysqli_query($conn,$get_review);
				$i = 0;
				if(mysqli_num_rows($result_review) == 0){
					echo "<td>No Reviews Found</td>";
				}
				else{
					while($row_review = mysqli_fetch_array($result_review)){
						$id = $row_review['id'];
						$contract_num = $row_review['contract_no'];
						$reviewer = $row_review['reviewer_name'];
						$date = $row_review['date'];
						$comments = $row_review['reviewer_comments'];
						$i++;
	   		?>
   			<tr>
      			<td><?php echo $i; ?></td>
      			<td><?php echo $id; ?></td>
      			<td><?php echo $contract_num;?></td>
      			<td><?php echo $reviewer; ?></td>
      			<td><?php echo $date; ?></td>
      			<td><?php echo $comments; ?></td>
      			<td><a href="index.php?edit_review=<?php echo $id;?>">Edit</a></td>
      			<td><a href="delete_review.php?delete_review=<?php echo $id; ?>">Delete</a></td>
   			</tr>
   		<?php 
   				} 
  			}
  		?>
		</tbody>
	</table>
</div>