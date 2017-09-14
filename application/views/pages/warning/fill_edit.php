<?php defined('BASEPATH') OR exit('No direct script access allowed');	

$unique_id=$this->session->userdata('unique_id');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Be a Member</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font awesome/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/w3.css">
	<!-- <link rel="stylesheet" href="assets/css/alert/jquery-confirm.css"> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>css/bootstrap/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="assets/css/alert/jquery-confirm.js"></script> -->
</head>
<body>
<?php 
$hide="w3-hide";
if($unique_id==''){
	$hide="";
}
?>

<div class="<?php echo $hide; ?> w3-col l12 w3-red w3-center w3-margin-bottom w3-small">
<span class="">
<?php
		if(isset($account_updated)){
			echo $account_updated;
		}
		else{
			echo "You must fill your details to proceed further...";			
		
		}
		?>
</span>
</div>	

</body>
</html>