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
	login();
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

function login()
{
	global $conn;

	$email=$_POST["email"];
	$password=$_POST["password"];
	$unique_id='';
	$user_name='';

	$query="SELECT * FROM user_reg WHERE email='$email' AND password='$password'";
	$result=mysqli_query($conn, $query);
	while($row = mysqli_fetch_array( $result))
	{
		$unique_id=$row['unique_id'];
		$user_name=$row['name'];
	}
	if(mysqli_num_rows($result)==1)
	{
		$login_sql="UPDATE user_reg SET session_bool='1' WHERE email='$email'";
		mysqli_query($conn, $login_sql);
		$response=array(
			'status' => 1,
			'email_id' => $email,				
			'is_logged' => '1',
			'unique_id' => $unique_id,
			'user_name' => $user_name
			);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Sorry..Login credentials are incorrect!!!',
			'email_id' => $email,				
			'is_logged' => '0'
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




function delete_product($product_id)
{
	global $conn;
	$query="DELETE FROM products WHERE id=".$product_id;
	if(mysqli_query($conn, $query))
	{
		$response=array(
			'status' => 1,
			'status_message' =>'Product Deleted Successfully.'
			);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Product Deletion Failed.'
			);
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


function update_product($product_id)
{
	global $conn;
	parse_str(file_get_contents("php://input"),$post_vars);
	$product_name=$post_vars["product_name"];
	$price=$post_vars["price"];
	$quantity=$post_vars["quantity"];
	$seller=$post_vars["seller"];
	$query="UPDATE products SET product_name='{$product_name}', price={$price}, quantity={$quantity}, seller='{$seller}' WHERE id=".$product_id;
	if(mysqli_query($conn, $query))
	{
		$response=array(
			'status' => 1,
			'status_message' =>'Product Updated Successfully.'
			);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Product Updation Failed.'
			);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

	// Close database conn
mysqli_close($conn);