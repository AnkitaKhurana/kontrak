<?php
    if(isset($_SESSION['logged'])!="true")
    {
        header("Location: login.php");
        die();
    }
?>
<h1 style="text-align: left; padding-left: 5%;">Add Notice Period</h1>
<div class="form-container">
    <form method="post" action="index.php?add_notice_period" enctype="multipart/form-data" id="form">
        <fieldset>
            <legend>Notice Details</legend>
                <ul class="form-flex-outer">
                	<li>
                        <label for="contract-num">Contract No.</label>
                        <input type="text" id="contract-num" name="contract-num" placeholder="Enter contract reference number here">
                    </li>
                    <li>
                        <label for="datepicker">Notice Date</label>
                        <input type="text" name="notice_date" id="datepicker">
                    </li>
                    <li>
                        <label for="notice_description">Notice Description</label>
                        <textarea rows="6" name="notice_description" id="notice_description" placeholder="Enter Notice description here"></textarea>
                    </li>
                    <li>
                    	<input type="submit" name="add_notice">
                    </li>
                </ul>
        </fieldset>
    </form>
</div>

<?php
	if(isset($_POST['add_notice'])){
	    $contract_num = mysqli_real_escape_string($conn, $_POST['contract-num']);
	    $noticeDateArray = explode('/', $_POST['notice_date']);
	    $notice_date = $noticeDateArray[2].'-'.$noticeDateArray[0].'-'.$noticeDateArray[1];
	    $notice_description = mysqli_real_escape_string($conn,$_POST['notice_description']);

	    $insert_notice = "Insert into notice_period(contract_no, date, description) values('$contract_num', '$notice_date', '$notice_description')";
	    $result_notice = mysqli_query($conn, $insert_notice);
	    if($result_notice){
	    	echo"<script>alert('New notice inserted successfully!')</script>"; 
	        echo"<script>window.open('index.php?add_notice_period','_self')</script>";
	    }
	}
?>