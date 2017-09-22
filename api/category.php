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
			
	add_newCategory();// Insert new item 
	break;

	case 'PUT':
			
	break;

	case 'DELETE':
	$cat_id=$_GET["cat_id"];

	del_Category($cat_id);//get My ijarline item list of specific user by user_id		
	break;

	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}


//---------------function to add new item category in database---------------------//
function add_newCategory()
	{
		global $conn;		
		extract($_POST);			

		//sql query to insert posted item details in db
		$query="INSERT INTO item_category SET cat_name='$cat_name'";
		if(mysqli_query($conn, $query))
		{
			//insertion success
			$response=array(
				'status' => 1,
				'status_message' =>'Item Category added Successfully.'			
			);
		}
		else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Item Category Addition Failed!!!'			
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);//send it in json format
	}

//-------------adding new item in db function end-------------------------//


//-----------------function to get all items in user's Ijarline---------------// 
function del_Category($cat_id)
{
	global $conn;
	$query="DELETE FROM item_category WHERE cat_id=".$cat_id." ";	
	
	if(mysqli_query($conn, $query)){
		$response=array(
				'status' => 1,
				'status_message' =>'Item Category deleted Successfully.'			
			);
	}
	else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Item Category Deletion Failed!!!'			
			);
		}
	header('Content-Type: application/json');
	echo json_encode($response);
}
//------------------function get_userItem ends------------------------------//


	// Close database conn
mysqli_close($conn);