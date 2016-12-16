<?php
  session_start();
  include("dbconn.php");

// if not logged in redirect to home.
// add other restrictions as well


  $dataTableName = "listings";
  $userTableName = "users";
  $uid = $_SESSION['uid'];
  $did = $_SESSION['did'];
  $datadetails=mysqli_fetch_array(mysqli_query($conn,"SELECT * from $dataTableName where id='$did'"));
  $userdetails=mysqli_fetch_array(mysqli_query($conn,"SELECT * from $userTableName where id='$uid'"));


?>


<!DOCTYPE html>
<html>
<title>DeliFree: Say GoodBye To Delivery Charges</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>
<body class="w3-light-grey">

<?php include("navigationbar.php"); ?>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="img/white.jpg" alt="London" width="1500" height="700">

  <div class="w3-display-topright" style="margin-left:5%;margin-right:5%;margin-top:2%;">
    <div class="w3-card-4">
      <img src="img/ads/1.jpg" alt="ad">
      <div class="w3-container w3-center">
        </div>
</div>
  </div>

  <div class="w3-display-bottomright" style="margin-left:5%;margin-right:5%;margin-bottom:5%">
    <div class="w3-card-4">
      <img src="img/ads/2.jpg" alt="ad" class="w3-image" style="width:300px; height:270px">
      <div class="w3-container w3-center">
        </div>
</div>
  </div>


  <div class="w3-display-left" style="margin-left:5%;width:60%;margin-top:-10%;">
    <ul class="w3-navbar w3-black">
      <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Flight');"><i class="fa fa-plane w3-margin-right"></i>Product Details</a></li>
    </ul>


    <!-- Tabs -->
    <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
      <h3> Your Product Details Are: </h3>
      <div>
      <label> Product Link: <?php echo $datadetails['link'];  ?></label>
      <br>
      <label> Product Name: <?php echo $datadetails['pname']; ?> </label>
      <br>
      <label> Product Price <?php echo $datadetails['price']; ?></label>
      <br>
      <label> Product's Seller <?php echo $datadetails['seller']; ?> </label>
      <br>
      <label> Sellected Location <?php echo $datadetails['location']; ?> </label>
      <br>
    </div>
    <p><button class="w3-btn w3-dark-green" style="float:right" onclick="confirm()">Confirm and Search</button></p>
    </div>


  </div>
</header>


<form id="tale" method="post" action="updatedetails.php">
    <input type="hidden" value="confirmed" name="letitgo">
</form>

<script>

function confirm(){
   document.getElementById('tale').submit();
}

// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-green";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>

</body>
</html>
