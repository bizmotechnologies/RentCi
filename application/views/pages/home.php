<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ijarline-Home</title>
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
		
		<!-- Find item div -->
		<div class="w3-col l8 w3-padding-small ">
			<div class="w3-col l12 w3-padding w3-round-large w3-white w3-text-blue">
				<span class="w3-center"><mark>THIS FEATURE IS UNDER CONSTRUCTION !!!</mark></span>
				<h4>CHECK IT OUT! Over $101 million worth of cool stuff to rent </h4>
				<hr>
				<span class="w3-large">Search for it  <span class="w3-small w3-text-black">search by item and location OR browse by category</span></span>
				<br>
				<div class="col-lg-8">
					<table class="w3-text-small" width="90%">
						<tbody>
							<tr>
								<td align="left"><label class="w3-margin-bottom">What: </label></td>
								<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="user_email" placeholder="Enter item name, category" type="email" class="form-control" required></div></td>						
							</tr>
							<tr>
								<td align="left"><label class="w3-margin-bottom">Where: </label></td>
								<td align="left"><div class="w3-margin-bottom w3-margin-left"><input class="form-control" placeholder="Enter suburb, city, country" id="user_password" name="user_password" type="password" maxlength="10" required></div></td>
							</tr>
							<tr>
								<td align="left"><label class="w3-margin-bottom">Category: </label></td>
								<td align="left"><div class="w3-margin-bottom w3-margin-left">
									<select class="form-control" name="find_category" required>
										<option value="mah">Art-Gallery</option>
										<option value="del">Electronics</option>
										<option value="kar">Games</option>
										<option value="guj">Medical</option>
										<option value="jk">Party</option>
									</select>
								</div></td>
							</tr>
							<tr>
								<td></td>
								<td align="left">
									<button class="btn w3-blue w3-text-white w3-margin-left w3-padding-left w3-padding-right" name="edit_btn" id="edit_btn" type="submit">
										<i class="fa fa-play"></i> Find item
									</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg-4"></div>
				
			</div>
		</div>
		<!-- end -->

		<!-- Login div -->
		<div class="w3-col l4 w3-padding-small">
			<div class="w3-col l12 w3-padding w3-round-large w3-white w3-text-blue">
				<h4>LOG IN</h4>
				<hr>
				<?php echo form_open('login/login_user'); ?>
				<span class="w3-margin-top w3-small w3-text-grey">Email ID</span>
				<input class="form-control" type="email" name="login_email" placeholder="Enter email-ID" required>

				<span class="w3-margin-top w3-small w3-text-grey">Password</span>
				<input class="form-control" type="password" name="login_password" placeholder="Enter password" maxlength="10" required><br>

				<button class="btn w3-button w3-text-white w3-blue" name="login_btn" id="login_btn" type="submit">
					<i class="fa fa-reply"></i> Log In
				</button>
				<a href="" class="btn w3-text-grey w3-small"> Forgot Password ?</a>
				<?php echo form_close()?>
				

				<div class="col-lg-12 w3-small w3-margin-top">
					<label>3 Reasons why ijarline rocks!</label>
				<ol>
					<li>Make cash renting your stuff </li>
					<li>Save money renting temporary needs </li>
					<li>Save the environment</li>
				</ol>
				</div>
				
					
				</div>
			</div>
			<!-- end -->
			
		</div>

		<div class="col-lg-1 "></div>
	</div>
</body>
</html>