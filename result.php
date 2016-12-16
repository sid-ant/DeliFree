<?php
  session_start();
  include("dbconn.php");

  // redirect to home.php if not logged in!
  // add a check if the user has any ad or not! do whatever to make sure he came here from details.php and not just being smart duh?

  $dataTableName = "listings";
  $did = $_SESSION['did'];

  $datadetails=mysqli_fetch_array(mysqli_query($conn,"SELECT * from $dataTableName where id='$did'"));
  $price = $datadetails['price'];
  $location = $datadetails['location'];
  $matches=mysqli_query($conn,"SELECT * FROM $dataTableName WHERE location = '$location' and price+$price>=500 and id<>$did and status='1' and sold='0'");

  // mysqli_fetch_array(

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

<?php include('navigationbar.php'); ?>



  <!-- title -->
  <div class="row" style="margin-left:5%;margin-top:2%;width:60%">
    <div class="w3-panel w3-border w3-white w3-square-large">
      <p>User's who also wish to order on your selected location </p>
    </div>
  </div>

<?php
  $i=1;
  if(mysqli_num_rows($matches))
    while($row = mysqli_fetch_array($matches)){
      ?>

<div class="row">
<div style="margin-left:5%;margin-bottom:2%;width:60%;">
  <ul class="w3-navbar w3-green">
    <li class="w3-red"><a href="#"><i class="fa fa-plane w3-margin-right"></i><?php echo $i; ?></a></li>
  </ul>

  <div class="w3-container w3-white w3-padding-16">
    <!-- <h3> Your Product Details Are: </h3> -->
    <label> Product Price:  <?php echo $row['price']; ?> </label>
    <br>
    <label> Product Seller: <?php echo $row['seller']; ?></label>
    <br>
  <p><button class="w3-btn w3-dark-grey" style="float:right">Contact User</button></p>
  </div>
</div>
</div>

<?php
$i++; }
else {
?>
<div class="row">
<div style="margin-left:5%;margin-bottom:2%;width:60%;">
  <ul class="w3-navbar w3-green">
    <li class="w3-red"><a href="#"><i class="fa fa-plane w3-margin-right"></i>1.</a></li>
  </ul>

  <div class="w3-container w3-white w3-padding-16">
    <!-- <h3> Your Product Details Are: </h3> -->
    <label> No Match Found! </label>
    <br>
    <label> We will notify you when a match appears </label>
    <br>
  </div>
</div>
</div>
<?php
}
?>




  <!-- advertisement 1 -->
  <!-- <div class="w3-display-topright" style="margin-left:5%;margin-right:5%;margin-top:2%;">
    <div class="w3-card-4">
      <img src="img/ads/1.jpg" alt="ad">
      <div class="w3-container w3-center">
      </div>
    </div>
  </div> -->

  <!-- advertisement 2 -->
  <!-- <div class="w3-display-bottomright" style="margin-left:5%;margin-right:5%;margin-bottom:5%">
    <div class="w3-card-4">
      <img src="img/ads/2.jpg" alt="ad" class="w3-image" style="width:300px; height:270px">
      <div class="w3-container w3-center">
      </div>
    </div>
  </div> -->





</body>
</html>
