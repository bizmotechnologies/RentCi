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


<!-- 		login and sign up page content and form...............................
-->	<div class="w3-col l10 w3-light-grey w3-round-large">
<div class="w3-col l12 w3-padding">
	<div class="col-lg-2"></div>
	<div class="w3-col l8 w3-padding-xlarge w3-center w3-round-large w3-white">

		<label class="w3-medium w3-text-green">
		<?php
		if(isset($account_registered)){
			echo $account_registered;
		}
		else{
			echo "You need to login to your Rentoid account to continue.";			
		
		}
		?>
		
		</label>			
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="w3-col l6 w3-padding">
	<div class="w3-col l12 w3-padding w3-round-large w3-white w3-text-blue">
		<p class="w3-center" style="font-weight: bold">Create account. It's <a href="#" class="w3-text-purple">FREE</a></p>
		<br>
		<?php echo form_open('login/register'); ?> 
		<table class="" width="95%">
			<tbody>
				<tr>
					<td align="right"><label class="w3-margin-bottom">Your email: </label></td>
					<td align="left"><div class="w3-margin-bottom"><input name="sign_email" type="email" class="form-control" required></div></td>
				</tr>
				<tr>
					<td align="right"><label class="w3-margin-bottom">Your Password: </label></td>
					<td align="left"><div class="w3-margin-bottom"><input name="sign_password" id="sign_password" type="password" maxlength="10"  class="form-control" required></div></td>
				</tr>
				<tr>
					<td align="right"><label class="w3-margin-bottom">Verify Password: </label></td>
					<td align="left"><div class="w3-margin-bottom"><input name="sign_password_c" id="sign_password_c" type="password" maxlength="10" class="form-control" required></div></td>						
				</tr>
				<tr><td align="center" colspan="2"><label id="message"></label></td></tr>
				<tr>
					<td align="center" colspan="2"><input type="checkbox" name="sign_check" value="1" required><label class=""> - I accept your <a href="http://www.rentoid.com/rules" target="_blank" class="w3-text-purple">rules</a> and <a href="http://www.rentoid.com/privacy" target="_blank" class="w3-text-purple">privacy policy</a>. </label></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<p><button class="btn w3-button w3-blue w3-text-white w3-margin-top" id="sign_btn" type="submit"><i class="fa fa-play"></i> Sign me Up</button></p>							
					</td>
				</tr>
			</tbody>
		</table>	
		<?php echo form_close()?>
	</div>
</div>
<div class="w3-col l6 w3-padding">
	<div class="w3-col l12 w3-padding w3-round-large w3-white w3-text-blue">
		<p class="w3-center" style="font-weight: bold">ALREADY A MEMBER ?</p>
		<br>
		<?php echo form_open('login/login_user'); ?>
		<table class="" width="95%">
			<tbody>
				<tr>
					<td align="right"><label class="w3-margin-bottom">Your email: </label></td>
					<td align="left"><div class="w3-margin-bottom"><input class="form-control" name="login_email" type="email" required></div></td>
				</tr>
				<tr>
					<td align="right"><label class="w3-margin-bottom">Your Password: </label></td>
					<td align="left"><div class="w3-margin-bottom"><input class="form-control" name="login_password" type="password" maxlength="10" required></div></td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<p>
							<button class="btn w3-button w3-blue w3-text-white w3-margin-top" type="submit">
								<i class="fa fa-check"></i> Log In
							</button>

							<a class="btn w3-button w3-blue w3-text-white w3-margin-top" href="">
								<i class="fa fa-question"></i> Forgot Password
							</a>

						</p>

					</td>
				</tr>

			</tbody></table>	
			<?php echo form_close()?>

		</div>
	</div>

</div>
<!-- 		end................................
-->	

<div class="col-lg-1 "></div>
</div>
<script>
	$('#sign_password_c').on('keyup', function () {
		if ($('#sign_password').val() == $('#sign_password_c').val()) {
			$('#sign_btn').prop("disabled", false);
			$('#message').html('');

		} else {
			$('#message').html('Password Not Matching').css('color', 'red');
			$('#sign_btn').prop("disabled", true);
		}
	});
</script>
</body>
</html>