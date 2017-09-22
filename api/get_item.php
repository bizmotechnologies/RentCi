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
	$item_id=json_decode($_GET["item_id"],TRUE);
	
	get_item($item_id);	
	break;

	case 'POST':

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


//-----------------function to specific item details ---------------// 
	function get_item($item_id)
	{
		global $conn;

		$query="SELECT * FROM list_items WHERE item_id='$item_id' ";
		$result=mysqli_query($conn,$query);

		$item_data="";
		
		while($row = mysqli_fetch_array( $result))
		{
			$daily_price=$row['daily_rate'];
			$weekly_price=$row['weekly_rate'];
			$weekend_price=$row['weekend_rate'];
			$monthly_price=$row['monthly_rate'];
			$bond_price=$row['bond_rate'];

			if($daily_price=='0.00'){$daily_price="NA";}
			if($weekly_price=='0.00'){$weekly_price="NA";}
			if($weekend_price=='0.00'){$weekend_price="NA";}
			if($monthly_price=='0.00'){$monthly_price="NA";}
			if($bond_price=='0.00'){$bond_price="NA";}

			$extra=array(
				'item_id'	=>	$row['item_id'],
				'item_pictures'	=>	$row['item_pictures'],
				'item_description'	=>	$row['item_description'],
				'item_name'	=>	$row['item_name'],
				'extra_option'	=>	$row['extra_option'],				
				'user_id'	=>	$row['user_id'],				
				'total_views'	=>	$row['total_views'],				
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
				'items' => $item_data						
			);
		}
		else
		{
			//insertion failure
			$response=array(
				'status' => 0,
				'status_message' =>'Item Details not found!!!'			
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
//------------------function to specific item details ends------------------------------//


	// Close database conn
	mysqli_close($conn);