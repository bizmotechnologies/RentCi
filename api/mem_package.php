<?php
//.......................Item Category addition and fetching by ID....................................//
//------------------------------------------------------------------------------------------------//

// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	
	$cat_id=$_GET["cat_id"];	
	del_Category($cat_id);//get My ijarline item list of specific user by user_id
	break;

	case 'POST':
			
	add_newPackage();// Insert new item 
	break;

	case 'PUT':
			
	break;

	case 'DELETE':
	$pack_id=$_GET["pack_id"];

	del_Pack($pack_id);//get My ijarline item list of specific user by user_id		
	break;

	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}


//---------------function to add new mebership package in database---------------------//
function add_newPackage()
	{
		global $conn;				
		extract($_POST);

		//sql query to insert posted package details in db
		$query="INSERT INTO membership_pack SET pack_name='$pack_name', pack_code='$pack_code', pack_details='$pack_details', pack_cost='$pack_cost',pack_validity='$pack_validity', pack_period='$pack_period' ";
		if(mysqli_query($conn, $query))
		{
			//insertion success
			$response=array(
				'status' => 1,
				'status_message' =>'Package *'.$pack_name.'* added Successfully.'			
			);
		}
		else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry...Rule *'.$pack_name.'* Addition Failed!!!'			
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);//send it in json format
	}

//-------------adding new item in db function end-------------------------//


//-----------------function to get all items in user's Ijarline---------------// 
function del_Pack($pack_id)
{
	global $conn;
	$query="DELETE FROM membership_pack WHERE pack_id=".$pack_id." ";	
	
	if(mysqli_query($conn, $query)){
		$response=array(
				'status' => 1,
				'status_message' =>'Package deleted Successfully.'			
			);
	}
	else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Package Deletion Failed!!!'			
			);
		}
	header('Content-Type: application/json');
	echo json_encode($response);
}
//------------------function get_userItem ends------------------------------//


	// Close database conn
mysqli_close($conn);