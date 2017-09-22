<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Edit_account extends CI_Controller
{
	public function __construct(){
		parent::__construct();	

		//session variables set
		$emailID=$this->session->userdata('email_id');
		$is_logged=$this->session->userdata('is_logged');
		$unique_id=$this->session->userdata('unique_id');
		$user_name=$this->session->userdata('user_name');
		
		//if any of the session variable is not set then logout (redirect to login page)
		if(($unique_id=='') && ($emailID=='') && ($is_logged=='')){
			redirect('login');
		}

		//by default fetch user details (if already inserted then it will be displayed in input fields)
		$this->load->model('user_details');		
	}

	public function index(){
		$emailID=$this->session->userdata('email_id');

		//get details of user by email-ID
		$data['account'] = $this->user_details->getAccount_details($emailID);


		$this->load->view('includes/header.php');
		$this->load->view('pages/users/loggedIn_subheader.php');
		$this->load->view('pages/warning/fill_edit.php');
		$this->load->view('pages/users/edit_account.php',$data);
		$this->load->view('includes/footer.php');
	}


//-------------function to edit user details--------------------------//
	public function edit(){
		$user_email=$this->session->userdata('email_id');
		$new_update=$this->session->userdata('unique_id');

		$this->load->model('user_details');
		$ID=$this->user_details->getID($user_email);	//get user-id of user 
		
		if($ID){

			//Connection establishment, processing of data and response from REST API 
			$data=$_POST;	//send data by POST 		
			$data['user_id']=$ID;		
			$path=base_url();
			$url = $path.'api/userInfo.php';	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);	//response from API

			//if status returned is 0 then insertion failed, if 1 then redirect to edit-details page
			if($response['status']==0){
				$data['account_updated']=$response['status_message'];

				$data['account'] = $this->user_details->getAccount_details($user_email);
				$this->load->view('includes/header.php');
				$this->load->view('pages/users/loggedIn_subheader.php');
				$this->load->view('pages/warning/fill_edit.php',$data);	//if error then show this div
				$this->load->view('pages/users/edit_account.php',$data);
				$this->load->view('includes/footer.php');			

			}
			else{
				//insertion success
				$session_data= array(
					'email_id'  => $user_email,
					'is_logged'     => 1,				
					'unique_id' => $response['unique_id'],
					'user_name'=>$response['user_name']
					);

				$this->session->set_userdata($session_data);//user session variable

				//for newly registered user after adding details (i.e at initial stage), show him registeration succeeded page
				if($new_update==''){
					$this->load->view('includes/header.php');
					$this->load->view('pages/users/loggedIn_subheader.php');
					$this->load->view('pages/users/after_login.php');
					$this->load->view('includes/footer.php');
				}
				else{
					//if user occasionally updates the details then redirect to this page 
					redirect('edit_account');
				}
			}
		//if-else stmt end
		}
	}
	//--------------------------function to edit user details end--------------------//


}
?>