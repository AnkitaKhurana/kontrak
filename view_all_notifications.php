<div id="page-wrap">
	<h1>All Notifications</h1>
	<table>
		<thead>
			<tr>
				<th>S No.</th>
				<th>Notification</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$get_notifictaion= "select * from notification";
				$result = mysqli_query($conn,$get_notifictaion);
				$i = 0;
				if(mysqli_num_rows($result) == 0){
					echo "<td>No Notifications Found</td>";
				}
				else{
					while($row = mysqli_fetch_array($result)){
						$id = $row['contract_no'];
						$msg = $row['notification_text'];
						$query = "UPDATE notification SET  status = 1";
  					    $run_query = mysqli_query($conn,$query);	
						$i++;
						$delete_notification = "Delete from notification where  contract_no = '$id'";
    					$run_delete = mysqli_query($conn,$delete_notification);

	   		?>
   			<tr>
      			<td><?php echo $i; ?></td>
      			<td><?php echo $msg; ?> </td>
      		
   			</tr>
   			<?php 
   				} 
  			}





  		?>
   		
		</tbody>
	</table>
</div>