<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

//Login and registeration page
class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();	
		
	}

	public function index(){
		$this->load->view('includes/header.php');
		$this->load->view('pages/guest_subheader.php');
		$this->load->view('pages/member_signup.php');
		$this->load->view('includes/footer.php');
	}


// ---------------------function to login by email-id and password---------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
	public function login_user(){
		$login_email= $this->input->post('login_email');
		$login_password= $this->input->post('login_password');

		$enc_password= base64_encode($login_password);	//store encrypted password in db

		//validation check
		if($login_email=='' || $login_password=='')
		{
			redirect('login');
			die();
		}

		//Connection establishment, processing of data and response from REST API
		$data=array(
			'email' =>$login_email,
			'password' => $enc_password
		);
		$path=base_url();
		$url = $path.'api/login.php';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		//API processing end


		//if status returned is 0 then signin failed, if 1 then redirect to account page
		if($response['status']==0){
			$data['account_registered']=$response['status_message'];

			$this->load->view('includes/header.php');
			$this->load->view('pages/guest_subheader.php');
			$this->load->view('pages/member_signup.php',$data);
			$this->load->view('includes/footer.php');			

		}
		else{
			$session_data= array(
				'email_id'  => $response['email_id'],
				'is_logged'     => $response['is_logged'],
				'unique_id'=>$response['unique_id'],
				'user_name'=>$response['user_name']
			);

			//start session of user if login success
			$this->session->set_userdata($session_data);
			$unique_id=$response['unique_id'];	//get unique_id of user

			//if unique_id is created then user has inserted his all details
			//and if not created, then redirect user to edit-details page
			if($unique_id==''){									
				redirect('edit_account');
			}
			else{				
				redirect('user_home');
			}

		}
		//if-else stmt end
	}
// ---------------------function to login by email-id and password end---------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------




// ---------------------function to register new user account by email-id and password---------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
	public function register(){
		$password= $this->input->post('sign_password');										
		$emailID=$this->input->post('sign_email');

		//validation check
		if($emailID=='' || $password=='')
		{
			redirect('login');
			die();
		}

		$enc_password= base64_encode($password);	//encrypt password

		//check email-Id is already registered 
		$this->load->model('logged_user');
		$checkEmail=$this->logged_user->checkEmail_exist($emailID);
		

		if($checkEmail){	

			//Connection establishment, processing of data and response from REST API
			$data=array(
				'email' =>$emailID,
				'password' => $enc_password
			);
			$path=base_url();
			$url = $path.'api/register.php';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response=json_decode($response_json, true);
		//API processing end


		//if status returned is 0 then registering failed, if 1 then redirect to signup page
			if($response['status']==0){
				$data['account_registered']=$response['status_message'];

				$this->load->view('includes/header.php');
				$this->load->view('pages/member_signup.php',$data);
				$this->load->view('includes/footer.php');			

			}
			else{
				$session_data= array(
					'email_id'  => $response['email_id'],
					'is_logged'     => $response['is_logged'],
					'unique_id'=>'',
					'user_name'=>''
				);

				//after registering login user and redirect to edit-details page
				$this->session->set_userdata($session_data);
				redirect('edit_account');

			}
		//if-else stmt end
		}
		else{

			//if email-Id already regiterd then show error
			$data['account_registered']="Email ID Already Registered. Login by same or use another Email-ID!!!";

			$this->load->view('includes/header.php');
			$this->load->view('pages/member_signup.php',$data);
			$this->load->view('includes/footer.php');
		}
		
	}
// ---------------------function to register new user account by email-id and password end---------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------




// ---------------------function to logout user---------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
	public function logout(){	
		
		$email_id=$this->session->userdata('email_id');

		//Connection establishment, processing of data and response from REST API
		$path=base_url();
		$url = $path.'api/login.php?user_email='.$email_id;		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$response=json_decode($response_json, true);
		
		if($response['status']==0){
			$data['logout_fail']=$response['status_message'];

			$this->load->view('includes/header.php');
			$this->load->view('pages/loggedIn_subheader.php');
			$this->load->view('pages/user_home.php',$data);
			$this->load->view('includes/footer.php');			
			
		}
		else{
			//if logout success then destroy session and unset session variables
			$this->session->unset_userdata(array("email_id"=>"","status_message"=>"","is_logged"=>"","unique_id"=>"","user_name"=>""));
			$this->session->sess_destroy();
			redirect('login');
			
		}
		
	}
// ---------------------function to logout user end---------------------
//--------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------
	
}
?>