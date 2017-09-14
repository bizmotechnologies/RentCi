<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Account Success</title>
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


<!-- middle page content...............................
-->
<div class="w3-row w3-margin-top">
	<div class="col-lg-1 "></div>

	<div class="w3-col l10 w3-light-grey w3-round-large w3-padding">
		<p><label class="w3-label">You're rentoid's newest member now,</label></p>
		<p><label class="w3-xxlarge w3-text-purple">Thanks for joining,</label></p>
		<p><label class="w3-large w3-text-purple">You can now list as many items as you want OR get started renting.</label></p>
		<label class="w3-medium w3-text-purple">You can, </label>
		<a class="w3-button btn w3-red w3-margin-bottom" href="list_item"><i class="fa fa-list"></i> List something straight away</a>
		<label class="w3-medium w3-text-purple">OR</label>
		<a class="w3-button btn w3-red w3-margin-bottom" href="find_item"><i class="fa fa-search"></i> Find an item to rent</a>

	</div>

	<div class="col-lg-1"></div>
</div>

</body>
</html>