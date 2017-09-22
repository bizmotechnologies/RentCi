<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Ijarline Rules
class Rules extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

	}

	public function index(){
		$this->load->model('admin_settings');
		$data['all_rules']=$this->admin_settings->getAllRules();

		$this->load->view('includes/header.php');
		$this->load->view('pages/guest_subheader.php');
		$this->load->view('pages/rules.php',$data);
		$this->load->view('includes/footer.php');
	}
		
}
?>