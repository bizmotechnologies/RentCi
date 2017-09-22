<?php defined('BASEPATH') OR exit('No direct script access allowed');	
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
<!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->
</head>
<body class="w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left w3-card-4" style="z-index:3;width:300px;" id="adminPanel_sidebar"><br>
  <div class="w3-container w3-margin-bottom w3-blue">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-small w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>    
    <span class="w3-xlarge "><b>IJARLINE <span class="w3-small">everywhere...</span></b></span>
  </div>
  <div class="w3-bar-block">
    <a href="<?php echo base_url(); ?>admin/admin_dash" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-th-large fa-fw w3-margin-right"></i>DASHBOARD</a> 
    <a href="<?php echo base_url(); ?>admin/admin_manageRules" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>MANAGE RULES</a> 
    <a href="<?php echo base_url(); ?>admin/admin_generalSettings" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>GENERAL SETTINGS</a> 
     
    <a href="" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="adminPanel_overlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="" class="">    
    <span class="w3-button w3-hide-large w3-xxlarge w3-white w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    
  </header>
   
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("adminPanel_sidebar").style.display = "block";
    document.getElementById("adminPanel_overlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("adminPanel_sidebar").style.display = "none";
    document.getElementById("adminPanel_overlay").style.display = "none";
}
</script>

</body>
</html>