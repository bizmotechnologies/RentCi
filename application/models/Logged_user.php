<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Logged_user extends CI_Model{

	function getProfile_filled($email)
	{
		$query="SELECT name FROM user_reg WHERE email='$email'";
		$result = $this->db->query($query);
		$user_name="";
		
		foreach ($result->result_array() as $row) {
			$user_name=$row['name'];
		}
		if($user_name!=''){						
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	function checkEmail_exist($email)
	{
		$query="SELECT * FROM user_reg WHERE email='$email'";
		$count=$this->db->affected_rows($query);
		
		if($count==0){						
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	function getRows($limit,$offset)
	{
		$query=$this->db->select('unique_id,name')
		->from('user_reg')
		->where($limit,$offset);
		$result=$query->get()->result_array();
		return $result;
	}


	function countRows()
	{
		$query="select count(*) as count from lfy_users";
		$result=$this->db->query($query);
		return $result->result_array();
	}
}
?>