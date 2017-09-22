<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_settings extends CI_Model{

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


	//-----------------------function to check whether email-ID already exists------------------//
	function checkCategory_exist($cat_name)
	{
		$query = null;
		$query = $this->db->get_where('item_category', array(//making selection
			'cat_name' => $cat_name
		));		
		
		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}


	function getAllRules()
	{
		$query="SELECT * FROM rules ORDER BY rule_id";
		$result = $this->db->query($query);
		$rule="";
		
		foreach ($result->result_array() as $row) {
			$extra=array(
				'rule_id'	=>	$row['rule_id'],
				'rule_title'	=>	$row['rule_title'],
				'rule_content'	=>	$row['rule_content']
			);
			$rule[]=$extra;
		}

		return json_encode($rule);
	}

	function editRules($rule_id,$rule_title,$rule_content)
	{
		// $query="UPDATE rules SET rule_title='$rule_title', rule_content= '$rule_content' WHERE rule_id=".$rule_id." ";
		$data = array(
			'rule_title' => $rule_title,
			'rule_content' => $rule_content
		);

		$this->db->where('rule_id', $rule_id);
		$result =$this->db->update('rules', $data); 
		
		if($result){
			return "Updated successfully";
		}
		else{
			return "UPdation failed";
		}
	}


	//-----------------------function to check whether email-ID already exists------------------//
	function checkPackageName_exist($pack_name)
	{
		$query = null;
		$query = $this->db->get_where('membership_pack', array(//making selection
			'pack_name' => $pack_name
		));		
		
		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}

	//-------------------------function to get all membership packages-------------------------//
	function getAllPackages()
	{
		$query="SELECT * FROM membership_pack ORDER BY pack_id";
		$result = $this->db->query($query);
		$package="";
		
		foreach ($result->result_array() as $row) {
			$extra=array(
				'pack_id'	=>	$row['pack_id'],
				'pack_name'	=>	$row['pack_name'],
				'pack_details'	=>	$row['pack_details'],
				'pack_cost'	=>	$row['pack_cost'],
				'pack_period'	=>	$row['pack_period'],
				'pack_code'	=>	$row['pack_code'],
				'pack_validity'	=>	$row['pack_validity'],
				'activation_status'	=>	$row['activation_status']
			);
			$package[]=$extra;
		}

		return json_encode($package);
	}


	//-------------------------function to edit package details-----------------------
	function editPack($editpack_id, $editpack_name, $edit_details_json, $editpack_code, $editpack_validity, $editpack_period, $editpack_cost)
	{
		
		$data = array(
			'pack_name' => $editpack_name,
			'pack_details' => $edit_details_json,
			'pack_code' => $editpack_code,
			'pack_validity' => $editpack_validity,
			'pack_period' => $editpack_period,
			'pack_cost' => $editpack_cost			
		);

		$this->db->where('pack_id', $editpack_id);
		$result =$this->db->update('membership_pack', $data); 
		
		if($result){
			return "Updated successfully";
		}
		else{
			return "UPdation failed";
		}
	}


	//-------------------------function to activate and deactivate package details-----------------------
	function activate($pack_id, $status)
	{
		if($status==0){
			$data = array(
			'activation_status' => '1'		
		);
		}
		else{
			$data = array(
			'activation_status' => '0'		
		);
		}

		$this->db->where('pack_id', $pack_id);
		$result =$this->db->update('membership_pack', $data); 
		
		if($result){
			return "Updated successfully";
		}
		else{
			return "UPdation failed";
		}
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
}
?>