<?php
  if(isset($_SESSION['logged'])!="true")
  {
    header("Location: login.php");
    die();
  }

  if(isset($_GET['delete_vendor'])){
   
    $id = $_GET['delete_vendor'];
    $delete_vendor = "Delete from vendor where vendor_id = '$id'";
    $run_delete = mysqli_query($conn,$delete_vendor);

    if($run_delete){
      echo"<script>alert('Vendor has been deleted successfully!')</script>";
      echo"<script>window.open('index.php?view_all_vendor','_self')</script>";
    }
  }
  mysqli_close($conn);
?>