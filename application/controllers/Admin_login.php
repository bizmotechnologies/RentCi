<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');


class Admin_login extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		
		date_default_timezone_set('Asia/Kuwait');
		
	}

	public function index(){
				
		$this->load->view('pages/admin_login.php');
	}

	public function find(){
		
	}

	public function addItem(){
		
		
	}

		
}
?>