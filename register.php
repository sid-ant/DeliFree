<?php

session_start();
include("dbconn.php");
$tablename="users";
$_SESSION["userExists"]=0;
$_SESSION["userAdded"]=0;
$_SESSION["logINfailed"]=0;

if(isset($_REQUEST['logOUT'])){
  $_SESSION["logIN"]=0;
  header("location:home.php");
  die();
}


if(isset($_REQUEST['submitRegister'])){

    $_SESSION["registerAttempted"]=1;
    $name = htmlspecialchars($_REQUEST['uname']);
    $email = htmlspecialchars($_REQUEST['uemail']);
    $contact = htmlspecialchars($_REQUEST['unumber']);
    $password = htmlspecialchars($_REQUEST['psw']);
    $whatsapp = htmlspecialchars($_REQUEST['whatsapp']);

    $row=  mysqli_fetch_array(mysqli_query($conn,"SELECT * from $tablename where email='$email' or contact='$contact' "));

     if($row['email']==$email || $row['contact']==$contact )
       {
        //  User already exits
        $_SESSION["userExists"]=1;
        header("Location:home.php");
        die();
       }
    else
      {
      $sql = "INSERT INTO $tablename (name,email,password,contact,whatsapp)
                                      VALUES ('$name','$email','$password','$contact', '$whatsapp')";
      $run=$conn->query($sql);
      $_SESSION["userAdded"]=1;
      header("Location:home.php");
      die();
      }
}

if(isset($_REQUEST['submitLogin'])){
  $email = htmlspecialchars($_REQUEST['uemail']);
  $password = htmlspecialchars($_REQUEST['psw']);}

  $row=  mysqli_fetch_array(mysqli_query($conn,"SELECT * from $tablename where email='$email' and password='$password'"));
  if($row['email']!=null && $row['password']!=null){
    $_SESSION["logIN"]=1;
    $_SESSION["userName"]=$row["name"];
    header("Location:home.php");
    die();
  }
  else{
    $_SESSION["logINfailed"]=1;
    header("Location:home.php");
    die();
  }


?>
