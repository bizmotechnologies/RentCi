<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

//After User login, to process some data
class Logged_user extends CI_Model{

	//----------------function to check whether user has filled/updated user_details form-----------------//
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
//--------------function ends-----------------------------------//

//-----------------------function to check whether email-ID already exists------------------//
	function checkEmail_exist($email)
	{
		$query = null;
		$query = $this->db->get_where('user_reg', array(//making selection
            'email' => $email
        ));		
		
		if ($query->num_rows() > 0) {
			return 0;			
		} else {
			return 1;			
		}
	}
}
?>