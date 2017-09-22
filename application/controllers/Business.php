<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Ijarline Business
class Business extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

	}

	public function index(){
		$this->load->view('includes/header.php');
		$this->load->view('pages/guest_subheader.php');
		$this->load->view('pages/business.php');
		$this->load->view('includes/footer.php');
	}
		
}
?>