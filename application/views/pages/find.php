<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Find-Ijarline</title>
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
			<span class="w3-large w3-text-blue">Search for it  <span class="w3-small w3-text-black">search by item and location OR browse by category</span>
		</span>
		<hr>

		<div class="col-lg-6">
			<table class="w3-text-small w3-margin-bottom" width="90%">
				<form action="<?php echo base_url(); ?>search_results" method="GET">
				<tbody>
					<tr>
						<td align="left"><label class="w3-margin-bottom w3-text-blue">What: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="find_what" placeholder="Enter item name" type="text" class="form-control"></div></td>						
					</tr>
					<tr>
						<td align="left"><label class="w3-margin-bottom w3-text-blue">Where: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left"><input class="form-control" placeholder="Enter suburb OR state" name="find_where" type="text">
							<span class="w3-small">Suburb OR State</span></div>
						</td>
					</tr>
					<tr>
						<td align="left"><label class="w3-margin-bottom w3-text-blue">Category: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left">
							<select class="form-control" name="find_category">
								<option value="all" selected>ALL</option>
								<?php
								if (isset($all_category)) {
									$cat_array=json_decode($all_category,TRUE);

									foreach ($cat_array as $key) {
										$cat_id=$key['cat_id'];
										$cat_name=$key['cat_name'];

										echo '<option value="'.$cat_name.'">'.strtoupper($cat_name).'</option>';
									}
								}
								else{
									echo '<option disabled>No Categories Added</option>';
								} 

								?>
							</select>
						</div></td>
					</tr>
					<tr>
						<td></td>
						<td align="left" >
							<button class="btn w3-blue w3-text-white w3-margin-left w3-padding-left w3-padding-right" name="find_btn" id="find_btn" type="submit">
								<i class="fa fa-play"></i> Find item
							</button>
						</td>
					</tr>
				</tbody>
			</form>
			</table>
		</div>
		<div class="col-lg-6"></div>
		<?php 
			if(isset($find_fail)){
				echo $find_fail;
			}
		?>

	</div>
</div>

<div class="col-lg-1 "></div>
</div>
</body>
</html>