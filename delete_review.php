<?php
  if(isset($_SESSION['logged'])!="true")
  {
    header("Location: login.php");
    die();
  }

  if(isset($_GET['delete_review'])){
   
    $id = $_GET['delete_review'];
    $delete_review = "Delete from review where id = '$id'";
    $run_delete = mysqli_query($conn,$delete_review);

    if($run_delete){
      echo"<script>alert('Review has been deleted successfully!')</script>";
      echo"<script>window.open('index.php?view_all_reviews','_self')</script>";
    }
  }
  mysqli_close($conn);
?>