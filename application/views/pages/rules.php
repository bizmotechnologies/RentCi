<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rules-Ijarline</title>
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
		<div class="w3-col l12 w3-white w3-round-large w3-padding">
			<div class="w3-col l12 w3-margin-bottom">
				
				<h3 class="w3-text-blue" style="margin-bottom: 5"><strong>Ijarline Rules </strong></h3>
				<p class="w3-small">Once you read and accept these terms. You can list & rent items. </p>
				<ol>
					<?php
					if (isset($all_rules)||$all_rules!=null) {
						$rule_array=json_decode($all_rules,TRUE);
						$count=0;

						foreach ($rule_array as $key) {
							$rule_title=$key['rule_title'];
							$rule_content=$key['rule_content'];

							echo '
							<li class="w3-text-blue w3-margin-bottom" style="font-weight: bold;">
							<h5 style="margin-bottom: 0"><strong>'.$rule_title.'</strong></h5>
							<span class="w3-small w3-text-black" style="font-weight: normal;">'.$rule_content.'</span>
							</li>
							';
						}
					}
					else{
						echo '<strong>--------------------No Rules Added--------------------------</strong>';
					} 
					?>
					
				</ol>
				<p class="w3-small">Our Privacy Policy can be found <a class="w3-text-blue" href="<?php echo base_url(); ?>privacy">here.</a></p>

				<p class="w3-small">The environment loves ijarline too! Check it out <a class="w3-text-blue" href="<?php echo base_url(); ?>environment">here.</a></p>
			</div>
			
		</div>
	</div>

	<div class="col-lg-1 "></div>
</div>
</body>
</html>