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
                        <input type="text" id="reference-num" name="reference-num" placeholder="Enter contract reference number here">
                    </li>
                    <li>
                        <p>Type</p>
                        <ul class="form-flex-inner">
                            <li>
                                <input type="radio" id="software" name="contract_type" value="software" checked="checked">
                                <label for="software">Software</label>
                            </li>
                            <li>
                                <input type="radio" id="hardware" name="contract_type" value="hardware">
                                <label for="hardware">Hardware</label>
                            </li>
                            <li>
                                <input type="radio" id="license" name="contract_type" value="license">
                                <label for="license">License</label>
                            </li>
                            <li>
                                <input type="radio" id="other" name="contract_type" value="other">
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
                        <textarea rows="6" id="description" name="description" placeholder="Enter Goods/Services Description here"></textarea>
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
                        <input type="number" name="life" id="life">
                    </li>
                    <li>
                        <label for="supplier">Name of Supplier</label>
                        <input type="text" name="supplier" id="supplier" placeholder="Enter Supplier's Name here">
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
                        <input type="text" name="spend" id="spend" placeholder="Total Spend Annually">
                    </li>
                    <li>
                        <label for="terms">Terms</label>
                        <textarea rows="6" name="terms" id="terms" placeholder="Enter terms of payment here"></textarea>
                    </li>
                    <li>
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" placeholder="Enter status of payment here">
                    </li>
                </ul>
        </fieldset>
         <fieldset>
            <legend>Vendor Details</legend>
                <ul class="form-flex-outer">
                    <li>
                        <label for="vendor_name">Name</label>
                        <input type="text" id="vendor_name" name="vendor_name" placeholder="Enter Vendor Name">
                    </li>
                    <li>
                        <label for="vendor_email">Email</label>
                        <input type="email" id="vendor_email" name="vendor_email" placeholder="Enter Vendor Email">
                    </li>
                    <li>
                        <label for="vendor_contact">Contact Number</label>
                        <input type="text" id="vendor_contact" name="vendor_contact" placeholder="Enter Vendor Contact number">
                    </li>
                </ul>
        </fieldset>
        <fieldset>
            <legend>Service Delivery Manager</legend>
                <ul class="form-flex-outer">
                    <li>
                        <label for="sdm_name">Name</label>
                        <input type="text" id="sdm_name" name="sdm_name" placeholder="Enter SDM Name">
                    </li>
                    <li>
                        <label for="sdm_email">Email</label>
                        <input type="email" id="sdm_email" name="sdm_email" placeholder="Enter Vendor Email">
                    </li>
                    <li>
                        <label for="sdm_contact">Contact</label>
                        <input type="text" id="sdm_contact" name="sdm_contact" placeholder="Enter Vendor Contact number">
                    </li>
                    <li>
                        <label for="remarks">Remarks</label>
                        <textarea rows="6" name="remarks" id="remarks" placeholder="Enter Remarks here"></textarea>
                    </li>
                </ul>
        </fieldset>
        <fieldset>
            <legend>Contract Expiration and Notices</legend>
                <ul class="form-flex-outer">
                    <li>
                        <label for="e-datepicker">Expiration Date</label>
                        <input type="text" name="expiration_date" id="e-datepicker">
                    </li>
                    <li>
                        <label for="renewal_provision">Renewal Provision</label>
                        <select name="renewal_provision" id="renewal_provision" required>
                            <option>Choose Renewal Provision</option>
                            <?php
                                $get_renewal_provision = "select * from renewal_provision";
                                $result_renewal_provision = mysqli_query($conn,$get_renewal_provision);
                                while($row_renewal_provision = mysqli_fetch_array($result_renewal_provision))  {
                                    $renewal_provision_id = $row_renewal_provision['renewal_provision_id'];
                                    $renewal_provision_name = $row_renewal_provision['renewal_provision'];
                                    echo"<option value = '$renewal_provision_id'>$renewal_provision_name</option>";
                                }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="termination_provision">Termination Rights / Provision</label>
                        <textarea rows="6" name="termination_provision" id="termination_provision" placeholder="Enter Remarks here"></textarea>
                    </li>
                    <li>
                        <label for="assignment_provision">Assignment Provision</label>
                        <input type="text" id="assignment_provision" name="assignment_provision" placeholder="Assignment Provision">
                    </li>
                    <li>
                        <input type="submit" name="create_contract">
                    </li>
                </ul>
        </fieldset>
    </form>
</div>
<?php

    if(isset($_POST['create_contract'])) 
    {	  
	   //Text data variables
        $reference_num = mysqli_real_escape_string($conn,$_POST['reference-num']);
        $contract_type = $_POST['contract_type'];
        $category = mysqli_real_escape_string($conn,$_POST['category']);
        $description = mysqli_real_escape_string($conn,$_POST['description']);
        $dateArray = explode('/', $_POST['date']);
        $date = $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];
        $language = mysqli_real_escape_string($conn,$_POST['language']);
        $life = mysqli_real_escape_string($conn,$_POST['life']);
        $supplier = mysqli_real_escape_string($conn,$_POST['supplier']);
        $country = mysqli_real_escape_string($conn,$_POST['country']);
        $currency = mysqli_real_escape_string($conn,$_POST['currency']);
        $spend = mysqli_real_escape_string($conn,$_POST['spend']);
        $terms = mysqli_real_escape_string($conn,$_POST['terms']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        $vendor_name = mysqli_real_escape_string($conn,$_POST['vendor_name']);
        $vendor_email = mysqli_real_escape_string($conn,$_POST['vendor_email']);
	    $vendor_contact = mysqli_real_escape_string($conn,$_POST['vendor_contact']);
        $sdm_name = mysqli_real_escape_string($conn,$_POST['sdm_name']);
        $sdm_email = mysqli_real_escape_string($conn,$_POST['sdm_email']);
        $sdm_contact = mysqli_real_escape_string($conn,$_POST['sdm_contact']);
        $remarks = mysqli_real_escape_string($conn,$_POST['remarks']); //Insert rest into expiration
        $expirationDateArray = explode('/', $_POST['expiration_date']);
        $expiration_date = $expirationDateArray[2].'-'.$expirationDateArray[0].'-'.$expirationDateArray[1];
        $renewal_provision = mysqli_real_escape_string($conn,$_POST['renewal_provision']);
        $termination_provision = mysqli_real_escape_string($conn, $_POST['termination_provision']);
        $assignment_provision = mysqli_real_escape_string($conn,$_POST['assignment_provision']);

        //Insert vendor,sdm into vendor and sdm table and get it's id - then store that id in contract table
        $insert_vendor = "Insert into vendor(contact_name, email, phone_no) values('$vendor_name','$vendor_email', '$vendor_contact')";
        mysqli_query($conn, $insert_vendor);
        $vendor_id = mysqli_insert_id($conn);

        $insert_sdm = "Insert into service_delivery_manager(name, email, phone_no) values('$sdm_name','$sdm_email', '$sdm_contact')";
        mysqli_query($conn, $insert_sdm);
        $sdm_id = mysqli_insert_id($conn);

        $insert_expiration = "Insert into expiration(contract_no, date, renewal_provision_id, termination_rights, assignment_provision) values('$reference_num','$expiration_date', '$renewal_provision', '$termination_provision', '$assignment_provision')";
        mysqli_query($conn, $insert_expiration);
        $expiration_id = mysqli_insert_id($conn);

        $insert_contract = "Insert into contract(contract_no, type_id, category_id, description, date_of_agreement, language_id, supplier_name, country_id, life_of_contract, vendor_id, sdm_id, sdm_remarks, currency_id, annual_spend, payment_terms, status, expiration_id) values('$reference_num','$contract_type','$category','$description','$date','$language','$supplier', '$country','$life','$vendor_id','$sdm_id', '$remarks', '$currency','$spend', '$terms' ,'$status', '$expiration_id')";
	    $result_contract = mysqli_query($conn,$insert_contract);
	  
	    if($result_contract){
            echo"<script>alert('New contract details inserted successfully!')</script>"; 
            echo"<script>window.open('index.php?new_contract','_self')</script>";
	    } 
    }
?>