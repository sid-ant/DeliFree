<?php
  // if not logged in redirect to home.php
  session_start();
  include("dbconn.php");

  $link=$_REQUEST['plink'];
  $location=$_REQUEST['dlocation'];
  $uid = $_SESSION['uid'];

  $userTableName = "users";
  $dataTableName = "listings";

  $userinfo=mysqli_fetch_array(mysqli_query($conn,"SELECT * from $userTableName where id='$uid'"));
  $uemail = $userinfo['email'];
  $sql = "INSERT INTO $dataTableName (userid,email,link,location)
                                  VALUES ('$uid','$uemail','$link','$location')";
  $run=$conn->query($sql);
  $_SESSION['did']=$conn->insert_id;
  //header("location:details.php");
 ?>
