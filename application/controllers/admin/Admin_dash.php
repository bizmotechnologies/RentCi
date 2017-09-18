<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');


class Admin_dash extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		
		date_default_timezone_set('Asia/Kuwait');
		
	}

	public function index(){
		$this->load->view('pages/admin/admin_navigation.php');
		$this->load->view('pages/admin/admin_dash.php');
	}

	public function find(){
		
	}

	public function addCategory(){
		
		print_r($_POST);
		$user_email=$this->session->userdata('email_id');
		$new_update=$this->session->userdata('unique_id');
		$this->load->model('user_details');
		$ID=$this->user_details->getID($user_email);
		
		if($ID){
			//Connection establishment, processing of data and response from REST API
			$data=$_POST;			
			$path=base_url();
			$url = $path.'api/userInfo.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);

		//if status returned is 0 then signin failed, if 1 then redirect to account page
			if($response['status']==0){
				$data['account_updated']=$response['status_message'];

				$data['account'] = $this->user_details->getAccount_details($user_email);
				$this->load->view('includes/header.php');
				$this->load->view('pages/users/loggedIn_subheader.php');
				$this->load->view('pages/warning/fill_edit.php',$data);
				$this->load->view('pages/users/edit_account.php',$data);
				$this->load->view('includes/footer.php');			

			}
			else{
				$session_data= array(
					'email_id'  => $user_email,
					'is_logged'     => 1,				
					'unique_id' => $response['unique_id'],
					'user_name'=>$response['user_name']
					);
				$this->session->set_userdata($session_data);
				if($new_update==''){
					$this->load->view('includes/header.php');
					$this->load->view('pages/users/loggedIn_subheader.php');
					$this->load->view('pages/users/after_login.php');
					$this->load->view('includes/footer.php');
				}
				else{
					redirect('edit_account');
				}
			}
		//if-else stmt end
		}
	
	}

		
}
?>