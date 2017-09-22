<?php defined('BASEPATH') OR exit('No direct script access allowed');	
error_reporting(E_ERROR | E_PARSE);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search-Ijarline</title>
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
			<div>
				<div class="w3-col l4">
					<h4 class="w3-xlarge w3-text-blue">Search Result</h4>
					<hr>
				</div>
				<div class="w3-col l4">
					<label class="w3-large w3-text-blue">Share Results:</label>
					<label><a class="btn fa fa-twitter w3-xxlarge w3-text-blue" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20Item%20' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"></a></label>

					<!-- facebook share -->
					<label><a class="btn fa fa-facebook-official w3-xxlarge w3-text-blue" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"></a></label>
				</div>
				<div class="w3-col l4 ">
					<label class="w3-large w3-text-blue">Sort By:</label>
					<form id="sort_form" method="GET" action="<?php echo base_url(); ?>search_results">
						<select name="ordertype" onchange="document.getElementById('sort_form').submit()">
							<option value="0"></option>
							<option value="1" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==1){echo "selected"; }} ?>>item name - a-z</option>
							<option value="2" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==2){echo "selected"; }} ?>>item name - z-a</option>
							<option value="3" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==3){echo "selected"; }} ?>>location - a-z</option>
							<option value="4" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==4){echo "selected"; }} ?>>location - z-a</option>
							<option value="5" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==5){echo "selected"; }} ?>>daily price - lowest</option>
							<option value="6" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==6){echo "selected"; }} ?>>daily price - highest</option>
							<option value="7" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==7){echo "selected"; }} ?>>weekly price - lowest</option>
							<option value="8" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==8){echo "selected"; }} ?>>weekly price - highest</option>
							<option value="9" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==9){echo "selected"; }} ?>>monthly price - lowest</option>
							<option value="10" <?php if(isset($_GET['ordertype'])){  if($_GET['ordertype']==10){echo "selected"; }} ?>>monthly price - highest</option>
						</select>
						<?php 
						$what="";
						$where="";
						$cat="";
						if(isset($_GET['find_what'])){ 
							$what=$_GET['find_what'];
							$where=$_GET['find_where'];
							$cat=$_GET['find_category'];
						}
						?>
						<input type="hidden" name="find_what" value="<?php echo $what; ?>" >
						<input type="hidden" name="find_where" value="<?php echo $where; ?>" >
						<input type="hidden" name="find_category" value="<?php echo $cat; ?>" >

					</form>
				</div>
			</div>
			<div class="w3-col l12 w3-margin-top w3-margin-bottom">
				<table class="table table-striped w3-text-blue">
					<tbody>
						<?php 
						if(isset($allItems)){

							$allItems_array=json_decode($allItems,TRUE);
							foreach ($allItems_array as $key) {
								$islive="Available";
								if($key['isLive']==0){
									$islive="Not Available";}
									$img="";
									$pic_array=json_decode($key['item_pictures'],TRUE);
									foreach ($pic_array as $pic) {
										$img=$pic;
									}
									$addr=explode(',',$key['user_addr']);

									$details_link=base_url().'item/'.str_replace(' ','',$key['item_name']).'-'.$addr[0].'-'.base64_encode($key['item_id'].'_'.$key['user_name'].'_'.$key['cat_name']);

									//url for details btn is: [item_name(without spaces)-suburb-(base64encoded)itemid_username_category]

									echo '

									<tr>
									<td class="w3-hide-small " style="width: 120px">
									<div class="w3-light-grey rent_pic" style="background-image:url(\''.$img.'\')">

									</div>
									
									</td>
									<td>
									<div class="w3-col l4 w3-padding-small">
									<label>'.$key['item_name'].'</label>
									<table class="w3-small">
									<tr>
									<td>Category:</td>
									<td><a href="'.base_url().'search_results?category='.$key['cat_name'].'">&nbsp;<u>'.$key['cat_name'].'</u></a></td>
									</tr>
									<tr>
									<td>Suburb:</td>
									<td><a href="'.base_url().'search_results?suburb='.$addr[0].'">&nbsp;<u>'.$addr[0].'</u></a></td>
									</tr>
									<tr>
									<td>Is Live:</td>
									<td class="w3-text-grey">&nbsp;'.$islive.'</td>
									</tr>
									<tr>
									<td>Owner:</td>
									<td><a href="'.base_url().'search_results?member='.$key['user_name'].'">&nbsp;<u>'.$key['user_name'].'</u></a></td>
									</tr>
									</table>

									</div>
									<div class="w3-col l4 w3-padding-small">
									<label>Pricing (ر.س): </label>
									<table class="w3-small">
									<tr>
									<td>Day:</td>
									<td class="w3-text-grey">&nbsp;'.$key['daily_rate'].'</td>
									</tr>
									<tr>
									<td>W/end:</td>
									<td class="w3-text-grey">&nbsp;'.$key['weekend_rate'].'</td>
									</tr>
									<tr>
									<td>Week:</td>
									<td class="w3-text-grey">&nbsp;'.$key['weekly_rate'].'</td>
									</tr>
									<tr>
									<td>Month:</td>
									<td class="w3-text-grey">&nbsp;'.$key['monthly_rate'].'</td>
									</tr>
									<tr>
									<td>Bond:</td>
									<td class="w3-text-grey">&nbsp;'.$key['bond_rate'].'</td>
									</tr>
									</table>
									</div>
									<div class="w3-col l4 w3-padding-top">
									<a class="w3-button w3-blue w3-margin-top" href="'.$details_link.'">Details&nbsp;<i class="fa fa-play"></i></a>
									</div>
									</td>
									</tr>';		
									
								}


							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-1 "></div>
	</div>
<!-- script to filter by relevance the page with menu items..........................................
-->
<script>
// SELECT BOX DEPENDENCY CODE
$(document).ready(function()
{
	$("#relevance").change(function(){  
		var cat = $("#category").val();  
		var relevance = $("#relevance").val();  
		var sortBy = $("#sortBy").val();  
		var data = {
			category:cat,
			relevance:relevance,
			sortBy:sortBy
		};

		$.ajax({  
			url:"filter_Menu.php",  
			method:"POST",  
			cache:false,
			data:data,  
			success:function(data)  
			{  
            //$('#search_foodList').fadeIn();  
            $("#customer_pageView").html(data); 
        }  
    });  

	});
});
</script>
</body>
</html>