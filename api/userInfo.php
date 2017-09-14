<?php
// Connect to database
$conn=mysqli_connect('localhost','root','','rentoid');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	
	$user_email=$_GET["user_email"];
	make_offline($user_email);
	break;

	case 'POST':
			// Insert user
	insert_userDetails();
	break;

	case 'PUT':
			// Update user session make him offline after logout

	break;

	case 'DELETE':
			// Delete Product
	$product_id=intval($_GET["product_id"]);
	delete_product($product_id);
	break;

	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}
function insert_userDetails()
	{
		global $conn;
		
		extract($_POST);
		$unique_id=base64_encode($user_email);
		
		if (!isset($sign_Stay_check)) {
			$sign_Stay_check=0;
		}
		else{
			$sign_Stay_check=1;
		}

		
		$query="UPDATE user_reg SET unique_id='$unique_id', name='$firstname', surname='$lastname',suburb='$suburb', city='$city', postcode='$postcode', country='$country', state='$state', phone='$phone', stay_touched='$sign_Stay_check' WHERE email='$user_email'";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'User Account Details updated Successfully.',	
				'unique_id' => $unique_id,
				'user_name' => $firstname	
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Account Details Updation Failed!!!'				
				
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}


function get_products($product_id=0)
{
	global $conn;
	$query="SELECT * FROM products";
	if($product_id != 0)
	{
		$query.=" WHERE id=".$product_id." LIMIT 1";
	}
	$response=array();
	$result=mysqli_query($conn, $query);
	while($row=mysqli_fetch_array($result))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}


function make_offline($user_email){
	global $conn;

	$offline_query="UPDATE user_reg SET session_bool='0' WHERE email='$user_email'";

	if(mysqli_query($conn, $offline_query))
	{
		$response=array(
			'status' => 1,
			'status_message' =>'User Logged Out Successfully.'
			);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'User Log-out Failed.'
			);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

	// Close database conn
mysqli_close($conn);