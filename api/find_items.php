<?php
//.......................Find items by filter....................................//
//------------------------------------------------------------------------------------------------//
error_reporting(E_ERROR | E_PARSE);

// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	$param=$_GET["para"];
	$what=$_GET['what'];
	$where=$_GET['where'];
	$category=$_GET['category'];
	get_items($what,$where,$category);
	
	//edit_Rule($rule_id);//get My ijarline item list of specific user by user_id
	break;

	case 'POST':

	add_newRule();// Insert new item 
	break;

	case 'PUT':

	break;

	case 'DELETE':
	//get My ijarline item list of specific user by user_id		
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
	function get_items($what,$where,$category)
	{
		global $conn;

		$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ";
		$result=mysqli_query($conn,$query);

		$item_data=array();
		
		while($row = mysqli_fetch_array( $result))
		{

			$daily_price=$row['daily_rate'];
			$weekly_price=$row['weekly_rate'];
			$weekend_price=$row['weekend_rate'];
			$monthly_price=$row['monthly_rate'];
			$bond_price=$row['bond_rate'];

			if($daily_price==''){$daily_price="NA";}
			if($weekly_price==''){$weekly_price="NA";}
			if($weekend_price==''){$weekend_price="NA";}
			if($monthly_price==''){$monthly_price="NA";}
			if($bond_price==''){$bond_price="NA";}

			$extra=array(
				'item_id'	=>	$row['item_id'],
				'item_pictures'	=>	$row['item_pictures'],
				'item_name'	=>	$row['item_name'],
				
				'cat_name'	=>	$row['cat_name'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$daily_price,
				'weekly_rate'	=>	$weekly_price,
				'weekend_rate'	=>	$weekend_price,
				'monthly_rate'	=>	$monthly_price,
				'bond_rate'	=>	$bond_price
			);

			$item_data[]=$extra;

		}

		if(mysqli_query($conn, $query)){
			$response=array(
				'status' => 1,
				'items' => $item_data,
				'status_message' =>'Here\'s What you are searching for...'			
			);
		}
		else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..Cannot find Item!!!'			
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