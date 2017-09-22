<?php
//.......................Item Category addition and fetching by ID....................................//
//------------------------------------------------------------------------------------------------//

// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	
	
	//edit_Rule($rule_id);//get My ijarline item list of specific user by user_id
	break;

	case 'POST':
			
	add_newRule();// Insert new item 
	break;

	case 'PUT':
			
	break;

	case 'DELETE':
	$rule_id=$_GET["rule_id"];

	del_Rule($rule_id);//get My ijarline item list of specific user by user_id		
	break;

	default:
			// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}


//---------------function to add new rule in database---------------------//
function add_newRule()
	{
		global $conn;				
		extract($_POST);
		//sql query to insert posted rule details in db
		$query="INSERT INTO rules SET rule_title='$rule_title', rule_content='$rule_content' ";
		if(mysqli_query($conn, $query))
		{
			//insertion success
			$response=array(
				'status' => 1,
				'status_message' =>'Rule *'.$rule_title.'* added Successfully.'			
			);
		}
		else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry...Rule *'.$rule_title.'* Addition Failed!!!'			
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);//send it in json format
	}

//-------------adding new rule in db function end-------------------------//


//-----------------function to get all items in user's Ijarline---------------// 
function del_Rule($rule_id)
{
	global $conn;
	$query="DELETE FROM rules WHERE rule_id=".$rule_id." ";	
	
	if(mysqli_query($conn, $query)){
		$response=array(
				'status' => 1,
				'status_message' =>'Rule deleted Successfully.'			
			);
	}
	else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Rule Deletion Failed!!!'			
			);
		}
	header('Content-Type: application/json');
	echo json_encode($response);
}
//------------------function get_userItem ends------------------------------//


//-----------------function to get all items in user's Ijarline---------------// 
function edit_Rule($rule_id)
{
	global $conn;
	$query="UPDATE rules SET rule_title= WHERE rule_id=".$rule_id." ";	
	
	if(mysqli_query($conn, $query)){
		$response=array(
				'status' => 1,
				'status_message' =>'Rule deleted Successfully.'			
			);
	}
	else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Rule Deletion Failed!!!'			
			);
		}
	header('Content-Type: application/json');
	echo json_encode($response);
}
//------------------function get_userItem ends------------------------------//


	// Close database conn
mysqli_close($conn);