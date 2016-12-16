<?php
  session_start();
  include("dbconn.php");
  $dataTableName="listings";
  $did=$_SESSION['did'];

  if(isset($_REQUEST['letitgo'])){
    if($_REQUEST['letitgo']=="confirmed"){
      $sql = "UPDATE $dataTableName SET status='1' WHERE id='$did'";
      $run=$conn->query($sql);
      header("location:result.php");
      die(); 
    }
  }


 ?>
