<?php
    if(isset($_SESSION['logged'])!="true")
    {
        header("Location: login.php");
        die();
    }
?>
<h1 style="text-align: left; padding-left: 5%;">Add New Contract</h1>
<div class="form-container">
    <form method="post" action="index.php?new_contract" enctype="multipart/form-data" id="form">
        <fieldset>
            <legend>Contract Details</legend>
                <ul class="form-flex-outer">
                    <li>
                        <label for="reference-num">Reference No.</label>
                        <input type="text" id="reference-num" placeholder="Enter contract reference number here">
                    </li>
                    <li>
                        <p>Type</p>
                        <ul class="form-flex-inner">
                            <li>
                                <input type="checkbox" id="software">
                                <label for="software">Software</label>
                            </li>
                            <li>
                                <input type="checkbox" id="hardware">
                                <label for="hardware">Hardware</label>
                            </li>
                            <li>
                                <input type="checkbox" id="license">
                                <label for="license">License</label>
                            </li>
                            <li>
                                <input type="checkbox" id="other">
                                <label for="other">Other</label>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <label for="category">Category</label>
                        <select name="category" id="category" required>
                            <option>Select a Category</option>
                            <?php
                                $get_category = "select * from category";
                                $result_category = mysqli_query($conn,$get_category);
                                while($row_category = mysqli_fetch_array($result_category))  {
                                    $category_id = $row_category['category_id'];
                                    $category_name = $row_category['category'];
                                    echo"<option value = '$category_id'>$category_name</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="description">Description</label>
                        <textarea rows="6" id="description" placeholder="Enter Goods/Services Description here"></textarea>
                    </li>
                    <li>
                        <label for="datepicker">Date of Agreement</label>
                        <input type="text" name="date" id="datepicker">
                    </li>
                    <li>
                        <label for="language">Language</label>
                        <select name="language" id="language" required>
                            <option>Language of Contract</option>
                            <?php
                                $get_language = "select * from language";
                                $result_language = mysqli_query($conn,$get_language);
                                while($row_language = mysqli_fetch_array($result_language))  {
                                    $language_id = $row_language['language_id'];
                                    $language_name = $row_language['language'];
                                    echo"<option value = '$language_id'>$language_name</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="life">Total Committed Value (Years)</label>
                        <input type="number" id="life">
                    </li>
                    <li>
                        <label for="supplier">Name of Supplier</label>
                        <input type="text" id="supplier" placeholder="Enter Supplier's Name here">
                    </li>
                    <li>
                        <label for="country">Country</label>
                        <select name="country" id="country" required>
                            <option>Select a Country</option>
                            <?php
                                $get_country = "select * from country";
                                $result_country = mysqli_query($conn,$get_country);
                                while($row_country = mysqli_fetch_array($result_country))  {
                                    $country_id = $row_country['country_id'];
                                    $country_name = $row_country['country'];
                                    echo"<option value = '$country_id'>$country_name</option>";
                                }
                            ?>
                        </select>
                    </li>
                </ul>
        </fieldset>
        <fieldset>
            <legend>Payment Details</legend>
                <ul class="form-flex-outer">
                    <li>
                        <label for="currency">Currency</label>
                        <select name="currency" id="currency" required>
                            <option>Select a Currency</option>
                            <?php
                                $get_currency = "select * from currency";
                                $result_currency = mysqli_query($conn,$get_currency);
                                while($row_currency = mysqli_fetch_array($result_currency))  {
                                    $currency_id = $row_currency['currency_id'];
                                    $currency_name = $row_currency['currency'];
                                    echo"<option value = '$currency_id'>$currency_name</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="spend">Annual Spend</label>
                        <input type="text" id="spend" placeholder="Total Spend Annually">
                    </li>
                </ul>
        </fieldset>
    </form>
</div>
<?php

    if(isset($_POST['input_details'])) 
    {	  
	//Text data variables
        $car_company = $_POST['car_company'];
	$car_name = $_POST['car_name'];
	$car_price = $_POST['car_price'];
	$car_economy = $_POST['car_economy'];
	$car_speed = $_POST['car_speed'];
	$car_engine = $_POST['car_engine'];
        $car_gear = $_POST['car_gear'];
        $car_seats = $_POST['car_seats'];
        $car_length = $_POST['car_length'];
        $car_width = $_POST['car_width'];
        $car_height = $_POST['car_height'];
        $car_ground_clr = $_POST['car_ground_clr'];
        $car_wheel = $_POST['car_wheel'];
        $car_fuel_tank = $_POST['car_fuel_tank'];
        $car_boot = $_POST['car_boot'];
	$car_tags = $_POST['car_tags'];
	  
	//Image names
	$car_img1 = $_FILES['car_img1']['name'];
	$car_img2 = $_FILES['car_img2']['name'];
        $car_img3 = $_FILES['car_img3']['name'];
	$car_img4 = $_FILES['car_img4']['name'];
        $car_img5 = $_FILES['car_img5']['name'];
	    
	//Image Temporary names
	$temp_name1 = $_FILES['car_img1']['tmp_name'];
	$temp_name2 = $_FILES['car_img2']['tmp_name'];
	$temp_name3 = $_FILES['car_img3']['tmp_name'];
        $temp_name4 = $_FILES['car_img4']['tmp_name'];
        $temp_name5 = $_FILES['car_img5']['tmp_name'];
	 
	//Uploading images to its folder
	move_uploaded_file($temp_name1,"../images/img1/$car_img1");
	move_uploaded_file($temp_name2,"../images/$car_img2");
	move_uploaded_file($temp_name3,"../images/$car_img3");
	move_uploaded_file($temp_name4,"../images/$car_img4");
	move_uploaded_file($temp_name5,"../images/$car_img5");
	  
	$input_car = "insert into cardetails(Car_Model_Name,Car_Company,Price,Fuel_Economy,Top_Speed,Engine,Gear,Seating_Capacity,Length,Width,Height,Ground_clearance,Wheel_Size,Fuel_Tank_Capacity,Boot_Space,Tags,Image_1,Image_2,Image_3,Image_4,Image_5) values('$car_name','$car_company','$car_price','$car_economy','$car_speed','$car_engine','$car_gear','$car_seats','$car_length','$car_width','$car_height','$car_ground_clr','$car_wheel','$car_fuel_tank','$car_boot','$car_tags','$car_img1','$car_img2','$car_img3','$car_img4','$car_img5')";
	$run_car = mysqli_query($conn,$input_car);
	  
	if($run_car){
            echo"<script>alert('Car Data Input Successfully!')</script>"; 
            echo"<script>window.open('index.php?input_details','_self')</script>";
	}
	  
    }

?>