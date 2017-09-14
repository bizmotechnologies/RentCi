<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Default extends CI_Model{

	function getCategory_Id($cat_name)
	{
		$query="SELECT cat_id FROM item_category WHERE cat_name='$cat_name'";
		$result = $this->db->query($query);
		$cat_id="";
		
		foreach ($result->result_array() as $row) {
			$cat_id=$row['cat_id'];
		}
			             
		return $cat_id;
	}


}
?>