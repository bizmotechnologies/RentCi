<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>
<!-- User homepage -->
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Home</title>
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
	if(isset($logout_fail)){
		$hide="";
	}
	else{
		$hide="w3-hide";
	}
	?>

	<div class="<?php echo $hide; ?> w3-col l12 w3-red w3-center w3-margin-bottom w3-small">
		<span class=""><?php echo $logout_fail; ?></span>
	</div>

<!-- middle page content...............................
-->
<div class="w3-row w3-margin-top">
	<div class="col-lg-1 "></div>

	<div class="w3-col l10 w3-light-grey w3-round-large w3-padding">
		
		<div class="w3-col l3 w3-padding-small">
			<div class="w3-col l12 w3-padding-small w3-round-large w3-white">
				<p><span class="w3-large">My Ijarline</span></p>
				<span>Hi, <?php echo $user_name=$this->session->userdata('user_name'); ?></span>

				<p>
					<li class="list_home w3-left" ><a class="btn anchor_btn" href="edit_account"><i class="fa fa-user-circle"></i> Edit Account</a></li></p><br>
					<p><li class="list_home w3-left" ><a class="btn anchor_btn" href="user_home "><i class="fa fa-dropbox"></i> Your items</a></li>	
					</p>
				</div>
			</div>
			<div class="w3-col l6 w3-padding-small">
				<div class="w3-col l12 w3-padding-small w3-round-large w3-white">
					<span class="w3-large">Your Items</span>
					<a class="w3-button btn w3-blue w3-right w3-margin-bottom" href="list_item"><i class="fa fa-plus"></i> List New Items</a>
					<hr>
					
					<!-- Show user's Ijarline items -->
					<div class="w3-col l12">
						<?php 
						if(!isset($my_list)){
							echo '<div class="w3-col l12 w3-center"><label class="w3-medium">Your Ijarline is still empty!!! </label></div>';
						}
						else{
							foreach ($my_list as $key) {
									$pic=json_decode($key['item_pictures']);	//decode the image path from db

									//give expiry date of item by calculating posted date + package_date
									$expiry_period = strtotime("+".$key['expiry_period']." month", strtotime($key['posted_date']));
									$expiry_date = date("d M Y", $expiry_period);

									//expiry period is remaining days for expiry
									$expiry_period=$key['posted_date']-date('Y-m-d');

									//single item div
									echo '<div class="w3-col l6" style="">
									<div class=" w3-col l12 w3-padding-small">
									<div class="w3-col l12 w3-padding-small well">
									<div title="Is live" class="w3-circle w3-tiny w3-text-green w3-green w3-right fa fa-check" style="margin:0:padding:2px"></div>
									<div class="w3-col l5 s5 w3-margin-top" >

									';
									foreach ($pic as $img) {							
										echo '
										<div class="w3-grey rent_pic" style="background-image:url(\''.$img.'\')">

										</div>';		
										break;					
									}

									echo '
									<figcaption class="w3-tiny" style="margin-top:5px"><i>'.$key['cat_name'].'</i></figcaption>
									</div>

									<div class="col-lg-7 w3-col s7 w3-padding-left" style="margin-top:5px">
									<label class="w3-small" title="Go to '.$key['item_name'].' page"><a class="btn anchor_btn" href=""><b>'.$key['item_name'].'</b></a></label>
									<hr style="padding:0;margin:0">
									<span class="w3-tiny">Total Views:</span <label class="w3-small">&nbsp;23</label><br>
									<span class="w3-tiny">Expires on:</span><br> <label class="w3-small">'.$expiry_date.'</label><br>
									</div>
									</div>

									</div>

									</div>';

								}

							}
							?>
						</div>
						<!-- item div end -->
					</div>
				</div>
				<div class="w3-col l3 w3-padding-small">
					<div class="w3-col l12 w3-padding-small w3-round-large w3-white">
						<span class="w3-large">NEED HELP?</span>
						<p class="w3-small">
							If you need help with a listing, a rental, or anything, were here for you.
						</p>
						<label class="w3-right"><a class="btn anchor_btn " href="contact_us "><i class="fa fa-inbox"></i> Email Us</a></label>
					</div>
				</div>
			</div>

			<div class="col-lg-1 "></div>
		</div>

	</body>
	</html>