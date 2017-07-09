<?php
    if(isset($_SESSION['logged'])!="true")
    {
        header("Location: login.php");
        die();
    }
?>
<h1 style="text-align: left; padding-left: 5%;">Add Review</h1>
<div class="form-container">
    <form method="post" action="index.php?add_review" enctype="multipart/form-data" id="form">
        <fieldset>
            <legend>Review Details</legend>
                <ul class="form-flex-outer">
                	<li>
                        <label for="contract-num">Contract No.</label>
                        <input type="text" id="contract-num" name="contract-num" placeholder="Enter contract reference number here">
                    </li>
                    <li>
                        <label for="reviewer">Reviewer</label>
                        <input type="text" id="reviewer" name="reviewer" placeholder="Enter reviewer name here">
                    </li>
                    <li>
                        <label for="datepicker">Review Date</label>
                        <input type="text" name="review_date" id="datepicker">
                    </li>
                    <li>
                        <label for="comments">Comments</label>
                        <textarea rows="6" name="comments" id="comments" placeholder="Enter Comments here"></textarea>
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
        $reviewer = mysqli_real_escape_string($conn, $_POST['reviewer']);
	    $reviewDateArray = explode('/', $_POST['review_date']);
	    $review_date = $reviewDateArray[2].'-'.$reviewDateArray[0].'-'.$reviewDateArray[1];
	    $comments = mysqli_real_escape_string($conn,$_POST['comments']);

	    $insert_review = "Insert into review(contract_no, reviewer_name, date, reviewer_comments) values('$contract_num', '$reviewer' ,'$review_date', '$comments')";
	    $result_review = mysqli_query($conn, $insert_review);
	    if($result_review){
	    	echo"<script>alert('New review added successfully!')</script>"; 
	        echo"<script>window.open('index.php?add_review','_self')</script>";
	    }
	}
?>