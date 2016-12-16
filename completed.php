<?php
  session_start();
  include('dbconn.php');
  $dataTableName="listings";
  $did=$_SESSION['ad'];

  if(isset($_REQUEST['finishdel'])){
    $sql = "UPDATE $dataTableName SET status='0' WHERE id='$did'";
    $run=$conn->query($sql);
    session_unset();
    session_destroy();
    header('location:home.php?completed=1');
    die();
  }
  else if(isset($_REQUEST['finishdo'])){
    session_unset();
    session_destroy();
    header('location:home.phpcompleted=1');
    die();
  }

 ?>
