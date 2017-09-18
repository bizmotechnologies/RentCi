<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//User's homepage
class User_home extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		
		date_default_timezone_set('Asia/Kuwait');	//set Kuwait's timezone

		//start session
		$unique_id=$this->session->userdata('unique_id');
		$emailID=$this->session->userdata('email_id');
		$is_logged=$this->session->userdata('is_logged');
		$user_name=$this->session->userdata('user_name');
		
		//check session variable set or not, otherwise logout
		if(($unique_id=='') && ($emailID=='') && ($is_logged=='')){
			redirect('login');
		}
	}

	public function index(){
		$unique_id=$this->session->userdata('unique_id');
		$user_email=base64_decode($unique_id);
		
		$this->load->model('user_details');
		$ID=$this->user_details->getID($user_email);	//get user_id to get user's Ijarline on this page

		//Connection establishment to get data from REST API
		$path=base_url();
		$url = $path.'api/Item_info.php?user_id='.$ID;		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response['my_list']=json_decode($response_json, true);
		//api processing ends

		$this->load->view('includes/header.php');
		$this->load->view('pages/users/loggedIn_subheader.php');
		$this->load->view('pages/users/user_home.php',$response);
		$this->load->view('includes/footer.php');
	}

	//-------------------function to find the item by filters
	public function find(){
		
	}
	//-------------------function to find item by filters end--------------------

	
}
?>