<?php
//.......................Login and logout user API....................................//
//------------------------------------------------------------------------------------------------//


// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	
	$user_email=$_GET["user_email"];
	make_offline($user_email);			//after user logs out change user's status (make it offline)
	break;

	case 'POST':			
	login();				//login function
	break;

	case 'PUT':			
	break;

	case 'DELETE':			
	break;

	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}


//----------------function to login user in its Ijarline----------------------------//
function login()
{
	global $conn;

	$email=$_POST["email"];
	$password=$_POST["password"];
	$unique_id='';
	$user_name='';

	//sql query to check login credentials
	$query="SELECT * FROM user_reg WHERE email='$email' AND password='$password'";
	$result=mysqli_query($conn, $query);
	while($row = mysqli_fetch_array( $result))
	{
		$unique_id=$row['unique_id'];		//if true then get unique_id and username of user
		$user_name=$row['name'];
	}

	//if credentials are true, their will be obviously only one record
	if(mysqli_num_rows($result)==1)
	{
		//if logged in set user online
		$login_sql="UPDATE user_reg SET session_bool='1' WHERE email='$email'";
		mysqli_query($conn, $login_sql);

		//response with values to be stored in sessions
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
		//login failed response
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
//-----------function to log in user end---------------------------------//


//------------------function to make user offline after logout-----------------------//
function make_offline($user_email){
	global $conn;

	//sql query to make user online---------------------
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
//------------------------logout function ends--------------------------//

	// Close database conn
mysqli_close($conn);