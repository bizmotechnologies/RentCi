<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class User_details extends CI_Model{

	function getAccount_details($email)
	{
		// $query="SELECT * FROM user_reg WHERE email='$email'";
		//  $result = $this->db->query($query);
		$this->db->where('email',$email);
		$query=$this->db->get('user_reg');
		$result=$query->result_array(); 
		             
		return $result;
	}

	function getID($email)
	{
		$query="SELECT user_id FROM user_reg WHERE email='$email'";
		$result = $this->db->query($query);
		$user_id="";
		
		foreach ($result->result_array() as $row) {
			$user_id=$row['user_id'];
		}
			             
		return $user_id;
	}


	
}
?>