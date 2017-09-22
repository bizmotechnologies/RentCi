<?php
//.......................Item List addition and fetching by ID....................................//
//------------------------------------------------------------------------------------------------//

// Connect to database
$conn=mysqli_connect('localhost','root','','ijarline');	

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
	case 'GET':
	
	$user_id=$_GET["user_id"];
	get_userItem($user_id);//get My ijarline item list of specific user by user_id
	break;

	case 'POST':
			
	insert_newItem();// Insert new item 
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


//---------------function to add new item in database---------------------//
function insert_newItem()
	{
		global $conn;		
		extract($_POST);		

		
		//set expiry period for item as per package or membership (currently hardcoded)
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

		//sql query to insert posted item details in db
		$query="INSERT INTO list_items SET user_id='$user_id', user_name='$user_name', user_addr='$user_addr', cat_name='$item_category', item_name='$item_name', item_description='$item_description',item_pictures='$pictures', daily_rate='$daily_price', weekly_rate='$weekly_price', weekend_rate='$weekend_price', monthly_rate='$monthly_price', bond_rate='$bond_price', extra_option='$more_options', membership_package='$payment_package', posted_date='$posted_on', closed_date='', expiry_period='$expiry_period', isLive='1'";
		if(mysqli_query($conn, $query))
		{
			//insertion success
			$response=array(
				'status' => 1,
				'status_message' =>'Item Details added Successfully.'			
			);
		}
		else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Sorry..List Item Addition Failed!!!'			
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);//send it in json format
	}

//-------------adding new item in db function end-------------------------//


//-----------------function to get all items in user's Ijarline---------------// 
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
//------------------function get_userItem ends------------------------------//


	// Close database conn
mysqli_close($conn);