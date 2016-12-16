<?php
session_start();



?>

<!-- checkin if logged in or not -->
<?php
if (isset($_SESSION['logIN']) && $_SESSION['logIN']==1){
  ?>
  <script>
  var logIN = 1;
  </script>
  <?php }
  else {
  ?>
  <script>
  var logIN = 0;
  </script>
  <?php }
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

<?php include("navigationbar.php"); ?>

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

    <!-- Form for product details -->
    <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Say GoodBye To Delivery Charges Forever</h3>
      <form id="product" action="insert.php" method="post">
      <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <label>Product Link</label>
          <input class="w3-input w3-border" type="text" placeholder="Paste Your Product Link" required="required">
        </div>
        <div class="w3-half">
          <label> Enter Location </label>
          <input class="w3-input w3-border" type="text" placeholder="Location" required="required">
        </div>
      </div>
      </form>
      <p><button class="w3-btn w3-dark-grey" onclick="productdetails()"> Submit </button></p>
      <div id="info" class="w3-dropdown-content w3-animate-zoom">
      <p> please login first </p>
      </div>

    </div>

    <!-- Weclome div  -->
    <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Say GoodBye To Delivery Charges Forever</h3>
      <p> All you have to do is provide us with the link and the location </p>
      <p> We will contact you with your delivery patner </p>
      <p><button class="w3-btn w3-dark-grey"> Product Details </button></p>
    </div>

  </div>
</header>


<!-- messages to display upon registration -->

<div id="userExists" class="modal" style="display:'block'">
  <div class="modal-content animate">
  <div class="container" style="background-color:#f1f1f1">
    <span style="color:red">The User with the email already exists!</span>
  </div>
  </div>
</div>

<div id="userAdded" class="modal" style="display:'block'">
  <div class="modal-content animate">
  <div class="container" style="background-color:#f1f1f1">
    You have been successfully registered.
    <br>
    Please check your email to activate your account.
    <br>
    <button type="button" onclick="document.getElementById('userAdded').style.display='none'" class="cancelbtn">Close</button>
  </div>
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

  if(isset($_SESSION["logINfailed"]) && $_SESSION["logINfailed"]==1){
    ?>
    <script>
    window.alert("login failed dude");
    document.getElementById('id01').style.display='block';
    document.getElementById('msg').innerHTML='Login Failed';
    </script>
    <?php
  }

 ?>


<!--Login  -->

<div id="id01" class="modal">

  <form class="modal-content animate" action="register.php">

    <div class="container">
      <span id="msg" style:"color:red"> </span>
      <label><b>Username</b></label>
      <input type="email" placeholder="Enter Email" name="uemail" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <input type="submit" class="w3-btn w3-medium w3-red" name="submitLogin" value="Login"></input>
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
      <span>
      <input type="submit" class="w3-btn w3-medium w3-red" name="submitRegister" value=Register style:"float:left"> </input>
      <button type="button" onclick="document.getElementById('register').style.display='none'" class="w3-btn w3-medium w3-red" style:"float:left">Cancel</button>
      </span>
    </div>
  </form>
</div>

<!-- Login/Register script  -->
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2= document.getElementById('register');
var modal3=document.getElementById('userAdded');
var modal4=document.getElementById('userExists');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal||event.target==modal2||event.target==modal3||event.target==modal4) {
        modal.style.display = "none";
        modal2.style.display = "none";
        modal3.style.display = "none";
        modal4.style.display="none";
    }
}


function productdetails(){
  console.log(logIN);
  if (logIN==1){
    document.getElementById("product").submit();
  }
  else {
  var msgx = document.getElementById("info");
  if (msgx.className.indexOf("w3-show") == -1) {
      msgx.className += " w3-show";
    }
  else {
      msgx.className = msgx.className.replace(" w3-show", "");
  }
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

<?php
// session_unset();
// session_destroy();
 ?>

</body>
</html>
