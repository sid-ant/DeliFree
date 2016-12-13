<?php
session_start();
include("dbconn.php");


?>

<!DOCTYPE html>
<html>
<title> DeliFree: Say GoodBye To Delivery Charges </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/login.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<ul class="w3-navbar w3-white w3-border-bottom w3-xlarge">
  <li><a href="#" class="w3-text-red w3-hover-red"><b><i class="fa fa-plane w3-margin-right"></i>DeliFree</b></a></li>
  <li class="w3-right" style="margin-right:5px"> <button class="w3-btn w3-red w3-medium" style="margin-left:5px;" onclick="document.getElementById('register').style.display='block'">Register</button> </li>
  <li class="w3-right"> <button class="w3-btn w3-red w3-medium" onclick="document.getElementById('id01').style.display='block'">Login</button> </li>

</ul>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="img/london12.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle" style="width:65%">
    <ul class="w3-navbar w3-black">
      <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Hotel');"><i class="w3-margin-right"></i>Welcome</a></li>
      <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Flight');"><i class="fa fa-plane w3-margin-right"></i>Product Link</a></li>
      <!-- <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Car');"><i class="fa fa-car w3-margin-right"></i>Rental</a></li> -->
    </ul>

    <!-- Tabs -->
    <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Say GoodBye To Delivery Charges Forever</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <label>Product Link</label>
          <input class="w3-input w3-border" type="text" placeholder="Paste Your Product Link">
        </div>
        <div class="w3-half">
          <label> Enter Location </label>
          <input class="w3-input w3-border" type="text" placeholder="Location">
        </div>
      </div>
      <p><button class="w3-btn w3-dark-grey">Submit Link</button></p>
    </div>

    <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Say GoodBye To Delivery Charges Forever</h3>
      <p> All you have to do is provide us with the link and the location </p>
      <p> We will contact you with your delivery patner </p>
      <p><button class="w3-btn w3-dark-grey"> Product Details </button></p>
    </div>

  </div>
</header>


<!-- messages to display upon registration -->

<div id="userExists" class="modal">
  <div class="container">
    The User with the email already exists! Please enter again.
  </div>

</div>

<div id="userAdded" class="modal" style="width:30%">
  <div class="container" style="background-color:#f1f1f1">
    You have been successfully registered. Please check your email to activate your account.
    <button type="button" onclick="document.getElementById('userAdded').style.display='none'" class="cancelbtn">Close</button>
  </div>
</div>


<!-- registered status -->
<?php

  if (isset($_SESSION["registerAttempted"]) && $_SESSION["registerAttempted"]==1){
      if(isset($_SESSION["userExists"]) && $_SESSION["userExists"]==1){

        ?>
        <script>
        document.getElementById('userExists').style.display='block';
        </script>
        <?php
      }
      else if(isset($_SESSION["userAdded"]) && $_SESSION["userAdded"]==1){
        ?>
        <script>
        document.getElementById('userAdded').style.display='block';
        </script>
        <?php
      }
  }

 ?>


<!--Login  -->

<div id="id01" class="modal">

  <form class="modal-content animate" action="action_page.php">

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <input type="submit" class="w3-btn w3-medium w3-red" name="submitLogin">Login</input>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<!--Register  -->
<div id="register" class="modal">

  <form class="modal-content animate" action="register.php" method="post">

    <div class="container">

      <label><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="uname" required>
      <br>
      <label><b>Email</b></label>
      <br>
      <input type="email" placeholder="Enter Email" name="uemail" required>
      <br>
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <br>
      <label><b>Re-Enter Password</b></label>
      <input type="password" placeholder="Enter Password" name="rpsw" required>
      <br>
      <label><b>Contact Number</b></label>
      <input type="number" placeholder="Enter Your Phone Number" name="unumber" required>
      <br>
      <label><b>Do you want to contacted via whatsapp? </b></label>
      <input type="number" placeholder="Enter Your Phone Number" name="whatsapp" required>
      <input type="submit" class="w3-btn w3-medium w3-red" name="submitRegister" value=Register> </input>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('register').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<!-- Login/Register script  -->
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2= document.getElementById('register');
var model3 =document.getElementById('userAdded');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal||event.target==modal2) {
        modal.style.display = "none";
        modal2.style.display = "none";
        modal3.style.display = "none";
    }
}
</script>




<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>

</body>
</html>
