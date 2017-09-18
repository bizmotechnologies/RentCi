<?php 
$emailID=$this->session->userdata('email_id');
$is_logged=$this->session->userdata('is_logged');
$unique_id=$this->session->userdata('unique_id');

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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


<!-- sub header div.................................
-->	
<div class="">
	<div class="col-lg-1 "></div>
	<div class="w3-col l10 w3-light-grey w3-margin-bottom" style="margin-top: 2px;padding:0 10px 0 10px">
		
		<div class="w3-right">
			<label class="w3-small w3-margin-right">Logged in as: <?php echo $emailID; ?></label>
			<label class="w3-tiny w3-margin-right"><a class="btn anchor_btn" href="<?php echo base_url(); ?>user_home"><b>My Ijarline</b></a></label>
			<label class="w3-tiny w3-margin-right"><a class="btn anchor_btn" href="<?php echo base_url(); ?>login/logout"><b>Logout</b></a></label>
		</div>		
	</div>
	<div class="col-lg-1 "></div>
</div>
<!-- sub header div end.....................................
-->	
</body>
</html>