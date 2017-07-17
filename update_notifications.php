<?php

$get_e= "select * from expiration";
$result = mysqli_query($conn,$get_e);
while($row = mysqli_fetch_array($result)){
	$e_date = $row['date'];
	$status = $row['notified'];



	$reference_num = $row['contract_no'];

	 $expirationDateArray = explode('-', $e_date);
	 $yr = $expirationDateArray[0];
	 $m = $expirationDateArray[1];
	 $dt = $expirationDateArray[2];



	if($yr==date("Y")&&$status==0)
	{
		if($m-date("m")<=1)
		{

			  $add_notification = "Insert into notification(contract_no,status, notification_text) values('$reference_num',0,'Contract $reference_num will Expire in ".($m-date("m"))."months')";
                mysqli_query($conn, $add_notification);
                $query = "UPDATE expiration SET notified = 1";
  				$run_query = mysqli_query($conn,$query);	
		
		 }
	}




}
	$delete_notification = "Delete from notification where  contract_no = '$id'";
    					$run_delete = mysqli_query($conn,$delete_notification);



?>