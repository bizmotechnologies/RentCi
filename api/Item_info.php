<?php
// Connect to database
$conn=mysqli_connect('localhost','root','','rentoid');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	
	$user_id=$_GET["user_id"];
	get_userItem($user_id);
	break;

	case 'POST':
			// Insert user
	insert_newItem();
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
function insert_newItem()
	{
		global $conn;
		
		extract($_POST);		

		$expiry_period="";		
		switch ($payment_package) {
			case 'one_time':
				$expiry_period="1";
				break;

			case 'one_year':
				$expiry_period="12";
				break;
			
			default:
				break;
		}

		$query="INSERT INTO list_items SET user_id='$user_id', cat_id='$item_category', item_name='$item_name', item_description='$item_description',item_pictures='$pictures', daily_rate='$daily_price', weekly_rate='$weekly_price', weekend_rate='$weekend_price', monthly_rate='$monthly_price', bond_rate='$bond_price', extra_option='$more_options', membership_package='$payment_package', posted_date='$posted_on', closed_date='', expiry_period='$expiry_period', isLive='1'";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Item Details added Successfully.'			
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..List Item Addition Failed!!!'			
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}


function get_userItem($user_id)
{
	global $conn;
	$query="SELECT * FROM list_items WHERE user_id=".$user_id." LIMIT 10";
	
	$response=array();
	$result=mysqli_query($conn, $query);
	while($row=mysqli_fetch_assoc($result))
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