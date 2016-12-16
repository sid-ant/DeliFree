<script>
function drop() {
    var userx = document.getElementById("userAcc");
    if (userx.className.indexOf("w3-show") == -1) {
        userx.className += " w3-show"; }
    else {
        userx.className = userx.className.replace(" w3-show", "");
    }
}
</script>



<?php
if(isset($_SESSION["logIN"]) && $_SESSION["logIN"]==1){
?>
<ul class="w3-navbar w3-white w3-border-bottom w3-xlarge">
  <li><a href="#" class="w3-text-red w3-hover-red"><b><i class="fa fa-plane w3-margin-right"></i>DeliFree</b></a></li>
  <li class="w3-right">
  <div class="w3-dropdown-hover">
    <button onclick="drop()" class="w3-btn w3-red w3-medium">Hey <?php echo $_SESSION['userName']; ?> </button>
    <div id="userAcc" class="w3-dropdown-content w3-border">
      <a href="register.php?logOUT=1">Log Out</a>
    </div>
  </div>
</li>
</ul>
<?php }
else{ ?>
  <ul class="w3-navbar w3-white w3-border-bottom w3-xlarge">
    <li><a href="#" class="w3-text-red w3-hover-red"><b><i class="fa fa-plane w3-margin-right"></i>DeliFree</b></a></li>
    <li class="w3-right" style="margin-right:5px"> <button class="w3-btn w3-red w3-medium" style="margin-left:5px;" onclick="document.getElementById('register').style.display='block'">Register</button> </li>
    <li class="w3-right"> <button class="w3-btn w3-red w3-medium" onclick="document.getElementById('id01').style.display='block'">Login</button> </li>
  </ul>
<?php } ?>
