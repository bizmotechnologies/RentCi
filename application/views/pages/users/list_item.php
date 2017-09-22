<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>

<!-- List item page -->
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Items</title>
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
	if(isset($list_error)){
		echo '<div class="w3-wide w3-col l12 w3-red w3-center w3-margin-bottom w3-small">
		<span class="">'.$list_error.'</span>
		</div>';
	}
	?>
	
<!-- top middle page content...............................
-->
<div class="w3-row w3-margin-top">
	<div class="col-lg-1 "></div>

	<div class="w3-col l10 w3-light-grey w3-round-large w3-padding">
		<!-- why to list div -->
		<div class="w3-col l4 w3-padding-small">
			<div class="w3-col l12 w3-padding-small w3-round-large w3-white w3-center">
				<a class="btn w3-text-blue w3-large" data-toggle="modal" data-target="#why_list">WHY LIST ITEMS ?</a>
			</div>
		</div>
		<!-- end -->
		<!-- how it works div -->
		<div class="w3-col l4 w3-padding-small">
			<div class="w3-col l12 w3-padding-small w3-round-large w3-white w3-center">
				<a class="btn w3-text-blue w3-large" data-toggle="modal" data-target="#how_works">HOW IT WORKS ?</a>
			</div>
		</div>
		<!-- end -->
		<!-- listing tips div -->
		<div class="w3-col l4 w3-padding-small">
			<div class="w3-col l12 w3-padding-small w3-round-large w3-white w3-center">
				<a class="btn w3-text-blue w3-large" data-toggle="modal" data-target="#rent_tips">LISTING ITEM TIPS</a>
			</div>
		</div>
		<!-- end -->
	</div>

	<!--Why List Items Modal -->
	<div id="why_list" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><span class="w3-text-blue">Why List Items ?</span></h4>
				</div>
				<div class="modal-body">
					<p>
						<ol class="w3-text-grey w3-small">
							<li>Make money from your idle assets.</li>
							<li>You can't sell things you'll need again some time, but are not using them at the moment.</li>
							<li>Help your community save money.</li>
							<li>It's an environmentally sound way to live. <a href="">(Ijarline and the environment)</a></li>
						</ol>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- 	Why list items modal end	-->

	<!--How it works Modal -->
	<div id="how_works" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><span class="w3-text-blue">How It Works ?</span></h4>
				</div>
				<div class="modal-body">
					<p>
						<span class="w3-text-grey w3-small">
							When someone clicks on your item to rent it, they will be given your phone number to contact you and organise it – easy! We don’t share emails 
						</span>        	
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- 	How it works modal end	-->	

	<!--Listing tips Modal -->
	<div id="rent_tips" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><span class="w3-text-blue">Listing Item Tips </span></h4>
				</div>
				<div class="modal-body">
					<p>
						<label class="w3-text-grey">
							We recommend the following when listing an item on ijarline for rent.
						</label><br>
						<label class="w3-text-grey w3-small">Price :</label><br>
						<span class="w3-text-grey w3-small">
							Our research shows these recommended prices will result in rentals<br>
							Price per day = 1% of items value<br>
							Price per weekend = 3% of items value<br>
							Price per week = 5% of items value<br>
							Price per month = 10% of items value<br>
							When we use the term value, we don't mean what 'you' paid for it, more what it costs to buy today, or what it is worth. 
						</span>
						<br>
						<br>
						<label class="w3-text-grey w3-small">Pictures :</label><br>
						<span class="w3-text-grey w3-small">
							Things without pictures rarely rent out. They are free to put on your listing, so it is worth the effort. If you don't have a pitcure on your computer of the item or a digital camera, why not use Google images to find a picutre. If it is a common item, Google Images is sure to have a picture you can use. Just be sure to tell people is is 'Similar to that pictured' and be honest about the items condition.
						</span>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- 	Listing tips modal end	-->	

	<div class="col-lg-1 "></div>
</div>
<!-- top middle content end..................................
-->

<!-- next middle page content...............................
-->
<div class="w3-row w3-margin-top">
	<div class="col-lg-1 "></div>

	<div class="w3-col l10 w3-light-grey w3-round-large w3-padding">
		<div class="w3-col l12 w3-padding-small">		
			<div class="w3-col l12 w3-padding-small w3-round-large w3-white">

				<?php echo form_open_multipart('list_item/addItem'); ?> 
				<div class="col-lg-12">
					<div class="col-lg-12 w3-margin-bottom w3-margin-top">
						<label class="w3-medium">1. Describe Your Item</label>
					</div>					
					<div class="col-lg-8 col-lg-offset-3 w3-margin-top">
						<table class="w3-small">
							<tbody>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Name/Title: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="item_name" type="text" class="form-control" placeholder="Enter name of item " required></div></td>
								</tr>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Category: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left">
										<select name="item_category" class="form-control">
											
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
										</select></div>
									</td>
								</tr>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Detailed Description: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left">
										<textarea name="item_description" placeholder="Tell something more about this item" rows="4" class="form-control" required></textarea></div>
									</td>						
								</tr>
								<tr>
									<td align="left" colspan="2"><label class="w3-margin-bottom">Photo: </label><a class="w3-right w3-margin-bottom btn w3-text-red w3-small fa fa-plus" id="more_imageBtn" name="more_imageBtn" style="padding:0"> Add More (max. 4 photos)</a>
										<div class="w3-margin-bottom"><input accept="image/*" name="item_image[]" type="file" onchange="checkMIME()" class="w3-input" required></div>
										<div id="more_image_div"></div>
									</td>						
								</tr>
								<tr>
									<td align="right" colspan="2"></td>						
								</tr>
							</tbody>
						</table>	
					</div>
				</div>


				<div class="col-lg-12">
					<hr>
					<div class="col-lg-12 w3-margin-bottom ">
						<label class="w3-medium">2. Set Your Price</label>

					</div>					
					<div class="col-lg-3 col-lg-offset-3 w3-margin-top">
						<table class="w3-small">
							<tbody>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Daily: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="daily_price" min="0" type="number" class="form-control" placeholder="$ 0.00"></div></td>
								</tr>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Weekend: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="weekend_price" min="0" type="number" class="form-control" placeholder="$ 0.00"></div></td>
								</tr>

							</tbody>
						</table>	
					</div>
					<div class="col-lg-3 w3-margin-top">
						<table class="w3-small">
							<tbody>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Weekly: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="weekly_price" min="0" type="number" class="form-control" placeholder="$ 0.00"></div></td>
								</tr>
								<tr>
									<td align="left"><label class="w3-margin-bottom">Monthly: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="monthly_price" min="0" type="number" class="form-control" placeholder="$ 0.00"></div></td>
								</tr>
								<tr>
									<td align="center" colspan="2"><span class="w3-margin-bottom w3-tiny"><b>Hint:</b><i>(Leave blank field if not applicable for your item)</i></span><br></td>

								</tr>
								<tr>
									<td align="left"><label class="w3-margin-bottom w3-margin-top">Bond: </label></td>
									<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="bond_price" min="0" type="number" class="form-control" placeholder="$ 0.00"></div></td>
								</tr>
								<tr>
									<td align="right" colspan="2"><a class="w3-margin-bottom btn w3-text-red w3-small fa fa-plus" id="more_optionBtn" name="more_optionBtn" style="padding:0"> Set More Options</a></td>
								</tr>
								<tr class="">
									<td align="left" colspan="2"><div class="w3-margin-bottom w3-margin-left">
										<textarea name="more_options" id="more_options" rows="4" placeholder="eg.Driving License or any other legal documents" class="form-control" style="display:none"></textarea></div>
									</td>						
								</tr>
							</tbody>
						</table>	
					</div>					
				</div>

				<div class="col-lg-12">
					<hr>
					<div class="col-lg-12 w3-margin-bottom">
						<label class="w3-medium">3. Payment Options (Choose any one package)</label>
					</div>					
					<div class="col-lg-8 col-lg-offset-3 w3-margin-top">
						<table class="w3-small">
							<tbody>
								<?php
								if (isset($all_packages)) {
									$pack_array=json_decode($all_packages,TRUE);       

									foreach ($pack_array as $key) {
										$pack_id=$key['pack_id'];
										$pack_name=$key['pack_name'];
										$pack_cost=$key['pack_cost'];
										$pack_details=json_decode($key['pack_details'],TRUE);
										$pack_period="";
										$pack_code=$key['pack_code'];
										$pack_validity=$key['pack_validity'];
										$activation_status=$key['activation_status'];

										switch ($key['pack_period']) {
											case 'M':
											$pack_period='month';
											break;

											case 'Y':
											$pack_period='year';
											break;

											default:

											break;
										}

										echo '
										<tr>
										<td align="right"><div class="w3-margin-bottom"><input name="payment_package" type="radio" value="'.$pack_code.'" required></div></td>
										<td align="left"><label class="w3-margin-bottom w3-margin-left"><span class="w3-medium">ر.س</span>'.$pack_cost.' - '.$pack_name.' pack </label></td>
										<td class="w3-margin-left"><a class="btn w3-white w3-left w3-padding-small w3-medium" data-toggle="modal" data-target="#whatIs_'.$pack_id.'" title="What is '.$pack_name.' pack?" style="padding:0"><i class="fa fa-question-circle"></i></a></td>									
										</tr>
										

										<!-- Modal -->
										<div id="whatIs_'.$pack_id.'" class="modal fade " role="dialog">
										<div class="modal-dialog modal-sm">
										<!-- Modal content-->
										<div class="modal-content col-lg-8 col-lg-offset-2">
										<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<br>
										<span class="modal-title w3-center w3-xlarge w3-text-blue"><strong> '.$pack_name.'</strong>
										<span class="w3-small w3-text-blue"> pack</span>
										</div>
										<div class="modal-body w3-small w3-center">																	
										<label class="w3-xlarge"><strong>'.$pack_cost.'ر.س<br><span class="w3-small">(for <i>'.$pack_validity.' '.$pack_period.'</i>)</strong></span></label>
										<br>
										<br>
										<label>Benefits:</label>';      
										foreach ($pack_details as $pack) {
											echo '
											<p>- '.$pack.'</p>
											';
											
										}
										echo '
										</div>
										</div>
										</div>
										</div>'; 
									}
								}
								else{
									echo '<strong>--------No Package Added--------</strong>';
								} 

								?>
							</div>													
						</tbody>
					</table>	
				</div>					
			</div>
			<button class="btn w3-blue w3-text-white w3-right w3-margin w3-padding-left w3-padding-right" name="list_btn" id="list_btn" type="submit" >
				<i class="fa fa-chevron-circle-down"></i> List item
			</button>
			<?php echo form_close()?>

		</div>
	</div>

</div>

<div class="col-lg-1 "></div>
</div>
<!-- next middle content end..................................
-->

<!-- script to add more image upload input field on button click -->
<script>
	$(document).ready(function(){
		$("#more_optionBtn").click(function(){
			$("#more_options").toggle();
		});
	});
</script>
<script>
	$(document).ready(function() {
		var max_fields      = 4;
		var wrapper         = $("#more_image_div"); 
		var add_button      = $("#more_imageBtn"); 

		var x = 1; 
		$(add_button).click(function(e){ 
			e.preventDefault();
			if(x < max_fields){ 
				x++; 
            $(wrapper).append('<div class="w3-margin-bottom"><a href="#" class="delete w3-text-grey w3-right fa fa-remove" title="Delete table"></a><input name="item_image[]" type="file" class="w3-input" accept="image/*" onchange="checkMIME()" required></div>'); //add input box
            
        }
        else
        {
        	alert('You Reached the limits')		//alert when added more than 4 input fields
        }
    });

		$(wrapper).on("click",".delete", function(e){ 
			e.preventDefault(); $(this).parent('div').remove(); x--;
		})
	});
</script>
<!-- script ends -->

</body>
</html>