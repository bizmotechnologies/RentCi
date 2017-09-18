<?php
//.......................Insert user details API....................................//
//------------------------------------------------------------------------------------------------//


// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	break;

	case 'POST':
	
	insert_userDetails();			// Insert user details
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

//------------------function to insert user details -----------------------//
function insert_userDetails()
{
	global $conn;
	
	extract($_POST);
		$unique_id=base64_encode($user_email);//encoding email-Id of user to generate user's unique-id
		
		//check 'Stay in touch' checkbox checked or not
		if (!isset($sign_Stay_check)) {
			$sign_Stay_check=0;
		}
		else{
			$sign_Stay_check=1;
		}

		//sql query to update user details 
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
//------------------function to insert user details ends------------------------------//

	// Close database conn
	mysqli_close($conn);