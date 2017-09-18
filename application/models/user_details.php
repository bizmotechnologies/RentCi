<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Get user details model
class User_details extends CI_Model{

	//-----------function to fetch user details ----------------//
	function getAccount_details($email)
	{
		$this->db->where('email',$email);
		$query=$this->db->get('user_reg');
		$result=$query->result_array(); 		             
		return $result;
	}
	//--------------function ends-----------------//

	//---------------function to get user_id of user by email-------------//
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
	//----------------fucntion ends--------------------------//
	
}
?>