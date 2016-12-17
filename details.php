<?php
  session_start();
  include("dbconn.php");

  if(isset($_SESSION["logIN"]) && $_SESSION["logIN"]==1){
      //continue;
    }
  else{
      header('location:home.php');
      die();
  }

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


  <!-- <div class="row" style="margin-left:5%;margin-top:2%;width:60%"> -->

  <!-- <div class="w3-display-topright" style="margin-left:5%;margin-right:5%;margin-top:2%;">
    <div class="w3-card-4">
      <img src="img/ads/1.jpg" alt="ad">
      <div class="w3-container w3-center">
        </div>
</div>
  </div>
</div>

  <div class="w3-display-bottomright" style="margin-left:5%;margin-right:5%;margin-bottom:5%">
    <div class="w3-card-4">
      <img src="img/ads/2.jpg" alt="ad" class="w3-image" style="width:300px; height:270px">
      <div class="w3-container w3-center">
        </div>
</div>
  </div> -->


  <div class="row">
  <div style="margin-left:5%;margin-bottom:2%;width:60%;margin-top:2%">
    <ul class="w3-navbar w3-green">
      <li class="w3-red"><a href="#"><i class="fa fa-plane w3-margin-right"></i> Product Details</a></li>
    </ul>

    <div class="w3-container w3-white w3-padding-16">
      <h3> Your Product Details Are: </h3>
      <div>
      <label> Product Link:  </label> <br>
        <input type="text" value="<?php echo $datadetails['link']; ?>" readonly> </input>
      <br>
      <label> Product Name: <br> <input type="text" value="<?php echo $datadetails['pname']; ?>" readonly> </input> </label>
      <br>
      <label> Product Price: <br> <input type="text" value="<?php echo $datadetails['price']; ?>" readonly> </input></label>
      <br>
      <label> Product's Seller: <br> <input type="text" value="<?php echo $datadetails['seller']; ?>" readonly> </input> </label>
      <br>
      <label> Selected Location: <br> <input type="text" value="<?php echo $datadetails['location']; ?>" readonly> </input>  </label>
      <br>
    </div>
    <p><button class="w3-btn w3-dark-green" style="float:right" onclick="confirm()">Confirm and Search</button></p>

    </div>
  </div>
  </div>

<!--
  <div class="row" style="margin-left:5%;width:60%;margin-top:-10%;">
    <ul class="w3-navbar w3-black">
      <li><a href="javascript:void(0)" class="tablink"><i class="fa fa-plane w3-margin-right"></i>Product Details</a></li>
    </ul>


    <div style="margin-left:5%;margin-bottom:2%;width:60%;">
    <div id="Flight" class="w3-container w3-white w3-padding-16">

    </div>
    </div>
  </div> -->


</header>

<form id="tale" method="post" action="updatedetails.php">
    <input type="hidden" value="confirmed" name="letitgo">
</form>

<script>

function confirm(){
   document.getElementById('tale').submit();
}

</script>

</body>
</html>
