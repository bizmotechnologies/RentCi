<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Item-Ijarline</title>
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

	<div class="w3-col l10 w3-light-grey w3-round-large " style="padding: 6px">
		<?php if (isset($item_fail)) { ?>
		<div class="w3-col l12">
			<?php echo $item_fail; ?>
		</div>
		<?php } ?>


		<!-- get suburb and phone no of user -->
		<?php 
		$user_phone="";
		$user_country="";
		if (isset($user_details)) { 

			foreach ($user_details as $key) {
				$user_phone=$key['phone'];
				$user_country=$key['country'];
			}
		}
		?>
		<!-- get suburb and phone end -->

		<!-- get all item details -->
		<?php if (isset($specificItem)) { 

			foreach ($specificItem as $key) {
				$islive="Available";
				if($key['isLive']==0){
					$islive="Not Available";}

					$pic=json_decode($key['item_pictures']);
					?>
					<div class="w3-col l10 w3-padding-small" >
						<div class="w3-col l12 w3-white w3-round-large w3-padding w3-text-blue">
							<span class="w3-large">RENT <?php echo strtoupper($key['item_name'].', '.$suburb); ?></span>
							<br>
							<br>
							<label><?php echo $key['item_name']; ?></label>
							<p class="w3-text-grey w3-small">
								<?php echo $key['item_description']; ?>
							</p>
							<hr>
							<div class="w3-col l12">
								<div class="w3-col l5">
									<label>Further Details:</label>
									<table class="w3-small w3-margin-bottom">
										<tr>
											<td class="w3-text-grey">Delivery:</td>
											<td class="w3-text-grey w3-padding-left"><label>NA</label></td>
										</tr>
										<tr>
											<td class="w3-text-grey">Is Live:</td>
											<td class="w3-text-grey w3-padding-left"><label><?php echo $islive; ?></label></td>
										</tr>
										<tr>
											<td class="w3-text-grey">Category:</td>
											<td class="w3-padding-left"><label><u><a href="<?php echo base_url(); ?>search_results?category=<?php echo $key['cat_name']; ?>"><?php echo $key['cat_name']; ?></a></u></label></td>
										</tr>
										<tr>
											<td class="w3-text-grey">Item Views:</td>
											<td class="w3-text-grey w3-padding-left"><label><?php echo $key['total_views']; ?></label></td>
										</tr>
									</table>
								</div>
								<div class="w3-col l2 s6">
									<label>Pricing (ر.س):</label>
									<table class="w3-small">
										<tr>
											<td class="w3-text-grey">Daily:</td>
											<td class="w3-padding-left"><label><?php echo $key['daily_rate']; ?></label></td>					
										</tr>
										<tr>
											<td class="w3-text-grey">W/End:</td>
											<td class="w3-padding-left"><label><?php echo $key['weekend_rate']; ?></label></td>					
										</tr>
										<tr>
											<td class="w3-text-grey">Week:</td>
											<td class="w3-padding-left"><label><?php echo $key['weekly_rate']; ?></label></td>					
										</tr>
										<tr>
											<td class="w3-text-grey">Month:</td>
											<td class="w3-padding-left"><label><?php echo $key['monthly_rate']; ?></label></td>					
										</tr>
										<tr>
											<td class="w3-text-grey">Bond:</td>
											<td class="w3-padding-left"><label><?php echo $key['bond_rate']; ?></label>&nbsp;<i class=" fa fa-question-circle-o" title="Options: <?php echo $key['extra_option']; ?>"></i></td>					
										</tr>
									</table>
									<span class="w3-right w3-text-grey w3-tiny"><i class="fa fa-question-circle-o"></i>&nbsp;mouse over this</span>
								</div>
								<div class="w3-col l5 s6 w3-center">
									<label>Share This:</label><br>
									<!-- twitter share -->
									<label><a class="btn fa fa-twitter w3-jumbo" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20Item%20' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"></a></label>

									<!-- facebook share -->
									<label><a class="btn fa fa-facebook-official w3-jumbo" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"></a></label>
								</div>
								
							</div>

							<!--Get contact details div  -->
							<div class="w3-col l12">
								<hr>
								<button class="w3-button w3-green w3-round-large" id="get_contact"><i class="fa fa-phone"></i> Get Contact Details</button>
								<div class="w3-right" id="item_contact" style="display: none">
									<img  src="<?php echo base_url(); ?>/css/logos/ijarline-mob.jpg" width="40px" height="auto">
									<span class="w3-right">									
										<div>
											<span class="w3-medium ">PHONE: <?php echo $user_phone; ?>
												<p class="w3-text-grey w3-tiny">Give them a call and get renting!</p>
											</span>									
										</div>
									</span>
								</div>
							</div>

							<!--Item pictures display -->
							<div class="w3-col l12">
								<hr>
								<label>Photos:</label>
								<div class="w3-col l12">
									<?php
									foreach ($pic as $img) {							
										echo '
										<div class="w3-light-grey itemDetail_pic w3-margin" style="background-image:url(\''.$img.'\')">

										</div>';		
										break;				
									}
									?>									
								</div>
							</div>

							<!--Location display -->
							<div class="w3-col l12">
								<hr>
								<label class="w3-large">Location: <?php echo $suburb.', '.$user_country; ?></label>
								
							</div>
						</div>	

					</div>
					
					
					<!-- get user details div-->
					
					<div class="w3-col l2 w3-padding-small">
						<div class="w3-col l12 w3-white w3-round-large w3-padding w3-text-blue">
							<span class="w3-large w3-text-grey">ITEM OWNER</span><br>
							<label class="w3-large w3-margin-top"><?php echo $suburb.', '.$user_country; ?></label><br>
							<!-- get all item details end -->
							<?php
							$user_itemCount=0; 					
							if (isset($allItems)) { 
								$user_itemCount=count($allItems);	?>
								
								<span class="w3-text-grey w3-small">Joined: <label class="w3-large w3-margin-top"></label></span><br>
								<span class="w3-text-grey w3-small">Items: <label class="w3-small w3-margin-top"><?php echo $user_itemCount; ?></label></span><br>

								<label class="w3-small w3-text-grey w3-margin-top">Items for rent:</label>
								
								<?php
								foreach ($allItems as $item) {	
									$pic=json_decode($item['item_pictures'],TRUE);

									$details_link=base_url().'item/'.str_replace(' ','',$item['item_name']).'-'.$suburb.'-'.base64_encode($item['item_id'].'_'.$key['user_name'].'_'.$item['cat_name']);
									//url for details btn is: [item_name(without spaces)-suburb-(base64encoded)itemid_username_category]

									//----------show users other item pics and name--------------//
									foreach ($pic as $img) {
										echo '
										<a href="'.$details_link.'">
										<div class="w3-light-grey w3-margin-top w3-border rent_pic" style="background-image:url(\''.$img.'\')">

										</div>
										<u>'.$item['item_name'].'</a></u>';
										break;
									}
									//-------------show users other items end--------------//
									
								}?>
								<div>
									<?php $more_link=base_url().'search_results?member='.$key['user_name']; ?>

									<a class="w3-button w3-blue w3-margin-top" href="<?php echo $more_link; ?>">More&nbsp;<i class="fa fa-play"></i>
									</a>
									</div>
							<?php }
							?>
							<!-- get user details end -->

						</div>			
					</div>


					<?php }
				} ?>
			</div>

			<div class="col-lg-1 "></div>
		</div>

		<!-- script to hide/show contact details of user -->
		<script>
			$(document).ready(function(){
				$("#get_contact").click(function(){
					$("#item_contact").toggle();
				});
			});
		</script>
	</body>
	</html>