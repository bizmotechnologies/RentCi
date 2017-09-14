<?php defined('BASEPATH') OR exit('No direct script access allowed');	?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Be a Member</title>
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

	<div class="w3-row w3-margin-top">
		<div class="col-lg-1 "></div>

<?php 
if(isset($account)){
	foreach ($account as $details) {		
$decrypt_password= base64_decode($details['password']);//Decrypts an encoded string. 
?>


<!-- 		edit account deatils form...............................
-->	
<div class="w3-col l10 w3-light-grey w3-round-large w3-padding">
	<div class="w3-white container-fluid w3-small">
		<h4 class="" style="font-weight: bold">Edit Account Details</h4>
		<br>
		<div class="w3-col l6 w3-white">
			<div class="w3-col l12 w3-round-large w3-text-blue ">
				<?php echo form_open(base_url().'edit_account/edit'); ?> 
				<table class="" width="95%">
					<tbody>
						<tr>
							<td align="right"><label class="w3-margin-bottom">Name: </label></td>
							<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="firstname" type="text" placeholder="Enter First name" class="form-control" value="<?php echo $details['name']; ?>" required></div></td>
						</tr>
						<tr>
							<td align="right"><label class="w3-margin-bottom">Surname: </label></td>
							<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="lastname"  type="text" placeholder="Enter Last name" class="form-control" value="<?php echo $details['surname']; ?>" required></div></td>
						</tr>
						<tr>
							<td align="right"><label class="w3-margin-bottom">Suburb/Area: </label></td>
							<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="suburb" type="text" placeholder="Enter your Suburb/Area" class="form-control" value="<?php echo $details['suburb']; ?>" required></div></td>						
						</tr>
						<tr>
							<td align="right"><label class="w3-margin-bottom">City: </label></td>
							<td align="left"><div class="w3-margin-bottom w3-margin-left"><input class="form-control" name="city" type="text" placeholder="Enter your City" value="<?php echo $details['city']; ?>" required></div></td>
						</tr>
						<tr>
							<td align="right"><label class="w3-margin-bottom">Post Code: </label></td>
							<td align="left"><div class="w3-margin-bottom w3-margin-left"><input class="form-control" name="postcode" type="number" placeholder="Enter your pincode/postal code" value="<?php echo $details['postcode']; ?>" min="0" required></div></td>
						</tr>
						<tr>
							<td align="right"><label class="w3-margin-bottom">Country/Region: </label></td>
							<td align="left"><div class="w3-margin-bottom w3-margin-left">
								<select class="form-control" name="country" required>
									<option value="saudi">Saudi Arabia</option>
									<option value="ind">India</option>
									<option value="aus">Australia</option>
									<option value="usa">USA</option>
									<option value="eng">England</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td align="right"><label class="w3-margin-bottom">State/Territory: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left">
							<select class="form-control" name="state" required>
								<option value="mah">Maharashtra</option>
								<option value="del">Delhi</option>
								<option value="kar">Karnataka</option>
								<option value="guj">Gujrat</option>
								<option value="jk">Jammu & Kashmir</option>
							</select>
						</div></td>						
					</tr>					
					<tr>
						<td align="right"><label class="w3-margin-bottom">Phone/ Mobile No.: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="phone" min="0" placeholder="Enter your contact number" type="number" maxlength="10" class="form-control" value="<?php echo $details['phone']; ?>" required></div></td>						
					</tr>			
				</tbody>
			</table>	
		</div>
	</div>
	<div class="w3-col l6 ">
		<div class="w3-col l12 w3-round-large w3-text-blue">
			<table class="" width="95%">
				<tbody>
					<tr>
						<td align="right"><label class="w3-margin-bottom">Your Email: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left"><input name="user_email" placeholder="Enter your email-ID" type="email" class="form-control" value="<?php echo $details['email']; ?>" required></div></td>						
					</tr>
					<tr>
						<td align="right"><label class="w3-margin-bottom">Your Password: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left input-group">
						<input class="form-control" placeholder="Enter Password" id="user_password" name="user_password" type="password" maxlength="10" value="<?php echo $decrypt_password; ?>" required>
						<span class="input-group-btn"><a class="btn btn-default" onclick="show_pass(this);">Show</a></span>
						</div></td>
					</tr>
					<tr>
						<td align="right"><label class="w3-margin-bottom">Confirm Password: </label></td>
						<td align="left"><div class="w3-margin-bottom w3-margin-left">
						<input class="form-control input-group" placeholder="Re-enter your password" id="user_passwordConfirm" name="user_passwordConfirm" type="password" maxlength="10" required>
						
						</div></td>
					</tr>					
					<tr><td align="center" colspan="2"><label id="message"></label></td></tr>
					<tr>
						<td align="center" colspan="2"><label class="w3-margin-bottom">Stay in touch: </label>
							&nbsp;<input type="checkbox" name="sign_Stay_check" value="1" <?php if ($details['stay_touched']==1){?> checked <?php }  ?>><span class="w3-tiny">&nbsp;( We promise only to contact you with cool ideas and rarely! ). </span>
						</td>
					</tr>					

				</tbody>
			</table>
		</div>
	</div>
	<button class="btn w3-blue w3-text-white w3-margin w3-right" name="edit_btn" id="edit_btn" type="submit">
		<i class="fa fa-pencil"></i> Update Details
	</button>
	<?php echo form_close()?>
</div>
</div>
<!-- 		end................................
-->	
<?php 
	}
	
}
?>
<div class="col-lg-1 "></div>
</div>
<script>
	$('#user_passwordConfirm').on('keyup', function () {
		if ($('#user_password').val() == $('#user_passwordConfirm').val()) {
			$('#edit_btn').prop("disabled", false);
			$('#message').html('');

		} else {
			$('#message').html('Password Not Matching').css('color', 'red');
			$('#edit_btn').prop("disabled", true);
		}
	});
</script>
<script>
	function show_pass(item){ 
     if(item.innerText=='Show'){
      item.innerText='Hide';
      document.getElementById('user_password').type="text"; 
    }else{
     item.innerText='Show';
     document.getElementById('user_password').type="password"; 
    }


    } 
</script>
</body>
</html>