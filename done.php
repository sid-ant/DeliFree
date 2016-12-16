<?php
  session_start();
  include('dbconn.php');

  //check if already logged in or not!
  $dataTableName='listings';
  $userTableName='users';

  if(isset($_REQUEST['ad'])){
    $did = $_REQUEST['ad'];
    $_SESSION['ad']=$did;
    $datadetails=mysqli_fetch_array(mysqli_query($conn,"SELECT * from $dataTableName where id='$did'"));
    $useremail=$datadetails['email'];
    $userdetails=mysqli_fetch_array(mysqli_query($conn,"SELECT * from $userTableName where email='$useremail'"));
  }

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

<script>
  function completed(x){
    if(x==1){
      document.getElementById("doneDel").submit();
    }
    else if(x==0){
      document.getElementById("doneDo").submit();
    }

  }
</script>

<?php include('navigationbar.php'); ?>

<form id="doneDel" method="post" action="completed.php">
  <input type="hidden" value="1" name="finishdel"> </input>
</form>

<form id="doneDo" method="post" action="completed.php">
  <input type="hidden" value="0" name="finishdo"> </input>
</form>
<!-- Header -->
<!-- <header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="img/white.jpg" alt="London" width="1500" height="700"> -->

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


  <!-- results -->

  <div class="row" style="margin-left:5%;width:60%;margin-top:4%">
    <ul class="w3-navbar w3-green">
      <li class="w3-red"><a href="#"><i class="fa fa-plane w3-margin-right"></i> Contact</a></li>
    </ul>

    <div class="w3-container w3-white w3-padding-16">
      <!-- <h3> Your Product Details Are: </h3> -->
      <label> Contact No:  <?php echo $userdetails['contact']; ?></label>
      <br>
      <label> WhatsApp Availability: <?php echo $userdetails['whatsapp']; ?> </label>
      <br>
      <label> Order By: <?php echo $userdetails['name']; ?> </label>
      <br>
      <br>

      While contacting don't forget to mention DeliFree!
      <br> <br>
      Did this complete your order?
      <br>
      Would you like to remove your ad?
    <p><button class="w3-btn w3-sand" style="float:right" onclick="completed('1');">NO</p>
    <p><button class="w3-btn w3-indigo" style="float:right" onclick="completed('0');">YES</p>
    </div>
  </div>

<!-- </header> -->


</body>
</html>
