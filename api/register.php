<?php
//.......................Register new user API...................................//
//------------------------------------------------------------------------------------------------//


// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	break;

	case 'POST':
			insert_user();//register new user 
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


//---------------------function to register new user by email-Id and password-------------
		function insert_user()
		{
			global $conn;
			
			$email=$_POST["email"];
			$password=$_POST["password"];
			
		//sql query to insert user row and create an account
			$query="INSERT INTO user_reg SET email='$email', password='$password', session_bool='1'";
			if(mysqli_query($conn, $query))
			{
				$response=array(
					'status' => 1,
					'status_message' =>'Account has been registered!!!',
					'email_id' => $email,
					'is_logged' => '1'
				);
			}
			else
			{
				$response=array(
					'status' => 0,
					'status_message' =>'Sorry..Account Registeration Failed!!!',
					'email_id' => $email,
					'is_logged' => '0'
				);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}
//-----------------------function register new user ends-------------------------------------


	// Close database conn
		mysqli_close($conn);