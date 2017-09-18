<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Ijarline Homepage
class Home extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

	}

	public function index(){
		$this->load->view('includes/header.php');
		$this->load->view('pages/guest_subheader.php');
		$this->load->view('pages/home.php');
		$this->load->view('includes/footer.php');
	}
		
}
?>