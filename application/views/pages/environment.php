<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Environment-Ijarline</title>
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

	<div class="w3-col l10 w3-light-grey w3-round-large" style="padding: 14px">
		<div class="w3-col l12 w3-white w3-round-large w3-text-grey w3-padding">
			<div class="w3-col l12 w3-margin-bottom">
				<img class="img" alt="Ijarline-Earth Pic" title="Ijarline & the Environment" src="<?php echo base_url(); ?>css/logos/ijarline-env.jpg">
				<br><span class="w3-xlarge w3-text-blue">Ijarline & the Environment</span>
				<hr>
				<h5 class="w3-text-blue" style="margin-bottom: 0"><strong>We don’t have a policy, just a belief. </strong></h5>
				<span class="w3-small">Renting is a sensible way to enjoy life, while reducing our impact on the planet, our home. Every time you rent something it’s a product which doesn’t get made, packaged, shipped and sold. Sure, we’re not scientists, but we’re quite certain this is a win for the environment.</span>
			</div>

			<div class="w3-col l12 w3-margin-bottom">
				<h5 class="w3-text-blue" style="margin-bottom: 0"><strong>Share this </strong></h5>
				<label><a class="btn fa fa-twitter w3-jumbo w3-text-blue" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20Item%20' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"></a></label>

				<!-- facebook share -->
				<label><a class="btn fa fa-facebook-official w3-jumbo w3-text-blue" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"></a></label>
			</div>
			
		</div>
	</div>

	<div class="col-lg-1 "></div>
</div>
</body>
</html>