<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Search_result extends CI_Model{

	function getAllCategory()
	{
		$query="SELECT * FROM item_category ORDER BY cat_name";
		$result = $this->db->query($query);
		$cat="";
		
		foreach ($result->result_array() as $row) {
			$extra=array(
				'cat_id'	=>	$row['cat_id'],
				'cat_name'	=>	$row['cat_name']
			);
			$cat[]=$extra;
		}

		return json_encode($cat);
	}


	//-----------------------function to get all items on default search------------------//
	function getAllItem()
	{
		
		$query="SELECT * FROM list_items ORDER BY item_name";
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
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
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
				'user_addr'	=>	$row['user_addr'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$row['daily_rate'],
				'weekly_rate'	=>	$row['weekly_rate'],
				'weekend_rate'	=>	$row['weekend_rate'],
				'monthly_rate'	=>	$row['monthly_rate'],
				'bond_rate'	=>	$row['bond_rate']				
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}


	//-----------------------function to get all items on find search------------------//
	function getAllItem_find($what,$where,$category)
	{
		if($category=='all'){
			$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ";
		}
		else{
			$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%'";
		}
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
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
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
				'user_addr'	=>	$row['user_addr'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$row['daily_rate'],
				'weekly_rate'	=>	$row['weekly_rate'],
				'weekend_rate'	=>	$row['weekend_rate'],
				'monthly_rate'	=>	$row['monthly_rate'],
				'bond_rate'	=>	$row['bond_rate']				
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}

	//-----------------------function to get all items on category-----------------//
	function getAllItem_byCategory($category)
	{
		
		$query="SELECT * FROM list_items WHERE cat_name='$category' || cat_name LIKE '%$category%' ";
		
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
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
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
				'user_addr'	=>	$row['user_addr'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$row['daily_rate'],
				'weekly_rate'	=>	$row['weekly_rate'],
				'weekend_rate'	=>	$row['weekend_rate'],
				'monthly_rate'	=>	$row['monthly_rate'],
				'bond_rate'	=>	$row['bond_rate']				
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}

	//-----------------------function to get all items on suburb------------------//
	function getAllItem_bySuburb($suburb)
	{
		
		$query="SELECT * FROM list_items WHERE user_addr LIKE '%$suburb%'";
		
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
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
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
				'user_addr'	=>	$row['user_addr'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$row['daily_rate'],
				'weekly_rate'	=>	$row['weekly_rate'],
				'weekend_rate'	=>	$row['weekend_rate'],
				'monthly_rate'	=>	$row['monthly_rate'],
				'bond_rate'	=>	$row['bond_rate']				
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}

	//-----------------------function to get all items on member/user------------------//
	function getAllItem_byMember($member)
	{
		
		$query="SELECT * FROM list_items WHERE user_name='$member' ";
		
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
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
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
				'user_addr'	=>	$row['user_addr'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$row['daily_rate'],
				'weekly_rate'	=>	$row['weekly_rate'],
				'weekend_rate'	=>	$row['weekend_rate'],
				'monthly_rate'	=>	$row['monthly_rate'],
				'bond_rate'	=>	$row['bond_rate']				
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}


	//-----------------------function to get all items on filter search------------------//
	function getAllItem_filter($ordertype,$what,$where,$category)
	{
		if($category=='all'){
			switch ($ordertype) {
				case '2':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY item_name DESC";
				
				break;
				
				case '3':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY user_addr ASC";
				
				break;

				case '4':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY user_addr DESC";
				
				break;

				case '5':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY daily_rate ASC";
				
				break;

				case '6':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY daily_rate DESC";
				
				break;

				case '7':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY weekly_rate ASC";
				
				break;

				case '8':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY weekly_rate DESC";
				
				break;

				case '9':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY monthly_rate ASC";
				
				break;

				case '10':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY monthly_rate DESC";
				
				break;
				default:
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND item_name LIKE '%$what%' ORDER BY item_name";            
				break;
			}
			
		}
		else{
			switch ($ordertype) {
				case '2':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY item_name DESC";
				
				break;
				
				case '3':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY user_addr ASC";
				
				break;

				case '4':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY user_addr DESC";
				
				break;

				case '5':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY daily_rate ASC";
				
				break;

				case '6':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY daily_rate DESC";
				
				break;

				case '7':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY weekly_rate ASC";
				
				break;

				case '8':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY weekly_rate DESC";
				
				break;

				case '9':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY monthly_rate ASC";
				
				break;

				case '10':
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY monthly_rate DESC";
				
				break;
				default:
				$query="SELECT * FROM list_items WHERE user_addr LIKE '%$where%' AND cat_name LIKE '%$category%' AND item_name LIKE '%$what%' ORDER BY item_name";            
				break;
			}
		}
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
			$daily_price=$row['daily_rate'];
			$weekly_price=$row['weekly_rate'];
			$weekend_price=$row['weekend_rate'];
			$monthly_price=$row['monthly_rate'];
			$bond_price=$row['bond_rate'];
			
			if($daily_price==0){$daily_price="NA";}
			if($weekly_price==0){$weekly_price="NA";}
			if($weekend_price==0){$weekend_price="NA";}
			if($monthly_price==0){$monthly_price="NA";}
			if($bond_price==0){$bond_price="NA";}

			$extra=array(
				'item_id'	=>	$row['item_id'],
				'item_pictures'	=>	$row['item_pictures'],
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
				'user_addr'	=>	$row['user_addr'],
				'isLive'	=>	$row['isLive'],
				'user_name'	=>	$row['user_name'],
				'daily_rate'	=>	$row['daily_rate'],
				'weekly_rate'	=>	$row['weekly_rate'],
				'weekend_rate'	=>	$row['weekend_rate'],
				'monthly_rate'	=>	$row['monthly_rate'],
				'bond_rate'	=>	$row['bond_rate']				
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}

	
	//-------------------------function to get all rent_list-------------------------//
	function getAllRent_list()
	{
		$query="SELECT * FROM list_items ORDER BY item_id DESC";
		$result = $this->db->query($query);
		$rent_list="";
		
		foreach ($result->result_array() as $row) {
			$extra=array(
				'item_id'	=>	$row['item_id'],
				'user_id'	=>	$row['user_id'],
				'item_name'	=>	$row['item_name'],
				'item_description'	=>	$row['item_description'],
				'posted_date'	=>	$row['posted_date'],
				'expiry_period'	=>	$row['expiry_period'],
				'total_views'	=>	$row['total_views'],
				'isLive'	=>	$row['isLive']
			);
			$rent_list[]=$extra;
		}

		return json_encode($rent_list);
	}


	//-----------------------function to get all items by user ID------------------//
	function getAllItem_byUID($user_id)
	{
		
		$query="SELECT * FROM list_items WHERE user_id='$user_id' ";
		
		$result = $this->db->query($query);
		$item="";
		
		foreach ($result->result_array() as $row) {
			$extra=array(
				'item_id'	=>	$row['item_id'],
				'item_pictures'	=>	$row['item_pictures'],
				'item_name'	=>	$row['item_name'],
				'cat_name'	=>	$row['cat_name'],
												
			);
			$item[]=$extra;
		}

		return json_encode($item);
	}
}



?>